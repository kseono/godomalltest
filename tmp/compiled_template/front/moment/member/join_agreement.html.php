<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/member/join_agreement.html 000016062 */ 
if (is_array($TPL_VAR["privateApprovalOption"])) $TPL_privateApprovalOption_1=count($TPL_VAR["privateApprovalOption"]); else if (is_object($TPL_VAR["privateApprovalOption"]) && in_array("Countable", class_implements($TPL_VAR["privateApprovalOption"]))) $TPL_privateApprovalOption_1=$TPL_VAR["privateApprovalOption"]->count();else $TPL_privateApprovalOption_1=0;
if (is_array($TPL_VAR["privateConsign"])) $TPL_privateConsign_1=count($TPL_VAR["privateConsign"]); else if (is_object($TPL_VAR["privateConsign"]) && in_array("Countable", class_implements($TPL_VAR["privateConsign"]))) $TPL_privateConsign_1=$TPL_VAR["privateConsign"]->count();else $TPL_privateConsign_1=0;
if (is_array($TPL_VAR["privateOffer"])) $TPL_privateOffer_1=count($TPL_VAR["privateOffer"]); else if (is_object($TPL_VAR["privateOffer"]) && in_array("Countable", class_implements($TPL_VAR["privateOffer"]))) $TPL_privateOffer_1=$TPL_VAR["privateOffer"]->count();else $TPL_privateOffer_1=0;?>
<?php $this->print_("header",$TPL_SCP,1);?>

<div class="content_box">
	<div class="join_agreement_wrap">
		<div class="member_tit">
			<h2><?php echo __('회원가입')?></h2>
			<ol>
				<li class="page_on"><span>01</span> <?php echo __('약관동의')?><span><img src="/data/skin/front/moment/img/member/icon_join_step_on.png" alt="<?php echo __('약관동의')?><?php echo __('완료')?>"></span></li>
				<li><span>02</span> <?php echo __('정보입력')?><span><img src="/data/skin/front/moment/img/member/icon_join_step_off.png" alt="<?php echo __('정보입력')?><?php echo __('완료')?>"></span></li>
				<li><span>03</span> <?php echo __('가입완료')?></li>
			</ol>
		</div>
		<!-- //member_tit -->
		<div class="member_cont">
			<form id="formTerms" name="formTerms" method="post" action="../member/join.php">
				<input type="hidden" name="token" value="<?php echo $TPL_VAR["token"]?>"/>
				<input type="hidden" name=mode value="chkRealName"/>
				<input type="hidden" name=rncheck value="none"/>
				<input type="hidden" name=nice_nm value=""/>
				<input type="hidden" name=pakey value=""/>
				<input type="hidden" name=birthday value=""/>
				<input type="hidden" name=mobile value=""/>
				<input type="hidden" name=mobileService value=""/>
				<input type="hidden" name=sex value=""/>
				<input type="hidden" name=dupeinfo value=""/>
				<input type="hidden" name=foreigner value=""/>
				<input type="hidden" name=adultFl value=""/>
				<input type="hidden" name=phone value=""/>
				<input type="hidden" name=type />

				<h3><?php echo __('약관동의')?></h3>
				<div class="join_agreement_cont">
