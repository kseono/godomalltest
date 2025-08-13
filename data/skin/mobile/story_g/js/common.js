String.prototype.URLEncode = function URLEncode() {
	var s0, i, s, u, str;
	s0 = ""; // encoded str
	str = this; // src
	for (i = 0; i < str.length; i++) { // scan the source
		s = str.charAt(i);
		u = str.charCodeAt(i); // get unicode of the char
		if (s == " "){s0 += "+";} // SP should be converted to "+"
		else {
			if ( u == 0x2a || u == 0x2d || u == 0x2e || u == 0x5f
				|| ((u >= 0x30) && (u <= 0x39)) || ((u >= 0x41) && (u <= 0x5a))
				|| ((u >= 0x61) && (u <= 0x7a))) { // check for escape
				s0 = s0 + s; // don't escape
			} else { // escape
				if ((u >= 0x0) && (u <= 0x7f)){ // single byte format
					s = "0"+u.toString(16);
					s0 += "%"+ s.substr(s.length-2);
				} else if (u > 0x1fffff){ // quaternary byte format (extended)
					s0 += "%" + (oxf0 + ((u & 0x1c0000) >> 18)).toString(16);
					s0 += "%" + (0x80 + ((u & 0x3f000) >> 12)).toString(16);
					s0 += "%" + (0x80 + ((u & 0xfc0) >> 6)).toString(16);
					s0 += "%" + (0x80 + (u & 0x3f)).toString(16);
				} else if (u > 0x7ff) { // triple byte format
					s0 += "%" + (0xe0 + ((u & 0xf000) >> 12)).toString(16);
					s0 += "%" + (0x80 + ((u & 0xfc0) >> 6)).toString(16);
					s0 += "%" + (0x80 + (u & 0x3f)).toString(16);
				} else { // double byte format
					s0 += "%" + (0xc0 + ((u & 0x7c0) >> 6)).toString(16);
					s0 += "%" + (0x80 + (u & 0x3f)).toString(16);
				}
			}
		}
	}
	return s0;
};

/*
 Funcion : layerView
 레이어 박스 출력

 Parameters:
 obj		- 객체
 id		- 출력할 layer id명
 top 	- layer top 위치
 left	- layer left 위치

 See Also:
 <layerHidden>
 */
function layerView(obj, id, top, left) {

	var offset = $(obj).offset();
	$("#" + id).css("top", offset.top + top);
	$("#" + id).css("left", offset.left + left);
	$("#" + id).show();
}

/*
 Funcion : layerHidden
 레이어 박스 닫기

 Parameters:
 id		- 닫을 layer id명

 See Also:
 <layerHidden>
 */
function layerHidden(id) {

	$("#" + id).hide();
}

/*
 Funcion : layerRemove
 레이어 박스 제거

 Parameters:
 id		- 제거할 layer id명

 See Also:
 <layerHidden>
 */
function layerRemove(id) {

	$("#" + id).remove();
}

/*
 Funcion : mouseOver
 mouseover 시 변환된 이미지 리턴

 Parameters:
 obj	- 이미지 변환할 객체

 See Also:
 <mouseOut>, <reverseSrc>
 */
function mouseOver(obj) {

	obj.src = reverseSrc(obj.src, true);
	return obj.src;
}

/*
 Funcion : mouseOut
 mouseout 시 변환된 이미지 리턴

 Parameters:
 obj	- 이미지 변환할 객체

 See Also:
 <layerHidden>, <reverseSrc>
 */
function mouseOut(obj) {

	obj.src = reverseSrc(obj.src, false);
	return obj.src;
}

/*
 Funcion : reverseSrc
 이미지 변환

 Parameters:
 src		- 변환 시킬 이미지 소스
 flag	- 변환 여부

 See Also:
 <mouseOver>, <mouseOut>
 */
function reverseSrc(src, flag) {

	var url = src;
	var tmp_arr = url.split("/");
	var file_name = tmp_arr[tmp_arr.length-1];
	var set_name = null;
	if ( flag )
	{
		re = /(_on\.)/gi;
		if ( re.test(file_name) )
		{
			set_name = file_name;
		}
		else
		{
			set_name = file_name.replace(/\_off/i, "_on");
		}
	}
	else
	{
		set_name = file_name.replace(/\_on/i, "_off");
	}
	return url.replace(file_name, set_name);
}

