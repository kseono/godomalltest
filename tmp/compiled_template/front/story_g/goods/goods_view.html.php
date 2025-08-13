<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/goods/goods_view.html 000149397 */  $this->include_("includeWidget","includeFile");
if (is_array($TPL_VAR["goodsCategoryList"])) $TPL_goodsCategoryList_1=count($TPL_VAR["goodsCategoryList"]); else if (is_object($TPL_VAR["goodsCategoryList"]) && in_array("Countable", class_implements($TPL_VAR["goodsCategoryList"]))) $TPL_goodsCategoryList_1=$TPL_VAR["goodsCategoryList"]->count();else $TPL_goodsCategoryList_1=0;
if (is_array($TPL_VAR["snsShareButton"])) $TPL_snsShareButton_1=count($TPL_VAR["snsShareButton"]); else if (is_object($TPL_VAR["snsShareButton"]) && in_array("Countable", class_implements($TPL_VAR["snsShareButton"]))) $TPL_snsShareButton_1=$TPL_VAR["snsShareButton"]->count();else $TPL_snsShareButton_1=0;
if (is_array($TPL_VAR["displayField"])) $TPL_displayField_1=count($TPL_VAR["displayField"]); else if (is_object($TPL_VAR["displayField"]) && in_array("Countable", class_implements($TPL_VAR["displayField"]))) $TPL_displayField_1=$TPL_VAR["displayField"]->count();else $TPL_displayField_1=0;?>
<?php $this->print_("header",$TPL_SCP,1);?>