<?php if($TPL_VAR["under14ConsentFl"]=='y'){?>
					<div class="join_agreement_box">
						<div class="form_element" id="termsAgreeDiv">
							<input type="checkbox" id="termsAgree" name="under14ConsentFl"/>
							<label class="check" for="termsAgree"> <strong>(필수)</strong><em>만 14세 이상입니다</em></label>
						</div>
					</div>
<?php }?>
					<div class="join_agreement_box">
						<div class="form_element">
							<input type="checkbox" id="allAgree"/>
							<label class="check" for="allAgree"> <em><?php echo __('%s의 모든 약관을 확인하고 전체 동의합니다.',$TPL_VAR["serviceInfo"]['mallNm'])?></em></label>
							<span>(<?php echo __('전체동의, 선택항목도 포함됩니다.')?>)</span>
						</div>
					</div>
					<!-- //join_agreement_box -->

					<div class="join_agreement_box js_terms_view">
						<div class="form_element">
							<input type="checkbox" id="termsAgree1" name="agreementInfoFl" class="require" />
							<label class="check_s" for="termsAgree1"><strong>(<?php echo __('필수')?>)</strong> <?php echo __('이용약관')?></label>
							<span><a href="../service/agreement.php?code=<?php echo $TPL_VAR["agreementInfo"]['informCd']?>" target="_blank"><?php echo __('전체보기')?></a></span>
						</div>
						<div class="agreement_box">
							<?php echo nl2br($TPL_VAR["agreementInfo"]['content'])?>

						</div>
						<!-- //agreement_box -->
					</div>
					<!-- //join_agreement_box -->

					<div class="join_agreement_box js_terms_view">
						<div class="form_element">
							<input type="checkbox" id="termsAgree2" name="privateApprovalFl" class="require" />
							<label class="check_s" for="termsAgree2"><strong>(필수)</strong> <?php echo __('개인정보 수집 및 이용')?> </label>
							<span><a href="../service/agreement.php?code=<?php echo $TPL_VAR["privateApproval"]['informCd']?>" target="_blank"><?php echo __('전체보기')?></a></span>
						</div>
						<div class="agreement_box">
							<?php echo nl2br($TPL_VAR["privateApproval"]['content'])?>

						</div>
						<!-- //agreement_box -->
					</div>
					<!-- //join_agreement_box -->

					<!-- <?php if($TPL_VAR["privateApprovalOption"][ 0]['modeFl']=='y'){?> -->
					<div class="join_agreement_box js_terms_view">
						<div class="form_element">
							<input type="checkbox" id="termsAgree3" name=""/>
							<label class="check_s" for="termsAgree3"><strong class="choice">(<?php echo __('선택')?>)</strong> <?php echo __('개인정보 수집 및 이용')?> </label>
							<span><a href="../service/agreement.php?code=<?php echo $TPL_VAR["privateApprovalOption"][ 0]['informCd']?>" target="_blank"><?php echo __('전체보기')?></a></span>
						</div>
						<div class="agreement_choice_box">
							<!-- <?php if($TPL_privateApprovalOption_1){foreach($TPL_VAR["privateApprovalOption"] as $TPL_V1){?> -->
							<table summary="<?php echo __('(선택)개인정보 수집 및 이용 내용입니다.')?>" border="0" cellpadding="0" cellspacing="0">
								<colgroup>
									<col width="10px">
									<col width="300px">
								</colgroup>
								<thead>
									<tr>
										<th><?php echo __('선택')?></th>
										<th><?php echo nl2br($TPL_V1["informNm"])?></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="form_element">
												<input type="checkbox" id="privateApprovalOption_<?php echo $TPL_V1["sno"]?>" name="privateApprovalOptionFl[<?php echo $TPL_V1["sno"]?>]"/>
												<label class="check_s" for="privateApprovalOption_<?php echo $TPL_V1["sno"]?>"><?php echo __('선택')?></label>
											</div>
										</td>
										<td><?php echo nl2br($TPL_V1["content"])?></td>
									</tr>
								</tbody>
							</table>
							<!-- <?php }}?> -->
						</div>
					</div>
					<!-- <?php }?> -->
					<!-- //join_agreement_box -->

					<!-- <?php if($TPL_VAR["privateConsign"][ 0]['modeFl']=='y'){?> -->
					<div class="join_agreement_box js_terms_view">
						<div class="form_element">
							<input type="checkbox" id="termsAgree4" name=""/>
							<label class="check_s" for="termsAgree4"><strong class="choice">(<?php echo __('선택')?>)</strong> <?php echo __('개인정보 처리위탁')?> </label>
							<span><a href="../service/agreement.php?code=<?php echo $TPL_VAR["privateConsign"][ 0]['informCd']?>" target="_blank"><?php echo __('전체보기')?></a></span>
						</div>
						<div class="agreement_choice_box">
							<!-- <?php if($TPL_privateConsign_1){foreach($TPL_VAR["privateConsign"] as $TPL_V1){?> -->
							<table summary="<?php echo __('개인정보 처리위탁 내용입니다.')?>" border="0" cellpadding="0" cellspacing="0">
								<colgroup>
									<col width="10px">
									<col width="300px">
								</colgroup>
								<thead>
								<tr>
									<th><?php echo __('선택')?></th>
									<th><?php echo nl2br($TPL_V1["informNm"])?></th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										<div class="form_element">
											<input type="checkbox" id="privateConsign_<?php echo $TPL_V1["sno"]?>" name="privateConsignFl[<?php echo $TPL_V1["sno"]?>]"/>
											<label class="check_s" for="privateConsign_<?php echo $TPL_V1["sno"]?>"><?php echo __('선택')?></label>
										</div>
									</td>
									<td><?php echo nl2br($TPL_V1["content"])?></td>
								</tr>
								</tbody>
							</table>
							<!-- <?php }}?> -->
						</div>
					</div>
					<!-- <?php }?> -->
					<!-- //join_agreement_box -->

					<!-- <?php if($TPL_VAR["privateOffer"][ 0]['modeFl']=='y'){?> -->
					<div class="join_agreement_box js_terms_view">
						<div class="form_element">
							<input type="checkbox" id="termsAgree5" name=""/>
							<label class="check_s" for="termsAgree5"><strong class="choice">(<?php echo __('선택')?>)</strong> <?php echo __('개인정보 제 3자 제공')?> </label>
							<span><a href="../service/agreement.php?code=<?php echo $TPL_VAR["privateOffer"][ 0]['informCd']?>" target="_blank"><?php echo __('전체보기')?></a></span>
						</div>
						<div class="agreement_choice_box">
							<!-- <?php if($TPL_privateOffer_1){foreach($TPL_VAR["privateOffer"] as $TPL_V1){?> -->
							<table summary="<?php echo __('개인정보 제 3자 제공 내용입니다.')?>" border="0" cellpadding="0" cellspacing="0">
								<colgroup>
									<col width="10px">
									<col width="300px">
								</colgroup>
								<thead>
								<tr>
									<th><?php echo __('선택')?></th>
									<th><?php echo nl2br($TPL_V1["informNm"])?></th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td>
										<div class="form_element">
											<input type="checkbox" id="privateOffer<?php echo $TPL_V1["sno"]?>" name="privateOfferFl[<?php echo $TPL_V1["sno"]?>]"/>
											<label class="check_s" for="privateOffer<?php echo $TPL_V1["sno"]?>"><?php echo __('선택')?></label>
										</div>
									</td>
									<td><?php echo nl2br($TPL_V1["content"])?></td>
								</tr>
								</tbody>
							</table>
							<!-- <?php }}?> -->
						</div>
					</div>
					<!-- <?php }?> -->
					<!-- //join_agreement_box -->
					<div class="important_check_box">
						<strong class="important_check dn"><?php echo __('이용약관과 개인정보 수집 및 이용에 대한 안내 모두 동의해주세요.')?></strong>
					</div>
				</div>
				<!-- //join_agreement_cont -->

				<!-- <?php if($TPL_VAR["ipinConfig"]["useFl"]=='y'||$TPL_VAR["authCellPhoneConfig"]["useFl"]=='y'){?> -->
				<div class="join_certify_box">
					<h3><?php echo __('본인 인증방법 선택')?></h3>
					<div class="join_certify_list">
						<ul>
							<!-- <?php if($TPL_VAR["ipinConfig"]["useFl"]=='y'){?> -->
							<li>
								<div class="form_element">
									<input type="radio" id="authIpin" name="RnCheckType" value="ipin"/>
									<label class="choice_s" for="authIpin"><?php echo __('아이핀 본인인증')?></label>
								</div>
							</li>
							<!-- <?php }?> -->
							<!-- <?php if($TPL_VAR["authCellPhoneConfig"]["useFl"]=='y'){?> -->
							<li>
								<div class="form_element">
									<input type="radio" id="authCellphone" name="RnCheckType" value="authCellPhone"/>
									<label class="choice_s" for="authCellphone"><?php echo __('휴대폰 본인인증')?></label>
								</div>
							</li>
							<!-- <?php }?> -->
						</ul>
					</div>
					<!-- //join_certify_list -->
				</div>
				<!-- <?php }?> -->
				<!-- //join_certify_box -->

				<div class="btn_center_box">
