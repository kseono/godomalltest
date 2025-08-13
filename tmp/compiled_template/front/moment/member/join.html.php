<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/member/join.html 000008825 */  $this->include_("includeWidget");?>
<?php $this->print_("header",$TPL_SCP,1);?>

<div class="content_box">
	<div class="join_base_wrap">
		<div class="member_tit">
			<h2><?php echo __('회원가입')?></h2>
			<ol>
				<li><span>01</span> <?php echo __('약관동의')?><span><img src="/data/skin/front/moment/img/member/icon_join_step_off.png" alt="<?php echo __('약관동의')?><?php echo __('완료')?>"></span></li>
				<li class="page_on"><span>02</span> <?php echo __('정보입력')?><span><img src="/data/skin/front/moment/img/member/icon_join_step_on.png" alt="<?php echo __('정보입력')?><?php echo __('진행중')?>"></span></li>
				<li><span>03</span> <?php echo __('가입완료')?></li>
			</ol>
		</div>
		<!-- //member_tit -->
		<div class="member_cont">
			<form id="formJoin" name="formJoin" action="<?php echo $TPL_VAR["joinActionUrl"]?>" method="post">
				<input type="hidden" name="rncheck" value="<?php echo $TPL_VAR["data"]["rncheck"]?>"/>
				<input type="hidden" name="dupeinfo" value="<?php echo $TPL_VAR["data"]["dupeinfo"]?>"/>
				<input type="hidden" name="pakey" value="<?php echo $TPL_VAR["data"]["pakey"]?>"/>
				<input type="hidden" name="foreigner" value="<?php echo $TPL_VAR["data"]["foreigner"]?>"/>
				<input type="hidden" name="adultFl" value="<?php echo $TPL_VAR["data"]["adultFl"]?>"/>
				<input type="hidden" name="mode" value="join"/>
<?php if($TPL_VAR["joinField"]["businessinfo"]["use"]=='y'){?>
				<div class="join_type_box">
					<h3>회원종류</h3>
					<div class="type_select_sec">
						<div class="form_element">
							<ul>
								<li>
									<input type="radio" id="memberFlDefault" name="memberFl" class="ignore" value="personal" checked="checked"/>
									<label for="memberFlDefault" class="choice_s on" ><?php echo __('개인회원')?></label>
								</li>
								<li>
									<input type="radio" id="memberFlBusiness" name="memberFl" class="ignore" value="business"/>
									<label for="memberFlBusiness" class="choice_s" ><?php echo __('사업자회원')?></label>
								</li>
							</ul>
						</div>
					</div>
					<!-- //type_select_sec -->
				</div>
				<!-- //join_type_box -->
<?php }?>

				<!-- 회원가입/정보 기본정보 --><?php echo includewidget('member/_join_view.html')?><!-- 회원가입/정보 기본정보 -->
				<!-- 회원가입/정보 사업자정보 --><?php echo includewidget('member/_join_view_business.html')?><!-- 회원가입/정보 사업자정보 -->
				<!-- 회원가입/정보 부가정보 --><?php echo includewidget('member/_join_view_other.html')?><!-- 회원가입/정보 부가정보 -->
				<!-- 회원가입/자동등록 방지 --><?php echo includewidget('member/_join_view_captcha.html')?><!-- 회원가입/회원가입/자동등록 방지 -->

				<div class="btn_center_box">
					<button type="button" id="btnCancel" class="btn_member_cancel"><?php echo __('취소')?></button>
					<button type="button" class="btn_comfirm js_btn_join" value="<?php echo __('회원가입')?>"><?php echo __('회원가입')?></button>
				</div>
				<!-- //btn_center_box -->
			</form>
		</div>
		<!-- //member_cont -->
	</div>
	<!-- //join_base_wrap -->