/*
 Funcion : onMouseOverCategory
 마우스 오버 시 카테고리 출력

 Parameters:
 oMenu	- 카테고리 객체
 category_id - 출력할 카테고리 레이어의 id

 See Also:

 */
function onMouseOverCategory(oMenu, category_id) {

	var osub = document.getElementById(category_id);

//	osub.innerHTML = "";
	osub.style.display = "block";
}

/*
 Funcion : onMouseOutCategory
 카테고리 숨김

 Parameters:
 category_id - 숨길 카테고리 레이어의 id

 See Also:

 */
function onMouseOutCategory(category_id) {
	document.getElementById(category_id).style.display = "none";
}

/*
 Funcion : onMouseOverCategory
 마우스 오버 시 하위 카테고리 출력

 Parameters:
 oMenu		- 카테고리 객체
 category_id - 출력할 카테고리 레이어의 id
 oTable 		- 상위 카테고리가 있는 영역
 top 		- 상위 카테고리의 top
 See Also:

 */
function onMouseOverCategory2(oMenu, oTable, category_id, top) {

	var osub = document.getElementById(category_id);
	var otb = document.getElementById(oTable);

	osub.style.top =  (27*top) - 10;
	osub.style.left =  140;
	osub.style.display = "block";
}

/*
 Funcion : allView
 전체보기

 Parameters:
 classid - 추가적으로 나타낼 레이어 박스 class명

 See Also:
 <layerHidden>
 */
function allView(classid) {

	var ff = document.getElementById("view");
	if ( ff.allview.value == "N" || ff.allview.value == "" ) {
		ff.allview.value = "Y"
		$("." + classid).show();
	}
	else {
		ff.allview.value = "N"
		$("." + classid).hide();
	}
}

/*
 Funcion : send
 상품 리스트 정렬 함수

 Parameters:
 sort		- 정렬할 조건

 See Also:

 */
function send(sort) {

	var ff = document.f1;
	ff.sort.value = sort;
	ff.page.value = 1;

	var brand = ff.brand.value;
	var list_kind = ff.list_kind.value;
	var display_cnt = ff.display_cnt.value;
	var free_dlv = ff.free_dlv.value;
	var sale_goods = ff.sale_goods.value;
	var u_cat_cd = ff.u_cat_cd.value;


	ff.method = "get";
	ff.action = ff.action + "?brand=" + brand + "&list_kind=" + list_kind + "&sort=" + sort + "&display_cnt=" + display_cnt + "&free_dlv=" + free_dlv + "&sale_goods=" + sale_goods
	"&u_cat_cd=" + u_cat_cd ;

	ff.submit();
}

/*
 Funcion : opacity
 투명도를 조절하는 함수

 Parameters:
 s	- 투명도를 적용할 영역
 val - 투명도 값

 See Also:

 */
function opacity(s, val) {

	if ( navigator.appName.indexOf("Explorer") != -1 ) {
		s.style.filter="Alpha(opacity=" + val + ")";
	} else {
		s.style.opacity= val/100;
	}
}

/*
 Funcion : listSwatch
 상품 리스트 변환 함수

 Parameters:
 d_cat_cd		- 전시 카테고리 코드
 list_kind		- 리스트 종류
 pint_area		- 리스트 출력 영역
 sort			- 리스트 정렬 조건
 display_cnt		- 리스트 상품 출력 수
 brand			- 브랜드
 See Also:

 */
function listSwitch(form, list_kind) {

	form.list_kind.value = list_kind;

	for ( var i = 0 ; i < $(".goods_list_kind a").length ; i++ )
	{
		var src = $(".goods_list_kind a:eq(" + i + ")").removeClass('selected');
	}

	if (list_kind == 'small')
	{
		src = $(".goods_list_kind a:eq(0)").addClass('selected');
	}
	else if (list_kind == 'detail')
	{
		src = $(".goods_list_kind a:eq(1)").addClass('selected');
	}

	var service_url = "/app/util/listSwitch";
	var param = formData2QueryString(form);

	$.ajax({
		type: "POST",
		url: service_url,
		data : param,
		success: function(msg)
		{
			document.getElementById('goods_list').innerHTML = msg;
		}
	});
	return false;
}

