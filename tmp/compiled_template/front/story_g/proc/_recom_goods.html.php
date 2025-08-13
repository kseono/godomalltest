<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/proc/_recom_goods.html 000007761 */ ?>
<?php if($TPL_VAR["config"]["pcDisplayFl"]=='y'){?>
<div class="recom-goods">
    <h3 align="center"><?php echo __('추천상품')?></h3>
    <div class="recom-goods-info">
<?php if(gd_in_array('img',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["img"]){?>
        <div class="recom-goods-img">
            <a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_VAR["data"]["goodsNo"]?>">
                <img src="<?php echo $TPL_VAR["data"]["img"]?>" style="max-width:150px;">
<?php if($TPL_VAR["data"]["soldOutFl"]=='y'||($TPL_VAR["data"]["stockFl"]=='y'&&$TPL_VAR["data"]["totalStock"]== 0)){?>
                <span class="soldout-img" title="품절상품입니다." style="background-image:url('<?php echo $TPL_VAR["soldoutDisplay"]["soldout_overlay_img"]?>');"><?php echo __('품절')?></span>
<?php }?>
            </a>
        </div>
<?php if(gd_in_array('goodsColor',$TPL_VAR["config"]["displayField"])){?>
        <?php echo $TPL_VAR["data"]["goodsColor"]?>

<?php }?>
<?php }?>
<?php if(gd_in_array('brandCd',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["cateNm"]){?>
        <div class="brand"><strong>[<?php echo $TPL_VAR["data"]["cateNm"]?>] <?php if(gd_in_array('makerNm',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["makerNm"]){?><?php echo $TPL_VAR["data"]["makerNm"]?><?php }?></strong></div>
<?php }else{?>
<?php if(gd_in_array('makerNm',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["makerNm"]){?>
        <div class="maker"><strong><?php echo $TPL_VAR["data"]["makerNm"]?></strong></div>
<?php }?>
<?php }?>
<?php if(gd_in_array('goodsNm',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["goodsNm"]){?>
        <div><a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_VAR["data"]["goodsNo"]?>"><?php echo $TPL_VAR["data"]["goodsNm"]?></a></div>
<?php }?>
<?php if(gd_in_array('shortDescription',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["shortDescription"]){?>
        <div><?php echo $TPL_VAR["data"]["shortDescription"]?></div>
<?php }?>
<?php if(gd_in_array('goodsPrice',$TPL_VAR["config"]["displayField"])){?>
<?php if($TPL_VAR["data"]["goodsPriceString"]){?>
        <div><?php echo $TPL_VAR["data"]["goodsPriceString"]?></div>
<?php }else{?>
<?php if($TPL_VAR["data"]["soldOutFl"]=='y'||($TPL_VAR["data"]["stockFl"]=='y'&&$TPL_VAR["data"]["totalStock"]== 0)){?>
        <div><?php echo __('품절')?></div>
<?php }else{?>
<?php if($TPL_VAR["data"]["goodsPrice"]){?>
        <div style="<?php if($TPL_VAR["data"]["timeSaleFl"]){?><?php }else{?><?php if(gd_in_array('goodsPrice',$TPL_VAR["config"]["priceStrike"])&&((gd_in_array('coupon',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["couponPrice"]!=''&&$TPL_VAR["data"]["goodsPriceDisplayFl"]=='y')||(gd_in_array('goodsDiscount',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["dcPrice"]> 0))){?>text-decoration:line-through<?php }?><?php }?>"><?php echo __('판매가')?>: <?php echo gd_currency_symbol()?><?php echo gd_money_format($TPL_VAR["data"]["goodsPrice"])?><?php echo gd_currency_string()?></div>
<?php }?>
<?php }?>
<?php }?>
<?php }?>
<?php if(gd_in_array('goodsDiscount',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["dcPrice"]> 0){?>
        <div>
            <?php echo __('할인가')?> : <?php echo gd_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["data"]["goodsPrice"]-$TPL_VAR["data"]["dcPrice"])?><?php echo gd_currency_string()?> <?php echo gd_global_add_currency_display($TPL_VAR["data"]["goodsPrice"]-$TPL_VAR["data"]["dcPrice"])?><?php if(gd_in_array('dcRate',$TPL_VAR["config"]["displayAddField"])&&gd_isset($TPL_VAR["data"]["goodsDcRate"])){?> <span class="recom_number_box">(<?php echo $TPL_VAR["data"]["goodsDcRate"]?>%)</span><?php }?>
        </div>
<?php }?>
<?php if(gd_in_array('fixedPrice',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["fixedPrice"]> 0&&$TPL_VAR["data"]["goodsPriceDisplayFl"]=='y'){?>
        <div style="<?php if(gd_in_array('fixedPrice',$TPL_VAR["config"]["priceStrike"])){?>text-decoration:line-through;<?php }?>"><?php echo __('정가')?>: <?php echo gd_currency_symbol()?><?php echo gd_money_format($TPL_VAR["data"]["fixedPrice"])?><?php echo gd_currency_string()?></div>
<?php }?>
<?php if(gd_in_array('coupon',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["couponPrice"]&&$TPL_VAR["data"]["goodsPriceDisplayFl"]=='y'){?>
        <div>
            <?php echo __('쿠폰가')?>: <?php echo gd_currency_symbol()?><?php echo gd_money_format($TPL_VAR["data"]["couponPrice"])?><?php echo gd_currency_string()?>

<?php if(gd_in_array('dcRate',$TPL_VAR["config"]["displayAddField"])&&gd_isset($TPL_VAR["data"]["couponDcRate"])){?> <span class="recom_number_box">(<?php echo $TPL_VAR["data"]["couponDcRate"]?>%)</span><?php }?>
        </div>
<?php }?>
<?php if(gd_in_array('mileage',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["mileage"]&&$TPL_VAR["data"]["goodsPriceDisplayFl"]=='y'){?>
        <div><?php echo __('마일리지')?>: <?php echo $TPL_VAR["data"]["mileage"]?></div>
<?php }?>
<?php if(gd_in_array('goodsModelNo',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["goodsModelNo"]){?>
        <div><?php echo __('모델번호')?>: <?php echo $TPL_VAR["data"]["goodsModelNo"]?></div>
<?php }?>
<?php if(gd_in_array('goodsNo',$TPL_VAR["config"]["displayField"])&&$TPL_VAR["data"]["goodsNo"]){?>
        <div><?php echo __('상품코드')?> : <?php echo $TPL_VAR["data"]["goodsNo"]?></div>
<?php }?>
    </div>
</div>
<style>
    .recom-goods { width:100%; border:none !important; margin:0 !important; }
    .recom-goods h3 { padding:10px 0; }
    .recom-goods .recom-goods-info { width:90% !important; margin:0 0 0 5% !important; }
    .recom-goods .recom-goods-info .recom-goods-img a { display:table-cell; padding:5px; border:1px solid #000; }
    .recom-goods-info, .recom-goods-info div { border:none !important; margin:0 !important; text-align:left; }
    .recom-goods-info a {display:table-cell; position: relative;}
    .recom-goods-info a span.soldout-img { display:block; position:absolute; top:0; left:0; z-index:10; width:100%; height:100%; background-color: rgba(255, 255, 255, 0.6); background-position:center; background-repeat:no-repeat; text-indent:-9999px; }
    .recom-goods-info .color{margin:5px 0 7px !important; padding:0 !important; overflow:hidden !important;}
    .recom-goods-info .color > div{width:12px !important; height:12px !important; text-indent:-9999px !important; border:#dfdfdf 1px solid !important; float:left !important; margin:5px 5px 0 0 !important;}
</style>
<script type="text/javascript">
    $(function(){
        if ($(".recent-area").length > 0) {
            $(".recent-area").attr("style", "float:left; width:49% !important; margin-right:-1px; border-right:1px solid #d9d9d9 !important;");
            $(".recom-goods").attr("style", "float:left; width:49% !important; border-left:1px solid #d9d9d9 !important;");
            $(".recent-area li span").width(100);
        } else {
            $(".recom-goods-info").attr("style", "width:50% !important; margin:0 auto !important; float:none;");
        }
        $('#frmSearchTop input[name="keyword"]').focus(function(){
            $('.search-area').removeClass('dn');
        }).blur(function(){
            $('body').click(function(e){
                if (!$('.search-area').has(e.target).length && e.target.name != 'keyword') {
                    $('.search-area').addClass('dn');
                }
            });
        });
    });
</script>
<?php }?>