<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/goods/list/list_01.html 000011014 */ 
if (is_array($TPL_VAR["goodsList"])) $TPL_goodsList_1=count($TPL_VAR["goodsList"]); else if (is_object($TPL_VAR["goodsList"]) && in_array("Countable", class_implements($TPL_VAR["goodsList"]))) $TPL_goodsList_1=$TPL_VAR["goodsList"]->count();else $TPL_goodsList_1=0;?>
<div class="item_gallery_type">
<?php if($TPL_VAR["goodsList"]){?>
    <ul>
<?php if($TPL_goodsList_1){foreach($TPL_VAR["goodsList"] as $TPL_V1){?>
<?php if((is_array($TPL_R2=$TPL_V1)&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
        <li <?php if($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_overlay"]!='0'){?>class="item_soldout"<?php }?> style="width:<?php echo ( 100/$TPL_VAR["themeInfo"]["lineCnt"])?>%;">
            <div class="item_cont">
                <div class="item_photo_box" <?php if($TPL_V2["goodsData"]){?><?php echo $TPL_V2["goodsData"]?><?php }?>>
                    <a href="<?php echo gd_goods_url($TPL_V2["goodsUrl"],$TPL_V2["goodsNo"])?>" <?php if($TPL_VAR["themeInfo"]["relationLinkFl"]=='blank'){?> target="_blank"<?php }?>>
<?php if(gd_in_array('img',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsImage"])){?>
                        <?php echo $TPL_V2["goodsImage"]?>

<?php }?>
<?php if($TPL_V2["timeSaleFl"]){?>
                        <span class="icon_time_sale"><img src="/data/skin/front/moment/img/icon/goods_icon/icon_time_sale.png" alt="<?php echo __('타임세일')?>" /></span>
<?php }?>
<?php if($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_overlay"]!='0'){?>
                        <strong class="item_soldout_bg" style="background-image:url(<?php echo $TPL_VAR["soldoutDisplay"]["soldout_overlay_img"]?>);">SOLD OUT</strong>
<?php }?>
                    </a>
                </div>
<?php if(gd_in_array('goodsColor',$TPL_VAR["themeInfo"]["displayField"])){?>
                <?php echo $TPL_V2["goodsColor"]?>

<?php }?>
                <!-- //item_photo_box -->
                <div class="item_info_cont">
                    <div class="item_tit_box">
<?php if(gd_in_array('brandCd',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["brandNm"])||gd_in_array('makerNm',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["makerNm"])){?>
                        <span class="item_brand">
<?php if(gd_in_array('brandCd',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["brandNm"])){?>
                            <strong>[<?php echo $TPL_V2["brandNm"]?>]</strong>
<?php }?>
<?php if(gd_in_array('makerNm',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["makerNm"])){?>
                            <?php echo $TPL_V2["makerNm"]?>

<?php }?>
                        </span>
<?php }?>
                        <a href="<?php echo gd_goods_url($TPL_V2["goodsUrl"],$TPL_V2["goodsNo"])?>"<?php if($TPL_VAR["themeInfo"]["relationLinkFl"]=='blank'){?> target="_blank"<?php }?>>
<?php if(gd_in_array('goodsNm',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsNm"])){?>
                            <strong class="item_name"><?php echo $TPL_V2["goodsNm"]?></strong>
<?php }?>
<?php if(gd_in_array('shortDescription',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["shortDescription"])){?>
                            <span class="item_name_explain"><?php echo $TPL_V2["shortDescription"]?></span>
<?php }?>
                        </a>
                    </div>
                    <!-- //item_tit_box -->
                    <div class="item_money_box">
<?php if(gd_in_array('fixedPrice',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["fixedPrice"])&&$TPL_V2["fixedPrice"]> 0&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <span style="<?php if(gd_in_array('fixedPrice',$TPL_VAR["themeInfo"]["priceStrike"])){?>color:#888; text-decoration:line-through;<?php }?>"><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["fixedPrice"])?><?php echo gd_global_currency_string()?> <?php echo gd_global_add_currency_display($TPL_V2["fixedPrice"])?></span>
<?php }?>
<?php if(gd_in_array('goodsPrice',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsPrice"])){?>
<?php if($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_price"]=='text'){?>
                        <strong class="item_price"><?php echo $TPL_VAR["soldoutDisplay"]["soldout_price_text"]?></strong>
<?php }elseif($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_price"]=='custom'){?>
                        <strong class="item_price"><img src="<?php echo $TPL_VAR["soldoutDisplay"]["soldout_price_img"]?>" alt="<?php echo $TPL_VAR["soldoutDisplay"]["soldout_price_img_filename"]?>" /></strong>
<?php }else{?>
                        <strong class="item_price">
<?php if($TPL_V2["goodsPriceString"]!=''){?>
                            <?php echo $TPL_V2["goodsPriceString"]?>

<?php }else{?>
<?php if($TPL_V2["timeSaleFl"]&&$TPL_V2["timeSaleGoodsPriceViewFl"]=='y'&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                            <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["oriGoodsPrice"])?><?php echo gd_global_currency_string()?> <?php echo gd_global_add_currency_display($TPL_V2["oriGoodsPrice"])?><br />
<?php }?>
                            <span <?php if($TPL_V2["timeSaleFl"]){?> class='<?php echo $TPL_V2["cssTimeSaleIcon"]?>'<?php }else{?> style="<?php if(gd_in_array('goodsPrice',$TPL_VAR["themeInfo"]["priceStrike"])&&((gd_in_array('coupon',$TPL_VAR["themeInfo"]["displayField"])&&$TPL_V2["couponPrice"]!=''&&$TPL_V2["goodsPriceDisplayFl"]=='y')||(gd_in_array('goodsDiscount',$TPL_VAR["themeInfo"]["displayField"])&&$TPL_V2["dcPrice"]> 0))){?>text-decoration:line-through<?php }?>"<?php }?>><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["goodsPrice"])?><?php echo gd_global_currency_string()?> <?php echo gd_global_add_currency_display($TPL_V2["goodsPrice"])?></span>
<?php if($TPL_V2["timeSaleFl"]&&gd_isset($TPL_V2["timeSaleLeftTimeTxt"])){?><span class='time_sale_text'><?php echo $TPL_V2["timeSaleLeftTimeTxt"]?></span><?php }?>
<?php }?>
                        </strong>
<?php }?>
<?php }?>
<?php if(gd_in_array('goodsDiscount',$TPL_VAR["themeInfo"]["displayField"])&&$TPL_V2["dcPrice"]> 0&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <strong class="item_price">
                            <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["goodsPrice"]-$TPL_V2["dcPrice"])?><?php echo gd_global_currency_string()?> <?php echo gd_global_add_currency_display($TPL_V2["goodsPrice"]-$TPL_V2["dcPrice"])?><?php if(gd_in_array('dcRate',$TPL_VAR["themeInfo"]["displayAddField"])&&gd_isset($TPL_V2["goodsDcRate"])){?> <span class="item_number_box">(<?php echo $TPL_V2["goodsDcRate"]?>%)</span><?php }?>
                        </strong>
<?php }?>
<?php if(gd_in_array('coupon',$TPL_VAR["themeInfo"]["displayField"])&&$TPL_V2["couponPrice"]!=''&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <strong class="item_sale">
                            <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["couponPrice"])?> <?php echo gd_global_currency_string()?> <?php echo gd_global_add_currency_display($TPL_V2["couponPrice"])?>

<?php if(gd_in_array('dcRate',$TPL_VAR["themeInfo"]["displayAddField"])&&gd_isset($TPL_V2["couponDcRate"])){?> <span class="item_number_box">(<?php echo $TPL_V2["couponDcRate"]?>%)</span><?php }?>
                            <a class="icon_item_coupon"><img src="/data/skin/front/moment/img/icon/goods_icon/icon_coupon.png" alt="<?php echo __('쿠폰')?>" title="<?php echo __('쿠폰')?>" /></a>
                        </strong>
<?php }?>
<?php if(gd_in_array('goodsDcPrice',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsDcPrice"])&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <span class="mileage"><img src="/data/skin/front/moment/img/icon/goods_icon/icon_discount.png" alt="<?php echo __('상품할인금액')?>"> <?php echo gd_global_money_format($TPL_V2["goodsDcPrice"])?> <?php echo gd_global_currency_string()?></span><br/><?php }?>
<?php if(gd_in_array('mileage',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["mileageBasic"])&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <span class="item_mileage">
                            <img src="/data/skin/front/moment/img/icon/goods_icon/icon_mileage.png" alt="<?php echo __('마일리지')?>" title="<?php echo __('마일리지')?>" /> <?php echo $TPL_V2["mileageBasic"]?> <?php echo $TPL_VAR["mileageData"]['unit']?>

                        </span>
<?php }?>
                    </div>
                    <!-- //item_money_box -->
<?php if((gd_in_array('goodsModelNo',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsModelNo"]))||(gd_in_array('goodsNo',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsNo"]))){?>
                    <div class="item_number_box">
<?php if(gd_in_array('goodsModelNo',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsModelNo"])){?>
                        <span class="num_model"><?php echo __('모델번호')?> : <?php echo $TPL_V2["goodsModelNo"]?></span>
<?php }?>
<?php if(gd_in_array('goodsNo',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsNo"])){?>
                        <span class="num_code"><?php echo __('상품코드')?> : <?php echo $TPL_V2["goodsNo"]?></span>
<?php }?>
                    </div>
<?php }?>
                    <!-- //item_number_box -->
<?php if($TPL_VAR["themeInfo"]["iconFl"]=='y'||($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_icon"]!='disable')){?>
                    <div class="item_icon_box">
<?php if($TPL_VAR["themeInfo"]["iconFl"]=='y'){?>
                        <?php echo $TPL_V2["goodsIcon"]?>

<?php }?>
<?php if($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_icon"]!='disable'){?>
                        <img src="<?php echo $TPL_VAR["soldoutDisplay"]["soldout_icon_img"]?>" alt="<?php echo __('품절')?>" />
<?php }?>
                    </div>
<?php }?>
                    <!-- //item_icon_box -->
                </div>
                <!-- //item_info_cont -->
            </div>
            <!-- //item_cont -->
        </li>
<?php }}?>
<?php }}?>
    </ul>
<?php }else{?>
    <div class="goods_no_data"><strong><?php echo __('상품이 존재하지 않습니다.')?></strong></div>
<?php }?>
</div>
<!-- //item_gallery_type -->