/*
 Funcion : listSwitchPage
 상품 리스트 페이지 변환 함수

 Parameters:
 d_cat_cd	- 전시 카테고리 코드
 pint_area	- 리스트 출력 영역
 sort			- 리스트 정렬 조건
 display_cnt	- 리스트 상품 출력 수
 brand			- 브랜드
 See Also:
 */

function listSwitchPage(form, page) {

	var list_kind = form.list_kind.value;
	form.page.value = page;

	var param = decodeURI(formData2QueryString(form));

	var url = form.action + "?" + param;

	document.location.href = url;
}

/*
 Funcion : mouseOverImage
 이미지 변환(이미지 파일명 끝에 _ov 붙임)

 Parameters:
 src		- 변환 시킬 이미지 소스

 See Also:
 <mouseOverImage>, <imageView>
 */
function mouseOverImage(src) {

	return src.replace(/_off\.gif/, '_on.gif');
}

/*
 Funcion : mouseOutImage
 이미지 변환(이미지 파일명 끝에 _on 제거)

 Parameters:
 src		- 변환 시킬 이미지 소스

 See Also:
 <mouseOverImage>, <imageView>
 */
function mouseOutImage(src) {

	return src.replace(/_on\.gif/, '_off.gif');
}

/*
 Funcion : viewSize
 사이즈 보기

 Parameters:
 obj         - 해당상품 객체
 goods_no    - 해당상품 번호
 goods_sub   - 해당상품 하위번호

 See Also:
 <getUnixTime>
 */
function viewSize(obj, goods_no, goods_sub) {
	if($(obj).next().hasClass("btn_sizelist")) {
		$("ul.btn_sizelist").remove();
		return;
	}
	$("ul.btn_sizelist").remove();

	$.ajax({
		type: "GET",
		url: "/app/svc/optionList/" + goods_no + "/" + goods_sub + "?" + getUnixTime(),
		success: function(msg){
			$(obj).after(msg);
		}
	});

	return;
}

/*
 Funcion : viewMemberPrice
 회원가격 보기

 Parameters:
 obj			- 해당상품 객체
 price		- 해당상품 판매가격

 See Also:
 <getUnixTime>
 */
function viewMemberPrice(obj, price) {

	$("#mpLayer").empty();

	$.ajax({
		type: "GET",
		url: "/app/svc/member_price/" + price + "?" + getUnixTime(),
		success: function(msg){
			$("#mpLayer").append(msg);
		}
	});

	$(obj).hover(
		function(){},
		function()
		{
			$("#mpLayer").empty();
		}
	);
	return;
}
/*
 Funcion : getUnixTime
 현재 시간 데이터 얻기

 Parameters:

 See Also:
 */
function getUnixTime() {

	var d = new Date();
	return d.getTime();
}

/*
 Funcion : loginChk
 로그인 여부 확인

 Parameters:

 See Also:
 */
function loginChk() {

	var result = "0";

	$.ajax({
		type: "GET",
		async: false,
		url: "/app/member/login_check",
		success: function(msg){
			eval("var json = " + msg);
			result = json.result;
		}
	});

	if ( result == "1")
	{
		return true;
	}
	else
	{
		return false;
	}
}

/*
 Funcion : gdscroll
 scroll 위치 이동(위, 아래)

 Parameters:
 gap - 이동 픽셀 ( + : 위, - : 아래 )

 See Also:
 */
function gdscroll(gap)
{
	var gdscroll = document.getElementById('gdscroll');
	gdscroll.scrollTop += gap;
}

/*
 Funcion : couponDown
 쿠폰 다운

 Parameters:
 url 		- 현재 url
 goods_no 	- 상품번호
 goods_sub	- 상품 하위번호

 See Also:
 */