<!-- 2023-06-20 추가 -->
<style>
    /* 배송아이콘 관련 추가 영역 */
    .item_delivery_schedule > div > div{position:relative;}
    .item_delivery_schedule > div > div > span{position:relative; font-weight:bold;}
    .item_delivery_schedule > div > div .day_delivery{padding-left:40px;}
    .item_delivery_schedule > div > div .day_delivery:after{content:''; position:absolute; top:50%; left:0; margin-top:-17px; width:34px; height:34px; background:url('/data/skin/front/story_g/img/icon/icon_day_delivery.png') left center no-repeat;}
    .item_delivery_schedule > div > div .now_buy{padding-left:40px; font-weight:bold;}
    .item_delivery_schedule > div > div .now_buy:after{content:''; position:absolute; top:50%; left:0; margin-top:-17px; width:34px; height:34px; background:url('/data/skin/front/story_g/img/icon/icon_now_buy.png') left center no-repeat;}
    .item_delivery_schedule > div > div .now_buy span{color:#227fff;}
    .question_mark{display:inline-block;width:14px; height:14px; background:url('/data/skin/front/story_g/img/icon/btn_day_delivery.png') left top no-repeat; vertical-align: middle;}
    .question_delivery_schedule{position:relative; display:inline-block;}
    .question_cont{position:absolute; top:8px; right:0; display:block; min-width:191px; box-sizing:border-box; border:#333 1px solid; border-radius:4px; padding:10px; background:#fff; display:none; z-index:1;}
    .question_mark.on + .question_delivery_schedule .question_cont{display:block; z-index: 999;}
    .question_cont p{font-size:11px; color:#333;}
    .question_cont p.tit{font-size:12px;margin-bottom:10px;}
    .question_cont p.infor{color:#888;margin-top:10px;}
    .question_cont .btn_close_question_cont{position:absolute; top:12px; right:11px; width:9px; height:9px; background:url('/data/skin/front/story_g/img/icon/btn_close_question_cont.png') left top no-repeat;}
    /* // 배송아이콘 관련 추가 영역 */
</style>
<script type="text/javascript">
    <!--
    var bdGoodsQaId = '<?php echo $TPL_VAR["bdGoodsQaId"]?>';
    var bdGoodsReviewId = '<?php echo $TPL_VAR["bdGoodsReviewId"]?>';
    var goodsNo = '<?php echo $TPL_VAR["goodsView"]["goodsNo"]?>';

    var goodsViewController = new gd_goods_view();
    var goodsTotalCnt;
    var goodsOptionCnt = [];


    $(document).ready(function(){
        var parameters		= {
            'setControllerName' : goodsViewController,
            'setOptionFl' : '<?php echo $TPL_VAR["goodsView"]['optionFl']?>',
            'setOptionTextFl'	: '<?php echo $TPL_VAR["goodsView"]['optionTextFl']?>',
            'setOptionDisplayFl'	: '<?php echo $TPL_VAR["goodsView"]['optionDisplayFl']?>',
            'setAddGoodsFl'	: '<?php if(is_array($TPL_VAR["goodsView"]['addGoods'])){?>y<?php }else{?>n<?php }?>',
            'setIntDivision'	: '<?php echo INT_DIVISION?>',
            'setStrDivision'	: '<?php echo STR_DIVISION?>',
            'setMileageUseFl'	: '<?php echo $TPL_VAR["mileageData"]['useFl']?>',
            'setCouponUseFl'	: '<?php echo $TPL_VAR["couponUse"]?>',
            'setMinOrderCnt'	: '<?php echo $TPL_VAR["goodsView"]['minOrderCnt']?>',
            'setMaxOrderCnt'	: '<?php echo $TPL_VAR["goodsView"]['maxOrderCnt']?>',
            'setStockFl'	: '<?php echo gd_isset($TPL_VAR["goodsView"]['stockFl'])?>',
            'setSalesUnit' : '<?php echo gd_isset($TPL_VAR["goodsView"]['salesUnit'], 1)?>',
            'setDecimal' : '<?php echo $TPL_VAR["currency"]["decimal"]?>',
            'setGoodsPrice' : '<?php echo gd_isset($TPL_VAR["goodsView"]['goodsPrice'], 0)?>',
            'setGoodsNo' : '<?php echo $TPL_VAR["goodsView"]['goodsNo']?>',
            'setMileageFl' : ' <?php echo $TPL_VAR["goodsView"]['mileageFl']?>',
            'setFixedSales' : '<?php echo $TPL_VAR["goodsView"]['fixedSales']?>',
            'setFixedOrderCnt' : '<?php echo $TPL_VAR["goodsView"]['fixedOrderCnt']?>',
            'setOptionPriceFl' : '<?php echo $TPL_VAR["optionPriceFl"]?>',
            'setStockCnt' : '<?php echo $TPL_VAR["goodsView"]["stockCnt"]?>'
        };

        goodsViewController.init(parameters);

<?php if($TPL_VAR["goodsView"]['qrCodeFl']=='y'&&$TPL_VAR["goodsView"]['qrStyle']=='btn'){?>
        $('#qrCodeDownloadButton').on('click', function(){
            location.href = './goods_qr_code.php?goodsNo=<?php echo $TPL_VAR["goodsView"]['goodsNo']?>&goodsName=<?php echo gd_htmlspecialchars_addslashes($TPL_VAR["goodsView"]['goodsNmDetail'])?>';
        });
<?php }?>

<?php if($TPL_VAR["goodsView"]['optionFl']=='n'&&$TPL_VAR["goodsView"]['orderPossible']=='y'){?>
        goodsViewController.goods_calculate('#frmView',1,0,"<?php echo gd_isset($TPL_VAR["goodsView"]['goodsCnt'],$TPL_VAR["goodsView"]['minOrderCnt'])?>");
<?php }?>


        $('.slider-image-magnify').slick({
            draggable : false,
            vertical : true,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: $('.slider-image-magnify-prev'),
            nextArrow: $('.slider-image-magnify-next'),
        });

        $('.slider-image-thumbnail').slick({
            draggable : false,
            speed: 500,
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: $('.slider-image-thumbnail-prev'),
            nextArrow: $('.slider-image-thumbnail-next'),
        });


        $('.target-delivery-add').on('click', function(){
            if ($(".delivery-add").is(":hidden"))	$(".delivery-add").removeClass('dn');
            else $(".delivery-add").addClass('dn');
        });


        $('.target-delivery-area').on('click', function(){
            if ($(".delivery-area").is(":hidden"))	$(".delivery-area").removeClass('dn');
            else $(".delivery-area").addClass('dn');
        });

        $('button.goods-cnt').on('click', function(e){
            goodsViewController.count_change(this,1);
        });

        $('button.add-goods-cnt').on('click', function(e){
            goodsViewController.count_change(this);
        });


<?php if($TPL_VAR["goodsView"]['benefitPossible']=='y'){?>
        benefit_calculation();
<?php }?>

<?php if($TPL_VAR["couponUse"]=='y'){?>
        bindBtnOpenLayer();
<?php }?>

<?php if($TPL_VAR["goodsView"]['imgDetailViewFl']=='y'){?>
        $("#mainImage img").data("image-zoom",$("#mainImage img").attr('src'));
        $("#mainImage img").elevateZoom();
<?php }?>


        $('.btn-add-order').on('click', function(e){
            goods_order('d');
            return false;
        });

        $('.btn-add-wish').on('click', function(e){
            goods_order('w');
            return false;
        });

        $('.btn-add-cart').on('click', function(e){
            goods_order();
            return false;
        });

        //상품 재입고 알림 팝업 오픈
<?php if($TPL_VAR["goodsView"]['restockUsableFl']==='y'&&!$TPL_VAR["gGlobal"]["isFront"]){?>
        $('.restockSelector').on('click', function(e){
            window.open("./popup_goods_restock.php?goodsNo="+goodsNo, "popupRestock", "top=100, left=200, status=0, width=500px, height=600px");
            return false;
        });
<?php }?>

<?php if($TPL_VAR["goodsReviewAuthList"]=='y'){?>
        loadGoodsBoardList(bdGoodsReviewId,goodsNo);
<?php }?>
<?php if($TPL_VAR["goodsQaAuthList"]=='y'){?>
        loadGoodsBoardList(bdGoodsQaId,goodsNo);
<?php }?>

        // SNS 공유하기
        $('.target-sns-share').on('click', function(){
            if ($(".sns-share-layer").is(":hidden")) {
                // 단축주소 가져오기
                $.ajax({
                    type: 'post',
                    url: './goods_ps.php',
                    async: true,
                    cache: true,
                    data: {
                        mode: 'get_short_url',
                        url: '<?php echo $TPL_VAR["snsShareUrl"]?>'
                    },
                    success: function (data) {
                        var json = $.parseJSON(data);
                        $('.copyurl > input').val(json.url);
                        $('.copyurl > button').attr('data-clipboard-text', json.url);
                    }
                });
                $(".sns-share-layer").removeClass('dn');
            } else {
                $(".sns-share-layer").addClass('dn');
            }
        });


        // qr코드
        $('.target-qrcode').on('click', function(){
            if ($(".js-qrcode-layer").is(":hidden")) {
                $(".js-qrcode-layer").removeClass('dn');
            } else {
                $(".js-qrcode-layer").addClass('dn');
            }
        });

<?php if($TPL_VAR["goodsView"]['timeSaleFl']){?>
        $("#displayTimeSale").hide();
        gd_dailyMissionTimer("<?php echo $TPL_VAR["goodsView"]['timeSaleInfo']['timeSaleDuration']?>");
<?php }?>

        var canGoodsReview = '<?php echo $TPL_VAR["canGoodsReview"]?>';
        var canPlusReview = '<?php echo $TPL_VAR["plusReviewConfig"]["isShowGoodsPage"]?>';
        var canGoodsQa = '<?php echo $TPL_VAR["canGoodsQa"]?>';
        var tabCount = 5;
        if(!canGoodsReview && canPlusReview != 'y') {
            $('.tab a[href=#reviews]').remove();
            $('#reviews').hide();
            tabCount-- ;
        }

        if(!canGoodsQa) {
            $('.tab a[href=#qna]').remove();
            $('#qna').hide();
            tabCount--;
        }
        if(tabCount<5){
            $('.multiple-topics .tab a').css('width',100/tabCount+'%');
        }

        $('.layer-cartaddconfirm').click(function(){
            location.href = '../order/cart.php';
        });

        $('.layer-wishaddconfirm').click(function(){
            location.href = '../mypage/wish_list.php';
        });

        // 배송비 항목을 노출 안함 설정하면 배송비 타입을 생성
        var deliveryCollectFl = "<?php echo $TPL_VAR["goodsView"]['delivery']['basic']['collectFl']?>";
        if ($('#frmView [name="deliveryCollectFl"]').length > 0) {
            // 이미 존재 패스
        } else if (deliveryCollectFl == 'both') {
            // 선택은 패스
        } else {
            $('#frmView').append('<input type="hidden" name="deliveryCollectFl" value="' + deliveryCollectFl + '">');
        }

        //배송 방식에 따른 방문 수령지 노출 여부
        $(".js-deliveryMethodFl").change(function(){
            if($(this).val() === 'visit'){
                $(".js-deliveryMethodVisitArea").removeClass('dn');
            }
            else {
                $(".js-deliveryMethodVisitArea").addClass('dn');
            }
        });

        $('.question_mark').click(function(){
            if(!$(this).hasClass('on')){
                $(this).addClass('on');
            }else{
                $(this).removeClass('on');
            }
        });

        $('.btn_close_question_cont').click(function(){
            if(!$(this).parent().parent().parent().find('.question_mark').hasClass('on')){
                $(this).parent().parent().parent().find('.question_mark').addClass('on');
            }else{
                $(this).parent().parent().parent().find('.question_mark').removeClass('on');
            }
        });

        $('.btn_addgoods_mustinfo_showhide').click(function() {
            if ($('.add_goods_detail_info_box[data-key$="'+$(this).data('key')+'"]').css("display") != "none") {
                $('.add_goods_detail_info_box[data-key$="'+$(this).data('key')+'"]').hide();
                $(this).html("+ <?php echo __('열기')?>");
            } else {
                $('.add_goods_detail_info_box[data-key$="'+$(this).data('key')+'"]').show();
                $(this).html("- <?php echo __('닫기')?>");
            }
        });

        $('.btn_addgoods_mustinfo_showhide_all').click(function() {
            if ($('.btn_addgoods_mustinfo_showhide_all[data-key^="'+$(this).data('key')+'"]').html() != "+ <?php echo __('일괄열기')?>") {
                $('.btn_addgoods_mustinfo_showhide_all[data-key^="'+$(this).data('key')+'"]').html("+ <?php echo __('일괄열기')?>");
                $('.btn_addgoods_mustinfo_showhide[data-key^="'+$(this).data('key')+'"]').html("+ <?php echo __('열기')?>");
                $('.add_goods_detail_info_box[data-key^="'+$(this).data('key')+'"]').hide();
                $('.add-goods-mustinfo-title[data-key^="'+$(this).data('key')+'"]').hide();
            } else {
                $('.btn_addgoods_mustinfo_showhide_all[data-key^="'+$(this).data('key')+'"]').html("- <?php echo __('일괄닫기')?>");
                $('.btn_addgoods_mustinfo_showhide[data-key^="'+$(this).data('key')+'"]').html("- <?php echo __('닫기')?>");
                $('.add_goods_detail_info_box[data-key^="'+$(this).data('key')+'"]').show();
                $('.add-goods-mustinfo-title[data-key^="'+$(this).data('key')+'"]').show();
            }
        });

        <?php echo $TPL_VAR["customReadyScript"]?>

    });

    $(document).on('keydown focusout', 'input[name^=goodsCnt]', function(e){
        $(this).val($(this).val().replace(/[^0-9\-]/g,""));
    });

    /**
     * KC마크 인증정보창
     * @param string url KC인증번호검색 url
     * @return
     */
    function popupKcInfo(url) {
        var win = popup({
            url: url
            , target: 'searchPop'
            , width: 750
            , height: 700
            , resizable: 'no'
            , scrollbars: 'yes'
        });
        win.focus();
        return win;
    }

<?php if($TPL_VAR["couponUse"]=='y'){?>
    // 쿠폰 오픈 레이어에 따른 분기
    function bindBtnOpenLayer() {
        $('.btn-open-layer').bind('click', function(e){
            if($(this).attr('href') == '#couponDownLayer'){
                layerCouponDown();
            } else if($(this).attr('href') == '#couponApplyLayer'){
                layerCouponApply($(this).data('key'));
            }
        });
    }
    function bindBtnCouponCancel() {
        $('.btn-coupon-cancel').bind('click', function(e){
            $('#div-payco').removeClass('dn');
            $('#div-naverpay').removeClass('dn');
            couponCancel($(this).data('key'),'');
        });
    }
    function couponCancel(optionKey,typeCode) {
        $('#option_display_item_'+optionKey+' input:hidden[name="couponApplyNo[]"]').val('');
        $('#option_display_item_'+optionKey+' input:hidden[name="couponSalePriceSum[]"]').val('');
        $('#option_display_item_'+optionKey+' input:hidden[name="couponAddPriceSum[]"]').val('');
        var couponApplyHtml = "<a href=\"#couponApplyLayer\" class=\"btn-open-layer\" data-key=\""+optionKey+"\"><img src=\"/data/skin/front/story_g/img/btn/coupon-apply.png\" alt=\"<?php echo __('쿠폰적용')?>\"/></a>";
        $('#coupon_apply_'+optionKey).html(couponApplyHtml);
        if($('#cart_tab_coupon_apply_'+optionKey).length) $('#cart_tab_coupon_apply_'+optionKey).html(couponApplyHtml);

        bindBtnOpenLayer();
        if (typeCode == 'noCalculation') {
            // 재계산 안함
        } else {
            benefit_calculation();
        }
    }
    function layerCouponDown() {
        $.ajax({
                method: "POST",
                cache: false,
                url: "../goods/layer_coupon_down.php",
                data: {"goodsNo":"<?php echo $TPL_VAR["goodsView"]["goodsNo"]?>","scmNo":"<?php echo $TPL_VAR["goodsView"]["scmNo"]?>", "brandCd":"<?php echo $TPL_VAR["goodsView"]["brandCd"]?>"},
            success: function(data) {
            $('#couponDownLayer').empty().append(data);
            $('#couponDownLayer').find('>div').center();
        },
        error: function (data) {
            alert(data.message);
            closeLayer();
        }
    });
    }
    function layerCouponApply(optionKey) {
        var params = {
            mode: 'coupon_apply',
            goodsNo: <?php echo $TPL_VAR["goodsView"]['goodsNo']?>,
            optionKey: optionKey,
            couponApplyNotNo: $('input:hidden[name="couponApplyNo[]"]').serializeArray(),
            couponApplyNo: $('#option_display_item_'+optionKey+' input:hidden[name="couponApplyNo[]"]').val(),
            goodsCnt: $('#option_display_item_'+optionKey+' input:text[name="goodsCnt[]"]').val(),
            goodsPriceSum: $('#option_display_item_'+optionKey+' input:hidden[name="goodsPriceSum[]"]').val(),
            optionPriceSum: $('#option_display_item_'+optionKey+' input:hidden[name="optionPriceSum[]"]').val(),
            optionTextPriceSum: $('#option_display_item_'+optionKey+' input:hidden[name="optionTextPriceSum[]"]').val(),
            addGoodsPriceSum: $('#option_display_item_'+optionKey+' input:hidden[name="addGoodsPriceSum[]"]').val(),
        };

        $.ajax({
            method: "POST",
            cache: false,
            url: "../goods/layer_coupon_apply.php",
            data: params,
            success: function (data) {
                $('#couponApplyLayer').empty().append(data);
                $('#couponApplyLayer').find('>div').center();
            },
            error: function (data) {
                alert(data.message);
                closeLayer();
            }
        });
    }
<?php }?>

    /**
     * 메인 이미지 변경
     *
     * @param string keyNo 상품 배열 키값
     */
    function change_image(keyNo,type)
    {
        if (typeof keyNo == 'string') {
            var detailKeyID			= new Array();
<?php if((is_array($TPL_R1=gd_isset($TPL_VAR["goodsView"]['image']['detail']['img']))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?>
            detailKeyID[<?php echo $TPL_K1?>]	= "<?php echo gd_htmlspecialchars_slashes($TPL_V1,'add')?>";
<?php }}?>

            var magnifyKeyID			= new Array();
<?php if((is_array($TPL_R1=gd_isset($TPL_VAR["goodsView"]['image']['magnify']['img']))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?>
            magnifyKeyID[<?php echo $TPL_K1?>]	= "<?php echo gd_htmlspecialchars_slashes($TPL_V1,'add')?>";
<?php }}?>

            if(type =='detail')
            {
                $('#mainImage').html(detailKeyID[keyNo]);
            }
            else
            {
                $('#magnifyImage').html(magnifyKeyID[keyNo]);
            }

<?php if($TPL_VAR["goodsView"]['imgDetailViewFl']=='y'){?>
            $("#mainImage img").data("image-zoom",$("#mainImage img").attr('src'));
            $("#mainImage img").elevateZoom();
<?php }?>
        }
    }

    /**
     * 총 합산
     */
    function total_calculate()
    {
        var goodsPrice = parseFloat($('#frmView input[name="set_goods_price"]').val());

        //총합계 계산
        goodsTotalCnt =  0;
        $('#frmView input[name*=\'goodsCnt[]\']').each(function (index) {
            goodsTotalCnt += parseFloat($(this).val());
            goodsOptionCnt[index] = parseFloat($(this).val());
        });
        var goodsTotalPrice = goodsPrice*goodsTotalCnt;


        var setOptionPrice =  0;


        $('#frmView input[name*="optionPriceSum[]"]').each(function () {
            setOptionPrice += parseFloat($(this).val());
        });

        var setOptionTextPrice =  0;
        $('#frmView input[name*="optionTextPriceSum[]"]').each(function () {
            setOptionTextPrice += parseFloat($(this).val());
        });


        var setAddGoodsPrice =  0;
        $('#frmView input[name*="add_goods_total_price["]').each(function () {
            setAddGoodsPrice += parseFloat($(this).val());
        });

        $('#frmView input[name="set_option_price"]').val(setOptionPrice);
        $('#frmView input[name="set_option_text_price"]').val(setOptionTextPrice);
        $('#frmView input[name="set_add_goods_price"]').val(setAddGoodsPrice);


        var totalGoodsPrice = (goodsTotalPrice + setOptionPrice + setOptionTextPrice + setAddGoodsPrice).toFixed(<?php echo $TPL_VAR["currency"]["decimal"]?>);
        $('#frmView input[name="set_total_price"]').val(totalGoodsPrice);
        $(".goods_total_price").html(" <?php echo gd_global_currency_symbol()?> "+gd_money_format(totalGoodsPrice)+"<b><?php echo gd_global_currency_string()?></b>");

<?php if($TPL_VAR["addGlobalCurrency"]){?>
        $(".goods_total_price").append("<p class='add_currency ta-r'><?php echo gd_global_add_currency_symbol()?> "+gd_add_money_format(totalGoodsPrice)+"<?php echo gd_global_add_currency_string()?></p>");
<?php }?>

        benefit_calculation();

    }


    /*
     * 혜택
     */
    function benefit_calculation()
    {
<?php if($TPL_VAR["goodsView"]['goodsPriceDisplayFl']=='n'){?>
        $('button.goods-cnt').attr('disabled', false);
        $('button.add-goods-cnt').attr('disabled', false);
         return false;
<?php }?>

        $('input[name="mode"]').val('get_benefit');
        var parameters = $("#frmView").serialize();

        if($("#frmView input[name*='goodsNo']").length == 0)
        {
            parameters += "&goodsNo%5B%5D=<?php echo $TPL_VAR["goodsView"]['goodsNo']?>&goodsCnt%5B%5D=1";
        }

        $.post('./goods_ps.php', parameters, function (data) {
            var getData = $.parseJSON(data);

            if(getData.totalDcPrice > 0 || getData.totalMileage > 0)
            {
                $(".benefits").removeClass('dn');

                if(getData.totalDcPrice > 0 )
                {
                    $(".benefits p.sale").removeClass('dn');
                    $(".end-price li.discount").removeClass('dn');
                    var tmp = new Array();
                    if(getData.goodsDcPrice)  tmp.push("<?php echo __('상품')?> : " + " <?php echo gd_global_currency_symbol()?>"+gd_money_format(getData.goodsDcPrice)+"<?php echo gd_global_currency_string()?>");
                    if(getData.memberDcPrice)  tmp.push("<?php echo __('회원')?> : " + " <?php echo gd_global_currency_symbol()?>"+ gd_money_format(getData.memberDcPrice)+"<?php echo gd_global_currency_string()?>");
                    if(getData.couponDcPrice)  tmp.push("<?php echo __('쿠폰')?> : " + " <?php echo gd_global_currency_symbol()?>"+ gd_money_format(getData.couponDcPrice)+"<?php echo gd_global_currency_string()?>");

                    $(".benefit_price").html("("+tmp.join()+")");

                    $(".total_benefit_price").html("-<?php echo gd_global_currency_symbol()?>"+gd_money_format(getData.totalDcPrice)+"<b><?php echo gd_global_currency_string()?></b>");

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                    $(".end-price .total_benefit_price").append("<p class='add_currency ta-r'>-<?php echo gd_global_add_currency_symbol()?> "+gd_add_money_format(getData.totalDcPrice)+"<?php echo gd_global_add_currency_string()?></p>");
<?php }?>

                    $("#set_dc_price").val(getData.totalDcPrice);

                } else {
                    $("#set_dc_price").val('0');
                    $(".benefits p.sale").addClass('dn');
                    $(".end-price li.discount").addClass('dn');
                }

                if(getData.totalMileage > 0 )
                {
                    $(".benefits p.mileage").removeClass('dn');
                    var tmp =new Array();
                    if(getData.goodsMileage)  tmp.push("<?php echo __('상품')?> : " + gd_money_format(getData.goodsMileage)+"<?php echo $TPL_VAR["mileageData"]['unit']?>");
                    if(getData.memberMileage)  tmp.push("<?php echo __('회원')?> : " + gd_money_format(getData.memberMileage)+"<?php echo $TPL_VAR["mileageData"]['unit']?>");
                    if(getData.couponMileage)  tmp.push("<?php echo __('쿠폰')?> : " + gd_money_format(getData.couponMileage)+"<?php echo $TPL_VAR["mileageData"]['unit']?>");
                    $(".benefit_mileage").html("("+tmp.join()+")");

                    $(".total_benefit_mileage").html("+"+getData.totalMileage+"<?php echo $TPL_VAR["mileageData"]['unit']?>");
                } else {
                    $(".benefits p.mileage").addClass('dn');
                }

            } else {
                $("#set_dc_price").val('0');

                $(".benefits").addClass('dn');
                $(".end-price li.discount").addClass('dn');
            }

            if($('#frmView input[name="set_total_price"]').val().trim() =='0') {
                $(".total_price").html("<?php echo gd_global_currency_symbol()?>0<b><?php echo gd_global_currency_string()?></b>");
<?php if($TPL_VAR["addGlobalCurrency"]){?>
                $(".total_price").append("<p class='add_currency ta-r'><?php echo gd_global_add_currency_symbol()?> "+0+"<?php echo gd_global_add_currency_string()?></p>");
<?php }?>
                if($("#cart-tab-option").length) $("#cart-tab-option .total_benefit_price").html("<?php echo gd_global_currency_symbol()?>0<b><?php echo gd_global_currency_string()?></b>");

            } else {
                var totalPrice = parseFloat($('#frmView input[name="set_total_price"]').val())-parseFloat(getData.totalDcPrice);
                $(".total_price").html(" <?php echo gd_global_currency_symbol()?> "+gd_money_format(totalPrice)+"<b><?php echo gd_global_currency_string()?></b>");

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                $(".total_price").append("<p class='add_currency ta-r'><?php echo gd_global_add_currency_symbol()?> "+gd_add_money_format(totalPrice)+"<?php echo gd_global_add_currency_string()?></p>");
<?php }?>
            }

            $('button.goods-cnt').attr('disabled', false);
            $('button.add-goods-cnt').attr('disabled', false);
            // 쿠폰 구매금액 제한에 따른 처리
            if (typeof getData.couponAlertKey == 'undefined') {
                // 구매 금액 제한에 걸리지 않음
            } else {
                couponCancel(getData.couponAlertKey,'noCalculation');
                alert("<?php echo __('적용 쿠폰이 구매 금액 제한에 걸려 적용 쿠폰이 취소 되었습니다.')?>");
            }

        });

    }




    /**
     * 바로구매, 장바구니, 상품 보관함
     *
     * @param string modeStr 처리 모드
     */
    var salesUnit = parseInt("<?php echo gd_isset($TPL_VAR["goodsView"]['salesUnit'], 1)?>");
    var minOrderCnt = parseInt("<?php echo gd_isset($TPL_VAR["goodsView"]['minOrderCnt'], 1)?>");
    var maxOrderCnt = parseInt("<?php echo gd_isset($TPL_VAR["goodsView"]['maxOrderCnt'], 0)?>");
    function goods_order(modeStr)
    {
        <?php echo $TPL_VAR["customScript"]?>

        $('#frmView input[name=\'cartMode\']').val(modeStr);

        if (modeStr == 'w') {
<?php if(gd_is_login()===false){?>
            alert("<?php echo __('로그인하셔야 본 서비스를 이용하실 수 있습니다.')?>");
            document.location.href = "../member/login.php";
            return false;
<?php }else{?>

            var goodsNoCnt = $('#frmView input[name*="goodsNo[]"]').length;
            if(goodsNoCnt == 0) {
                $('#frmView input[name="cartMode"]').val('<?php echo $TPL_VAR["goodsView"]["goodsNo"]?>');
            }

            $('#frmView input[name="mode"]').val('wishIn');
            $('#frmView').attr('action','../mypage/wish_list_ps.php');
<?php }?>
        } else {
            $('#frmView input[name="mode"]').val('cartIn');
            $('#frmView').attr('action','../order/cart_ps.php');


<?php if($TPL_VAR["goodsView"]['optionFl']=='y'){?>
            var goodsInfo		= $('#frmView input[name*=\'optionSno[]\']').length;
<?php }else{?>
            var goodsInfo		= $('#frmView input[name="optionSnoInput"]').val();
<?php }?>

            if (goodsInfo == '') {
                alert("<?php echo __('가격 정보가 없거나 옵션이 선택되지 않았습니다!')?>");
                return false;
            }

<?php if(gd_isset($TPL_VAR["goodsView"]['optionTextFl'])=='y'){?>
            if(!goodsViewController.option_text_valid("#frmView"))
            {
                alert("<?php echo __('입력 옵션을 확인해주세요.')?>");
                return false;
            }
<?php if(gd_isset($TPL_VAR["goodsView"]['stockFl'])=='y'){?>
                var checkOptionCnt = goodsViewController.option_text_cnt_valid("#frmView");
                if(checkOptionCnt) {
                    alert(__('재고가 부족합니다. 현재 %s개의 재고가 남아 있습니다.', checkOptionCnt));
                    return false;
                }
<?php }?>
<?php }?>

<?php if($TPL_VAR["goodsView"]['addGoods']){?>
            //추가상품
            if (!goodsViewController.add_goods_valid("#frmView")) {
                alert("<?php echo __('필수 추가 상품을 확인해주세요.')?>");
                return false;
            }
<?php }?>

        }

        var submitFl = true;
        if (isNaN(goodsTotalCnt)) goodsTotalCnt = 1;
        if (_.isEmpty(goodsOptionCnt)) goodsOptionCnt[0] = 1;
<?php if($TPL_VAR["goodsView"]['fixedSales']=='goods'){?>
        var perSalesCnt = goodsTotalCnt % salesUnit;

        if (perSalesCnt !== 0) {
            alert(__('%s개 단위로 묶음 주문 상품입니다.', salesUnit));
            submitFl = false;
        }
<?php }else{?>
        for (i in goodsOptionCnt) {
            if (isNaN(goodsOptionCnt[i])) goodsOptionCnt[i] = 0;
            var perSalesCnt = goodsOptionCnt[i] % salesUnit;

            if (perSalesCnt !== 0) {
                alert(__('%s개 단위로 묶음 주문 상품입니다.', salesUnit));
                submitFl = false;
                break;
            }
        }
<?php }?>

        if (submitFl == true) {
<?php if($TPL_VAR["goodsView"]['fixedOrderCnt']=='goods'){?>
            var fixedAlertString = '상품당';
<?php }?>
<?php if($TPL_VAR["goodsView"]['fixedOrderCnt']=='option'){?>
            var fixedAlertString = '옵션당';
<?php }?>
<?php if($TPL_VAR["goodsView"]['fixedOrderCnt']=='id'){?>
            var fixedAlertString = 'ID당';
<?php }?>

<?php if($TPL_VAR["goodsView"]['fixedOrderCnt']=='goods'||$TPL_VAR["goodsView"]['fixedOrderCnt']=='id'){?>
<?php if($TPL_VAR["goodsView"]['fixedOrderCnt']=='goods'){?>
            if (minOrderCnt > 1 && goodsTotalCnt < minOrderCnt) {
                alert(__('최소 구매 수량 미달 : ' + fixedAlertString + ' 최소 %s개 이상 구매가능합니다.', minOrderCnt));
                submitFl = false;
            } else if (maxOrderCnt > 0 && goodsTotalCnt > maxOrderCnt) {
                alert(__('최대 구매 수량 초과 : ' + fixedAlertString + ' 최대 %s개 이하 구매가능합니다.', maxOrderCnt));
                submitFl = false;
            }
<?php }?>
<?php if($TPL_VAR["goodsView"]['fixedOrderCnt']=='id'){?>
            //ajax로 id구매카운트 체크
            var params = {
                    mode: 'check_memberOrderGoodsCount',
                    goodsNo: <?php echo $TPL_VAR["goodsView"]['goodsNo']?>,
                };
            $.ajax({
                method: "POST",
                async: false,
                cache: false,
                url: '../order/order_ps.php',
                data: params,
                success: function (data) {
                    // error 메시지 예외 처리용
                    if (!_.isUndefined(data.error) && data.error == 1) {
                        alert(data.message);
                        return false;
                    }

                    if (minOrderCnt > 1 && (goodsTotalCnt + data.count) < minOrderCnt) {
                        alert(__('최소 구매 수량 미달 : ' + fixedAlertString + ' 최소 %s개 이상 구매가능합니다.', minOrderCnt));
                        submitFl = false;
                    } else if (minOrderCnt > 1 && goodsTotalCnt < minOrderCnt) {
                        alert(__('최소 구매 수량 미달 : ' + fixedAlertString + ' 최소 %s개 이상 구매가능합니다.', minOrderCnt));
                        submitFl = false;
                    } else if (maxOrderCnt > 0 && (goodsTotalCnt + data.count) > maxOrderCnt) {
                        alert(__('최대 구매 수량 초과 : ' + fixedAlertString + ' 최대 %s개 이하 구매가능합니다.', maxOrderCnt));
                        submitFl = false;
                    } else if (maxOrderCnt > 0 && goodsTotalCnt > maxOrderCnt) {
                        alert(__('최대 구매 수량 초과 : ' + fixedAlertString + ' 최대 %s개 이하 구매가능합니다.', maxOrderCnt));
                        submitFl = false;
                    }
                },
                error: function (data) {
                    alert(data.message);
                    submitFl = false;
                }
            });
<?php }?>
<?php }else{?>
            for (i in goodsOptionCnt) {
                if (isNaN(goodsOptionCnt[i])) goodsOptionCnt[i] = 0;
                var perSalesCnt = goodsOptionCnt[i] % salesUnit;

                if (minOrderCnt > 1 && goodsOptionCnt[i] < minOrderCnt) {
                    alert(__('최소 구매 수량 미달 : ' + fixedAlertString + ' 최소 %s개 이상 구매가능합니다.', minOrderCnt));
                    submitFl = false;
                    break;
                } else if (maxOrderCnt > 0 && goodsOptionCnt[i] > maxOrderCnt) {
                    alert(__('최대 구매 수량 초과 : ' + fixedAlertString + ' 최대 %s개 이하 구매가능합니다.', maxOrderCnt));
                    submitFl = false;
                    break;
                }
            }
<?php }?>
        }
        if ((modeStr == 'd' || modeStr == 'pa') && submitFl === false) {
            return false;
        }

        if(modeStr == 'pa') {
            return true;
        }

        $('#frmView').attr('target','');

        // 쿠폰 사용기간 체크
        if ($('input:hidden[name="couponApplyNo[]"]').val()) {
            var checkCouponType = true;
            var couponApplyNo;
            $.ajax({
                method: "POST",
                cache: false,
                async: false,
                url: "../goods/goods_ps.php",
                data: {mode: 'goodsCheckCouponTypeArr', couponNo : $('input:hidden[name="couponApplyNo[]"]').val() },
                success: function (data) {
                    checkCouponType = data.isSuccess;
                    couponApplyNo = data.setCouponApplyNo.join('<?php echo INT_DIVISION?>');
                },
                error: function (e) {
                }
            });

            if(!checkCouponType) {
                $('input:hidden[name="couponApplyNo[]"]').val(couponApplyNo);
                alert('사용기간이 만료된 쿠폰이 포함되어 있어 제외 후 진행합니다.');
            }
        }

        if (modeStr == 'w' || typeof modeStr == 'undefined') {
            var params = $("#frmView").serialize();

            if (modeStr == 'w') {
                var ajaxUrl = '../mypage/wish_list_ps.php';
                var target = $("#addWishLayer");
            } else {
                var ajaxUrl = '../order/cart_ps.php';
                var target = $("#addCartLayer");
                <?php echo $TPL_VAR["fbCartScript"]?>

                <?php echo $TPL_VAR["customCartEventScript"]?>

            }

            $.ajax({
                method: "POST",
                cache: false,
                url: ajaxUrl,
                data: params,
                success: function (data) {
                    // error 메시지 예외 처리용
                    if (!_.isUndefined(data.error) && data.error == 1) {
                        alert(data.message);
                        return false;
                    }

<?php if($TPL_VAR["cartInfo"]["wishPageMoveDirectFl"]=='y'||($TPL_VAR["cartInfo"]["wishPageMoveDirectFl"]=='n'&&$TPL_VAR["cartInfo"]["moveWishPageDeviceFl"]=='mobile')){?>
                    if (modeStr == 'w') {
                        location.href = "../mypage/wish_list.php";
                        return false;
                    }
<?php }?>
<?php if($TPL_VAR["cartInfo"]["moveCartPageFl"]=='y'||($TPL_VAR["cartInfo"]["moveCartPageFl"]=='n'&&$TPL_VAR["cartInfo"]["moveCartPageDeviceFl"]=='mobile')){?>
                    if (typeof modeStr == 'undefined') {
                        location.href = "../order/cart.php";
                        return false;
                    }
<?php }?>
                    target.removeClass('dn');
                    $('#layerDim').removeClass('dn');
                    target.find('> div').center();
                },
                error: function (data) {
                    alert(data.message);
                }
            });
        } else {
            $('#frmView').submit();
        }
    }

<?php if($TPL_VAR["goodsView"]['optionImagePreviewFl']=='y'){?>

    /**
     * 옵션 선택시 상세 이미지 변경
     *
     * @param integer optionNo 상품 배열 키값 (기본 0)
     */
    function option_image_apply()
    {
<?php if($TPL_VAR["goodsView"]['optionDisplayFl']=='s'){?>
        var optionImgSrc = $('select[name="optionSnoInput"] option:selected').data('img-src');
<?php }elseif($TPL_VAR["goodsView"]['optionDisplayFl']=='d'){?>
        var optionImgSrc = $('select[name="optionNo_0"] option:selected').data('img-src');
<?php }?>

        if(optionImgSrc && optionImgSrc !='blank') $("#mainImage img").attr("src",optionImgSrc);
    }
<?php }?>

<?php if($TPL_VAR["goodsView"]['timeSaleFl']){?>
    /**
     * 시간간격 카운트
     * @returns <?php echo $TPL_VAR["String"]?>

     */
    function gd_dailyMissionTimer(duration) {

        var timer = duration;
        var days,hours, minutes, seconds;

        var interval = setInterval(function(){
            days	= parseInt(timer / 86400, 10);
            hours	= parseInt(((timer % 86400 ) / 3600), 10);
            minutes = parseInt(((timer % 3600 ) / 60), 10);
            seconds = parseInt(timer % 60, 10);

            if(days ==0) {
                $('.time-day-view').hide();
            } else {
                days 	= days < 10 ? "0" + days : days;
                $('#displayTimeSaleDay').text(days);
            }

            hours 	= hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            $('#displayTimeSaleTime').text(hours + ":"+minutes + ":"+seconds);

            $("#displayTimeSale").show();

            if (--timer < 0) {
                timer = 0;
                clearInterval(interval);
            }
        }, 1000);
    }
<?php }?>

    //-->
</script>



<script type="text/html" id="optionTemplate">
    <div id="option_display_item_<%=displayOptionkey%>" style="border-top:1px solid #dbdbdb;">
        <div class="check optionKey_<%=optionSno%>">
            <input type="hidden" name="goodsNo[]" value="<?php echo $TPL_VAR["goodsView"]['goodsNo']?>">
            <input type="hidden" name="optionSno[]" value="<%=optionSno%>">
            <input type="hidden" name="goodsPriceSum[]" value="0">
            <input type="hidden" name="addGoodsPriceSum[]" value="0">
            <input type="hidden" name="displayOptionkey[]" value="<%=displayOptionkey%>">
<?php if($TPL_VAR["couponUse"]=='y'){?>
            <input type="hidden" name="couponApplyNo[]" value="">
            <input type="hidden" name="couponSalePriceSum[]" value="">
            <input type="hidden" name="couponAddPriceSum[]" value="">
<?php }?>
            <span class="name"><strong><%=optionName%><%=optionSellCodeValue%><%=optionDeliveryCodeValue%></strong>
<?php if($TPL_VAR["couponUse"]=='y'&&$TPL_VAR["couponConfig"]['chooseCouponMemberUseType']!='member'){?>
<?php if(gd_is_login()===false){?>
                <button type="button" class="btn-alert-login"><img src="/data/skin/front/story_g/img/btn/coupon-apply.png" alt="<?php echo __('쿠폰적용')?>"/></button>
<?php }else{?>
                <span id="coupon_apply_<%=displayOptionkey%>"><a href="#couponApplyLayer" class="btn-open-layer" data-key="<%=displayOptionkey%>"><img src="/data/skin/front/story_g/img/btn/coupon-apply.png" alt="<?php echo __('쿠폰적용')?>"/></a></span>
<?php }?>
<?php }?>
                <span id="option_text_display_<%=displayOptionkey%>"></span></span>

            <div class="price">
                <span class="count">
                <input type="text" class="text goodsCnt_<%=displayOptionkey%>" title="<?php echo __('수량')?>" name="goodsCnt[]" value="<?php echo gd_isset($TPL_VAR["goodsView"]['defaultGoodsCnt'])?>" data-value="<?php echo gd_isset($TPL_VAR["goodsView"]['defaultGoodsCnt'])?>"  data-stock="<%=optionStock%>"   data-key="<%=displayOptionkey%>" onchange="goodsViewController.input_count_change(this,'1');return false;">
                <span>
                <button type="button" class="up goods-cnt" title="<?php echo __('증가')?>"  value="up<?php echo STR_DIVISION?><%=displayOptionkey%>"><?php echo __('증가')?></button>
                <button type="button" class="down goods-cnt" title="<?php echo __('감소')?>"  value="dn<?php echo STR_DIVISION?><%=displayOptionkey%>"><?php echo __('감소')?></button>
                </span>
                </span>
                <em><input type="hidden" value="<%=optionPrice%>" name="option_price_<%=displayOptionkey%>"><input type="hidden" value="0" name="optionPriceSum[]" ><?php echo gd_global_currency_symbol()?><strong class="option_price_display_<%=displayOptionkey%>"><%=optionPrice%></strong><?php echo gd_global_currency_string()?></em>
            </div>
            <div class="del">
                <button type="button" class="delete-goods" title="<?php echo __('삭제')?>" data-key="option_display_item_<%=displayOptionkey%>" ><?php echo __('삭제')?></button>
            </div>
        </div>
    </div>
</script>

<script type="text/html" id="addGoodsTemplate">
    <div id="add_goods_display_item_<%=displayOptionkey%>_<%=displayAddGoodsKey%>" class="check" >
    <span class="name"><%=addGoodsimge%>
    <input type="hidden" name="addGoodsNo[<%=optionIndex%>][]" value="<%=optionSno%>" data-group="<%=addGoodsGroup%>">
    <%=addGoodsName%>
    </span>
        <div class="price">
    <span class="count">
    <input type="text" class="text addGoodsCnt_<%=displayOptionkey%>_<%=displayAddGoodsKey%>" title="수량" name="addGoodsCnt[<%=optionIndex%>][]" value="1"  data-key="<%=displayOptionkey%><?php echo INT_DIVISION?><%=displayAddGoodsKey%>" data-value="1" data-stock-fl="<%=addGoodsStockFl%>"  data-stock="<%=addGoodsStock%>" onchange="goodsViewController.input_count_change(this);return false;">
    <span>
    <button type="button" class="up add-goods-cnt" title="<?php echo __('증가')?>"  value="up<?php echo STR_DIVISION?><%=displayOptionkey%><?php echo INT_DIVISION?><%=displayAddGoodsKey%>"><?php echo __('증가')?></button>
    <button type="button" class="down add-goods-cnt" title="<?php echo __('감소')?>"   value="dn<?php echo STR_DIVISION?><%=displayOptionkey%><?php echo INT_DIVISION?><%=displayAddGoodsKey%>"><?php echo __('감소')?></button>
    </span>
    </span>
            <em><input type="hidden" value="<%=addGoodsPrice%>" name="add_goods_price_<%=displayOptionkey%>_<%=displayAddGoodsKey%>"><input type="hidden" name="add_goods_total_price[<%=optionIndex%>][]" value="" ><?php echo gd_global_currency_symbol()?><strong class="add_goods_price_display_<%=displayOptionkey%>_<%=displayAddGoodsKey%>"></strong><?php echo gd_global_currency_string()?></em>
        </div>
        <div class="del">
            <button type="button" class="delete-add-goods" title="<?php echo __('삭제')?>" data-key="<%=displayOptionkey%>-<%=displayAddGoodsKey%>"><?php echo __('삭제')?></button>
        </div>
    </div>
</script>



<div class="goods-view">
    <div class="location">
        <h3 class="dn"><?php echo __('현재 위치')?></h3>
        <span><?php echo __('홈')?></span>
<?php if($TPL_goodsCategoryList_1){foreach($TPL_VAR["goodsCategoryList"] as $TPL_V1){?>
<?php if($TPL_V1["cateNm"]){?>
        <div class="navi">
            <div class="this">
                <a href="#"><?php echo $TPL_V1["cateNm"]?></a>
                <div>
<?php if((is_array($TPL_R2=$TPL_V1["data"])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_K2=>$TPL_V2){?>
                    <a href="./goods_list.php?cateCd=<?php echo $TPL_K2?>"><?php echo $TPL_V2?></a>
<?php }}?>
                </div>
            </div>
        </div>
<?php }?>
<?php }}?>
    </div>


    <div class="goods">

        <div class="image">
            <div class="thumbnail">
                <a href="#zoom-layer"  <?php if(gd_isset($TPL_VAR["goodsView"]['magnifyImage'])=='y'){?>class="zoom-layer-open btn-open-layer"<?php }?>  id="mainImage" ><?php echo $TPL_VAR["goodsView"]['image']['detail']['img'][ 0]?></a>
            </div>
<?php if(gd_in_array('goodsColor',$TPL_VAR["displayAddField"])){?>
            <?php echo $TPL_VAR["goodsView"]['goodsColor']?>

<?php }?>
            <div class="zoom">
                <a href="#zoom-layer" class="zoom-layer-open btn-open-layer"><?php echo __('확대보기')?></a>
            </div>
            <div class="more-thumbnail">
                <div class="slide">
                    <div class="slider-wrap cycle slider-image-thumbnail">
<?php if((is_array($TPL_R1=gd_isset($TPL_VAR["goodsView"]['image']['detail']['thumb']))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?>
                        <span class="swiper-slide"> <a href="javascript:change_image('<?php echo $TPL_K1?>','detail');"><?php echo $TPL_V1?></a></span>
<?php }}?>

                    </div>
                </div>
                <div class="prev slider-image-thumbnail-prev" title="<?php echo __('이전 상품 이미지')?>"></div>
                <div class="next slider-image-thumbnail-next" title="<?php echo __('다음 상품 이미지')?>"></div>
            </div>
        </div>


        <form name=frmView id='frmView' method=post>
            <input type="hidden" name="mode" value="cartIn" />
            <input type="hidden" name="scmNo" value="<?php echo $TPL_VAR["goodsView"]['scmNo']?>" />
            <input type="hidden" name="cartMode" value="" />
            <input type="hidden" name="set_goods_price"   value="<?php echo gd_global_money_format(gd_isset($TPL_VAR["goodsView"]['goodsPrice'], 0),false)?>" />
            <input type="hidden" name="set_goods_fixedPrice"  id="set_goods_fixedPrice" value="<?php echo gd_isset($TPL_VAR["goodsView"]['fixedPrice'], 0)?>" />
            <input type="hidden" name="set_goods_mileage" value="<?php echo gd_isset($TPL_VAR["goodsView"]['goodsMileageBasic'], 0)?>" />
            <input type="hidden" name="set_goods_stock" value="<?php echo gd_isset($TPL_VAR["goodsView"]['stockCnt'], 0)?>" />
            <input type="hidden" name="set_coupon_dc_price" value="<?php echo gd_isset($TPL_VAR["goodsView"]['goodsPrice'], 0)?>" />

            <input type="hidden" name="set_goods_total_price" id="set_goods_total_price" value="0" />
            <input type="hidden" name="set_option_price"  id="set_option_price" value="0" />
            <input type="hidden" name="set_option_text_price" id="set_option_text_price" value="0" />
            <input type="hidden" name="set_add_goods_price"  id="set_add_goods_price" value="0" />
            <input type="hidden" name="set_total_price" value="<?php echo gd_global_money_format(gd_isset($TPL_VAR["goodsView"]['goodsPrice'], 0),false)?>" />


            <input type="hidden" name="mileageFl" value="<?php echo $TPL_VAR["goodsView"]['mileageFl']?>" />
            <input type="hidden" name="mileageGoods" value="<?php echo $TPL_VAR["goodsView"]['mileageGoods']?>" />
            <input type="hidden" name="mileageGoodsUnit" value="<?php echo $TPL_VAR["goodsView"]['mileageGoodsUnit']?>" />
            <input type="hidden" name="goodsDiscountFl" value="<?php echo $TPL_VAR["goodsView"]['goodsDiscountFl']?>" />
            <input type="hidden" name="goodsDiscount" value="<?php echo $TPL_VAR["goodsView"]['goodsDiscount']?>" />
            <input type="hidden" name="goodsDiscountUnit" value="<?php echo $TPL_VAR["goodsView"]['goodsDiscountUnit']?>" />

            <input type="hidden" name="taxFreeFl" value="<?php echo $TPL_VAR["goodsView"]['taxFreeFl']?>" />
            <input type="hidden" name="taxPercent" value="<?php echo $TPL_VAR["goodsView"]['taxPercent']?>" />

            <input type="hidden" name="scmNo" value="<?php echo $TPL_VAR["goodsView"]['scmNo']?>" />
            <input type="hidden" name="brandCd" value="<?php echo $TPL_VAR["goodsView"]['brandCd']?>" />
            <input type="hidden" name="cateCd" value="<?php echo $TPL_VAR["goodsView"]['cateCd']?>" />


            <input type="hidden" id="set_dc_price" value="0" />

<?php if($TPL_VAR["goodsView"]['timeSaleFl']){?>
<?php if($TPL_VAR["goodsView"]['timeSaleInfo']['mileageFl']=='n'){?>
            <input type="hidden" name="goodsMileageExcept" value="y" />
<?php }?>
<?php if($TPL_VAR["goodsView"]['timeSaleInfo']['memberDcFl']=='n'){?>
            <input type="hidden" name="memberBenefitExcept" value="y" />
<?php }?>
<?php if($TPL_VAR["goodsView"]['timeSaleInfo']['couponFl']=='n'){?>
            <input type="hidden" name="couponBenefitExcept" value="y" />
<?php }?>
<?php }?>

            <input type="hidden" id="goodsOptionCnt" value="1" />
            <input type="hidden" name="optionFl" value="<?php echo $TPL_VAR["goodsView"]['optionFl']?>" />
            <input type="hidden" name="useBundleGoods" value="1" />
            <input type="hidden" name="goodsDeliveryFl" value="<?php echo $TPL_VAR["goodsView"]['delivery']['basic']['goodsDeliveryFl']?>" />
            <input type="hidden" name="sameGoodsDeliveryFl" value="<?php echo $TPL_VAR["goodsView"]['delivery']['basic']['sameGoodsDeliveryFl']?>" />
            <input type="hidden" name="acePid" value="" />
            <input type="hidden" name="event_id" value="<?php echo $TPL_VAR["fbEventId"]?>" />
            <div class="info">

<?php if($TPL_VAR["goodsView"]['timeSaleFl']){?>
                <div class="time-sale-view" id="displayTimeSale" style="display:none">
                    <div class="down">
                        <strong><?php echo $TPL_VAR["goodsView"]['timeSaleInfo']['benefit']?></strong><span>%</span>
                    </div>
                    <div class="time">
                        <strong class="number time-day-view" id="displayTimeSaleDay"></strong>
                        <strong class="txt time-day-view"><?php echo __('일')?></strong>
                        <strong class="number" id="displayTimeSaleTime"></strong>
                    </div>
<?php if($TPL_VAR["goodsView"]['timeSaleInfo']['orderCntDisplayFl']=='y'){?>
                    <div class="sale-cnt">
                        <strong><?php echo __('현재')?> <span><?php echo number_format($TPL_VAR["goodsView"]['timeSaleInfo']['orderCnt'])?></span><?php echo __('개 구매')?></strong>
                    </div>
<?php }?>
                </div>
<?php }?>

                <div class="goods-header">
                    <div class="top">
                        <div class="tit">
<?php if(gd_in_array('goodsIcon',$TPL_VAR["displayAddField"])&&$TPL_VAR["goodsView"]['goodsIcon']){?>
                            <div class="prd_icon"><?php echo $TPL_VAR["goodsView"]['goodsIcon']?></div>
<?php }?>
                            <h2> <?php if($TPL_VAR["goodsView"]['timeSaleFl']&&$TPL_VAR["goodsView"]['timeSaleInfo']['goodsNmDescription']){?>[<?php echo $TPL_VAR["goodsView"]['timeSaleInfo']['goodsNmDescription']?>]<?php }?><?php echo gd_isset($TPL_VAR["goodsView"]['goodsNmDetail'])?></h2>
                        </div>

                    </div>

<?php if($TPL_VAR["goodsView"]['qrCodeFl']=='y'){?>
                    <div class="qrcode">
                        <a class="normal-btn small1 target-qrcode"><em><?php echo __('QR코드')?><img class="arrow" src="/data/skin/front/story_g/img/etc/bl_arrow.png" alt="" /></em></a>
                        <div class="js-qrcode-layer dn">
                            <div class="wrap">
                                <strong><?php echo __('QR 코드')?></strong>
                                <div class="qrcode-image">
                                    <img id="qrCodeImage" src="<?php echo $TPL_VAR["goodsView"]['qrCodeImage']?>" alt="" />
<?php if($TPL_VAR["goodsView"]['qrStyle']=='btn'){?>
                                    <a href="#" class="normal-btn small1 save" id="qrCodeDownloadButton"><em><?php echo __('QR코드 저장하기')?></em></a>
<?php }?>
                                </div>
                                <div class="qrcode-info">
                                    <strong><?php echo __('QR코드 인식방법')?></strong>
                                    <ol>
                                        <li>01 <?php echo __('QR코드 앱 다운로드')?></li>
                                        <li>02 <?php echo __('스마트폰으로 QR코드 인식')?></li>
                                        <li>03 <?php echo __('쇼핑몰 상품페이지로 이동')?></li>
                                    </ol>
                                    <strong><?php echo __('QR코드란?')?></strong>
                                    <p><?php echo __('QR코드(QR code)는 흑백격자무늬 패턴으로 %s정보를 나타내는 매트릭스 형식의 바코드입니다.','<br />')?></p>
                                </div>
                                <button type="button" class="close target-qrcode" title="<?php echo __('닫기')?>"><?php echo __('닫기')?></button>
                            </div>
                        </div>
                    </div>
<?php }?>

<?php if($TPL_VAR["snsShareUseFl"]){?>
                    <div class="sns">
                        <a class="normal-btn small1 target-sns-share"><em><?php echo __('공유')?><img class="arrow" src="/data/skin/front/story_g/img/etc/bl_arrow.png" alt="" /></em></a>
                        <div class="sns-share-layer dn">
                            <div class="wrap">
                                <strong>SNS <?php echo __('공유하기')?></strong>
                                <div>
                                    <ul>
<?php if($TPL_snsShareButton_1){foreach($TPL_VAR["snsShareButton"] as $TPL_V1){?>
                                        <?php echo $TPL_V1?>

<?php }}?>
                                    </ul>
<?php if($TPL_VAR["snsShareUrl"]){?>
                                    <div class="copyurl">
                                        <input type="text" value="<?php echo $TPL_VAR["snsShareUrl"]?>" class="text field-b" style="width:196px;margin-right:8px;margin-left:0;">
                                        <button type="button" class="gd_clipboard skinbtn point2" data-clipboard-text="<?php echo $TPL_VAR["snsShareUrl"]?>" title="<?php echo __('상품주소')?>"><em class="h28"><?php echo __('URL복사')?></em></button>
                                    </div>
<?php }?>
                                </div>
                                <button type="button" class="close target-sns-share" title="<?php echo __('닫기')?>"><?php echo __('닫기')?></button>
                            </div>
                        </div>
                    </div>
<?php }?>
                </div>

                <div class="item">


                    <ul>
<?php if($TPL_displayField_1){foreach($TPL_VAR["displayField"] as $TPL_V1){?>
<?php switch($TPL_V1){case 'fixedPrice':?>
<?php if(gd_isset($TPL_VAR["goodsView"]['fixedPrice'])> 0&&$TPL_VAR["goodsView"]['goodsPriceDisplayFl']=='y'){?>
                        <li >
                            <strong><?php echo __('정가')?></strong>
                            <div>
                                <?php echo $TPL_VAR["fixedPriceTag"]?><span><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['fixedPrice'])?></span><?php echo gd_global_currency_string()?> <?php echo gd_global_add_currency_display($TPL_VAR["goodsView"]['fixedPrice'])?><?php echo $TPL_VAR["fixedPriceTag2"]?>

                            </div>
                        </li>
<?php }?>
<?php break;case 'couponPrice':?>
<?php if(gd_isset($TPL_VAR["goodsView"]['couponPrice'])> 0&&$TPL_VAR["couponUse"]=='y'&&$TPL_VAR["goodsView"]['goodsPriceDisplayFl']=='y'){?>
                        <li class="price">
                            <strong><?php echo __('쿠폰적용가')?></strong>
                            <div>
                                <span><strong><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['couponPrice'])?></strong></span><b><?php echo gd_global_currency_string()?></b>
                                <b>(-<?php echo gd_global_money_format($TPL_VAR["goodsView"]['couponSalePrice'])?><?php echo gd_global_currency_string()?><?php if(gd_in_array('dcRate',$TPL_VAR["displayAddField"])&&gd_isset($TPL_VAR["goodsView"]['couponDcRate'])){?>, <?php echo $TPL_VAR["goodsView"]['couponDcRate']?>%<?php }?>)</b>
                            </div>
                        </li>
<?php }?>
<?php break;case 'myCouponPrice':?>
<?php if(gd_isset($TPL_VAR["goodsView"]['myCouponSalePrice'])> 0&&$TPL_VAR["couponUse"]=='y'&&$TPL_VAR["goodsView"]['goodsPriceDisplayFl']=='y'){?>
                        <li class="price">
                            <strong><?php echo __('내 쿠폰적용가')?></strong>
                            <div>
                                <span><strong><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['myCouponSalePrice'])?></strong></span><b><?php echo gd_global_currency_string()?></b>
                                <b>(-<?php echo gd_global_money_format($TPL_VAR["goodsView"]['myCouponPrice'])?><?php echo gd_global_currency_string()?><?php if(gd_in_array('dcRate',$TPL_VAR["displayAddField"])&&gd_isset($TPL_VAR["goodsView"]['myCouponDcRate'])){?>, <?php echo $TPL_VAR["goodsView"]['myCouponDcRate']?>%<?php }?>)</b>
                            </div>
                        </li>
<?php }?>
<?php break;case 'goodsPrice':?>
                        <li class="price <?php if($TPL_VAR["goodsView"]['timeSaleFl']){?>time-sale<?php }?>">
                            <strong> <?php if($TPL_VAR["goodsView"]['timeSaleFl']){?><?php echo __('타임세일가')?><?php }else{?><?php echo __('판매가')?><?php }?></strong>
                            <div>
<?php if($TPL_VAR["goodsView"]['soldOut']=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_price"]=='text'){?>
                                <strong><?php echo $TPL_VAR["soldoutDisplay"]["soldout_price_text"]?></strong>
<?php }elseif($TPL_VAR["goodsView"]['soldOut']=='y'&&$TPL_VAR["soldoutDisplay"]["soldout_price"]=='custom'){?>
                                <img src="<?php echo $TPL_VAR["soldoutDisplay"]["soldout_price_img"]?>">
<?php }else{?>

<?php if($TPL_VAR["goodsView"]['goodsPriceString']!=''){?>
                                <strong><?php echo $TPL_VAR["goodsView"]['goodsPriceString']?></strong>
<?php }else{?>
<?php if($TPL_VAR["goodsView"]['timeSaleFl']&&$TPL_VAR["goodsView"]['timeSaleInfo']['goodsPriceViewFl']=='y'&&$TPL_VAR["goodsView"]['oriGoodsPrice']> 0){?>
                                <del style="padding-right:10px;"> <span><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['oriGoodsPrice'])?><?php echo gd_global_currency_string()?></span></del>
<?php }?>
                                <?php echo $TPL_VAR["goodsPriceTag"]?><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['goodsPrice'])?><?php echo $TPL_VAR["goodsPriceTag2"]?><span><?php echo gd_global_currency_string()?></span>
                                <!-- 글로벌 참조 화폐 임시 적용 -->
<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                <em class="add_currency"><?php echo $TPL_VAR["goodsPriceTag"]?><?php echo gd_global_add_currency_display($TPL_VAR["goodsView"]['goodsPrice'])?><?php echo $TPL_VAR["goodsPriceTag2"]?></em>
<?php }?>
<?php }?>
<?php }?>

                            </div>
                        </li>
