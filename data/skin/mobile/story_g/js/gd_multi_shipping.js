var maxShippingNo = 10;
var changeElement = ['name', 'id', 'for'];

$(function(){
    $('input[name="multiShippingFl"]').click(function(){
        var checked = this.checked;

        if (checked === true) {
            $('.shipping-info-table:eq(0) .my_tit:eq(0) b:eq(0)').html(__('메인 배송지'));
            $('.shipping-info-table:eq(0) .order-visit .my_tit:eq(0) b:eq(0)').html(__('메인 방문수령 정보'));
            $('#memberinfoApplyTr1, #memberinfoApplyTr3').addClass('dn');
            $('#memberinfoApplyTr1, #memberinfoApplyTr3').find('input[name="reflectApplyMember"]').prop('checked', false);
            $('.shipping-add-btn, .select-goods-area, .shipping-visit-add-btn').removeClass('dn');
            $('.shipping-add-btn').trigger('click');
        } else {
            $('.shipping-info-table:eq(0) .my_tit:eq(0) b:eq(0)').html(__('배송정보'));
            $('.shipping-info-table:eq(0) .order-visit .my_tit:eq(0) b:eq(0)').html(__('방문수령 정보'));
            $('#memberinfoApplyTr1, #memberinfoApplyTr3').removeClass('dn');
            $('.select-goods').addClass('dn').find('table.check').empty();
            $('input[name^="selectGoods"]').val('');
            $('input[name^="multiDelivery"]').val(0);
            $('.shipping-add-btn, .select-goods, .select-goods-area, .shipping-visit-add-btn').addClass('dn');
            $('.shipping-info-table').not(':eq(0)').remove();
        }

        set_real_settle_price();
        resetMileage();
        var deliveryVisit = set_delivery_visit();

        if (checked === true) {
            for (var i in [0, 1]) {
                set_shipping_btn(i, deliveryVisit);
            }
        }
    });

    $(document).on('click', '.shipping-add-btn, .shipping-visit-add-btn', function(){
        var shippingNo = $('.shipping-info-table').length;
        if (shippingNo >= maxShippingNo) {
            alert(__('복수 배송지는 최대 %s개까지 이용 가능합니다.', maxShippingNo));
            return;
        }
        var content = {'no': shippingNo};
        var compiled = _.template($('#multiShippingRow').html());
        compiled = compiled(content);

        $('.shipping-info-area').append(compiled);
        var deliveryVisit = set_shipping_delivery_visit(shippingNo);
        set_shipping_btn(shippingNo, deliveryVisit);
    });

    $(document).on('click', '.shipping-remove-btn, .shipping-visit-remove-btn', function(){
        var index = $('.shipping-remove-btn').index(this) + 1;

        $(this).closest('.shipping-info-table').remove();

        if ($('.shipping-info-table').length <= 1) {
            $('input[name="multiShippingFl"]').trigger('click');
            $('#visitMultiShippingFl').attr('checked', false);
        } else {
            for (var i = $('.shipping-info-table').length; i > index; i--) {
                $('.shipping-info-table:eq(' + (i - 1) + ') h2.my_tit:eq(0) span.no').html(i - 1);
                $('.shipping-info-table:eq(' + (i - 1) + ')').find('input, select, label, button').each(function (index, element) {
                    changeElement.forEach(function (ele) {
                        if (typeof $(element).prop(ele) != 'undefined') {
                            if (ele == 'name') {
                                var replace = $(element).prop(ele).replace(/\[.*\]/gi, '[' + (i - 1) + ']');
                            } else {
                                var replace = $(element).prop(ele).replace(/Add\d/gi, 'Add' + (i - 1));
                            }
                            $(element).prop(ele, replace);
                        }
                    });
                    if (typeof $(element).data('no') != 'undefined') {
                        $(element).attr('data-no', (i - 1));
                    }
                });
            }
        }

        set_real_settle_price();
    });

    $(document).on('click', '.postcode-search', function(){
        var no = $(this).attr('data-no');
        postcode_search('shippingZonecodeAdd[' + no + ']', 'shippingAddressAdd[' + no + ']', 'shippingZipcodeAdd[' + no + ']');
    });

    $(document).on('click', 'button.delete-goods', function(){
        var $target = $(this);
        var type = $target.data('type');
        var cartSno = $target.data('cart-sno');
        var goodsNo = $target.data('goods-no');
        var parentCartSno = $target.data('parent-cart-sno');
        var selectGoods = $target.closest('.select-goods-area').find('input[name^="selectGoods"]').val();
        var shippingNo = $target.closest('.select-goods-area').data('shipping-no');

        switch (type) {
            case 'goods':
                var addgoodsCnt = $target.closest('table').find('button.delete-goods[data-type="addGoods"][data-parent-goods-no="' + goodsNo + '"]').length;

                if (addgoodsCnt > 0) {
                    alert(__('추가상품만 단독으로 배송지 선택은 불가합니다.'));
                    return false;
                }
                break;
            case 'addGoods':
                if ($target.data('must-fl') == 'y') {
                    alert(__('추가상품이 필수 선택인 상품이 있습니다. 추가상품도 함께 선택하셔야 배송지 선택이 가능합니다.'));
                    return false;
                }
                break;
        }

        var totalGoodsCnt = 0;
        var setData = [];
        $.parseJSON(selectGoods).forEach(function(ele){
            if (ele.sno == cartSno) {
                if (type == 'goods') {
                    ele.goodsCnt = 0;
                } else {
                    ele.addGoodsNo.forEach(function(addGoodsNo, index){
                        if (addGoodsNo == goodsNo) {
                            ele.addGoodsCnt[index] = 0;
                        }
                    });
                }
            }
            totalGoodsCnt += parseInt(ele.goodsCnt);
            setData.push(ele);
        });
        var data = JSON.stringify(setData);

        if (totalGoodsCnt > 0) {
            $.ajax({
                method: "POST",
                url: "../order/cart_ps.php",
                async: false,
                data: {mode: 'multi_shipping_delivery', selectGoods: data, useDeliveryInfo: 'y'}
            }).success(function (getData) {
                $target.closest('.select-goods-area').find('input[name^="multiDelivery"]').val(getData.deliveryCharge);
                $target.closest('.select-goods-area').find('input[name^="selectGoods"]').val(data);
                if ($('.delete-goods[data-parent-cart-sno="' + parentCartSno + '"]').length > 1) {
                    var moveInfo = $('.delete-goods[data-parent-cart-sno="' + parentCartSno + '"]');
                    var deliveryInfo = $target.closest('table').find('.delivery-info[data-parent-cart-sno="' + parentCartSno + '"]');
                    var index = $('.delete-goods[data-parent-cart-sno="' + parentCartSno + '"]').index($target);
                    if (index == 0) {
                        deliveryInfo.find('.shipping-delivery-price').html(gd_money_format(getData.deliveryInfo[moveInfo.eq(1).data('cart-sno')]['deliveryPrice']));
                        $('.delivery-info[data-parent-cart-sno="' + parentCartSno + '"]:eq(1)').html(deliveryInfo.html());
                    } else {
                        deliveryInfo.find('.shipping-delivery-price').html(gd_money_format(getData.deliveryInfo[moveInfo.eq(0).data('cart-sno')]['deliveryPrice']));
                    }
                }
                $target.closest('tr').remove();
            });
        } else {
            $target.closest('.select-goods').addClass('dn');
            $target.closest('.select-goods-area').find('input[name^="selectGoods"]').val('');
            $target.closest('.select-goods-area').find('input[name^="multiDelivery"]').val(0);
            $target.closest('table').empty();
        }
        get_delivery_area_charge();
        set_real_settle_price();
        var deliveryVisit = set_shipping_delivery_visit(shippingNo);
        set_shipping_btn(shippingNo, deliveryVisit);
    });

    // 레이어 오픈 바인딩
    $(document).on('click', '.shipping-goods-select', function (e) {
        var shippingNo = $('.shipping-goods-select').index(this);
        var cartIdx = [];
        var selectGoods = [];
        var address = '';
        $(this).closest('form').find('input[name="cartSno[]"]').each(function(){
            cartIdx.push($(this).val());
        });
        $('input[name^="selectGoods"]').each(function(index){
            selectGoods.push(this.value);
        });
        if (shippingNo > 0) {
            address = $('input[name="shippingAddressAdd[' + shippingNo + ']"]').val();
        } else {
            if (!$('input[name="tmpDeliverTab"]').val() || $('input[name="tmpDeliverTab"]').val() == 'receiver') {
                address = $('input[name="receiverAddress"]').val();
            } else if ($('input[name="tmpDeliverTab"]').val() == 'shipping') {
                address = $('input[name="shippingAddress"]').val();
            } else if ($('input[name="tmpDeliverTab"]').val() == 'direct') {
                address = $('input[name="directAddress"]').val();
            }
        }

        var params = {
            shippingNo: shippingNo,
            cartIdx: cartIdx,
            selectGoods: selectGoods,
            address: address,
            multiDelivery: $('input[name="multiDelivery[' + shippingNo + ']"]').val()
        };

        $('#popup-shipping-goods-select').modal({
            remote: '../order/shipping_goods_select.php',
            cache: false,
            type : 'post',
            params: params,
            show: true
        });
    });

    $(document).on('click', '.tab-btn > a[href*="#tab"]', function(e) {
        if ($('input[name="multiShippingFl"]').prop('checked') === true) {
            var href = $(this).attr('href');
            var shippingNo = $('.tab-btn > a[href="' + href + '"]').index(this);

            if (shippingNo > 0) {
                switch (href) {
                    case '#tab2':
                        var self = $($(this).attr('href'));
                        var params = {
                            mode: 'shipping_list'
                        };
                        self.addClass('loading');
                        $(this).closest('.tab-btns').find('.tab-btn').eq(0).addClass('active');
                        $(this).closest('.tab-btns').find('.tab-btn').eq(1).removeClass('active');
                        $.post('../order/order_ps.php', params, function (data) {
                            deliveryList = data;
                            $('.delivery-list-add').eq(shippingNo).empty().append('<span class="btn-shipping"><a href="../mypage/layer_shipping_address_regist.php?type=order_regist&shippingNo=' + shippingNo + '" data-toggle="modal" data-target="#popup-shipping" data-type="post" data-cache="false">배송지 추가</a></span>');
                            $('.delivery-list').eq(shippingNo).empty();
                            self.removeClass('loading');
                            if (data.length > 0) {
                                $.each(data, function(idx){
                                   var json = $(this)[0];
                                    $('.delivery-list-add').eq(shippingNo).append('<span class="btn-shipping btn-shipping-receiver" data-shipping-no="' + shippingNo + '"><a data-sno="' + json.sno + '">' + json.shippingTitle + '</a></span>');
                                    if (idx === 0) {
                                        insertShippingData(json, shippingNo);
                                    }
                                });
                            } else {
                                $('.delivery-list').eq(shippingNo).empty().append('<div class="no-shipping"><b>등록된 기본배송지가 없습니다.</b><br />(기본배송지는 "배송지 목록"에서 추가할 수 있습니다.)</div>');
                            }
                        });
                        break;
                    case '#tab3':
                        $('input[name="shippingNameAdd[' + shippingNo + ']"]').val('');
                        $('input[name="shippingZonecodeAdd[' + shippingNo + ']"]').val('');
                        $('input[name="shippingZipcodeAdd[' + shippingNo + ']"]').val('');
                        $('input[name="shippingAddressAdd[' + shippingNo + ']"]').val('');
                        $('input[name="shippingAddressSubAdd[' + shippingNo + ']"]').val('');
                        $('input[name="reflectApplyDeliveryAdd[' + shippingNo + ']"]').prop('checked', false);
                        $('input[name="shippingPhoneAdd[' + shippingNo + ']"]').val('');
                        $('input[name="shippingCellPhoneAdd[' + shippingNo + ']"]').val('');
                        $('.delivery-list-add').eq(shippingNo).empty();
                        $('.delivery-list').eq(shippingNo).empty();
                        $(this).closest('.tab-btns').find('.tab-btn').eq(0).removeClass('active');
                        $(this).closest('.tab-btns').find('.tab-btn').eq(1).addClass('active');
                        break;
                }
            }
        }
    });
});
