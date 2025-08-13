$(function () {
	var dom = {
		infoBn: $('.cont_detail .btn_info'),
		infoLayer: $('.cont_detail .ly_info'),
		reviewExpandBn: $('.detail_review .btn_more'),
		addWishBn: $('.ly_buy_all button'),
		accordianLst: $('.detail_sub_lst > li'),
		accordianOverseaLst: $('.detail_glblst > li').not(':eq(0)'),
		reviewBx: $('.detail_review'),
		infoTextBx: $('.detail_infotext'),
		buyDisplayBn: $('.ly_detail_buy .btn_buy'),
		buyBx: $('.ly_detail_buy .ly_buy'),
		buyInnerBx: $('.ly_detail_buy .ly_buy .ly_buy_info'),
		buyBn: $('#btn-buy'),
		childSelect: $('.option_child_select'),
		cartBn: $('#btn-cart'),
		toastPayBn: $('#btn-tstbuy'),
		reviewMoreBn: $('.review_more button'),
		reviewMoreCurrent: $('.review_more .current_num')
	};

	// 2depth 옵션 선택
	if (dom.childSelect.length) {
		dom.childSelect.on('change', function (e) {
			prepareOrder.viewSubOption(goods_no, goods_sub, $(this).val(), option_cnt, select_option);
		});
		if (dom.childSelect.val() != '') {
			// selectedOption GET 변수 넘어오면 자동 옵션 체크
			dom.childSelect.trigger('change');
		}
	}

	// 추가옵션 선택시 금액 계산 반영하기 미완성
//        $('select[id*=addopt]').change(function(e){
//            e.preventDefault();
//            var addopt = prepareOrder.getAddopt();
//        });

	// 정보 플로팅 창 클릭 액션
	dom.infoBn.on('click', function (e) {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
			dom.infoLayer.hide();
		} else {
			$(this).addClass('selected');
			dom.infoLayer.show();
		}
	});

	// 해외배송 아코디언
	if (dom.accordianOverseaLst.length) {
		dom.accordianOverseaLst.find('a').on('click', function (e) {
			if ($(this).is('a'))
				e.preventDefault();
			if (e.isTrigger && $(this).siblings('div').is(':visible'))
				return;
			$(this).parent('li').toggleClass('selected');
			if ($(this).parent('li').hasClass('selected')) {
				$(this).siblings('div').show();
			} else {
				$(this).siblings('div').hide();
			}
		});
	}

	// 상품평/배송.교환.환불정보 보기 아코디언
	dom.accordianLst.find('>a,>.js_accordian').on('click', function (e) {
		if ($(this).is('a'))
			e.preventDefault();
		if ($(this).hasClass('disabled'))
			return;
		if (e.isTrigger && $(this).siblings('div').is(':visible'))
			return;
		$(this).parent('li').toggleClass('selected');
		if ($(this).parent('li').hasClass('selected')) {
			$(this).siblings('div').show();
		} else {
			$(this).siblings('div').hide();
		}
	});

	// 플로팅메뉴 바로가기
	var calculatePositionY = function (idString) {
		var offset = $(idString).offset(),
			top = $('body').scrollTop();
		return offset.top - 92;
	};
	dom.infoLayer.find('a').click(function (e) {
		e.preventDefault();
		if ($(this).attr('data-toggle') != 'modal') {
			$($(this).attr('href') + ' > a:first').trigger('click');
			$($(this).attr('href') + ' > div.js_accordian').trigger('click');
			if ($(this).find('>span').text() != '(0)') {
				dom.infoBn.trigger('click');
				$('body').animate({scrollTop: calculatePositionY($(this).attr('href'))}, 'fast');
			}
		}
	});

	// 상품평 내용내 더보기
	$(document).on('click', dom.reviewExpandBn.selector, function (e) {
		e.preventDefault();
		$(this).parent('li').toggleClass('selected');
	});

	// 상품평 목록 더보기
	var total = 0,
		loading = false,
		isLast = false;
	var templateGoodsReviewRowCompiled = _.template($('#templateGoodsReviewRow').html()); //템플릿 가져오기
	var templateGoodsQnaRowCompiled = _.template($('#templateGoodsQnaRow').html());

	var searchData = {
		page: 2
	};

	function start() {
		loading = true;
	}

	function renderList($data, $command) {
		var i, j, d, t, html;
		isLast = ($data.page_list.current_page == $data.page_list.total_page || !$data.page_list.list.length);
		total = $data.total;
		html = '';
		for (i = 0, j = $data.list.length; i < j; ++i) {
			d = $data.list[i];
			d.goods_no = $data.goods_no;
			d.goods_sub = $data.goods_sub;
			if ($command == 'detail-qna') {
				d.real_user_id = $data.user_id;
				t = templateGoodsQnaRowCompiled(d);
			} else {
				t = templateGoodsReviewRowCompiled(d);
			}
			html += t;
		}
		var currentReviewsNo = parseInt($('#' + $command).find('.review_more .current_num').text()) + 5,
			totalReviewsNo = parseInt($('#' + $command).find('.review_more .total_num').text());
		$('#' + $command).find('.detail_review>ul').append(html);
		if (currentReviewsNo > totalReviewsNo) {
			$('#' + $command).find('.review_more .current_num').text(totalReviewsNo);
		} else {
			$('#' + $command).find('.review_more .current_num').text(currentReviewsNo);
		}
	}

	function end() {
		loading = false;
	}

	function search($start, $end, $command) {
		var apiCommand = ($command == 'detail-review' ? 'estimate_list' : ($command == 'detail-qna' ? 'qa_list' : 'photo_estimate_list')),
			apiPage = ((parseInt($('#' + $command).find('.review_more .current_num').text()) / 5) + 1);
		Net.ajax('/api/' + apiCommand + '/' + goods_no + '/' + goods_sub + '/' + apiPage, null, {
			start: function () {
				$start();
			},
			success: function ($data) {
				renderList($data, $command);
			},
			fail: function ($code, $message) {
				searchData.page--;
				alert('[' + $code + ']' + $message);
			},
			end: function () {
				$end();
			}
		});
	}
	dom.reviewMoreBn.on('click', function (e) {
		e.preventDefault();
		if (loading || isLast) {
			return;
		}
		var id = $(this).parents('li').attr('id'),
			currentReviewsNo = numeral().unformat($('#' + id).find('.review_more .current_num').text()),
			totalReviewsNo = numeral().unformat($('#' + id).find('.review_more .total_num').text());
		if (totalReviewsNo > currentReviewsNo) {// 전체개수보다 작으면 실행
			search(start, end, id);
			searchData.page++;
		}
	});

	// 관심상품 슬라이드
	if ($('#detail-relative-goods').length) {
		var numberPerBrand = function () {
			return Math.abs(window.orientation) === 90 ? 3 : 2;
		};
		if ($('#pagination-goods-relative li').length > numberPerBrand() - 1) {
			var relGoodsSwiper = new Swiper('#goods-relative', {
				wrapperClass: 'plst',
				slideClass: 'lstbx',
				loop: false,
				autoplay: 0,
				grabCursor: true,
				slidesPerView: numberPerBrand(),
				slidesPerGroup: numberPerBrand(),
				paginationAsRange: false,
				calculateHeight: true,
				createPagination: false,
				pagination: '#pagination-goods-relative',
				paginationClickable: true,
				onFirstInit: function (swiper) {
					var html = '';
					var group = numberPerBrand();
					var total = parseInt(Math.ceil(swiper.slides.length / group), 10);
					var page = parseInt((swiper.activeIndex / group) + 1, 10);
					for (var i = 0; i < total; i++) {
						html += '<li ' + ((i / numberPerBrand()) + 1 == page ? 'class="selected"' : '') + '><span class="sp">' + __('상품이미지') + ' ' + i + '</span></li>';
					}
					$('#pagination-goods-relative ul').empty().html(html);
				}
			});

			// 관련상품 페이징 처리
			relGoodsSwiper.addCallback('SlideChangeEnd', function (swipe) {
				var page = Math.ceil($(swipe.activeSlide()).data('index') / numberPerBrand());
				$(swipe.paginationContainer).find('li').removeClass('selected');
				$(swipe.paginationContainer).find('li:eq(' + page + ')').addClass('selected');
			});
			relGoodsSwiper.addCallback('Init', function (swiper) {
				swiper.fireCallback('FirstInit', swiper);
			});
			$(window).bind('ps.orientation', function (e) {
				relGoodsSwiper.params.slidesPerView = numberPerBrand();
				relGoodsSwiper.params.slidesPerGroup = numberPerBrand();
				relGoodsSwiper.reInit();
			});
		} else {
			$('#pagination-goods-relative li').hide();
		}
	}

	// 상품찜하기
	dom.addWishBn.on('click', function (e) {
		e.preventDefault();
		prepareOrder.addWishList(option_cnt, goods_no, goods_sub, first_option_cnt);
	});

	// 상품구매하기 창열기
	dom.buyDisplayBn.on('click', function (e) {
		e.preventDefault();
		dom.buyBx.css({display: '-webkit-box'});
//		$('select[name=option1]').selectize();
		setTimeout(function () {
			$('html,body').css({overflow: 'hidden'});
			$('#wrap').css({overflow: 'hidden'});
			$('#container').css({height: $(window).height(), overflow: 'hidden'});
			if ($(window).height() < dom.buyInnerBx.height())
				dom.buyInnerBx.css({height: $(window).height() - 20, overflow: 'auto'});
		}, 1);
	});


	// 배경 선택시 상품구매 창닫기
	dom.buyBx.on('click', function (e) {
		var $clickedEl = $(e.target);
		if ($clickedEl.context.className == 'ly_buy') {
			dom.buyBx.find('.bn_cls').trigger('click');
		}
	});

	// 상품구매하기 창닫기
	dom.buyBx.find('.bn_cls').on('click', function (e) {
		$('html,body').css({overflow: 'inherit'});
		$('#wrap').css({overflow: 'inherit'});
		$('#container').css({height: 'inherit', overflow: 'inherit'});
		dom.buyBx.hide();
		setTimeout(function () {
			$('input[name=qty]').blur();
			$('select[name=option1]').quickChange(function () {
			});
			$('select[name=option2]').quickChange(function () {
			});
			dom.buyInnerBx.css({height: 'auto', overflow: 'inherit'});
		}, 1);
	});

	// 장바구니 클릭
	dom.cartBn.on('click', function (e) {
		e.preventDefault();
		prepareOrder.addCart(option_cnt, goods_no, goods_sub, first_option_cnt);
	});

	// 바로구매 클릭
	dom.buyBn.on('click', function (e) {
		e.preventDefault();
		prepareOrder.directOrder(option_cnt, goods_no, goods_sub, first_option_cnt);
	});

	// toastpay 클릭
	dom.toastPayBn.on('click', function (e) {
		e.preventDefault();
		prepareOrder.directOrder(option_cnt, goods_no, goods_sub, first_option_cnt, 'payco');
	});

	// 수량 클릭
	$('.ipt_mnt .bn_up').on('click', function (e) {
		prepareOrder.changeQty(option_cnt, goods_no, goods_sub, 'plus');
	});
	$('.ipt_mnt .bn_down').on('click', function (e) {
		prepareOrder.changeQty(option_cnt, goods_no, goods_sub, 'minus');
	});
	$('.ipt_mnt input[name=qty]').on('keyup', function (e) {
		var qty;
		qty = $(this).val();
		if (qty > 0) {
			console.log(qty);
			prepareOrder.inputQty(goods_no, goods_sub, qty);
		}

	});
	$('.ipt_mnt input[name=qty]').on('keypress', function (e) {
		if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) || (e.which == 48 && !$(this).val())) {
			return false;
		} else {
			$('.ipt_mnt input[name=qty]').trigger('keyup');
		}
	});

	// 소셜 공유
	var snsWin = function (sns, enc_tit, enc_sbj, enc_url, enc_tag)
	{
		var snsset = new Array();
		var enc_tit = encodeURIComponent(enc_tit);
		var enc_sbj = encodeURIComponent(enc_sbj);
		var enc_url = encodeURIComponent(enc_url);
		var enc_tag = encodeURIComponent(enc_tag);
		snsset['t'] = 'https://twitter.com/intent/tweet?text=' + enc_sbj + '&url=' + enc_url;
		snsset['f'] = 'http://www.facebook.com/sharer.php?u=' + enc_url + '&t=' + enc_sbj;
		snsset['m'] = 'http://me2day.net/plugins/mobile_post/new?new_post[body]=' + enc_sbj + '+++["' + enc_tit + '":' + enc_url + '+]&new_post[tags]=' + enc_tag;
		snsset['y'] = 'http://yozm.daum.net/api/popup/prePost?sourceid=' + enc_url + '&prefix=' + enc_sbj;
		window.open(snsset[sns]);
	};
	var kakaoLink = function (enc_tit, enc_sbj, enc_url, enc_img)
	{
		Kakao.init('ccab7ac0250164db219e3989706fa01d');

		// 카카오톡 링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
		Kakao.Link.sendTalkLink({
			label: enc_sbj,
			image: {
				src: enc_img,
				width: '500',
				height: '500'
			},
			webButton: {
				text: __('상품바로가기'),
				url: enc_url // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
			},
			fail: function (err) {
				alert(__('해당 기기는 카카오링크를 지원하지 않습니다.'));
			}
		});
	};
	$('.ly_share li a').on('click', function (e) {
		if ($(this).find('.ico').hasClass('ico_tw')) {
			snsWin('t', title, goodsName, goodsUrl, '');
		} else if ($(this).find('.ico').hasClass('ico_fb')) {
			snsWin('f', title, goodsName, goodsUrl, '');
		} else if ($(this).find('.ico').hasClass('ico_kt')) {
			kakaoLink(title, goodsName, goodsUrl, goodsImgUrl);
		}
	});

	// Ajax 리스트 컨트롤을 위한 백버튼
	$('.js_bn_back').on('click', function (e) {
		e.preventDefault();
		history.back();
	});
});
