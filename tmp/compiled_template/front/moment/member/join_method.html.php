<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/member/join_method.html 000004417 */ ?>
<?php $this->print_("header",$TPL_SCP,1);?>

<div class="content_box">
	<div class="member_wrap">
		<div class="member_tit">
			<h2 class="skip"><?php echo __('회원가입')?></h2>
		</div>
		<!-- //member_tit -->
		<div class="member_cont">

			<div class="member_login_box">
				<div class="member_login_shop">
					<a href="#" id="btnJoin" class="shop_mall_join" ><span><?php echo __('쇼핑몰 회원가입')?></span></a>
				</div>

				<div class="member_sns_login">
<?php if($TPL_VAR["usePaycoLogin"]){?>
					<a href="#" class="btn_payco_login js_btn_payco_login" data-payco-type="join_method"><img src="/data/skin/front/moment/img/etc/pc_payco_join.png" alt="<?php echo __('PAYCO')?> <?php echo __('아이디 회원가입')?>"></a>
<?php }?>
<?php if($TPL_VAR["useFacebookLogin"]){?>
					<a href="#" class="btn_facebook_login js_btn_facebook_login" data-sns-type="join_method" data-facebook-url="<?php echo $TPL_VAR["facebookUrl"]?>"><img src="/data/skin/front/moment/img/etc/pc_facebook_join.png" alt="<?php echo __('FACEBOOK')?> <?php echo __('아이디 회원가입')?>"></a>
<?php }?>
<?php if($TPL_VAR["useNaverLogin"]){?>
					<a href="#" class="btn_naver_login js_btn_naver_login" data-naver-type="join_method" data-naver-url="<?php echo $TPL_VAR["facebookUrl"]?>"><img src="/data/skin/front/moment/img/etc/pc_naver_join.png" alt="<?php echo __('네이버')?> <?php echo __('아이디 회원가입')?>"></a>
<?php }?>
<?php if($TPL_VAR["useKakaoLogin"]){?>
					<a href="#" class="btn_naver_login js_btn_kakao_login" data-kakao-type="join_method" data-return-url="<?php echo $TPL_VAR["returnUrl"]?>"><img src="/data/skin/front/moment/img/etc/pc_kakao_join.png" alt="<?php echo __('카카오')?> <?php echo __('아이디 회원가입')?>"></a>
<?php }?>
<?php if($TPL_VAR["useWonderLogin"]){?>
					<a href="#" class="btn_wonder_login js_btn_wonder_login" data-wonder-type="join_method" data-wonder-url="<?php echo $TPL_VAR["wonderReturnUrl"]?>"><img src="/data/skin/front/moment/img/etc/pc_wonder_join.png" alt="<?php echo __('위메프')?> <?php echo __('아이디 회원가입')?>"></a>
<?php }?>
<?php if($TPL_VAR["useAppleLogin"]){?>
					<a href="#" class="btn_apple_login js_btn_apple_login">
						<img id="apple_btn" src="/data/skin/front/moment/img/etc/pc_apple_join.png" alt="<?php echo __('Apple')?> <?php echo __('아이디 회원가입')?>">
						<div id="appleid-signin" style="display: none"></div>
					</a>
<?php }?>
<?php if($TPL_VAR["useGoogleLogin"]){?>
					<a href="#" class="btn_google_login js_btn_google_login" data-google-type="join_method" data-return-url="<?php echo $TPL_VAR["returnUrl"]?>"><img src="/data/skin/front/moment/img/etc/pc_google_join.png" alt="<?php echo __('구글')?> <?php echo __('아이디 회원가입')?>"></a>
<?php }?>
				</div>

				<strong class="chk_none">
					<?php echo __('SNS계정을 연동하여 빠르고 쉽고 안전하게 회원가입 할 수 있습니다.')?> <br />
					<?php echo __('이 과정에서 고객님의 데이터는 철저하게 보호됩니다.')?>

				</strong>
			</div>
		</div>
		<!-- //member_cont -->

		<div class="member_guide_txt">
			<p><?php echo __('이미 쇼핑몰 회원이세요?')?> <a href="#" id="btnLoginMember"><?php echo __('로그인')?></a></p>
		</div>

	</div>
	<!-- //member_wrap -->
</div>
<!-- //content_box -->
<script type="text/javascript">
	$(document).ready(function () {
		$('#btnJoin').click(function () {
			location.href = '../member/join_agreement.php?memberFl=personal';
		});
		$('#btnLoginMember').click(function () {
			window.location.href = '../member/login.php';
		});

<?php if($TPL_VAR["useAppleLogin"]){?>
		$("#apple_btn").on("click", startClicked);
		function startClicked(){
			$("#appleid-signin").click();
		}
<?php }?>
	});
</script>

<?php if($TPL_VAR["useAppleLogin"]){?>
<script type="text/javascript" src="https://appleid.cdn-apple.com/appleauth/static/jsapi/appleid/1/en_US/appleid.auth.js"></script>
<script type="text/javascript">
	AppleID.auth.init({
		clientId : '<?php echo $TPL_VAR["client_id"]?>',
		scope : 'name email',
		redirectURI: '<?php echo $TPL_VAR["redirectURI"]?>',
		state: '<?php echo $TPL_VAR["state"]?>',
		// usePopup: true
	});
</script>
<?php }?>

<?php $this->print_("footer",$TPL_SCP,1);?>