<?php break;case 'goodsDiscount':?>
<?php if($TPL_VAR["goodsView"]['dcPrice']> 0){?>
                        <li class="price">
                            <strong><?php echo __('할인적용가')?></strong>
                            <div>
                                <b><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['goodsPrice']-$TPL_VAR["goodsView"]['dcPrice'])?></b><span><?php echo gd_global_currency_string()?></span>
<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                <em class="add_currency"><?php echo gd_global_add_currency_display($TPL_VAR["goodsView"]['goodsPrice']-$TPL_VAR["goodsView"]['dcPrice'])?></em>
<?php }?>
<?php if(gd_in_array('dcRate',$TPL_VAR["displayAddField"])&&gd_isset($TPL_VAR["goodsView"]['goodsDcRate'])){?> <b>(<?php echo $TPL_VAR["goodsView"]['goodsDcRate']?>%)</b><?php }?>
                            </div>
                        </li>
<?php }?>
<?php break;case 'maxOrderCnt':?>
<?php if(!($TPL_VAR["goodsView"]['minOrderCnt']==='1'&&$TPL_VAR["goodsView"]['maxOrderCnt']==='0')){?>
                        <li>
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div>
                                <span>
<?php if($TPL_VAR["goodsView"]['fixedOrderCnt']=='option'){?>옵션당
<?php }elseif($TPL_VAR["goodsView"]['fixedOrderCnt']=='goods'){?>상품당
<?php }elseif($TPL_VAR["goodsView"]['fixedOrderCnt']=='id'){?>ID당
<?php }?>
<?php if($TPL_VAR["goodsView"]['minOrderCnt']){?><?php echo __('최소 %s개',$TPL_VAR["goodsView"]['minOrderCnt'])?><?php }?>
<?php if($TPL_VAR["goodsView"]['maxOrderCnt']){?> / <?php echo __('최대 %s개',$TPL_VAR["goodsView"]['maxOrderCnt'])?><?php }?>
                                </span>
                            </div>
                        </li>
<?php }?>
<?php break;case 'benefit':?>
                        <li class="benefits dn" >
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div>
                                <p class="sale"><?php echo __('할인')?> : <strong class="total_benefit_price"></strong> <span class="benefit_price"></span></p>
                                <p class="mileage"><?php echo __('적립')?> <?php echo gd_display_mileage_name()?> : <strong class="total_benefit_mileage"></strong> <span class="benefit_mileage"></span></p>
                            </div>
                        </li>