</div>
<!-- //content_box -->
<script type="text/javascript">
	var paycoProfile = <?php echo $TPL_VAR["paycoProfile"]?>;
    var naverProfile = <?php echo $TPL_VAR["naverProfile"]?>;
	var thirdPartyProfile = <?php echo $TPL_VAR["thirdPartyProfile"]?>;
	var kakaoProfile = <?php echo $TPL_VAR["kakaoProfile"]?>;
	var appleProfile = <?php echo $TPL_VAR["appleProfile"]?>;
	var googleProfile = <?php echo $TPL_VAR["googleProfile"]?>;

	$(document).ready(function () {
		var $formJoin = $('#formJoin');

		$(':text:first', $formJoin).focus();

		$('#btnCancel', $formJoin).click(function (e) {
			e.preventDefault();
			top.location.href = '/';
		});

		if ($('.js_datepicker').length) {
			$('.js_datepicker').datetimepicker({
				locale: '<?php echo $TPL_VAR["gGlobal"]["locale"]?>',
				format: 'YYYY-MM-DD',
				dayViewHeaderFormat: 'YYYY MM',
				viewMode: 'days',
				ignoreReadonly: true,
				debug: false,
				keepOpen: false
			});
		}

		$('#btnPostcode').click(function (e) {
			e.preventDefault();
			$('#address-error, #addressSub-error').remove();
			$(':text[name=address], :text[name=addressSub]').removeClass('text_warning');
			gd_postcode_search('zonecode', 'address', 'zipcode');
		});

		$('#btnCompanyPostcode').click(function (e) {
			e.preventDefault();
			$('#comAddress-error, #comAddressSub-error').remove();
			$(':text[name=comAddress], :text[name=comAddressSub]').removeClass('text_warning');
			gd_postcode_search('comZonecode', 'comAddress', 'comZipcode');
		});

<?php if($TPL_VAR["joinField"]["businessinfo"]["use"]=='y'){?>
		$(':radio[name="memberFl"]').change(function () {
			var $businessinfo = $('.business_info_box');
			if (this.value == 'business') {
				$businessinfo.removeClass('dn');
				$businessinfo.find('input, select').removeClass('ignore');
			} else {
				$businessinfo.addClass('dn');
				$businessinfo.find('input, select').addClass('ignore');
			}
		});
		$(':radio[name="memberFl"]:checked').trigger('change');
<?php }?>

<?php if(($TPL_VAR["joinField"]["marriFl"]["use"]=='y'&&$TPL_VAR["joinField"]["marriDate"]["use"]=='y')||$TPL_VAR["joinField"]["birthDt"]["use"]=='y'){?>
        function sendDateData(year, month, type) {
            var dayType = '';
            var params = {
                year: year,
                month: month,
            };
            $.ajax('../share/date_select_json.php', {
                data: params,
                method: "POST",
                success: function (data) {
                    if (data !='' && data != null) {
                        if (type == 'marry') {
                            dayType = 'marriDay';
                        }else {
                            dayType = 'birthDay';
                        }
                        $('#'+dayType).empty();
                        $('#'+dayType).append(data);
                    }
                }
            });
        }
<?php }?>

<?php if($TPL_VAR["joinField"]["marriFl"]["use"]=='y'&&$TPL_VAR["joinField"]["marriDate"]["use"]=='y'){?>
        $(':radio[name="marriFl"]').change(function () {
			var $marridateinfo = $('.js_marridateinfo');
			if (this.value == 'y') {
				$marridateinfo.removeClass('dn');
            } else {
				$marridateinfo.addClass('dn');
                $('#marriYear option:eq(0)').prop('selected', true);
                $('#marriMonth option:eq(0)').prop('selected', true);
                $('#marriDay option:eq(0)').prop('selected', true);
            }
		});

        $('#marriYear').change(function () {
            var marriMonthVal = $('#marriMonth').val();
            if (marriMonthVal != '') {
                sendDateData($('#marriYear').val(), $('#marriMonth').val(), 'marry');
            }
        });

        $('#marriMonth').change(function () {
            var marriYearVal = $('#marriYear').val();
            if (marriYearVal != '') {
                sendDateData($('#marriYear').val(), $('#marriMonth').val(), 'marry');
            }
        });
<?php }?>

<?php if($TPL_VAR["joinField"]["birthDt"]["use"]=='y'){?>
        $('#birthYear').change(function () {
            var birthMonthVal = $('#birthMonth').val();
            if ( birthMonthVal != '') {
                sendDateData($('#birthYear').val(), $('#birthMonth').val(), 'birth');
            }
        });
        $('#birthMonth').change(function () {
            var birthYearVal = $('#birthYear').val();
            if ( birthYearVal != '') {
                sendDateData($('#birthYear').val(), $('#birthMonth').val(), 'birth');
            }
        });
<?php }?>

<?php if($TPL_VAR["joinField"]["captcha"]["use"]=='y'){?>
		$('#reload_captcha').click(function (e) {
			$('#captchaImg').removeAttr('src');
			setTimeout(function () {
				var someDate = new Date();
				someDate = someDate.getTime();
				$('#captchaImg').attr('src', '../member/captcha.php?ch=' + someDate);
			}, 1);
		}).trigger('click');
<?php }?>

        gd_select_email_domain('email');

		gd_member2.init($formJoin);

		$('.js_btn_join').click({form: $formJoin}, gd_member2.save);

		$(window).on('message', function(event) {
			if (event.originalEvent.data === 'callback_not_disabled') {
				callback_not_disabled();
			}
		});
	});


    /**
     * 회원가입시 Exception 발생하는 경우 회원가입 버튼 복원
     */
    function callback_not_disabled()
    {
        $('.js_btn_join').prop("disabled", false);
        $('.js_btn_join em').html("<?php echo __('회원가입')?>");
    }
</script>
<?php $this->print_("footer",$TPL_SCP,1);?>