function couponDown(url, goods_no, goods_sub) {
	var target_url = encodeURIComponent("/app/product/detail/" + goods_no + "/" + goods_sub);
	var service_url = "/app/contents/coupon_down/" + goods_no + "/" + goods_sub;

	if ( !loginChk() )
	{
		alert(__("다시 로그인하여 주십시오."));
		document.location.href = "/app/member/login?target_url=" + target_url;
		//	document.location.reload("/app/member/login?target_url=" + target_url);
		return false;
	}

	$.ajax({
		type: "GET",
		url: service_url,
		success: function(msg){
			$("#coupon_down_layer").show();
			$("#coupon_down_layer").html(msg);
		}
	});

	//$("#" + div_id).jqm();
	//$("#" + div_id).jqm({modal:true});
	//$("#" + div_id).jqmShow();

	return false;

}

/*
 Funcion : viewBaesongInfo
 배송정보 레이어 출력

 Parameters:
 obj 	- 해당객체
 div_id	- 배송정보 레이어 박스 id명

 See Also:
 */
function viewBaesongInfo(obj, div_id, top, left) {

	var offset = $(obj).offset();
	$("#" + div_id).css("top",offset.top + top);
	$("#" + div_id).css("left",offset.left - left);
	$("#" + div_id).show();

	return false;
}

/*
 Funcion : viewCard_interest
 무이자 할부 안내 레이어 박스 출력

 Parameters:
 obj 	- 해당객체
 div_id	- 배송정보 레이어 박스 id명

 See Also:
 */
function viewCard_interest(obj, div_id, top, left) {

	var offset = $(obj).offset();
	$("#" + div_id).css("top",offset.top + top);
	$("#" + div_id).css("left",offset.left - left);
	$("#" + div_id).show();

	return false;
}
/*
 Funcion : login_popup
 로그인 팝업 창 생성 함수

 Parameters:

 See Also:
 */
function login_popup(width, height) {

	openWindow('../app/member/login_pop', 'login_pop', 'resizable=yes,scrollbars=yes', width, height, true);
}

/*
 Funcion : openerLocation
 부모창  Location 함수

 Parameters:
 url - 이동경로
 See Also:
 */

function openerLocation(url) {

	opener.document.location.href = url;
	self.close();
}

/*
 Funcion : viewContent
 상세 내용 및 답변 보기

 Parameters:
 id1 - 상세 내용 id
 id2 - 답변 내용 id
 id3 - 덧글 내용 id

 See Also:
 */
function viewContent(id1, id2, id3)
{
	if ( document.getElementById(id1) != null )
	{
		document.getElementById(id1).style.display = ( document.getElementById(id1).style.display == "none" ) ? "":"none";
	}
	if ( document.getElementById(id2) != null )
	{
		document.getElementById(id2).style.display = ( document.getElementById(id2).style.display == "none" ) ? "":"none";
	}
	if ( document.getElementById(id3) != null )
	{
		document.getElementById(id3).style.display = ( document.getElementById(id3).style.display == "none" ) ? "":"none";
	}
}

/*
 Funcion : onlynumber
 숫자만 입력 가능

 Parameters:

 See Also:
 */
function onlynumber() {

	if ( window.event == null ) return;

	var e = event.keyCode;

	if (e>=48 && e<=57) return;
	if (e>=96 && e<=105) return;
	if ( e==8 || e==9 || e==13 || e==37 || e==39) return; // tab, back, ←,→
	event.returnValue = false;
}

/*
 Funcion : checkQty
 구매수량 체크

 Parameters:
 loc - 구매수량 입력폼

 See Also:
 */
function checkQty(loc) {
	if(loc.value == "" || loc.value == 0){
		loc.value = "1";
		loc.focus();
		loc.select();
		return false;
	}

	if(/[^0123456789]/g.test(loc.value)) {
		loc.value = "1";
		loc.focus();
		loc.select();
		return false;
	}
}

/*
 Funcion : popup_zipcode
 우편번호 검색 팝업 창 생성

 Parameters:
 control_name1 - 우편번호
 control_name2 - 시, 도
 control_name3 - 구, 군
 control_name4 - 동

 See Also:
 */
function popup_zipcode(control_name1, control_name2, control_name3, control_name4, width, height) {

	openWindow("/app/util/find_zip_post/?name1=" + control_name1 + "&name2=" + control_name2 + "&name3=" + control_name3 + "&name4=" + control_name4, 'find_zip', 'resizable=yes,scrollbars=yes', width, height, true);
}