<?php if($TPL_VAR["useThirdParty"]){?>
					<button type="button" id="btnPrevStep" class="btn_member_prev"><?php echo __('이전단계')?></button>
<?php }?>
					<button type="button" id="btnNextStep" class="btn_member_next"><?php echo __('다음단계')?></button>
				</div>
				<!-- //btn_member_sec -->
			</form>
		</div>
		<!-- //member_cont -->
	</div>
	<!-- //join_agreement_wrap -->
</div>
<!-- //content_box -->
<script type="text/javascript">
	$(document).ready(function () {
		var body = $('body'), $formTerms = $('#formTerms');

		$('#btnNextStep').click(function () {
			var pass = true;
			/*
			 * 필수 동의 항목 검증
			 */
			$(':checkbox.require').each(function (idx, item) {
				var $item = $(item);
				if (!$item.prop('checked')) {
					pass = false;
					$('strong.important_check', $formTerms).removeClass('dn').text($item.next().text() + "<?php echo __('을 체크해주세요.')?>");
					_.delay(function () {
						$item.focus();
					}, 1000);
					return false;
				}
			});

			/*
             * 만 14세 이상 동의 항목 검증
             */
			if ($("#termsAgreeDiv").length > 0) {
				if (!$('#termsAgree').prop('checked')) {
					pass = false;
					alert("<?php echo __('만 14세 이상임에 동의해 주세요.')?>");
					$("#termsAgreeDiv").attr("tabindex", -1).focus();
					return false;
				}
			}

			if (pass) {
				$('strong.important_check').addClass('dn');
				/*
				 * 실명인증 검증
				 */
				if ($('input[name="RnCheckType"]').length > 0) {
					switch ($('input[name="RnCheckType"]:checked').val()) {
						case 'ipin' :
							var popupWindow = window.open("/member/ipin/ipin_main.php?callType=joinmember", "popupCertKey", "top=100, left=200, status=0, width=417, height=490");
							break;
						case  'authCellPhone' :
							var protocol = location.protocol;
							var callbackUrl = "<?php echo $TPL_VAR["domainUrl"]?>/member/authcellphone/dreamsecurity_result.php";
							window.open(protocol + "//hpauthdream.godo.co.kr/module/Mobile_hpauthDream_Main.php?callType=joinmembermobile&shopUrl=" + callbackUrl + "&cpid=<?php echo $TPL_VAR["authDataCpCode"]?>&i=1", "auth_popup", "top=30, left=50, status=0, width=425, height=650");
							break;
						default :
							alert("<?php echo __('본인인증이 필요합니다.')?>");
							$('input[name="RnCheckType"]:first').focus();
							break;
					}
					return false;
				} else {
					$formTerms.submit();
				}
			}
		});

		/*
		 * 전체 동의 체크박스 이벤트
		 */
		$('#allAgree', $formTerms).change(function (e) {
			var $target = $(e.target), $checkbox = $(':checkbox').not('#termsAgree'), $label = $checkbox.siblings('label');
			if ($target.prop('checked') === true) {
				$checkbox.prop('checked', true).val('y');
				$label.addClass('on');
			} else {
				$checkbox.prop('checked', false).val('n');
				$label.removeClass('on');
			}
		});

		/*
		 * 이전단계 버튼 이벤트
		 */
		$('#btnPrevStep', $formTerms).click(function (e) {
			e.preventDefault();
			window.location.href = '../member/join_method.php'
		});

		/*
		 * 약관 체크박스 이벤트
		 */
		$('.js_terms_view :checkbox', $formTerms).change(function (e) {
			$('strong.important_check').addClass('dn');
			var $target = $(e.target), $label = $target.siblings('label'), $termsView = $target.closest('.js_terms_view');
			var isTermsAgreeSelect = (e.target.id === 'termsAgree3') || (e.target.id === 'termsAgree4') || (e.target.id === 'termsAgree5');
			var isTargetChecked = $target.prop('checked') === true;
			if (isTargetChecked) {
				if (isTermsAgreeSelect) {
					$termsView.find('.agreement_choice_box label').addClass('on');
					$termsView.find('.agreement_choice_box :checkbox').prop('checked', true).val('y');
				} else {
					$target.prop('checked', true).val('y');
					$label.addClass('on');
				}
			} else {
				if (isTermsAgreeSelect) {
					$termsView.find('.agreement_choice_box label').removeClass('on');
					$termsView.find('.agreement_choice_box :checkbox').prop('checked', false).val('n');
				} else {
					$target.prop('checked', false).val('n');
					$label.removeClass('on');
				}
			}
		});

		/*
        * 14세 동의 항목 체크박스 이벤트
        */
		if ($("#termsAgreeDiv").length > 0) {
			$('#termsAgreeDiv :checkbox', $formTerms).change(function (e) {
				var $termsTarget = $(e.target), $termsLabel = $termsTarget.siblings('label');
				var isTermsTargetChecked = $termsTarget.prop('checked') === true;
				if (isTermsTargetChecked) {
					$termsTarget.val('y');
					$termsLabel.addClass('on');
				} else {
					$termsTarget.val('n');
					$termsLabel.removeClass('on');
				}
			});
		}
	});
</script>
<?php $this->print_("footer",$TPL_SCP,1);?>