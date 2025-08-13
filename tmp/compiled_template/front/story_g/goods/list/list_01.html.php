<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/goods/list/list_01.html 000009912 */ 
if (is_array($TPL_VAR["goodsList"])) $TPL_goodsList_1=count($TPL_VAR["goodsList"]); else if (is_object($TPL_VAR["goodsList"]) && in_array("Countable", class_implements($TPL_VAR["goodsList"]))) $TPL_goodsList_1=$TPL_VAR["goodsList"]->count();else $TPL_goodsList_1=0;?>
<div class="item-display type-gallery">
    <div class="list">
<?php if($TPL_VAR["goodsList"]){?>
        <ul>
<?php if($TPL_goodsList_1){foreach($TPL_VAR["goodsList"] as $TPL_V1){?>
<?php if((is_array($TPL_R2=$TPL_V1)&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
            <li style="width:<?php echo ( 100/$TPL_VAR["themeInfo"]["lineCnt"])?>%">
                <div class="space">
                    <div class="thumbnail" <?php if($TPL_V2["goodsData"]){?><?php echo $TPL_V2["goodsData"]?><?php }?>>
                        <a href="<?php echo gd_goods_url($TPL_V2["goodsUrl"],$TPL_V2["goodsNo"])?>" <?php if($TPL_VAR["themeInfo"]["relationLinkFl"]=='blank'){?> target="_blank"<?php }?> > <?php if(gd_in_array('img',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsImage"])){?><?php echo $TPL_V2["goodsImage"]?><?php }?>
<?php if($TPL_VAR["themeInfo"]["iconFl"]=='y'){?>
                            <span class="hot">
                                <?php echo $TPL_V2["goodsIcon"]?>

                            </span>
<?php }?>
<?php if($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_overlay"]!='0'){?><span class="soldout-img" title="<?php echo __('품절상품입니다.')?>" style="background-image:url('<?php echo $TPL_VAR["soldoutDisplay"]["soldout_overlay_img"]?>');"><?php echo __('품절')?></span><?php }?>
                        </a>
                    </div>
<?php if(gd_in_array('goodsColor',$TPL_VAR["themeInfo"]["displayField"])){?>
                    <?php echo $TPL_V2["goodsColor"]?>

<?php }?>
                    <div class="txt">
<?php if($TPL_V2["timeSaleFl"]){?>
                        <span class="time-sale"><img src="/data/skin/front/story_g/img/icon/time-sale.png" alt="<?php echo __('타임세일')?>"></span>
<?php }?>
<?php if($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_icon"]!='disable'){?>
                        <div><img src="<?php echo $TPL_VAR["soldoutDisplay"]["soldout_icon_img"]?>"></div>
<?php }?>
<?php if(gd_in_array('brandCd',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["brandNm"])||gd_in_array('makerNm',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["makerNm"])){?> <span class="brand"><?php if(gd_in_array('brandCd',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["brandNm"])){?><strong>[<?php echo $TPL_V2["brandNm"]?>]</strong><?php }?> <?php if(gd_in_array('makerNm',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["makerNm"])){?><?php echo $TPL_V2["makerNm"]?><?php }?></span><br><?php }?>
                        <a href="<?php echo gd_goods_url($TPL_V2["goodsUrl"],$TPL_V2["goodsNo"])?>"  <?php if($TPL_VAR["themeInfo"]["relationLinkFl"]=='blank'){?> target="_blank"<?php }?>>
<?php if(gd_in_array('goodsNm',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsNm"])){?> <strong><?php echo $TPL_V2["goodsNm"]?></strong><?php }?>
<?php if(gd_in_array('shortDescription',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["shortDescription"])){?> <br><em><?php echo $TPL_V2["shortDescription"]?></em><?php }?>
                        </a>
                    </div>
                    <div class="price gd-default">
<?php if(gd_in_array('fixedPrice',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["fixedPrice"])&&$TPL_V2["fixedPrice"]> 0&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <span style="<?php if(gd_in_array('fixedPrice',$TPL_VAR["themeInfo"]["priceStrike"])){?>color:#888; text-decoration:line-through;<?php }?>"><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["fixedPrice"])?><?php echo gd_global_currency_string()?> <?php echo gd_global_add_currency_display($TPL_V2["fixedPrice"])?></span><br>
<?php }?>
<?php if(gd_in_array('goodsPrice',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsPrice"])){?>
<?php if($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_price"]=='text'){?>
                        <span class="cost"><strong><?php echo $TPL_VAR["soldoutDisplay"]["soldout_price_text"]?></strong></span><br>
<?php }elseif($TPL_VAR["themeInfo"]["soldOutIconFl"]=='y'&&$TPL_V2["soldOut"]=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_price"]=='custom'){?>
                        <span class="cost"><img src="<?php echo $TPL_VAR["soldoutDisplay"]["soldout_price_img"]?>"></span><br/>
<?php }else{?>
                        <span class="cost">
<?php if($TPL_V2["goodsPriceString"]!=''){?>
                            <strong><?php echo $TPL_V2["goodsPriceString"]?></strong>
<?php }else{?>
<?php if($TPL_V2["timeSaleFl"]&&$TPL_V2["timeSaleGoodsPriceViewFl"]=='y'&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                            <strong><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["oriGoodsPrice"])?></strong><?php echo gd_global_currency_string()?> <?php echo gd_global_add_currency_display($TPL_V2["oriGoodsPrice"])?><br/>
<?php }?>
                            <span <?php if($TPL_V2["timeSaleFl"]){?><?php }else{?>style="<?php if(gd_in_array('goodsPrice',$TPL_VAR["themeInfo"]["priceStrike"])&&((gd_in_array('coupon',$TPL_VAR["themeInfo"]["displayField"])&&$TPL_V2["couponPrice"]!=''&&$TPL_V2["goodsPriceDisplayFl"]=='y')||(gd_in_array('goodsDiscount',$TPL_VAR["themeInfo"]["displayField"])&&$TPL_V2["dcPrice"]> 0))){?>text-decoration:line-through<?php }?>"<?php }?>><strong <?php if($TPL_V2["timeSaleFl"]){?>class='<?php echo $TPL_V2["cssTimeSaleIcon"]?>'<?php }?>>
                            <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["goodsPrice"])?></strong><?php echo gd_global_currency_string()?>

                            <?php echo gd_global_add_currency_display($TPL_V2["goodsPrice"])?></span>
<?php }?>
<?php if($TPL_V2["timeSaleFl"]&&gd_isset($TPL_V2["timeSaleLeftTimeTxt"])){?><strong class='time_sale_text'><?php echo $TPL_V2["timeSaleLeftTimeTxt"]?></strong><?php }?>
                        </span>
                        <br>
<?php }?>
<?php }?>
<?php if(gd_in_array('goodsDiscount',$TPL_VAR["themeInfo"]["displayField"])&&$TPL_V2["dcPrice"]> 0&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <span class="cost">
                            <strong><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["goodsPrice"]-$TPL_V2["dcPrice"])?></strong><?php echo gd_global_currency_string()?> <?php echo gd_global_add_currency_display($TPL_V2["goodsPrice"]-$TPL_V2["dcPrice"])?>

<?php if(gd_in_array('dcRate',$TPL_VAR["themeInfo"]["displayAddField"])&&gd_isset($TPL_V2["goodsDcRate"])){?> <span class="item_number_box">(<?php echo $TPL_V2["goodsDcRate"]?>%)</span><?php }?><br>
                        </span>
<?php }?>
<?php if(gd_in_array('coupon',$TPL_VAR["themeInfo"]["displayField"])&&$TPL_V2["couponPrice"]!=''&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <span class="sale">
                            <strong><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["couponPrice"])?></strong><?php echo gd_global_currency_string()?>

                            <?php echo gd_global_add_currency_display($TPL_V2["couponPrice"])?>

<?php if(gd_in_array('dcRate',$TPL_VAR["themeInfo"]["displayAddField"])&&gd_isset($TPL_V2["couponDcRate"])){?> <span class="item_number_box">(<?php echo $TPL_V2["couponDcRate"]?>%)</span><?php }?>
                            <img src="/data/skin/front/story_g/img/icon/coupon.png" alt="<?php echo __('쿠폰')?>">
                        </span><br>
<?php }?>
<?php if(gd_in_array('goodsDcPrice',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsDcPrice"])&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <span class="mileage"><img src="/data/skin/front/story_g/img/icon/sale.png" alt="<?php echo __('상품할인금액')?>"> <?php echo gd_global_money_format($TPL_V2["goodsDcPrice"])?> <?php echo gd_global_currency_string()?></span><br/><?php }?>
<?php if(gd_in_array('mileage',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["mileageBasic"])&&$TPL_V2["goodsPriceDisplayFl"]=='y'){?>
                        <span class="mileage"><img src="/data/skin/front/story_g/img/icon/mileage.png" alt="<?php echo __('마일리지')?>"> <?php echo $TPL_V2["mileageBasic"]?> <?php echo $TPL_VAR["mileageData"]['unit']?></span><?php }?>
                    </div>
                    <div class="display-field">
<?php if(gd_in_array('goodsModelNo',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsModelNo"])){?>
                        <div class="txt gd-default"><?php echo __('모델번호')?> : <?php echo $TPL_V2["goodsModelNo"]?></div>
<?php }?>
<?php if(gd_in_array('goodsNo',$TPL_VAR["themeInfo"]["displayField"])&&gd_isset($TPL_V2["goodsNo"])){?>
                        <div class="txt gd-default"><?php echo __('상품코드')?> : <?php echo $TPL_V2["goodsNo"]?></div>
<?php }?>
                    </div>
                </div>
            </li>
<?php }}?>
<?php }}?>
        </ul>
<?php }else{?>
        <div class="no-data"><?php echo __('상품이 존재하지 않습니다.')?></div>
<?php }?>
    </div>
</div>