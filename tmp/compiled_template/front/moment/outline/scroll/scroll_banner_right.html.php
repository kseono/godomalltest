<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/outline/scroll/scroll_banner_right.html 000005193 */  $this->include_("dataBanner","dataTodayGoods");?>
<div class="right_banner">
<?php if((is_array($TPL_R1=databanner('3739029828'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?>
</div>
<div class="scroll_right_cont">
    <h4>TODAY VIEW</h4>
<?php if((is_array($TPL_R1=datatodaygoods( 5))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
    <ul>
<?php if((is_array($TPL_R2=$TPL_V1)&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
        <li>
            <a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_V2["goodsNo"]?>">
                <span class="photo">
                    <img src="<?php echo $TPL_V2["goodsImageSrc"]?>" alt="<?php echo $TPL_V2["goodsNm"]?>">
                </span>
                <span class="src_box">
                    <em><?php echo gd_html_cut(gd_remove_only_tag($TPL_V2["goodsNm"]), 22,'...')?></em>
<?php if($TPL_V2["goodsPriceString"]!=''){?>
                        <strong><?php echo $TPL_V2["goodsPriceString"]?></strong>
<?php }else{?>
                        <strong><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["goodsPrice"])?><b><?php echo gd_global_currency_string()?></b></strong>
<?php }?>
                </span>
                <!-- //src_box -->
            </a>
            <button data-goods-no="<?php echo $TPL_V2["goodsNo"]?>" type="button" class="btn_scroll_list_del" title="<?php echo __('최근본 상품에서 삭제')?>"><img src="/data/skin/front/moment/img/common/btn/btn_scroll_list_del.png" alt="<?php echo __('최근본 상품에서 삭제')?>"></button>
        </li>
<?php }}?>

    </ul>
<?php }}?>

    <div class="scr_paging">
        <button type="button" class="bnt_scroll_prev" title="<?php echo __('최근본 이전 상품')?>"><img src="/data/skin/front/moment/img/common/btn/btn_scroll_prev.png" alt="<?php echo __('최근본 이전 상품')?>"></button>
        <span><strong class="js_current">0</strong>/<span class="js_total" style="float:none;width:auto;">2</span></span>
        <button type="button" class="bnt_scroll_next" title="<?php echo __('최근본 다음 상품')?>"><img src="/data/skin/front/moment/img/common/btn/btn_scroll_next.png" alt="<?php echo __('최근본 다음 상품')?>"></button>
    </div>
    <!-- //scr_paging -->
</div>
<span class="btn_scroll_top"><a href="#TOP"><img src="/data/skin/front/moment/img/common/btn/btn_scroll_top.png" alt="<?php echo __('상단으로 이동')?>"/></a></span>

<script type="text/javascript">
    // DOM 로드
    $(function () {
        $('.scroll_right_cont').todayGoods();
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
            goodsList: self.find('ul > li'),
            closeButton: self.find('ul > li > button'),
            prev: self.find('.scr_paging > .bnt_scroll_prev'),
            next: self.find('.scr_paging > .bnt_scroll_next'),
            paging: self.find('.scr_paging')
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
            self.find('.scr_paging .js_current').text(setting.page);
            self.find('.scr_paging .js_total').text(setting.total);
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