/*
 Funcion : layer_zipcode
 우편번호 검색 레이어 생성

 Parameters:
 control_name1 - 우편번호
 control_name2 - 시, 도
 control_name3 - 구, 군
 control_name4 - 동

 See Also:
 */
function layer_zipcode(control_name1, control_name2, control_name3, control_name4, width, height) {

	var div_id = "popPost";
	$.ajax({
		type: "get"
		, url: "/app/util/find_zip_post/?name1=" + control_name1 + "&name2=" + control_name2 + "&name3=" + control_name3 + "&name4=" + control_name4
		, success: function(msg) {
			$("#" + div_id).html(msg);
			var top = ( $(window).scrollTop() + ($(window).height() - $("#" + div_id).height()) / 2 );
			var left = ( $(window).scrollLeft() + ($(window).width() - $("#" + div_id).width()) / 2 );
			$("#" + div_id).css("top", $(window).scrollTop());
			$("#" + div_id).css("left", left);
			$("#" + div_id).show(msg);
		}
	});
}

function popup_coupon(coupon_no) {

	var coupon_no= coupon_no;
	openWindow("/app/contents/coupon_products?coupon_no=" + coupon_no, 'coupon', 'resizable=yes,scrollbars=yes', 970, 735, true);
	//close();
}

function popup_partner(type)
{
	if( type == "partner")
	{
		var win = window.open("/app/company/partner", "partner", "width=662, height=600");
		win.focus();
	}
	else if (type == "recruit")
	{
		var win = window.open("/app/company/recruit", "recruit", "width=662, height=635");
		win.focus();
	}
	//close();
}

/*
 Funcion : more_list
 리스트 더보기 함수

 Parameters:
 cat_cd	- 카테고리 코드
 kind	- 페이지 종류

 See Also:
 */
function more_list(cat_cd, kind)
{
	// 기본기능 구현,,, 추후 임팩트 작업
	if (kind =="newArrival") {
		var target_url = "/app/contents/new_goods_more/00" + cat_cd;
	} else if (kind =="onSale") {
		var target_url = "/app/contents/OnSaleMore/00200" + cat_cd;
	}


	if($("#more_list" + cat_cd).css('display') == "none")
	{
		$.ajax({
			type: "GET",
			url: target_url,
			success: function(msg){
				if (msg != "") {
					$("#more_list" + cat_cd).show();
					$("#more_list" + cat_cd).html(msg);
					$("#more" + cat_cd).attr('src',"/media/img/contents/new/view_out.gif");
				}
			}
		});
	}
	else
	{
		$("#more_list" + cat_cd).hide();
		$("#more" + cat_cd).attr('src',"/media/img/contents/new/view_plus.gif");
	}
}

// 화면에서 팝업 또는 레이어의 값으로 나눠서 위치를 반환
function getWidthPosition(w){
	var x = ((document.documentElement.clientWidth - w) / 2) + document.documentElement.scrollLeft;
	return x;
}

// 화면에서 팝업 또는 레이어의 값으로 나눠서 위치를 반환
function getHeightPosition(h){
	var y = ((document.documentElement.clientHeight - h) / 2) + document.documentElement.scrollTop;
	return y;
}

function LoginCheckUrl(url) {
	if ( !loginChk() ) {
		if ( confirm(__("회원전용입니다.%1$s로그인 하시겠습니까?", "\n\n")) ) {
			document.location.href = 'http://nwww.musinsa.com/?mod=login';
		} else {
			return false;
		}
	} else {
		document.location = url;
	}
}

function goCategory(d_cat_cd){
	if(d_cat_cd !=""){
		document.location = "/app/category/lists/" + d_cat_cd;
	} else{
		alert(__("카테고리를 선택해 주세요."));
		return false;
	}
}

// 메뉴 플래시에 대한 함수
function BtnClickChkEvent(mode){

	//오픈 모드
	if(mode == "open"){
		document.getElementById('flashArea').style.position = "";
	} else {
		document.getElementById('flashArea').style.position = "relative";
	}
}