<?php break;case 'couponDownload':?>
<?php if(empty($TPL_VAR["couponArrData"])===false){?>
                        <li class="coupon">
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
<?php if(gd_is_login()===false){?>
                            <div>
                                <button id="lnCouponDown" class="normal-btn small1 btn-alert-login"><em><?php echo __('쿠폰 다운받기')?><img class="down" src="/data/skin/front/story_g/img/etc/down.png" alt="" /></em></button>
                            </div>
<?php }else{?>
                            <div>
                                <a class="normal-btn small1 btn-open-layer" href="#couponDownLayer"><em><?php echo __('쿠폰 다운받기')?><img class="down" src="/data/skin/front/story_g/img/etc/down.png" alt="" /></em></a>
                            </div>
<?php }?>
                        </li>
<?php }?>
<?php break;case 'delivery':?>
<?php if(!$TPL_VAR["gGlobal"]["isFront"]){?>
                        <li class="delivery">
                            <strong><?php echo __('배송비')?></strong>
                            <div>
<?php if($TPL_VAR["goodsView"]['multipleDeliveryFl']===true){?>
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='fixed'){?>
                                <span><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['delivery']['firstCharge']['0']['price'])?><?php echo gd_global_currency_string()?></span>
<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                <span><?php echo gd_global_add_currency_display($TPL_VAR["goodsView"]['delivery']['firstCharge']['0']['price'])?></span>
<?php }?>
<?php }else{?>
                                <span><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['delivery']['firstCharge'][$TPL_VAR["goodsView"]['selectedDeliveryPrice']]['price'])?><?php echo gd_global_currency_string()?></span>
