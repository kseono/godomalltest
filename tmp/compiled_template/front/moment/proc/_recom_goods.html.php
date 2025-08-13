<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/proc/_recom_goods.html 000007680 */ ?>
<?php if($TPL_VAR["config"]["pcDisplayFl"]=='y'){?>
<script type="text/javascript">
    $(function(){

        /* 상단 검색 */
        $('.top_search_cont input[name="keyword"]').on({
            'focus':function(){
                $(this).parents().find('.search_cont').show();
            },
            'blur':function(){
                $('body').click(function(e){
                    if (!$('.search_cont').has(e.target).length && e.target.name != 'keyword') {
                        $(this).parents().find('.search_cont').hide();
                    }
                });
                $('.btn_top_search_close').click(function(){
                    $(this).parents().find('.search_cont').hide();
                });
            }
        });

        if($("input[name=recentCount]").val() > 0) {
            $('.js_recom_box').removeClass('recom_box_only').addClass('recom_box');
        }else{
            $('.js_recom_box').removeClass('recom_box').addClass('recom_box_only');
        }

    });
</script>
<div class="js_recom_box <?php if($TPL_VAR["data"]["soldOutFl"]=='y'||($TPL_VAR["data"]["stockFl"]=='y'&&$TPL_VAR["data"]["totalStock"]== 0)){?>item_soldout<?php }?>">
    <dl>
        <dt><?php echo __('추천상품')?></dt>
        <dd>
<?php if(gd_in_array('img',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["img"]){?>
            <a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_VAR["data"]["goodsNo"]?>">
                <span class="recom_photo">
                    <img src="<?php echo $TPL_VAR["data"]["img"]?>" style="max-width:120px;" alt="<?php echo $TPL_VAR["data"]["goodsNm"]?>">
<?php if($TPL_VAR["data"]["soldOutFl"]=='y'||($TPL_VAR["data"]["stockFl"]=='y'&&$TPL_VAR["data"]["totalStock"]== 0)){?>
                    <strong class="item_soldout_bg" style="background-image:<?php echo $TPL_VAR["soldoutDisplay"]["soldout_overlay_img"]?>;">SOLD OUT</strong>
<?php }?>
                </span>
            </a>
<?php }?>
<?php if(gd_in_array('goodsColor',$TPL_VAR["config"]["displayField"])){?>
            <?php echo $TPL_VAR["data"]["goodsColor"]?>

<?php }?>
            <div class="recom_item_cont">
                <!-- //recom_icon_box -->
                <div class="recom_tit_box">
<?php if(gd_in_array('brandCd',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["cateNm"]){?>
                    <span class="item_brand">[<?php echo $TPL_VAR["data"]["cateNm"]?>] <?php if(gd_in_array('makerNm',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["makerNm"]){?><?php echo $TPL_VAR["data"]["makerNm"]?><?php }?></span>
<?php }else{?>
<?php if(gd_in_array('makerNm',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["makerNm"]){?>
                    <span class="item_brand"><?php echo $TPL_VAR["data"]["makerNm"]?></span>
<?php }?>
<?php }?>
                    <a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_VAR["data"]["goodsNo"]?>">
<?php if(gd_in_array('goodsNm',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["goodsNm"]){?>
                        <strong class="item_name"><?php echo $TPL_VAR["data"]["goodsNm"]?></strong>
<?php }?>
<?php if(gd_in_array('shortDescription',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["shortDescription"]){?>
                        <span class="item_name_explain"><?php echo $TPL_VAR["data"]["shortDescription"]?></span>
<?php }?>
                    </a>
                </div>
                <!-- //recom_tit_box -->
                <div class="recom_money_box">
<?php if(gd_in_array('goodsPrice',$TPL_VAR["config"]["displayField"])){?>
<?php if($TPL_VAR["data"]["goodsPriceString"]){?>
                    <div><?php echo $TPL_VAR["data"]["goodsPriceString"]?></div>
<?php }else{?>
<?php if($TPL_VAR["data"]["soldOutFl"]=='y'||($TPL_VAR["data"]["stockFl"]=='y'&&$TPL_VAR["data"]["totalStock"]== 0)){?>
                    <div><?php echo __('품절')?></div>
<?php }else{?>
<?php if($TPL_VAR["data"]["goodsPrice"]){?>
                    <strong class="item_price" style="<?php if($TPL_VAR["data"]["timeSaleFl"]){?><?php }else{?><?php if(gd_in_array('goodsPrice',$TPL_VAR["config"]["priceStrike"])&&((gd_in_array('coupon',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["couponPrice"]!=''&&$TPL_VAR["data"]["goodsPriceDisplayFl"]=='y')||(gd_in_array('goodsDiscount',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["dcPrice"]> 0))){?>text-decoration:line-through<?php }?><?php }?>"><?php echo __('판매가')?>: <?php echo gd_currency_symbol()?><?php echo gd_money_format($TPL_VAR["data"]["goodsPrice"])?><?php echo gd_currency_string()?></strong>
<?php }?>
<?php }?>
<?php }?>
<?php }?>
<?php if(gd_in_array('goodsDiscount',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["dcPrice"]> 0){?>
                    <strong class="item_price">
                        <?php echo __('할인가')?> : <?php echo gd_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["data"]["goodsPrice"]-$TPL_VAR["data"]["dcPrice"])?><?php echo gd_currency_string()?> <?php echo gd_global_add_currency_display($TPL_VAR["data"]["goodsPrice"]-$TPL_VAR["data"]["dcPrice"])?><?php if(gd_in_array('dcRate',$TPL_VAR["config"]["displayAddField"])&&gd_isset($TPL_VAR["data"]["goodsDcRate"])){?> <span class="recom_number_box">(<?php echo $TPL_VAR["data"]["goodsDcRate"]?>%)</span><?php }?>
                    </strong>
<?php }?>
<?php if(gd_in_array('fixedPrice',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["fixedPrice"]> 0&&$TPL_VAR["data"]["goodsPriceDisplayFl"]=='y'){?>
                    <strong class="item_price" style="<?php if(gd_in_array('fixedPrice',$TPL_VAR["config"]["priceStrike"])){?>text-decoration:line-through;<?php }?>"><?php echo __('정가')?>: <?php echo gd_currency_symbol()?><?php echo gd_money_format($TPL_VAR["data"]["fixedPrice"])?><?php echo gd_currency_string()?></strong>
<?php }?>
<?php if(gd_in_array('coupon',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["couponPrice"]&&$TPL_VAR["data"]["goodsPriceDisplayFl"]=='y'){?>
                    <strong class="item_sale">
                        <?php echo __('쿠폰가')?> : <?php echo gd_currency_symbol()?><?php echo gd_money_format($TPL_VAR["data"]["couponPrice"])?><?php echo gd_currency_string()?>

<?php if(gd_in_array('dcRate',$TPL_VAR["config"]["displayAddField"])&&gd_isset($TPL_VAR["data"]["couponDcRate"])){?> <span class="recom_number_box">(<?php echo $TPL_VAR["data"]["couponDcRate"]?>%)</span><?php }?>
                    </strong>
<?php }?>
                </div>
                <!-- //recom_money_box -->
                <div class="recom_number_box">
<?php if(gd_in_array('mileage',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["mileage"]&&$TPL_VAR["data"]["goodsPriceDisplayFl"]=='y'){?>
                    <span class="num_mileage"><?php echo __('마일리지')?> : <?php echo $TPL_VAR["data"]["mileage"]?></span>
<?php }?>
<?php if(gd_in_array('goodsModelNo',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["goodsModelNo"]){?>
                    <span class="num_code"><?php echo __('모델번호')?> : <?php echo $TPL_VAR["data"]["goodsModelNo"]?></span>
<?php }?>
<?php if(gd_in_array('goodsNo',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["goodsNo"]){?>
                    <span class="num_code"><?php echo __('상품코드')?> : <?php echo $TPL_VAR["data"]["goodsNo"]?></span>
<?php }?>
                </div>
                <!-- //recom_number_box -->
            </div>
            <!-- //recom_item_cont -->
        </dd>
    </dl>
</div>
<?php }?>