function order_cancel_cmd()
{
	ff = document.lf1;

	var ord_no = ff.ord_no.value;
	var cancel_reason = ff.cancel_reason.value;

	if( ff.cancel_reason.selectedIndex == 0  )
	{
		alert(__('주문취소 사유를 선택해 주세요.'));
		ff.cancel_reason.focus();
		return false;
	}
	/*
	 if( ff.cancel_content.value == ""  )
	 {
	 alert('주문취소 내용를 입력하지 않으셨습니다.');
	 ff.cancel_content.focus();
	 return false;
	 }
	 */
	if(!confirm(__("주문 취소를 하시겠습니까?"))){
		return false;
	}

	$.ajax({
		type: "POST",
		url: "/app/mypage/order_cancel_cmd?ord_no=" + ord_no + "&cancel_reason=" + cancel_reason,
		success: function(msg){
			if(msg == 1){
				alert(__("주문이 정상적으로 취소 되었습니다."));
				opener.location = "/app/mypage/order_view/?ord_no=" + ord_no;
				self.close();
			} else {
				alert(__("[주문 취소 실패] 관리자에게 문의하시기 바랍니다."));
			}
		}
	});
}

function checkTime()
{
	// 1. 시간 체크(클라이언트 vs 서버)
	$.ajax({
		type: "POST"
		, async: false
		, url: "/app/svc/get_sever_unix_time"
		, success: function(msg) {
			var server_time = msg;
			var now = new Date();
			var now_unix = now.getTime();
			var client_time = Math.floor(now_unix / 1000);
			if ( Math.abs(server_time - client_time) > 500 ) {
				alert(__('고객님 컴퓨터의 시간이 정확하지 않습니다.%1$s시간을 조정하신 후 이용해 주시기 바랍니다.', '\n'));
			}
		}
	});
}

/* 남은 시간 카운터 */
function calcDDay(goods_no,goods_sub,diff_time){
	var day, hour, min, sec, mod = "";

	// 남은 일수
	day = Math.floor(diff_time/(3600*24));
	mod = diff_time % (24*3600);

	if(document.getElementById("diff_day_" + goods_no + "_" + goods_sub)){
		document.getElementById("diff_day_" + goods_no + "_" + goods_sub).innerHTML = day;
	}

	// 남은 시간
	hour = Math.floor(mod/3600);
	mod = diff_time % 3600;

	if(document.getElementById("diff_hour_" + goods_no + "_" + goods_sub)){
		document.getElementById("diff_hour_" + goods_no + "_" + goods_sub).innerHTML = hour;
	}

	// 남은 분
	min = Math.floor(mod/60);

	if(document.getElementById("diff_min_" + goods_no + "_" + goods_sub)){
		document.getElementById("diff_min_" + goods_no + "_" + goods_sub).innerHTML = min;
	}

	// 남은 초
	sec = mod % 60;

	if(document.getElementById("diff_second_" + goods_no + "_" + goods_sub)){
		document.getElementById("diff_second_" + goods_no + "_" + goods_sub).innerHTML = sec;
	}
}

function get_recent_board_req_data(objid){
	var page_index = document.getElementById(objid).getAttribute('page_index');
	$.ajax({
		type: "POST",
		url: "/app/svc/get_update_news",
		data: 'page='+page_index,
		success: function(msg){
			if(msg){
				var _ret = msg.split('<!--AJAX SPLIT-->');
				document.getElementById(objid).innerHTML += _ret[0];
				page_index++;
				document.getElementById(objid).setAttribute('page_index',page_index);
				//if(_ret[0]<1) document.getElementById(objid+'_more').style.display = 'none';
				//else document.getElementById(objid+'_more').style.display = '';
				//페이스북 좋아요 버튼
				//span 의 노드를 구함
				var _tmp_nodes = document.getElementById(objid).getElementsByTagName('span');
				for(var i=0;i<_tmp_nodes.length;i++){
					//좋아요 버튼을 감싼 span 이면서(sns값이 fb) 이미 렌더하지 않았다면(snsdo 값이 done 이 아닌것들만) 렌더후  snsdo 를 done 으로 셋팅 = 중복방지
					if(_tmp_nodes[i].getAttribute('sns')=='fb' && _tmp_nodes[i].getAttribute('snsdo')!='done') {
						FB.XFBML.parse( _tmp_nodes[i]);
						_tmp_nodes[i].setAttribute('snsdo','done');
					}
				}
			}
		}
	});
}