<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                <span><?php echo gd_global_add_currency_display($TPL_VAR["goodsView"]['delivery']['firstCharge'][$TPL_VAR["goodsView"]['selectedDeliveryPrice']]['price'])?></span>
<?php }?>
<?php }?>
                                <a class="normal-btn small1 target-delivery-add"><em><?php echo __('조건별배송')?><img class="arrow" src="/data/skin/front/story_g/img/etc/bl_arrow.png" alt="" /></em></a>
                                <div class="ly_dev_wrap delivery-layer dn delivery-add">
                                    <div class="wrap">
                                        <strong><?php echo $TPL_VAR["goodsView"]['delivery']['basic']['fixFlText']?></strong>
                                        <div>
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])!='fixed'){?>
                                            <span class="ly_btn <?php if(gd_count($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])== 2){?>two<?php }else{?>three<?php }?>">
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {$TPL_I2=-1;foreach($TPL_R2 as $TPL_K2=>$TPL_V2){$TPL_I2++;?>
<?php if(gd_count($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])== 2&&$TPL_I2% 2== 0){?><span class="row"><?php }else{?><?php if($TPL_I2% 3== 0){?><span class="row"><?php }?><?php }?>
                                                <a class="delivery-method" onclick="selectDeliveryMethod(this, '<?php echo $TPL_K2?>')"><?php echo $TPL_V2?></a>
<?php if(gd_count($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])== 2&&$TPL_I2% 2== 1){?></span><?php }else{?><?php if($TPL_I2% 3== 2){?></span><?php }else{?><?php if(gd_count($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])-$TPL_I2< 3&&((gd_count($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])% 3== 1&&$TPL_I2% 3== 0)||(gd_count($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])% 3== 2&&$TPL_I2% 3== 1))){?></span><?php }?><?php }?><?php }?>
<?php }}?>
                                            </span>
                                            <script type="text/javascript">
                                                function selectDeliveryMethod(e, method) {
                                                    $(e).parents(".ly_btn").find("a").removeClass("on");
                                                    $(e).addClass("on");
                                                    $('.delivery-method-tr').hide();
                                                    $('.delivery-method-tr').filter('[data-method="' + method + '"]').show();
                                                }
                                                $(function(){
                                                    $('.delivery-method').eq(0).trigger('click');
                                                })
                                            </script>
<?php }?>
                                            <table cellspacing="0" border="1">
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='fixed'){?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['multiCharge'][ 0])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_K2=>$TPL_V2){?>
<?php if(gd_isset($TPL_V2["sno"])){?>
                                                <tr>
                                                    <th><?php echo $TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'][$TPL_K2]?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }?>
<?php }}?>
<?php }else{?>
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['rangeRepeat'])!='y'){?>
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['multiCharge'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
<?php if((is_array($TPL_R3=$TPL_V2)&&!empty($TPL_R3)) || (is_object($TPL_R3) && in_array("Countable", class_implements($TPL_R3)) && $TPL_R3->count() > 0)) {foreach($TPL_R3 as $TPL_K3=>$TPL_V3){?>
<?php if(gd_isset($TPL_V3["sno"])){?>
<?php if($TPL_V3["unitEnd"]> 0){?>
                                                <tr class="delivery-method-tr" data-method="<?php echo $TPL_K3?>">
                                                    <th scope="row"><?php echo gd_global_money_format($TPL_V3["unitStart"])?><?php echo $TPL_V3["unitText"]?> <?php echo __('이상')?> ~ <?php echo gd_global_money_format($TPL_V3["unitEnd"])?><?php echo $TPL_V3["unitText"]?> <?php echo __('미만')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V3["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V3["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }else{?>
                                                <tr class="delivery-method-tr" data-method="<?php echo $TPL_K3?>">
                                                    <th scope="row"><?php echo gd_global_money_format($TPL_V3["unitStart"])?><?php echo $TPL_V3["unitText"]?> <?php echo __('이상')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V3["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V3["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }?>
<?php }?>
<?php }}?>
<?php }}?>
<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['multiCharge'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
<?php if((is_array($TPL_R3=$TPL_V2)&&!empty($TPL_R3)) || (is_object($TPL_R3) && in_array("Countable", class_implements($TPL_R3)) && $TPL_R3->count() > 0)) {foreach($TPL_R3 as $TPL_K3=>$TPL_V3){?>
<?php if(gd_isset($TPL_V3["sno"])){?>
<?php if($TPL_V3["unitEnd"]> 0){?>
                                                <tr class="delivery-method-tr" data-method="<?php echo $TPL_K3?>">
                                                    <th scope="row"><?php echo number_format($TPL_V3["unitStart"])?><?php echo $TPL_V3["unitText"]?> <?php echo __('이상')?> ~ <?php echo number_format($TPL_V3["unitEnd"])?><?php echo $TPL_V3["unitText"]?> <?php echo __('미만')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V3["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V3["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }else{?>
                                                <tr class="delivery-method-tr" data-method="<?php echo $TPL_K3?>">
                                                    <th scope="row"><?php echo number_format($TPL_V3["unitStart"])?><?php echo $TPL_V3["unitText"]?> <?php echo __('이상')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V3["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V3["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }?>
<?php }?>
<?php }}?>
<?php }}?>
<?php }else{?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['multiCharge'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
<?php if((is_array($TPL_R3=$TPL_V2)&&!empty($TPL_R3)) || (is_object($TPL_R3) && in_array("Countable", class_implements($TPL_R3)) && $TPL_R3->count() > 0)) {foreach($TPL_R3 as $TPL_K3=>$TPL_V3){?>
<?php if(gd_isset($TPL_V3["sno"])){?>
<?php if($TPL_V3["unitEnd"]> 0){?>
                                                <tr class="delivery-method-tr" data-method="<?php echo $TPL_K3?>">
                                                    <th scope="row"><?php echo number_format($TPL_V3["unitStart"], 2)?><?php echo $TPL_V3["unitText"]?> <?php echo __('이상')?> ~ <?php echo number_format($TPL_V3["unitEnd"], 2)?><?php echo $TPL_V3["unitText"]?> <?php echo __('미만')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V3["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V3["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }else{?>
                                                <tr class="delivery-method-tr" data-method="<?php echo $TPL_K3?>">
                                                    <th scope="row"><?php echo number_format($TPL_V3["unitStart"], 2)?><?php echo $TPL_V3["unitText"]?> <?php echo __('이상')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V3["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V3["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }?>
<?php }?>
<?php }}?>
<?php }}?>
<?php }?>
<?php }else{?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['multiCharge'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {$TPL_I2=-1;foreach($TPL_R2 as $TPL_V2){$TPL_I2++;?>
<?php if((is_array($TPL_R3=$TPL_V2)&&!empty($TPL_R3)) || (is_object($TPL_R3) && in_array("Countable", class_implements($TPL_R3)) && $TPL_R3->count() > 0)) {foreach($TPL_R3 as $TPL_K3=>$TPL_V3){?>
<?php if(gd_isset($TPL_V3["sno"])){?>
<?php if($TPL_I2== 0){?>
                                                <tr class="delivery-method-tr" data-method="<?php echo $TPL_K3?>">
                                                    <th scope="row">
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
                                                        <?php echo gd_global_money_format($TPL_V3["unitStart"])?>

<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
                                                        <?php echo number_format($TPL_V3["unitStart"])?>

<?php }else{?>
                                                        <?php echo number_format($TPL_V3["unitStart"], 2)?>

<?php }?>
                                                        <?php echo $TPL_V3["unitText"]?> <?php echo __('이상')?> ~
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
                                                        <?php echo gd_global_money_format($TPL_V3["unitEnd"])?>

<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
                                                        <?php echo number_format($TPL_V3["unitEnd"])?>

<?php }else{?>
                                                        <?php echo number_format($TPL_V3["unitEnd"], 2)?>

<?php }?>
                                                        <?php echo $TPL_V3["unitText"]?> <?php echo __('미만')?>

                                                    </th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V3["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V3["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }else{?>
                                                <tr class="delivery-method-tr" data-method="<?php echo $TPL_K3?>">
                                                    <th scope="row">
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
                                                        <?php echo gd_global_money_format($TPL_V3["unitStart"])?>

<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
                                                        <?php echo number_format($TPL_V3["unitStart"])?>

<?php }else{?>
                                                        <?php echo number_format($TPL_V3["unitStart"], 2)?>

<?php }?>
                                                        <?php echo $TPL_V3["unitText"]?> <?php echo __('이상')?>

<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
                                                        <?php echo gd_global_money_format($TPL_V3["unitEnd"])?>

<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
                                                        <?php echo number_format($TPL_V3["unitEnd"])?>

<?php }else{?>
                                                        <?php echo number_format($TPL_V3["unitEnd"], 2)?>

<?php }?>
                                                        <?php echo $TPL_V3["unitText"]?> <?php echo __('마다 추가')?>

                                                    </th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V3["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V3["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }?>
<?php }?>
<?php }}?>
<?php }}?>
<?php }?>
<?php }?>
                                            </table>
<?php if($TPL_VAR["goodsView"]["delivery"]["basic"]["fixFl"]=='price'){?>
                                            <p class="caution-msg1">
                                                <?php echo __('배송비 계산 기준 : 판매가')?>

<?php if(gd_in_array('option',$TPL_VAR["goodsView"]["delivery"]["basic"]["pricePlusStandard"])){?>
                                                + <?php echo __('옵션가')?>

<?php }?>
<?php if(gd_in_array('add',$TPL_VAR["goodsView"]["delivery"]["basic"]["pricePlusStandard"])){?>
                                                + <?php echo __('추가상품가')?>

<?php }?>
<?php if(gd_in_array('text',$TPL_VAR["goodsView"]["delivery"]["basic"]["pricePlusStandard"])){?>
                                                + <?php echo __('텍스트옵션가')?>

<?php }?>
<?php if(gd_in_array('goods',$TPL_VAR["goodsView"]["delivery"]["basic"]["priceMinusStandard"])){?>
                                                - <?php echo __('상품할인가')?>

<?php }?>
<?php if(gd_in_array('coupon',$TPL_VAR["goodsView"]["delivery"]["basic"]["priceMinusStandard"])){?>
                                                - <?php echo __('상품쿠폰할인가')?>

<?php }?>
                                            </p>
<?php }?>
                                        </div>
                                        <button type="button" class="close target-delivery-add" title="<?php echo __('닫기')?>"><?php echo __('닫기')?></button>
                                    </div>
                                </div>
<?php }else{?>
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='free'){?>
                                <span><?php echo __('무료')?></span>
<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='fixed'){?>
                                <span><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['delivery']['charge']['0']['price'])?><?php echo gd_global_currency_string()?></span>
<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                <span><?php echo gd_global_add_currency_display($TPL_VAR["goodsView"]['delivery']['charge']['0']['price'])?></span>
<?php }?>
<?php }else{?>
                                <span><?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_VAR["goodsView"]['delivery']['charge'][$TPL_VAR["goodsView"]['selectedDeliveryPrice']]['price'])?><?php echo gd_global_currency_string()?></span>
<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                <span><?php echo gd_global_add_currency_display($TPL_VAR["goodsView"]['delivery']['charge'][$TPL_VAR["goodsView"]['selectedDeliveryPrice']]['price'])?></span>
<?php }?>
                                <a class="normal-btn small1 target-delivery-add"><em><?php echo __('조건별배송')?><img class="arrow" src="/data/skin/front/story_g/img/etc/bl_arrow.png" alt="" /></em></a>
                                <div class="delivery-layer dn delivery-add">
                                    <div class="wrap">
                                        <strong><?php echo $TPL_VAR["goodsView"]['delivery']['basic']['fixFlText']?></strong>
                                        <div>
                                            <table cellspacing="0" border="1">
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['rangeRepeat'])!='y'){?>
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['charge'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
<?php if($TPL_V2["unitEnd"]> 0){?>
                                                <tr>
                                                    <th scope="row"><?php echo gd_global_money_format($TPL_V2["unitStart"])?><?php echo $TPL_V2["unitText"]?> <?php echo __('이상')?> ~ <?php echo gd_global_money_format($TPL_V2["unitEnd"])?><?php echo $TPL_V2["unitText"]?> <?php echo __('미만')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }else{?>
                                                <tr>
                                                    <th scope="row"><?php echo gd_global_money_format($TPL_V2["unitStart"])?><?php echo $TPL_V2["unitText"]?> <?php echo __('이상')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }?>
<?php }}?>
<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['charge'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
<?php if($TPL_V2["unitEnd"]> 0){?>
                                                <tr>
                                                    <th scope="row"><?php echo number_format($TPL_V2["unitStart"])?><?php echo $TPL_V2["unitText"]?> <?php echo __('이상')?> ~ <?php echo number_format($TPL_V2["unitEnd"])?><?php echo $TPL_V2["unitText"]?> <?php echo __('미만')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }else{?>
                                                <tr>
                                                    <th scope="row"><?php echo number_format($TPL_V2["unitStart"])?><?php echo $TPL_V2["unitText"]?> <?php echo __('이상')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }?>
<?php }}?>
<?php }else{?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['charge'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
<?php if($TPL_V2["unitEnd"]> 0){?>
                                                <tr>
                                                    <th scope="row"><?php echo number_format($TPL_V2["unitStart"], 2)?><?php echo $TPL_V2["unitText"]?> <?php echo __('이상')?> ~ <?php echo number_format($TPL_V2["unitEnd"], 2)?><?php echo $TPL_V2["unitText"]?> <?php echo __('미만')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }else{?>
                                                <tr>
                                                    <th scope="row"><?php echo number_format($TPL_V2["unitStart"], 2)?><?php echo $TPL_V2["unitText"]?> <?php echo __('이상')?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }?>
<?php }}?>
<?php }?>
<?php }else{?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['charge'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {$TPL_I2=-1;foreach($TPL_R2 as $TPL_V2){$TPL_I2++;?>
<?php if($TPL_I2== 0){?>
                                                <tr>
                                                    <th scope="row">
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
                                                        <?php echo gd_global_money_format($TPL_V2["unitStart"])?>

<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
                                                        <?php echo number_format($TPL_V2["unitStart"])?>

<?php }else{?>
                                                        <?php echo number_format($TPL_V2["unitStart"], 2)?>

<?php }?>
                                                        <?php echo $TPL_V2["unitText"]?> <?php echo __('이상')?> ~
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
                                                        <?php echo gd_global_money_format($TPL_V2["unitEnd"])?>

<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
                                                        <?php echo number_format($TPL_V2["unitEnd"])?>

<?php }else{?>
                                                        <?php echo number_format($TPL_V2["unitEnd"], 2)?>

<?php }?>
                                                        <?php echo $TPL_V2["unitText"]?> <?php echo __('미만')?>

                                                    </th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }else{?>
                                                <tr>
                                                    <th scope="row">
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
                                                        <?php echo gd_global_money_format($TPL_V2["unitStart"])?>

<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
                                                        <?php echo number_format($TPL_V2["unitStart"])?>

<?php }else{?>
                                                        <?php echo number_format($TPL_V2["unitStart"], 2)?>

<?php }?>
                                                        <?php echo $TPL_V2["unitText"]?> <?php echo __('이상')?>

<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='price'){?>
                                                        <?php echo gd_global_money_format($TPL_V2["unitEnd"])?>

<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])=='count'){?>
                                                        <?php echo number_format($TPL_V2["unitEnd"])?>

<?php }else{?>
                                                        <?php echo number_format($TPL_V2["unitEnd"], 2)?>

<?php }?>
                                                        <?php echo $TPL_V2["unitText"]?> <?php echo __('마다 추가')?>

                                                    </th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["price"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["price"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }?>
<?php }}?>
<?php }?>
                                            </table>
<?php if($TPL_VAR["goodsView"]["delivery"]["basic"]["fixFl"]=='price'){?>
                                            <p class="caution-msg1">
                                                <?php echo __('배송비 계산 기준 : 판매가')?>

<?php if(gd_in_array('option',$TPL_VAR["goodsView"]["delivery"]["basic"]["pricePlusStandard"])){?>
                                                + <?php echo __('옵션가')?>

<?php }?>
<?php if(gd_in_array('add',$TPL_VAR["goodsView"]["delivery"]["basic"]["pricePlusStandard"])){?>
                                                + <?php echo __('추가상품가')?>

<?php }?>
<?php if(gd_in_array('text',$TPL_VAR["goodsView"]["delivery"]["basic"]["pricePlusStandard"])){?>
                                                + <?php echo __('텍스트옵션가')?>

<?php }?>
<?php if(gd_in_array('goods',$TPL_VAR["goodsView"]["delivery"]["basic"]["priceMinusStandard"])){?>
                                                - <?php echo __('상품할인가')?>

<?php }?>
<?php if(gd_in_array('coupon',$TPL_VAR["goodsView"]["delivery"]["basic"]["priceMinusStandard"])){?>
                                                - <?php echo __('상품쿠폰할인가')?>

<?php }?>
                                            </p>
<?php }?>
                                        </div>
                                        <button type="button" class="close target-delivery-add" title="<?php echo __('닫기')?>"><?php echo __('닫기')?></button>
                                    </div>
                                </div>
