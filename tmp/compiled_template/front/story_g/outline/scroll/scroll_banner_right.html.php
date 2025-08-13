<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/outline/scroll/scroll_banner_right.html 000004877 */  $this->include_("dataTodayGoods");?>
<div class="recent-list">
    <em><?php echo __('최근본상품')?></em>

    <div class="list">
<?php if((is_array($TPL_R1=datatodaygoods( 5))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
        <ul>
<?php if((is_array($TPL_R2=$TPL_V1)&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
            <li>
               <a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_V2["goodsNo"]?>" style="background-image:url('<?php echo $TPL_V2["goodsImageSrc"]?>');"><span><?php echo gd_remove_only_tag($TPL_V2["goodsNm"])?></span></a>
                <div>
                    <p><a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_V2["goodsNo"]?>"><?php echo gd_html_cut(gd_remove_only_tag($TPL_V2["goodsNm"]), 22,'...')?></a></p>
                    <span><a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_V2["goodsNo"]?>">
<?php if($TPL_V2["goodsPriceString"]!=''){?>
                        <strong><?php echo $TPL_V2["goodsPriceString"]?></strong>
<?php }else{?>
                        <strong><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["goodsPrice"])?></strong><?php echo gd_global_currency_string()?>

<?php }?>
                    </a></span>
                </div>
                <button data-goods-no="<?php echo $TPL_V2["goodsNo"]?>" type="button" title="<?php echo __('최근본 상품에서 삭제')?>"><span><?php echo __('최근본 상품에서 삭제')?></span></button>
            </li>
<?php }}?>
        </ul>
<?php }}?>
        <div class="paging">
            <button type="button" class="prev" title="<?php echo __('최근본 이전 상품')?>"><span><?php echo __('최근본 이전 상품')?></span></button>
            <span><strong class="js-current">0</strong>/<span class="js-total" style="float:none;width:auto;">0</span></span>
            <button type="button" class="next" title="<?php echo __('최근본 다음 상품')?>"><span><?php echo __('최근본 다음 상품')?></span></button>
        </div>
    </div>
    <div class="top"><a href="#top"><img src="/data/skin/front/story_g/img/side/btn-top.png" alt="<?php echo __('상단으로 이동')?>"/></a></div>
</div>

<script type="text/javascript">
    // DOM 로드
    $(function () {
        $('.recent-list').todayGoods();
    });

    // 최근본상품 리스트 페이징 처리 플러그인
    $.fn.todayGoods = function () {
        // 기본값 세팅
        var self = $(this);
        var setting = {
            page: 1,
            total: 0,
            rowno: 5
        };
        var element = {
            goodsList: self.find('.list > ul > li'),
            closeButton: self.find('.list > ul > li > button'),
            prev: self.find('.paging > .prev'),
            next: self.find('.paging > .next'),
            paging: self.find('.paging')
        };

        // 페이지 갯수 설정
        setting.total = Math.ceil(element.goodsList.length / setting.rowno);

        // 화면 초기화 및 갱신 (페이지 및 갯수 표기)
        var init = function () {
            if (setting.total == 0) {
                setting.page = 0;
                element.paging.hide();
            }
            self.find('ul').hide().eq(setting.page - 1).show();
            self.find('.paging .js-current').text(setting.page);
            self.find('.paging .js-total').text(setting.total);
        }

        // 삭제버튼 클릭
        element.closeButton.click(function(e){
            $.post('../goods/goods_ps.php', {
                'mode': 'delete_today_goods',
                'goodsNo': $(this).data('goods-no')
            }, function (data, status) {
                // 값이 없는 경우 성공
                if (status == 'success' && data == '') {
                    location.reload(true);
                }
                else {
                    console.log('request fail. ajax status (' + status + ')');
                }
            });
        });

        // 이전버튼 클릭
        element.prev.click(function (e) {
            setting.page = 1 == setting.page ? setting.total : setting.page - 1;
            init();
        });

        // 다음버튼 클릭
        element.next.click(function (e) {
            setting.page = setting.total == setting.page ? 1 : setting.page + 1;
            init();
        });

        // 화면 초기화
        init();
    };
</script>