function brandshop_send(sort)
{
	var ff = document.f1;
	ff.sort.value = sort;

	var d_cat_cd = ff.d_cat_cd.value;
	var u_cat_cd = ff.u_cat_cd.value;
	var display_cnt = ff.display_cnt.value;

	ff.page.value = 1;

	ff.action = ff.action + "?sort=" + sort + "&d_cat_cd=" + d_cat_cd + "&u_cat_cd=" + u_cat_cd + "&display_cnt=" + display_cnt;
	//ff.action = ff.action + "?sort=" + sort + "&d_cat_cd=" + d_cat_cd + "&page=" + page + "&display_cnt=" + display_cnt;

	ff.submit();
}

function sale_send(type, obj, obj_value, obj2, obj2_value) {
	var ff = document.f1;

	if(obj)		obj.value = obj_value;
	if(obj2)	obj2.value = obj2_value;

	if(type == "d_cat_cd"){
		ff.brand.value = "";
	}

	ff.submit();
}

//마이페이지 주문상세용 스크립트 S

//수령 확인
function ChangePointStatus(ord_opt_no) {
	var ff = document.f1;
	var page = ff.page.value;
	if (confirm(__('주문하신 상품을 수령하셨습니까?'))) {
		$.ajax({ type: "POST", data: "ord_opt_no=" + ord_opt_no + "&page="+ page ,url: "/app/mypage/get_point", success:
			function(msg) {
				if(msg == 1) {
					document.location.reload();
				}else {
				}
			}
		});
	}
}

//주문 취소 팝업
function order_cancel(ord_no, page) {
	openWindow("/app/svc/order_cancel/" + ord_no + "/" + page, "qa", "resizable=no,scrollbars=no", 420, 188, true);
}

//카드 영수증 출력창
function cashVill(tno){
	window.open("https://admin.kcp.co.kr/Modules/Sale/Card/ADSA_CARD_BILL_Receipt.jsp?c_trade_no=" + tno , "_blank", "width=370, height=730, toolbar=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no" );
}

//마이페이지 주문상세용 스크립트 E

//마이페이지 위시리스트용 스크립트 S
function deleteWish(no) {
	if( confirm(__('정말 삭제하시겠습니까?')) ){
		var ff = document.f1;
		ff.wish_goods.value = no;
		ff.action = '../app/mypage/wishlist/delete';
		ff.submit();
	}
}

function deleteAllWish() {
	if( confirm("정말 삭제하시겠습니까?") ){
		var ff = document.f1;
		var checked_goods = $("input[name='wish']");
		var goods = new Array();

		for ( var i = 0 ; i < checked_goods.length ; i++ ) {
			var info = $(checked_goods[i]).attr("value");
			goods.push(info);
		}
		var tmp_str = goods.join('.');

		if ( tmp_str != "" ) {
			ff.wish_goods.value = tmp_str;
			ff.action = '../app/mypage/wishlist/delete';
			ff.submit();
		}
	}
}

function moveWish() {

	var checked_goods = $("input[name='wish']");
	var goods = new Array();
	for ( var i = 0 ; i < checked_goods.length ; i++ ) {
		if(checked_goods[i].checked){
			var info = $(checked_goods[i]).attr("value");
			goods.push(info);
		}
	}
	var tmp_str = goods.join('.');

	if ( tmp_str != "" ) {
		var ff = document.f1;
		ff.wish_goods.value = tmp_str;
		ff.action = '../app/mypage/wishlist/move';
		ff.submit();
	} else {
		alert(__('상품을 선택하여 주십시오.'));
	}
}

//마이페이지 위시리스트용 스크립트 E


function resizeContentsCmd(obj, width)
{
	for( var i=0; i<obj.length; i++)
	{
		var org_width = obj[i].width;
		var org_height = obj[i].height;
		/*
		 // 컨텐츠의 넓이가 브라우져의 넓이보다 클 경우에만
		 //if(org_width > width){
		 obj[i].width = width-10;
		 var chg_width = obj[i].width;
		 var chg_height = org_height / org_width * chg_width;
		 obj[i].height = chg_height;
		 //}
		 */

	}
}
