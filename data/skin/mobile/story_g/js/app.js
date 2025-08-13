var brandFavoriteScroll;
var brandFavoriteScrollNum;
var kMaxFavoriteCount = 19;
var kFavoriteList = 'key_favorite_list'; //즐겨찾기 저장용 키
var kFilterSaveSize = 'key_filter_save_size'; //상세필터내 사이즈 저장
var kFilterSaveSizeList = 'key_filter_save_size_list'; //상세필터내 사이즈 저장
var kRecentKeywordList = 'key_recent_keyword_list';
var deviceIsIOS = /iP(ad|hone|od)/.test(navigator.userAgent);

// 마우스 휠 스크롤 방지
function preventScroll() {
	$('body').on({
		'mousewheel': function(e) {
			if (e.target.id == 'el') return;
			e.preventDefault();
			e.stopPropagation();
		}
	});
}

// 포커스 함수  오버라이드
function focus() {
	$('.js-auto-focus').focus();
}
$(focus);

// ?
$.fn.mobileFix = function (options) {
	var $parent = $(this),
		$fixedElements = $(options.fixedElements);

	$(document)
		.on('focus', options.inputElements, function(e) {
			$parent.addClass(options.addClass);
		})
		.on('blur', options.inputElements, function(e) {
			$parent.removeClass(options.addClass);

			// Fix for some scenarios where you need to start scrolling
			setTimeout(function() {
				$(document).scrollTop($(document).scrollTop())
			}, 1);
		});

	return this; // Allowing chaining
};

// 이걸 푸는 경우 본문에 fixed 속성을 가진 input 엘리먼트가 있는 경우 실 fixed 엘리먼트가 잠시 속성을 잊어버림
//if (Modernizr.touch) {
//    $("body").mobileFix({ // Pass parent to apply to
//        inputElements: "input,textarea,select", // Pass activation child elements
//        addClass: "fixfixed" // Pass class name
//    });
//}

$.fn.quickChange = function(handler) {
	return this.each(function() {
		var self = this;
		self.qcindex = self.selectedIndex;
		var interval;
		function handleChange() {
			if (self.selectedIndex != self.qcindex) {
				self.qcindex = self.selectedIndex;
				handler.apply(self);
			}
		}
		$(self).focus(function() {
			interval = setInterval(handleChange, 100);
		}).blur(function() { window.clearInterval(interval); })
			.change(handleChange); //also wire the change event in case the interval technique isn't supported (chrome on android)
	});
};

// url 파라미터값 변경
function replaceUrlParam(url, paramName, paramValue){
    var pattern = new RegExp('\\b(' + paramName + '=).*?(&|$)');

    if (paramValue == null) {
        paramValue = '';
    }

    if (url.search(pattern) >= 0) {
        return url.replace(pattern,'$1' + paramValue + '$2');
    }

    return url + (url.indexOf('?') > 0 ? '&' : '?') + paramName + '=' + paramValue
}

