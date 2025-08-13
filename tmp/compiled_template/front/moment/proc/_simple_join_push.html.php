<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/proc/_simple_join_push.html 000003316 */  $this->include_("setBrowserCache");?>
<?php if($TPL_VAR["joinEventPush"]){?>
<link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/moment/css/gd_simple_join_push.css')?>">
<div class="simple_join_push <?php echo $TPL_VAR["joinEventPush"]["position"]?>" style="background:<?php echo $TPL_VAR["joinEventPush"]["bgColor"]?>;">
    <div class="inner <?php if($TPL_VAR["joinEventPush"]["pushDescriptionType"]=='image'){?>type2<?php }?>">
<?php if($TPL_VAR["joinEventPush"]["iconType"]!='false'){?>
        <div class="sj_icon_box">
<?php if($TPL_VAR["joinEventPush"]["iconType"]=='basic'){?>
            <img src="/data/skin/front/moment/img/etc/icon_default_push.png" alt="<?php echo __('푸쉬아이콘')?>"/>
<?php }elseif($TPL_VAR["joinEventPush"]["iconType"]=='self'){?>
            <img src="<?php echo $TPL_VAR["joinEventPush"]["pushIcon"]?>" alt="<?php echo __('푸쉬아이콘')?>"/>
<?php }?>
        </div>
<?php }?>

<?php if($TPL_VAR["joinEventPush"]["pushDescriptionType"]=='text'){?>
        <div class="sj_txt_box">
            <div class="txt_area" style="color:<?php echo $TPL_VAR["joinEventPush"]["textColor"]?>"><?php echo $TPL_VAR["joinEventPush"]["pushDescriptionText"]?></div>
        </div>
<?php }elseif($TPL_VAR["joinEventPush"]["pushDescriptionType"]=='image'){?>
        <div class="sj_img_box">
            <img src="<?php echo $TPL_VAR["joinEventPush"]["pushDescriptionImagePc"]?>" alt="<?php echo __('회원가입 유도 푸쉬 내용')?>"/>
        </div>
<?php }?>
        <span class="ly_sj_close"><img src="/data/skin/front/moment/img/etc/btn_ly_sj_close.png" alt="<?php echo __('닫기')?>"></span>
    </div>
</div>
<script type="text/javascript">
    //회원가입 유도 푸시
    var icon_h = $('.simple_join_push.type2 .sj_icon_box').innerHeight();
    var icon_h_s = icon_h/2;
    $('.simple_join_push.type2 .sj_icon_box').css('margin-top',-icon_h_s);

    function sj_swing_up() {
        var _height = 0;

        if($('#shop_cart_wrap').is(":visible")) {
            _height = $('#shop_cart_wrap').innerHeight() + 15;
        } else {
            _height =  + 15;
        }

        $('.simple_join_push').animate({'bottom':_height},1000);
    }
    sj_swing_up();

    $('.ly_sj_close').on({
        'click':function(e){
            e.stopPropagation();
            var data = {
                mode: 'setSimpleJoinPushClosed'
            }
            var $ajax = $.ajax('../member/member_ps.php', {type: "post", data: data});
            $ajax.done(function () {
                var _height = $('.simple_join_push').innerHeight() + 2;
                $('.simple_join_push').animate({'bottom':-_height},800);
            });
        }
    });

    $('.simple_join_push').on({
        'click':function(e){
            e.stopPropagation();
            var data = {
                mode: 'setSimpleJoinPushLog',
                eventType: 'click'
            }
            var $ajax = $.ajax('../member/member_ps.php', {type: "post", data: data});
            $ajax.done(function () {
                location.href = '../member/join_method.php';
            });
        }
    });
</script>
<?php }?>