<?php }?>
<?php }?>
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['areaFl'])=='y'){?>
                                <a class="normal-btn small1 target-delivery-area" ><em><?php echo __('지역별추가배송비')?><img class="arrow" src="/data/skin/front/story_g/img/etc/bl_arrow.png" alt="" /></em></a>
                                <div class="delivery-layer dn delivery-area">
                                    <div class="wrap">
                                        <strong><?php echo __('지역별배송비')?></strong>
                                        <div>
                                            <table cellspacing="0" border="1">
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['areaDetail'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
                                                <tr>
                                                    <th scope="row"><?php echo $TPL_V2["addArea"]?></th>
                                                    <td>
                                                        <?php echo gd_global_currency_symbol()?><?php echo gd_global_money_format($TPL_V2["addPrice"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_VAR["addGlobalCurrency"]){?>
                                                        <span><?php echo gd_global_add_currency_display($TPL_V2["addPrice"])?></span>
<?php }?>
                                                    </td>
                                                </tr>
<?php }}?>
                                            </table>
                                        </div>
                                        <button type="button" class="close target-delivery-area" title="<?php echo __('닫기')?>"><?php echo __('닫기')?></button>
                                    </div>
                                </div>
<?php }?>

                                <div class="detail">
<?php if(gd_count($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])> 0){?>
<?php if(gd_count($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])== 1){?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_K2=>$TPL_V2){?>
                                    <input type="hidden" name="deliveryMethodFl" value="<?php echo $TPL_K2?>" />
                                    <?php echo $TPL_V2?>

<?php }}?>
<?php }else{?>
                                    <select class="tune js-deliveryMethodFl" name="deliveryMethodFl" style="min-width: 100px; width: auto; max-width: 480px;">
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_K2=>$TPL_V2){?>
                                        <option value="<?php echo $TPL_K2?>"><?php echo $TPL_V2?></option>
<?php }}?>
                                    </select>
<?php }?>
<?php }?>

<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['fixFl'])!='free'){?>
                                    &nbsp;/&nbsp;
<?php if(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['collectFl'])=='pre'){?>
                                    <span><input type="hidden" name="deliveryCollectFl" value="pre" /></span>
                                    <?php echo __('주문시결제')?>(<?php echo __('선결제')?>)
<?php }elseif(gd_isset($TPL_VAR["goodsView"]['delivery']['basic']['collectFl'])=='later'){?>
                                    <span><input type="hidden" name="deliveryCollectFl" value="later" /></span>
                                    <?php echo __('상품수령시결제')?>(<?php echo __('착불')?>)
<?php }else{?>
                                    <span class="st-hs">
                                        <select class="tune" name="deliveryCollectFl" style="width:155px">
                                            <option value="pre"><?php echo __('주문시결제')?>(<?php echo __('선결제')?>)</option>
                                            <option value="later"><?php echo __('상품수령시결제')?>(<?php echo __('착불')?>)</option>
                                        </select>
                                        </span>
<?php }?>
<?php }?>

<?php if($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodVisitArea']&&$TPL_VAR["goodsView"]['delivery']['basic']['dmVisitTypeDisplayFl']!='y'){?>
                                    <div class="js-deliveryMethodVisitArea <?php if(gd_count($TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData'])!= 1||!$TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodFlData']['visit']){?>dn<?php }?>">
                                        <?php echo __('방문 수령지')?> : <?php echo $TPL_VAR["goodsView"]['delivery']['basic']['deliveryMethodVisitArea']?>

                                    </div>
<?php }?>
                                </div>
                            </div>
                        </li>
<?php }?>
<?php break;case 'deliverySchedule':?>
<?php if($TPL_VAR["goodsView"]['deliveryScheduleFl']=='y'){?>
                        <li class="item_delivery_schedule">
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div>
<?php if($TPL_VAR["goodsView"]['deliveryScheduleType']=='time'){?>
                                <div>
                                    <span <?php if($TPL_VAR["goodsView"]['deliveryScheduleGuideText']=='당일발송'){?>class="day_delivery"<?php }?>><?php echo $TPL_VAR["goodsView"]['deliveryScheduleGuideText']?></span>
                                    <a href="#" class="question_mark"></a>
                                    <div class="question_delivery_schedule">
                                        <div class="question_cont">
                                            <p class="tit">당일발송 안내</p>
                                            <p><?php echo $TPL_VAR["goodsView"]['deliveryScheduleTime']?> 이전 주문 시 당일 발송</p>
                                            <p><?php echo $TPL_VAR["goodsView"]['deliveryScheduleTime']?> 이후 주문 시 익일 발송</p>
                                            <p class="infor">※ 주말, 휴일이 포함된 경우<br />익일(영업일 기준) 발송됩니다.</p>
                                            <a href="javascript:;" class="btn_close_question_cont"></a>
                                        </div>
                                    </div>
                                </div>
<?php }else{?>
                                <div>
                                    <span class="now_buy">지금 주문 시 <span class="date"><?php echo $TPL_VAR["goodsView"]['deliveryScheduleDate']?></span> 발송 예정</span>
                                </div>
<?php }?>
                            </div>
                        </li>
<?php }?>
<?php break;case 'goodsWeight':?>
<?php if(gd_isset($TPL_VAR["goodsView"]['goodsWeight'])> 0&&gd_isset($TPL_VAR["goodsView"]['goodsVolume'])> 0){?>
                        <li>
                            <strong style="width: 90px;"><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div><span><?php echo $TPL_VAR["goodsView"]['goodsWeight']?><?php echo $TPL_VAR["weight"]["unit"]?> / <?php echo $TPL_VAR["goodsView"]['goodsVolume']?><?php echo gd_isset($TPL_VAR["volume"]["unit"],'㎖')?></span></div>
                        </li>
<?php }else{?>
<?php if(gd_isset($TPL_VAR["goodsView"]['goodsWeight'])> 0){?>
                        <li>
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div><span><?php echo $TPL_VAR["goodsView"]['goodsWeight']?><?php echo $TPL_VAR["weight"]["unit"]?></span></div>
                        </li>
<?php }?>
<?php if(gd_isset($TPL_VAR["goodsView"]['goodsVolume'])> 0){?>
                        <li>
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div><span><?php echo $TPL_VAR["goodsView"]['goodsVolume']?><?php echo gd_isset($TPL_VAR["volume"]["unit"],'㎖')?></span></div>
                        </li>
<?php }?>
<?php }?>
<?php break;case 'addInfo':?>
<?php if(empty($TPL_VAR["goodsView"]['addInfo'])===false){?>
                        <!-- 추가항목 -->
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['addInfo'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
                        <li>
                            <strong><?php echo $TPL_V2["infoTitle"]?></strong>
                            <div><span><?php echo $TPL_V2["infoValue"]?></span></div>
                        </li>
<?php }}?>
                        <!-- // 추가항목 -->
<?php }?>
<?php break;case 'effectiveStartYmd':?>
<?php if(($TPL_VAR["goodsView"]['effectiveStartYmd']!='0000-00-00 00:00:00'&&$TPL_VAR["goodsView"]['effectiveStartYmd'])||($TPL_VAR["goodsView"]['effectiveEndYmd']!='0000-00-00 00:00:00'&&$TPL_VAR["goodsView"]['effectiveEndYmd'])){?>
                        <li>
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div><span>
<?php if($TPL_VAR["goodsView"]['effectiveStartYmd']!='0000-00-00 00:00:00'&&$TPL_VAR["goodsView"]['effectiveStartYmd']){?>
                                <?php echo gd_date_format(__('Y년 m월 d일'),$TPL_VAR["goodsView"]['effectiveStartYmd'])?>

<?php }?>

<?php if($TPL_VAR["goodsView"]['effectiveEndYmd']!='0000-00-00 00:00:00'&&$TPL_VAR["goodsView"]['effectiveEndYmd']){?>
                                ~ <?php echo gd_date_format(__('Y년 m월 d일'),$TPL_VAR["goodsView"]['effectiveEndYmd'])?>

<?php }?>

                            </span></div>
                        </li>
<?php }?>
<?php break;case 'salesStartYmd':?>
<?php if(($TPL_VAR["goodsView"]['salesStartYmd']!='0000-00-00 00:00:00'&&$TPL_VAR["goodsView"]['salesStartYmd'])||($TPL_VAR["goodsView"]['salesEndYmd']!='0000-00-00 00:00:00'&&$TPL_VAR["goodsView"]['salesEndYmd'])){?>
                        <li>
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div><span>
<?php if($TPL_VAR["goodsView"]['salesStartYmd']!='0000-00-00 00:00:00'&&$TPL_VAR["goodsView"]['salesStartYmd']){?>
                                <?php echo gd_date_format(__('Y년 m월 d일'),$TPL_VAR["goodsView"]['salesStartYmd'])?>

<?php }?>

<?php if($TPL_VAR["goodsView"]['salesEndYmd']!='0000-00-00 00:00:00'&&$TPL_VAR["goodsView"]['salesEndYmd']){?>
                                ~ <?php echo gd_date_format(__('Y년 m월 d일'),$TPL_VAR["goodsView"]['salesEndYmd'])?>

<?php }?>

                            </span></div>
                        </li>
<?php }?>
<?php break;case 'salesUnit':?>
<?php if(gd_isset($TPL_VAR["goodsView"]['salesUnit'])> 1){?>
                        <li>
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div><span> <?php echo __('%s개',number_format($TPL_VAR["goodsView"]['salesUnit']))?></span></div>
                        </li>
<?php }?>
<?php break;case 'totalStock':?>
<?php if($TPL_VAR["goodsView"]['stockFl']=='y'){?>
                        <li>
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div><span> <?php echo __('%s개',number_format($TPL_VAR["goodsView"]['totalStock']))?></span></div>
                        </li>
<?php }?>
<?php break;default:?>
<?php if(gd_isset($TPL_VAR["goodsView"][$TPL_V1])){?>
                        <li >
                            <strong><?php echo __($TPL_VAR["displayDefaultField"][$TPL_V1])?></strong>
                            <div><?php echo $TPL_VAR["goodsView"][$TPL_V1]?></div>
                        </li>
<?php }?>
<?php }?>

<?php }}?>

<?php if($TPL_VAR["naverPay"]){?>
                        <li id="naver-mileage-accum" style="display: none;">
                            <strong><?php echo __('네이버')?>&nbsp;&nbsp;<br/><?php echo __('마일리지')?> :</strong>
                            <div>
                                <span id="naver-mileage-accum-rate"></span> <?php echo __('적립')?>

                            </div>
                        </li>
<?php }?>
                    </ul>
                    <?php echo $TPL_VAR["myappGoodsBenefitMessage"]?>

                </div>

                <!-- 옵션 있을때시작 -->