$(function(){
	// 주소창 지우기
//	if (window.attachEvent) window.attachEvent("load", function() {setTimeout(scrollTo, 0, 0, 1);}, false); //IE
//	else window.addEventListener("load", function() {setTimeout(scrollTo, 0, 0, 1);}, false);

	$.cookie('gdUseSkin', 'v2');

	// Initialized key value
	if (_.isNull(storage.loadVal(kFilterSaveSizeList))) {
		storage.saveVal(kFilterSaveSize,'');
		storage.saveVal(kFilterSaveSizeList,'');
	}

	// Define Common Dom
	var commonDom = {
		body: $('body'),
		header: $('#header'),
		swipeNavMenu: $('#swipe-nav-menu'),
		swipeNavMenuPager: $('#swipe-nav-menu-btn'),
		searchForm: $('#searchForm'),
		keyword: $('#sch'),
		searchBn: $('.bn_srch'),
		searchClearBn: $('#frmSearchTop .bn_wrg'),
		topBanner: $('.banner'),
		topAnchor: $('.js_btn_top a'),
		favoriteButton: $('.ft_baro'),
		favoriteIframe: $('#add-mobile-favorite'),
		slideHeader: $('.slide_header'),
		brandSlide: $('#blind_brand'),
		brandKeyword: $('#brand-sch'),
		brandSearchForm: $('#brandSearchForm'),
		brandSearchClearBn: $('#brandSearchForm .bn_wrg'),
		brandSearchPrevBn: $('#brandSearchForm .bn_prev'),
		brandSearchResultBx : $('.js_srlt_bx'),
		brandSearchResultList : $('.js_srlt_lst'),
		brandSearchNoResult : $('.js_srltno'),
		brandSearchTop5 : $('.js_srlt_top5'),
		brandFavoriteBox: $('#swipe-brand-fav'),
		brandNoFavoriteBox: $('.fav_bx > .favno'),
		brandFavoriteBn: $('.js_bn_fav'),
		brandListBx : $('.js_brand_bx'),
		brandList: $('.blind_item'),
		popupUseLaw: $('#popup-uselaw'),
		popupPrivacyLaw: $('#popup-privacylaw'),
		layerShare: $('#header .ly_share'),
		layerZzim: $('#header .ly_zzim'),
        recentKeywordDeleteBn: $('.js-recent-keyword-delete'),
		recentKeywordAllDeleteBn: $('.js-recent-all-delete')
	};

	$('.disabled').on('click', function(e){
		if($(this).parent('li').length && !$(this).parent('li').hasClass('lstbx') && !$(this).is('div')) {
			e.stopPropagation();
			e.preventDefault();
		}
	});

	// 필터옵션 강제 높이 조정 (공간이 좁을 경우)
	var layerResize = {
		filter: function() {
			if($('.ly_filter').length) {
				var winHeight = $(window).height();
				var filHeight = $('.ly_filter')[0].scrollHeight;
				var contHeight = winHeight - 93;
				if(filHeight > contHeight && $('.ly_filter').is(':visible')) {
					$('.ly_filter').css({overflowY:'scroll',height:contHeight});
					$('html,body').css({overflow:'hidden'});
				} else {
					$('.ly_filter').css({overflowY:'auto',height:'auto'});
					$('html,body').css({overflow:''});
				}
			}
		},
		detailInfo: function() {
			if($('.cont_detail .ly_info').length) {
				var winHeight = $(window).height();
				var filHeight = $('.cont_detail .ly_info')[0].scrollHeight;
				var contHeight = winHeight - 213;
				if(filHeight > contHeight && $('.cont_detail .ly_info').is(':visible')) {
					$('.cont_detail .ly_info').css({overflowY:'scroll',height:contHeight});
					$('html,body').css({overflow:'hidden'});
				} else {
					$('.cont_detail .ly_info').css({overflowY:'auto',height:'auto'});
					$('html,body').css({overflow:''});
				}
			}
		}
	};
	$(document).bind('click', '.bn_filter', function(e){
		if(!$('.srlst_bx').length) {
			layerResize.filter();
		}
	});
	// 상품상세 플로팅 메뉴 강제 높이 조정 (공간이 좁을 경우)
	$(document).bind('click', '.btn_info', function(e){
		layerResize.detailInfo();
	});

	// 로그인 레이어 출력 함수
	function popupLogin(params) {
		if(!_.isObject(params)) var params = {};
		if(_.isUndefined(params.url)) {
			params.url = document.location.pathname;// url 없으면 강제로 현재페이지 설정
		}
		$('#popup-login').modal({
			remote: '/app/member/login_pop',
			cache: false,
			params: params,//url 파라미터는 url로 target_url 아님
			show: true
		});
	}

	// 디바이스 오리엔트 설정
	function setOrientation() {
		var orient = Math.abs(window.orientation) === 90 ? 'landscape' : 'portrait';
		if(!$('body').hasClass(orient)) commonDom.body.removeClass('landscape portrait').addClass(orient);
		if($('#lnb').length) {
			if(orient == 'landscape') {
				$('.swipe-portrait').hide();
				$('.swipe-landscape').show();
			} else {
				$('.swipe-portrait').show();
				$('.swipe-landscape').hide();
			}
		}
	}
	$(window).load(function() { setOrientation(); });
	$(window).on('orientationchange resize', function(e) {
		if (e.type != 'resize') {
			setOrientation();
			var orientEvent = $.Event('ps.orientation');
			$(window).trigger(orientEvent);
		} else {
			layerResize.filter();
			layerResize.detailInfo();
		}
		topBannerFix();

		if($(".js-goods-description").length) {
			$(".js-goods-description img").css("max-width",$(window).width()-20);
		}

		if($(".js-goods-detail_infotext").length) {
			$(".js-goods-detail_infotext img").css("max-width",$(window).width()-40);
		}

	});

	// 배너 닫기
	$('.banner .cls').click(function(e){
		e.preventDefault();
		$('.banner').hide();
		topBannerFix();
	});

	// 푸터 로그인 레이어 출력
//	$('.js_login_open').on('click', function(e){
//		e.preventDefault();
//		popupLogin();
//	});

	// 상단으로 이동
	$(document).on('click', 'a[href=#top]', function(e) {
		e.preventDefault();
//		$('.st-content').animate({scrollTop: 0}, 'fast');
		$('body').animate({scrollTop: 0}, 'fast');
	});

	// 체크박스 전체 선택해제
	$('.js_check_all' ).on('click', function() {
		$( '.js_check' ).prop( 'checked', this.checked );
	});
	$('.js_check').on('click', function(){
		$('.js_check').each(function(idx){
			if($(this).prop('checked') == false) {
				$('.js_check_all').prop('checked', false);
				return false;
			}
		});
	});

	// 체크박스 전체 선택 이벤트
	if ($(':checkbox.gd_checkbox_all').length > 0) {
		// 이벤트 중복 실행을 막아준다.
		$(':checkbox.gd_checkbox_all').off('click');
		$(':checkbox.gd_checkbox_all').click(function (e) {
			var $target = $(e.target);
			var targetName = $target.data('target-name');
			var targetId = $target.data('target-id');
			var targetFormName = $target.data('target-form');
			if (typeof targetFormName == 'undefined') targetFormName = "";
			if (_.isUndefined(targetId)) {
				$(targetFormName + ' :checkbox[name="' + targetName + '"]').prop('checked', !$target.prop('checked')).trigger('click');
			} else {
				$(targetFormName + ' :checkbox[id*="' + targetId + '"]').prop('checked', !$target.prop('checked')).trigger('click');
			}
		});
	}

	// 뒤로 이동
	$(document).on('click', '.js_bn_back', function(e){
		e.preventDefault();
		if(document.referrer.indexOf(document.location.hostname) != -1) {
//			if(location.hash.indexOf('#') != -1) history.go(-2);
			history.go(-1);
		} else {
			location.href = '/';
		}
	});

	$(document).on('click', '#header .sub .js_page_reload', function(e){
		e.preventDefault();
		window.location.reload();
	});

	// 스크롤시 TOP 버튼 출력
	var rememberPositionY = 0;
	// 배너 노출에 따른 CSS조정으로 배너의 비율을 반듯이 동일한 가로/세로 비율로 맞춰야 정상 노출이 가능하다.
	var topBannerFix = function() {
		var height =$("#header").height();
		$('#container').css({paddingTop:height});

		/*
		 if(!$('.head.sub').length) {
		 var height = Math.ceil(($('#header .banner').outerWidth() / 5.21)) + 30;
		 if(Math.abs(window.orientation) === 90 && $('#header .banner').outerWidth() > 1) height = 90;

		 $('#header.fix').css({marginBottom:-height});
		 $('#container').css({paddingTop:height});
		 } */
	};
	topBannerFix();
	$(document).scroll(function() {
//		if (!$(this).find('#wrap').hasClass('pop_header')) {
//			if ($(this).scrollTop() > commonDom.topBanner.outerHeight()) commonDom.header.addClass('fix');
//			else commonDom.header.removeClass('fix');
//		}
		// 스크롤 위로 이동시 앵커 노출
		if ($(this).scrollTop() < rememberPositionY) commonDom.topAnchor.show();
		else commonDom.topAnchor.hide();
		rememberPositionY = $(this).scrollTop();
	});

	// GNB 검색하기
	commonDom.searchForm.submit(function(e) {
		var keyword = commonDom.keyword.val();
		if(keyword.length < 1) {
			alert('검색어를 1자 이상 입력해주세요.');
			return false;
		}

		//storage.saveVal(kRecentKeywordList, keyword);

		$(this).submit();
	});

    // 검색버튼 클릭
	commonDom.searchBn.click(function(e){
		$('#popup-search').modal({
			show: true
		});
		commonDom.keyword.focus();
	});

    // 검색 텍스트박스
	commonDom.keyword
		.click(function(e){
			if($(this).val().length > 0) {
				$(this).focus().val($(this).val());//키워드가 있는 경우 마지막 문자로 이동
			} else $(this).focus();
		})
		.on("focus", function(e) {
			// e.stopPropagation();
		})
		.on("blur", function(e) {

		})
		.on("keyup", function(e) {// 키보드입력
			var str = $(this).val();
			if(str.length > 0)
				commonDom.searchClearBn.show();
			else
				commonDom.searchClearBn.hide();
		});

    // 검색 클리어버튼
	commonDom.searchClearBn.click(function(e){
		commonDom.keyword.val('');
		commonDom.keyword.trigger('click');
		commonDom.keyword.trigger('keyup');
	});

    // 최근검색어 삭제
    commonDom.recentKeywordDeleteBn.click(function(e){
        e.stopPropagation();
        $self = $(this);
        $.post('../goods/goods_ps.php', {
            'mode': 'delete_recent_keyword',
            'keyword': $(this).data('recent-keyword')
        }, function (data, status) {
            // 값이 없는 경우 성공
            if (status == 'success' && data == '') {
                if ($self.closest('ul').find('li').length == 1) {
                    $self.closest('li').remove();
                    $('.js-recent-all-delete').remove();
                    $('.recent_list ul.lst').append('<li class="no-data"><a>' + __('최근 검색어가 없습니다.') + '</a></li>');
                } else {
                    $self.closest('li').remove();
                }
            } else {
                console.log('request fail. ajax status (' + status + ')');
            }
        });
    });

    // 최근검색어 전체 삭제
    commonDom.recentKeywordAllDeleteBn.click(function(e){
        e.stopPropagation();
        $.post('../goods/goods_ps.php', {
            'mode': 'delete_recent_all_keyword'
        }, function (data, status) {
            // 값이 없는 경우 성공
            if (status == 'success' && data == '') {
                $('.recent_list ul.lst li').remove();
                $('.js-recent-all-delete').remove();
                $('.recent_list ul.lst').append('<li class="no-data"><a>' + __('최근 검색어가 없습니다.') + '</a></li>');
            } else {
                console.log('request fail. ajax status (' + status + ')');
            }
        });
    });

    // 패스워드 인증 레이어창 닫기 클릭
    $('.cite-layer .close').click(
        function() {
            $('input[name="writerPw"]').val('');
            $(this).parent().parent().addClass('dn');
            $('#layerDim').addClass('dn');
            $('html').removeClass('oh-space');
            $('#scroll-left, #scroll-right').removeClass('dim');
            return false;
        }
    );

    // 장바구니 이동 레이어창 닫기 클릭
    $(document).on('click', '.add-cart-layer .btn-close', function() {
		$('#addCartLayer').addClass('dn');
        $('#layerDim').addClass('dn');
	});

    // 찜리스트 레이어창 닫기 클릭
    $(document).on('click', '.add-wish-layer .btn-close', function() {
        $('#addWishLayer').addClass('dn');
        $('#layerDim').addClass('dn');
    });
});
