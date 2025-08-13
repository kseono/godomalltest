<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/board/_board_article_scrolling.html 000001797 */ 
if (is_array($TPL_VAR["list"])) $TPL_list_1=count($TPL_VAR["list"]); else if (is_object($TPL_VAR["list"]) && in_array("Countable", class_implements($TPL_VAR["list"]))) $TPL_list_1=$TPL_VAR["list"]->count();else $TPL_list_1=0;?>
<?php if($TPL_VAR["canList"]){?>
<div id="js_notice_list" class="notice_rolling">
    <ul>
<?php if($TPL_list_1){foreach($TPL_VAR["list"] as $TPL_V1){?>
        <li><a href="../board/view.php?bdId=<?php echo $TPL_VAR["bdId"]?>&sno=<?php echo $TPL_V1["sno"]?>">[<?php echo $TPL_VAR["bdName"]?>]&nbsp;<?php echo $TPL_V1["subject"]?></a></li>
<?php }}?>
    </ul>
    <div class="btn_notice_rolling">
        <a href="#" class="next"><img src="/data/skin/front/moment/img/common/btn/btn_top_notice_prev.png" alt="<?php echo __('이전')?>" /></a>
        <a href="#" class="prev"><img src="/data/skin/front/moment/img/common/btn/btn_top_notice_next.png" alt="<?php echo __('다음')?>" /></a>
    </div>
</div>
<!-- //notice_rolling -->
<script>
    $(function () {
        var $scroller = $('#js_notice_list');
        $scroller.vTicker();

        $(".btn_notice_rolling .next").click(function(event){
            event.preventDefault();
            $scroller.vTicker('next', true);
        });
        $(".btn_notice_rolling .prev,.btn_notice_rolling .next").hover(function(){
            $scroller.vTicker('pause', true);
        }, function(){
            $scroller.vTicker('pause', false);
        });
        $(".btn_notice_rolling .prev").click(function(event){
            event.preventDefault();
            $scroller.vTicker('prev',true);
        });
    });
</script>
<?php }?>