<?php if($TPL_VAR["goodsView"]['optionFl']=='y'){?>

<?php if($TPL_VAR["goodsView"]['optionDisplayFl']=='s'){?>
                <div class="choice">
                    <div class="list">
                        <strong><?php if($TPL_VAR["goodsView"]['optionEachCntFl']=='one'&&empty($TPL_VAR["goodsView"]['optionName'])===false){?><?php echo $TPL_VAR["goodsView"]['optionName']?><?php }else{?><?php echo __('옵션 선택')?><?php }?>  </strong>
                        <div>



                            <select name="optionSnoInput" class="tune" style="width:477px; " <?php if($TPL_VAR["goodsView"]['orderPossible']=='y'){?>onchange="<?php if($TPL_VAR["goodsView"]['optionImagePreviewFl']=='y'){?>option_image_apply();<?php }?>goodsViewController.option_price_display(this);"<?php }else{?>disabled="disabled"<?php }?>>
                            <option value="">=
<?php if($TPL_VAR["goodsView"]['optionEachCntFl']=='many'&&empty($TPL_VAR["goodsView"]['optionName'])===false){?><?php echo $TPL_VAR["goodsView"]['optionName']?>

<?php }else{?><?php echo __('옵션')?>

<?php }?> : <?php echo __('가격')?>

<?php if(gd_in_array('optionStock',$TPL_VAR["displayAddField"])){?>: <?php echo __('재고')?><?php }?>
                                =
                            </option>
<?php if((is_array($TPL_R1=$TPL_VAR["goodsView"]['option'])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
<?php if($TPL_V1["optionViewFl"]=='y'){?>
                            <option <?php if($TPL_VAR["goodsView"]['optionIcon']['goodsImage']){?><?php if($TPL_V1["optionImage"]){?>data-img-src="<?php echo $TPL_V1["optionImage"]?>"  <?php }else{?>data-img-src="blank"<?php }?> <?php }?> value="<?php echo $TPL_V1["sno"]?><?php echo INT_DIVISION?><?php echo gd_global_money_format($TPL_V1["optionPrice"],false)?><?php echo INT_DIVISION?><?php echo $TPL_V1["mileage"]?><?php echo INT_DIVISION?><?php echo $TPL_V1["stockCnt"]?><?php echo STR_DIVISION?><?php echo $TPL_V1["optionValue"]?><?php if(($TPL_VAR["goodsView"]['stockFl']=='y'&&$TPL_V1["optionSellFl"]=='t')){?><?php echo STR_DIVISION?><?php echo $TPL_VAR["optionSoldOutCode"][$TPL_V1["optionSellCode"]]?><?php }?><?php if($TPL_V1["optionDeliveryFl"]=='t'&&$TPL_VAR["optionDeliveryDelayCode"][$TPL_V1["optionDeliveryCode"]]!=''){?><?php echo STR_DIVISION?><?php echo $TPL_VAR["optionDeliveryDelayCode"][$TPL_V1["optionDeliveryCode"]]?><?php }?>"<?php if(($TPL_VAR["goodsView"]['stockFl']=='y'&&$TPL_VAR["goodsView"]['stockCnt']<$TPL_VAR["goodsView"]['minOrderCnt'])||($TPL_VAR["goodsView"]['stockFl']=='y'&&$TPL_VAR["goodsView"]['fixedOrderCnt']=='option'&&$TPL_V1["stockCnt"]<$TPL_VAR["goodsView"]['minOrderCnt'])||($TPL_VAR["goodsView"]['stockFl']=='y'&&$TPL_V1["stockCnt"]=='0')||$TPL_V1["optionSellFl"]=='n'||$TPL_V1["optionSellFl"]=='t'){?>disabled="disabled"
<?php }?>> <?php echo $TPL_V1["optionValue"]?>

<?php if(gd_isset($TPL_V1["optionPrice"])!='0'){?>  : <?php echo gd_global_currency_symbol()?><?php if(gd_isset($TPL_V1["optionPrice"])> 0){?>+<?php }?><?php echo gd_global_money_format($TPL_V1["optionPrice"])?><?php echo gd_global_currency_string()?> <?php }?>
<?php if(($TPL_V1["optionSellFl"]=='t')){?>[<?php echo $TPL_VAR["optionSoldOutCode"][$TPL_V1["optionSellCode"]]?>]
<?php }elseif(($TPL_VAR["goodsView"]['stockFl']=='y'&&$TPL_V1["stockCnt"]=='0')||$TPL_V1["optionSellFl"]=='n'){?>[<?php echo $TPL_VAR["optionSoldOutCode"]['n']?>]
<?php }else{?><?php if(gd_in_array('optionStock',$TPL_VAR["displayAddField"])&&$TPL_VAR["goodsView"]['stockFl']=='y'){?> : <?php echo number_format($TPL_V1["stockCnt"])?><?php echo __('개')?>

<?php }?><?php }?>
<?php if($TPL_V1["optionDeliveryFl"]=='t'&&$TPL_VAR["optionDeliveryDelayCode"][$TPL_V1["optionDeliveryCode"]]!=''){?>[<?php echo $TPL_VAR["optionDeliveryDelayCode"][$TPL_V1["optionDeliveryCode"]]?>]
<?php }?>
                            </option>
<?php }?>
<?php }}?>
                            </select>
                        </div>
                    </div>
                </div>

<?php }elseif($TPL_VAR["goodsView"]['optionDisplayFl']=='d'){?>

<?php if((is_array($TPL_R1=$TPL_VAR["goodsView"]['optionName'])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {$TPL_S1=gd_count($TPL_R1);$TPL_I1=-1;foreach($TPL_R1 as $TPL_V1){$TPL_I1++;?>
<?php if($TPL_I1== 0){?>
                <input type="hidden" name="optionSnoInput" value="" />
                <input type="hidden" name="optionCntInput" value="<?php echo $TPL_S1?>" />
<?php }?>
                <div class="choice">
                    <div class="list">
                        <strong><?php echo $TPL_V1?></strong>
                        <div>
                            <select name="optionNo_<?php echo $TPL_I1?>" class="tune" style="width:477px;"  <?php if($TPL_VAR["goodsView"]['orderPossible']=='y'){?>onchange="<?php if($TPL_I1== 0&&$TPL_VAR["goodsView"]['optionImagePreviewFl']=='y'){?> option_image_apply();<?php }?>goodsViewController.option_select(this,'<?php echo $TPL_I1?>', '<?php echo gd_isset($TPL_VAR["goodsView"]['optionName'][($TPL_I1+ 1)])?>','<?php if(gd_in_array('optionStock',$TPL_VAR["displayAddField"])){?>y<?php }else{?>n<?php }?>');"<?php }?>
<?php if($TPL_I1> 0||$TPL_VAR["goodsView"]['orderPossible']!='y'){?> disabled="disabled"
<?php }?>>
                            <option value="">=
<?php if($TPL_I1== 0){?><?php echo $TPL_V1?> <?php echo __('선택')?>

<?php }else{?><?php echo __('%s을 먼저 선택해 주세요',$TPL_VAR["goodsView"]['optionName'][($TPL_I1- 1)])?>

<?php }?> =
                            </option>
<?php if($TPL_I1== 0){?>
<?php if((is_array($TPL_R2=$TPL_VAR["goodsView"]['optionDivision'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_K2=>$TPL_V2){?>
                            <option  <?php if($TPL_VAR["goodsView"]['optionIcon']['goodsImage']){?><?php if($TPL_VAR["goodsView"]['optionIcon']['goodsImage'][$TPL_V2]){?> data-img-src="<?php echo $TPL_VAR["goodsView"]['optionIcon']['goodsImage'][$TPL_V2]?>" <?php }else{?>data-img-src="blank" <?php }?><?php }?> value="<?php echo $TPL_V2?>" <?php if(($TPL_VAR["goodsView"]['stockFl']=='y'&&$TPL_VAR["goodsView"]['stockCnt']<$TPL_VAR["goodsView"]['minOrderCnt'])||($TPL_VAR["goodsView"]['stockFl']=='y'&&$TPL_VAR["goodsView"]['fixedOrderCnt']=='option'&&isset($TPL_VAR["goodsView"]['optionDivisionStock'])&&isset($TPL_VAR["goodsView"]['optionDivisionStock'][$TPL_K2]['stockCnt'])&&$TPL_VAR["goodsView"]['optionDivisionStock'][$TPL_K2]['stockCnt']<$TPL_VAR["goodsView"]['minOrderCnt'])||($TPL_VAR["goodsView"]['stockFl']=='y'&&$TPL_VAR["goodsView"]['optionDivisionStock'][$TPL_K2]['stockCnt']=='0')||$TPL_VAR["goodsView"]['optionDivisionStock'][$TPL_K2]['optionSellFl']=='n'||$TPL_VAR["goodsView"]['optionDivisionStock'][$TPL_K2]['optionSellFl']=='t'){?> disabled="disabled"<?php }?>>
                            <?php echo $TPL_V2?>

<?php if(($TPL_VAR["goodsView"]['optionDivisionStock'][$TPL_K2]['optionSellFl']=='t')){?>[<?php echo $TPL_VAR["optionSoldOutCode"][$TPL_VAR["goodsView"]['optionDivisionStock'][$TPL_K2]['optionSellCode']]?>]
<?php }elseif(($TPL_VAR["goodsView"]['stockFl']=='y'&&$TPL_VAR["goodsView"]['optionDivisionStock'][$TPL_K2]['stockCnt']=='0')||$TPL_VAR["goodsView"]['optionDivisionStock'][$TPL_K2]['optionSellFl']=='n'){?>[<?php echo $TPL_VAR["optionSoldOutCode"]['n']?>]
<?php }?>
                            </option>
<?php }}?>
<?php }?>
                            </select></div>
                    </div>
                </div>
                <div id="iconImage_<?php echo $TPL_I1?>" class="option_icon"></div>
<?php }}?>
<?php }?>

<?php }?>
                <!--  옵션 끝 -->


<?php if($TPL_VAR["goodsView"]['optionTextFl']=='y'){?>

                <!-- 추가 옵션 입력형 시작-->
<?php if((is_array($TPL_R1=$TPL_VAR["goodsView"]['optionText'])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {$TPL_S1=gd_count($TPL_R1);$TPL_I1=-1;foreach($TPL_R1 as $TPL_V1){$TPL_I1++;?>
                <div class="choice">
                    <div class="list">
<?php if($TPL_I1== 0){?>
                        <input type="hidden" id="optionTextCnt" value="<?php echo $TPL_S1?>" />
<?php }?>
                        <strong><span class="optionTextNm_<?php echo $TPL_I1?>"><?php echo $TPL_V1["optionName"]?><?php if($TPL_V1["mustFl"]=='y'){?><em>(<?php echo __('필수')?>)</em><?php }?></span> <input type="hidden" name="optionTextMust_<?php echo $TPL_I1?>" value="<?php echo $TPL_V1["mustFl"]?>" /> <input type="hidden" name="optionTextLimit_<?php echo $TPL_I1?>" value="<?php echo $TPL_V1["inputLimit"]?>" /></strong>

                        <div class="option_input">
                    <span class="txt-field<?php if($TPL_VAR["goodsView"]['orderPossible']!='y'){?> disabled<?php }?>">
                    <input type="hidden" name="optionTextSno_<?php echo $TPL_I1?>" value="<?php echo $TPL_V1["sno"]?>"/>
                    <input type="text" name="optionTextInput_<?php echo $TPL_I1?>" value="" size="30" class="text" onkeydown="goodsViewController.enterKey(this)" onkeyup="goodsViewController.max_length_alert(this)" onchange="goodsViewController.option_text_select(this)" placeholder="<?php echo $TPL_V1["inputLimit"]?><?php echo __('글자를 입력하세요.')?>" maxlength="<?php echo $TPL_V1["inputLimit"]+ 1?>"<?php if($TPL_VAR["goodsView"]['orderPossible']!='y'){?> disabled="disabled"<?php }?>
/>
                    <input type="hidden" value="<?php echo $TPL_V1["addPrice"]?>"/>
                    </span>
<?php if($TPL_V1["addPrice"]!= 0){?>
                            <span class="msg">※ <?php echo __('작성시 %s%s%s 추가',gd_global_currency_symbol(),gd_global_money_format($TPL_V1["addPrice"]),gd_global_currency_string())?></span>
<?php }?>
                        </div>
                    </div>
                </div>
<?php }}?>

<?php }?>
                <!-- 추가 옵션 입력형 종료 -->


<?php if($TPL_VAR["goodsView"]['addGoods']){?>
<?php if((is_array($TPL_R1=$TPL_VAR["goodsView"]['addGoods'])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?>
                <div class="choice <?php if($TPL_K1=='0'){?>add  <?php }?>">
                    <div class="list">
                        <strong><?php echo $TPL_V1["title"]?>  <?php if($TPL_V1["mustFl"]=='y'){?><em>(<?php echo __('필수')?>)</em><input type="hidden" name="addGoodsInputMustFl[]" value="<?php echo $TPL_K1?>"><?php }?></strong>
                        <div>
                            <select name="addGoodsInput<?php echo $TPL_K1?>"   data-key="<?php echo $TPL_K1?>" class="tune" style="width:477px;" onchange="goodsViewController.add_goods_select(this)"<?php if($TPL_VAR["goodsView"]['orderPossible']!='y'){?> disabled="disabled"<?php }?>>
                                <option value=""><?php echo __('추가상품')?></option>
<?php if((is_array($TPL_R2=$TPL_V1["addGoodsList"])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
                                <option
<?php if($TPL_V1["addGoodsImageFl"]=='y'){?>
<?php if($TPL_V2["imageSrc"]){?>
                                data-img-src="<?php echo $TPL_V2["imageSrc"]?>"
<?php }else{?>
                                data-img-src="blank"
<?php }?>
<?php }?>value="<?php echo $TPL_V2["addGoodsNo"]?><?php echo INT_DIVISION?><?php echo $TPL_V2["goodsPrice"]?><?php echo STR_DIVISION?><?php echo $TPL_V2["goodsNm"]?>

<?php if($TPL_V2["optionNm"]){?>(<?php echo $TPL_V2["optionNm"]?>)<?php }?>
                                <?php echo STR_DIVISION?><?php echo rawurlencode(gd_html_add_goods_image($TPL_V2["addGoodsNo"],$TPL_V2["imageNm"],$TPL_V2["imagePath"],$TPL_V2["imageStorage"], 30,$TPL_V2["goodsNm"],'_blank'))?><?php echo STR_DIVISION?><?php echo $TPL_K1?><?php echo STR_DIVISION?><?php echo $TPL_V2["stockUseFl"]?><?php echo STR_DIVISION?><?php echo $TPL_V2["stockCnt"]?>"
<?php if($TPL_V2["soldOutFl"]=='y'||($TPL_V2["stockUseFl"]=='1'&&$TPL_V2["stockCnt"]=='0')){?>
                                disabled="disabled"
<?php }?>><?php echo $TPL_V2["goodsNm"]?>

<?php if($TPL_V2["optionNm"]||gd_isset($TPL_V2["goodsPrice"])!='0'||($TPL_V2["soldOutFl"]=='y'||($TPL_V2["stockUseFl"]=='1'&&$TPL_V2["stockCnt"]=='0'))){?>
                                (
<?php if($TPL_V2["optionNm"]){?>
                                <?php echo $TPL_V2["optionNm"]?>

<?php if(gd_isset($TPL_V2["goodsPrice"])!='0'||($TPL_V2["soldOutFl"]=='y'||($TPL_V2["stockUseFl"]=='1'&&$TPL_V2["stockCnt"]=='0'))){?>
                                /
<?php if(gd_isset($TPL_V2["goodsPrice"])!='0'){?>
                                <?php echo gd_global_currency_symbol()?>

<?php if(gd_isset($TPL_V2["goodsPrice"])> 0){?>+<?php }?><?php echo gd_global_money_format($TPL_V2["goodsPrice"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_V2["soldOutFl"]=='y'||($TPL_V2["stockUseFl"]=='1'&&$TPL_V2["stockCnt"]=='0')){?> / <?php echo __('품절')?><?php }?>
<?php }else{?>
                                <?php echo __('품절')?>

<?php }?>
<?php }?>
<?php }elseif(gd_isset($TPL_V2["goodsPrice"])!='0'||($TPL_V2["soldOutFl"]=='y'||($TPL_V2["stockUseFl"]=='1'&&$TPL_V2["stockCnt"]=='0'))){?>
<?php if(gd_isset($TPL_V2["goodsPrice"])!='0'){?>
                                <?php echo gd_global_currency_symbol()?>

<?php if(gd_isset($TPL_V2["goodsPrice"])> 0){?>+<?php }?><?php echo gd_global_money_format($TPL_V2["goodsPrice"])?><?php echo gd_global_currency_string()?>

<?php if($TPL_V2["soldOutFl"]=='y'||($TPL_V2["stockUseFl"]=='1'&&$TPL_V2["stockCnt"]=='0')){?> / <?php echo __('품절')?><?php }?>
<?php }else{?>
                                <?php echo __('품절')?>

<?php }?>
<?php }else{?>
                                <?php echo __('품절')?>

<?php }?>
                                )
<?php }?></option>
<?php }}?>
                            </select>
                        </div>
                    </div>
                </div>
<?php }}?>
<?php }?>



<?php if($TPL_VAR["goodsView"]['orderPossible']=='n'){?>
                <div class="order-goods"></div>
                <div class="btn" style="text-align:center">
<?php if($TPL_VAR["goodsView"]['restockUsableFl']==='y'&&!$TPL_VAR["gGlobal"]["isFront"]){?>
                    <a href="#option_display_area"  class="skinbtn point2 gv-notorderpossible restock restockSelector">
                        <img src="/data/skin/front/story_g/img/icon/ico_restock.png" border="0" alt="<?php echo __('재입고알림')?>" />
                        <em><?php echo __('재입고알림')?></em>
                    </a>
<?php }?>
                    <a href="#option_display_area"  class="skinbtn point2 gv-notorderpossible soldout"><em><?php echo __('구매 불가')?></em></a>
                </div>
<?php }else{?>


<?php if($TPL_VAR["goodsView"]['optionFl']=='y'){?>
                <div class="option_total_display_area">
                    <div class="order-goods option_display_area" ></div>
                    <div class="end-price" style="display:none">
                        <ul>
                            <li class="price">
                                <span><?php echo __('총 상품금액')?></span>
                                <strong class="goods_total_price"></strong>
                            </li>
                            <li class="discount">
                                <span><?php echo __('총 할인금액')?></span>
                                <strong class="total_benefit_price"></strong>
                            </li>
                            <li class="total">
                                <span><?php echo __('총 합계금액')?></span>
                                <strong class="total_price"></strong>
                            </li>
                        </ul>
                    </div>
                </div>
<?php }else{?>
                <div class="order-goods option_display_area">
                    <div  id="option_display_item_0">
                        <input type="hidden" name="goodsNo[]" value="<?php echo $TPL_VAR["goodsView"]['goodsNo']?>">
                        <input type="hidden" name="optionSno[]" value="<?php echo gd_isset($TPL_VAR["goodsView"]['option'][ 0]['sno'])?>"/>
                        <input type="hidden" name="goodsPriceSum[]" value="0">
                        <input type="hidden" name="addGoodsPriceSum[]" value="0">
<?php if($TPL_VAR["couponUse"]=='y'){?>
                        <input type="hidden" name="couponApplyNo[]" value="">
                        <input type="hidden" name="couponSalePriceSum[]" value="">
                        <input type="hidden" name="couponAddPriceSum[]" value="">
<?php }?>
                        <div class="check optionKey_0">
                            <span class="name"><strong><?php echo gd_isset($TPL_VAR["goodsView"]['goodsNmDetail'])?></strong>
<?php if($TPL_VAR["couponUse"]=='y'&&$TPL_VAR["couponConfig"]['chooseCouponMemberUseType']!='member'){?>
<?php if(gd_is_login()===false){?>
                                <button type="button" class="btn-alert-login"><img src="/data/skin/front/story_g/img/btn/coupon-apply.png" alt="<?php echo __('쿠폰적용')?>"/></button>
<?php }else{?>
                                <span id="coupon_apply_0"><a href="#couponApplyLayer" class="btn-open-layer" data-key="0"><img src="/data/skin/front/story_g/img/btn/coupon-apply.png" alt="<?php echo __('쿠폰적용')?>"/></a></span>
<?php }?>
<?php }?>
                                <span id="option_text_display_0"></span></span>

                            <div class="price">
                                        <span class="count">
                                                         <input type="text" class="text goodsCnt_0" title="<?php echo __('수량')?>" data-key="0" name="goodsCnt[]"  value="<?php echo gd_isset($TPL_VAR["goodsView"]['defaultGoodsCnt'])?>" data-stock="<?php echo $TPL_VAR["goodsView"]['totalStock']?>" data-value="<?php echo gd_isset($TPL_VAR["goodsView"]['defaultGoodsCnt'])?>" data-key="0" onchange="goodsViewController.input_count_change(this,'1');return false;">

                                            <span>
                                                <button type="button" class="up goods-cnt" title="<?php echo __('증가')?>"  value="up<?php echo STR_DIVISION?>0" style="cursor: pointer"><?php echo __('증가')?></button>
                                                <button type="button" class="down goods-cnt" title="<?php echo __('감소')?>" value="dn<?php echo STR_DIVISION?>0" style="cursor: pointer"><?php echo __('감소')?></button>
                                            </span>
                                        </span>

                                <em><input type="hidden" value="<?php echo gd_isset($TPL_VAR["goodsView"]['option'][ 0]['optionPrice'], 0)?>" name="optionPriceSum[]"> <input type="hidden" value="<?php echo gd_isset($TPL_VAR["goodsView"]['option'][ 0]['optionPrice'])?>" name="option_price_0"><?php echo gd_global_currency_symbol()?><strong class="option_price_display_0"><?php echo gd_global_money_format(gd_isset($TPL_VAR["goodsView"]['option'][ 0]['optionPrice'], 0),false)?></strong><?php echo gd_global_currency_string()?></em>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="end-price">
                    <ul>
                        <li class="price">
                            <span><?php echo __('총 상품금액')?></span>
                            <strong class="goods_total_price"></strong>
                        </li>
                        <li class="discount">
                            <span><?php echo __('총 할인금액')?></span>
                            <strong class="total_benefit_price"></strong>
                        </li>
                        <li class="total">
                            <span><?php echo __('총 합계금액')?></span>
                            <strong class="total_price"></strong>
                        </li>
                    </ul>
                </div>
<?php }?>


                <div class="btn">

<?php if($TPL_VAR["goodsView"]['restockUsableFl']==='y'&&!$TPL_VAR["gGlobal"]["isFront"]){?>
                    <a href="#option_display_area" class="skinbtn point2 btn-add-restock restockSelector">
                        <img src="/data/skin/front/story_g/img/icon/ico_restock.png" border="0" alt="<?php echo __('재입고알림')?>" />
                        <em><?php echo __('재입고알림')?></em>
                    </a>
<?php }?>
                    <a id="cartBtn" href="#option_display_area" class="skinbtn point1 btn-add-cart"><em><?php echo __('장바구니')?></em></a>
                    <a id="wishBtn" href="#option_display_area"  class="skinbtn point1 btn-add-wish"><em><?php echo __('찜하기')?></em></a>
                    <a href="#option_display_area"  class="skinbtn point2 btn-add-order"><em><?php echo __('바로 구매')?></em></a>
                </div>
                <div class="easy-payment">
                    <div id="div-payco">
                        <?php echo $TPL_VAR["payco"]?>

                    </div>
                    <div id="div-naverpay">
                        <?php echo $TPL_VAR["naverPay"]?>

                    </div>
                </div>
<?php }?>

            </div>

        </form>


    </div>

    <div class="multiple-topics">
        <div id="detail">
            <div class="tab">
                <a href="#detail" class="on"><?php echo __('상품상세정보')?></a>
                <a href="#delivery"><?php echo __('배송안내')?> </a>
                <a href="#exchange"><?php echo __('교환 및 반품안내')?></a>
                <a href="#reviews"><?php echo __('상품후기')?> <strong>(<?php echo $TPL_VAR["goodsReviewCount"]+$TPL_VAR["plusReview"]["info"]["reviewCount"]?>)</strong></a>
                <a href="#qna"><?php echo __('상품문의')?> <strong>(<?php echo $TPL_VAR["goodsQaCount"]?>)</strong></a>
            </div>
            <h3><?php echo __('상품상세정보')?></h3>

            <div class="image-manual">
                <!-- 이미지 -->
            </div>
            <div class="txt-manual">
                <!-- 상품상세 공통정보 관리를 상세정보 상단에 노출-->
                <?php echo gd_isset($TPL_VAR["goodsView"]['commonContent'])?>

                <?php echo gd_isset($TPL_VAR["goodsView"]['goodsDescription'])?>

            </div>
<?php if($TPL_VAR["goodsView"]['externalVideoFl']=='y'&&$TPL_VAR["goodsView"]['externalVideoUrl']){?>
            <div style="padding:10px 0;text-align:center" id="external-video">
                <?php echo gd_youtube_player($TPL_VAR["goodsView"]['externalVideoUrl'],$TPL_VAR["goodsView"]['externalVideoWidth'],$TPL_VAR["goodsView"]['externalVideoHeight'])?>

            </div>
<?php }?>

<?php if($TPL_VAR["goodsView"]['goodsMustInfo']){?>
            <h3><?php echo __('상품필수 정보')?></h3>
            <table class="type-col" cellspacing="0" border="1">
                <colgroup>
                    <col width="20%">
                    <col>
                </colgroup>
                <tbody>
<?php if((is_array($TPL_R1=$TPL_VAR["goodsView"]['goodsMustInfo'])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
                <tr>
<?php if((is_array($TPL_R2=$TPL_V1)&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_V2){?>
                    <th style="width:20%">
                        <?php echo $TPL_V2['infoTitle']?>

                    </th>
                    <td <?php if((gd_count($TPL_V1)== 1)){?>colspan="3" style="width:80%" <?php }else{?> style="width:30%"<?php }?>  ><?php echo $TPL_V2['infoValue']?></td>
<?php }}?>
                </tr>
<?php }}?>

                </tbody></table>
<?php }?>

<?php if($TPL_VAR["goodsView"]['goodsMustInfoAddGoods']){?>
<?php if((is_array($TPL_R1=$TPL_VAR["goodsView"]['addGoods'])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?>
<?php if($TPL_V1['addGoodsMustInfo']=='y'){?>
            <div style="display: flex; justify-content: space-between">
                <div><h3><?php echo $TPL_V1['title']?> <?php echo __('상품필수 정보')?></h3></div>
                <div style="padding: 45px 0 10px 0">
                    <button class="btn_addgoods_mustinfo_showhide_all" data-display="yes" data-key="<?php echo $TPL_K1?>_">- <?php echo __('일괄닫기')?></button>
                </div>
            </div>
<?php if((is_array($TPL_R2=$TPL_V1['addGoodsList'])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_K2=>$TPL_V2){?>
<?php if($TPL_VAR["goodsView"]['addGoodsMustInfo'][$TPL_V2['addGoodsNo']]){?>
            <div class="add-goods-mustinfo-title" data-key="<?php echo $TPL_K1?>_<?php echo $TPL_K2?>">
                <div><h4><?php echo $TPL_V1['addGoodsList'][$TPL_K2]['goodsNm']?><?php if($TPL_V1['addGoodsList'][$TPL_K2]['optionNm']){?>(<?php echo $TPL_V1['addGoodsList'][$TPL_K2]['optionNm']?>)<?php }?></h4></div>
                <div style="padding: 0px 0 10px 0">
                    <button class="btn_addgoods_mustinfo_showhide" data-display="yes" data-key="<?php echo $TPL_K1?>_<?php echo $TPL_K2?>">- <?php echo __('닫기')?></button>
                </div>
            </div>
            <div class="add_goods_detail_info_box" data-key="<?php echo $TPL_K1?>_<?php echo $TPL_K2?>">
            <table class="type-col" cellspacing="0" border="1">
                <colgroup>
                    <col width="20%">
                    <col>
                </colgroup>
                <tbody>
<?php if((is_array($TPL_R3=$TPL_VAR["goodsView"]['addGoodsMustInfo'][$TPL_V2['addGoodsNo']])&&!empty($TPL_R3)) || (is_object($TPL_R3) && in_array("Countable", class_implements($TPL_R3)) && $TPL_R3->count() > 0)) {foreach($TPL_R3 as $TPL_V3){?>
                <tr>
<?php if((is_array($TPL_R4=$TPL_V3)&&!empty($TPL_R4)) || (is_object($TPL_R4) && in_array("Countable", class_implements($TPL_R4)) && $TPL_R4->count() > 0)) {foreach($TPL_R4 as $TPL_V4){?>
                    <th style="width:20%">
                        <?php echo $TPL_V4['infoTitle']?>

                    </th>
                    <td <?php if((gd_count($TPL_V3)== 1)){?>colspan="3" style="width:80%" <?php }else{?> style="width:30%"<?php }?>  ><?php echo $TPL_V4['infoValue']?></td>
<?php }}?>
                </tr>
<?php }}?>

                </tbody></table>
            </div>
<?php }?>
<?php }}?>
<?php }?>
<?php }}?>
<?php }?>


<?php if($TPL_VAR["relation"]["relationFl"]!='n'){?>
            <div class="related-goods">
                <h3><?php echo __('관련 상품')?></h3>
                <div class="list">
<?php if($TPL_VAR["widgetGoodsList"]){?>
                    <!-- 추천상품 -->
                    <?php echo includewidget('goods/_goods_display.html')?>

                    <!-- 추천상품 -->
<?php }?>
                </div>

            </div>
<?php }?>
        </div>
        <div id="delivery">
            <div class="tab">
                <a href="#detail"><?php echo __('상품상세정보')?></a>
                <a href="#delivery" class="on"><?php echo __('배송안내')?> </a>
                <a href="#exchange"><?php echo __('교환 및 반품안내')?></a>
                <a href="#reviews"><?php echo __('상품후기')?> <strong>(<?php echo $TPL_VAR["goodsReviewCount"]+$TPL_VAR["plusReview"]["info"]["reviewCount"]?>)</strong></a>
                <a href="#qna"><?php echo __('상품문의')?> <strong>(<?php echo $TPL_VAR["goodsQaCount"]?>)</strong></a>
            </div>
<?php if($TPL_VAR["infoDelivery"]){?>
            <h3><?php echo __('배송안내')?></h3>
            <div class="admin-msg"><?php echo $TPL_VAR["infoDelivery"]?></div>
<?php }?>
        </div>
        <div id="exchange">
            <div class="tab">
                <a href="#detail"><?php echo __('상품상세정보')?></a>
                <a href="#delivery"><?php echo __('배송안내')?> </a>
                <a href="#exchange" class="on"><?php echo __('교환 및 반품안내')?></a>
                <a href="#reviews"><?php echo __('상품후기')?> <strong>(<?php echo $TPL_VAR["goodsReviewCount"]+$TPL_VAR["plusReview"]["info"]["reviewCount"]?>)</strong></a>
                <a href="#qna"><?php echo __('상품문의')?> <strong>(<?php echo $TPL_VAR["goodsQaCount"]?>)</strong></a>
            </div>
<?php if($TPL_VAR["infoExchange"]){?>
            <h3><?php echo __('교환 및 반품안내')?></h3>
            <div class="admin-msg">
                <?php echo $TPL_VAR["infoExchange"]?>

            </div>
<?php }?>
<?php if($TPL_VAR["infoRefund"]){?>
            <h3><?php echo __('환불안내')?></h3>
            <div class="admin-msg">
                <?php echo $TPL_VAR["infoRefund"]?>

            </div>
<?php }?>
<?php if($TPL_VAR["infoAS"]){?>
            <h3><?php echo __('AS안내')?></h3>
            <div class="admin-msg">
                <?php echo $TPL_VAR["infoAS"]?>

            </div>
<?php }?>
        </div>
        <div id="reviews">
            <div class="tab">
                <a href="#detail"><?php echo __('상품상세정보')?></a>
                <a href="#delivery"><?php echo __('배송안내')?> </a>
                <a href="#exchange"><?php echo __('교환 및 반품안내')?></a>
                <a href="#reviews"><?php echo __('상품후기')?> <strong>(<?php echo $TPL_VAR["goodsReviewCount"]+$TPL_VAR["plusReview"]["info"]["reviewCount"]?>)</strong></a>
                <a href="#qna"><?php echo __('상품문의')?> <strong>(<?php echo $TPL_VAR["goodsQaCount"]?>)</strong></a>
            </div>
            <div class="top-reviews">
<?php if($TPL_VAR["plusReviewConfig"]["isShowGoodsPage"]=='y'){?>
                <?php echo includefile($TPL_VAR["includePlusReviewFile"])?>

<?php }?>
<?php if($TPL_VAR["goodsReviewAuthList"]=='y'){?>
                <div class="tit">
                    <h3><?php echo __('상품후기')?></h3>
                    <!--<p>상품후기 작성시 적립금 1,000<?php echo gd_global_currency_string()?>을 지급해드립니다.</p>-->
                </div>
                <div class="btn">

                    <a href="../board/list.php?bdId=<?php echo $TPL_VAR["bdGoodsReviewId"]?>" class="skinbtn point1 gv-reviewlist"><em><?php echo __('상품후기 전체보기')?></em></a>
                    <a href="javascript:openWritePopup('<?php echo $TPL_VAR["bdGoodsReviewId"]?>','<?php echo $TPL_VAR["goodsView"]["goodsNo"]?>')" class="skinbtn point2 gv-reviewwrite"><em><?php echo __('상품후기 글쓰기')?></em></a>
                </div>
<?php }?>
            </div>
            <div id="ajax-goods-<?php echo $TPL_VAR["bdGoodsReviewId"]?>-list" ></div>
        </div>
        <div id="qna">
            <div class="tab">
                <a href="#detail"><?php echo __('상품상세정보')?></a>
                <a href="#delivery"><?php echo __('배송안내')?> </a>
                <a href="#exchange"><?php echo __('교환 및 반품안내')?></a>
                <a href="#reviews"><?php echo __('상품후기')?> <strong>(<?php echo $TPL_VAR["goodsReviewCount"]+$TPL_VAR["plusReview"]["info"]["reviewCount"]?>)</strong></a>
                <a href="#qna"><?php echo __('상품문의')?> <strong>(<?php echo $TPL_VAR["goodsQaCount"]?>)</strong></a>
            </div>
            <div class="top-reviews">
                <div class="tit">
                    <h3><?php echo __('상품Q%sA','&amp;')?></h3>
                </div>
                <div class="btn">
                    <a href="../board/list.php?bdId=<?php echo $TPL_VAR["bdGoodsQaId"]?>" class="skinbtn point1 gv-qnalist"><em><?php echo __('상품문의 전체보기')?></em></a>
                    <a href="javascript:openWritePopup('<?php echo $TPL_VAR["bdGoodsQaId"]?>','<?php echo $TPL_VAR["goodsView"]["goodsNo"]?>')"  class="skinbtn point2 gv-qnawrite" ><em><?php echo __('상품문의 글쓰기')?></em></a>
                </div>
            </div>
            <div id="ajax-goods-<?php echo $TPL_VAR["bdGoodsQaId"]?>-list" >
            </div>
        </div>
    </div>

    <!-- 확대보기 레이어 -->
    <div id="zoom-layer" class="layer-wrap dn">
        <div class="wrap">
            <div class="ctt">
                <div class="txt">
                    <h4><?php echo __('이미지 확대보기')?></h4>
                    <p><?php echo $TPL_VAR["goodsView"]['goodsNm']?></p>
                </div>
                <div class="view">
                    <div class="detail" id="magnifyImage">
                        <?php echo $TPL_VAR["goodsView"]['image']['magnify']['img'][ 0]?>

                    </div>
                    <div class="list">
                        <div class="slide">
                            <div class="slider-image-magnify">
<?php if((is_array($TPL_R1=gd_isset($TPL_VAR["goodsView"]['image']['magnify']['thumb']))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?>
                                <div class="swiper-slide"> <a href="javascript:change_image('<?php echo $TPL_K1?>','magnify');"><?php echo $TPL_V1?></a></div>
<?php }}?>
                            </div>
                        </div>
                        <div class="prev slider-image-magnify-prev" title="<?php echo __('이전 상품 이미지')?>"></div>
                        <div class="next slider-image-magnify-next" title="<?php echo __('다음 상품 이미지')?>"></div>
                    </div>
                </div>
                <button type="button" class="close" title="<?php echo __('닫기')?>"><?php echo __('닫기')?></button>
            </div>
        </div>
    </div>
    <!-- //확대보기 레이어 -->
</div>
<hr>

<!-- 비밀글 클릭시 인증 레이어 -->
<div class="cite-layer dn js-password-layer">
    <div class="wrap">
        <h4><?php echo __('비밀번호 인증')?></h4>
        <div>
            <p><?php echo __('글 작성시 설정한 비밀번호를 입력해 주세요.')?></p>
            <input type="password" name="writerPw" class="text" autocomplete="off">
            <a href="javascript:void(0)" class="skinbtn base2 gv-layerciteconfirm  js-submit"><em><?php echo __('확인')?></em></a>
        </div>
        <button type="button" class="close" title="<?php echo __('닫기')?>"><?php echo __('닫기')?></button>
    </div>
</div>
<!-- //비밀글 클릭시 인증 레이어 -->
<?php if($TPL_VAR["couponUse"]=='y'){?>
<!-- 쿠폰 다운받기 레이어 -->
<div id="couponDownLayer" class="layer-wrap dn"></div>
<!--//쿠폰 다운받기 레이어 -->
<!-- 쿠폰 적용하기 레이어 -->
<div id="couponApplyLayer" class="layer-wrap dn"></div>
<!--//쿠폰 적용하기 레이어 -->
<?php }?>
<div id="writePop" class="layer-wrap write-pop dn"></div>

<!-- 장바구니 담기 레이어 -->
<div id="addCartLayer" class="layer-wrap dn">
    <div class="box add-cart-layer">
        <div class="view">
            <h2><?php echo __('장바구니 담기')?></h2>
            <div class="scroll-box">
                <p class="success"><strong><?php echo __('상품이 장바구니에 담겼습니다.')?></strong><br /><?php echo __('바로 확인하시겠습니까?')?></p>
            </div>
            <div class="btn">
                <button class="skinbtn point1 layer-cartaddcancel btn-close"><em><?php echo __('취소')?></em></button>
                <button class="skinbtn point2 layer-cartaddconfirm layer-cart-btn"><em><?php echo __('확인')?></em></button>
            </div>
            <button title="<?php echo __('닫기')?>" class="close" type="button"><?php echo __('닫기')?></button>
        </div>
    </div>
</div>
<!--//장바구니 담기 레이어 -->
<!-- 찜리스트 레이어 -->
<div id="addWishLayer" class="layer-wrap dn">
    <div class="box add-wish-layer">
        <div class="view">
            <h2><?php echo __('찜 리스트 담기')?></h2>
            <div class="scroll-box">
                <p class="success"><strong><?php echo __('상품이 찜 리스트에 담겼습니다.')?></strong><br /><?php echo __('바로 확인하시겠습니까?')?></p>
            </div>
            <div class="btn">
                <button class="skinbtn point1 layer-wishaddcancel btn-close"><em><?php echo __('취소')?></em></button>
                <button class="skinbtn point2 layer-wish-btn layer-wishaddconfirm"><em><?php echo __('확인')?></em></button>
            </div>
            <button title="<?php echo __('닫기')?>" class="close" type="button"><?php echo __('닫기')?></button>
        </div>
    </div>
</div>
<!--//찜리스트 레이어 -->
<script type="text/javascript" src="<?php echo PATH_SKIN?>js/gd_board_goods.js" charset="utf-8"></script>

<?php echo $TPL_VAR["fbGoodsViewScript"]?>

<?php $this->print_("footer",$TPL_SCP,1);?>