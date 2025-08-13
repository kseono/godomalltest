<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/board/_board_article_scrolling.html 000001725 */ 
if (is_array($TPL_VAR["list"])) $TPL_list_1=count($TPL_VAR["list"]); else if (is_object($TPL_VAR["list"]) && in_array("Countable", class_implements($TPL_VAR["list"]))) $TPL_list_1=$TPL_VAR["list"]->count();else $TPL_list_1=0;?>
<?php if($TPL_VAR["canList"]){?>
<h3 class="dn"><?php echo $TPL_VAR["bdName"]?></h3>
<div id="js-notice-list">
    <ul>
<?php if($TPL_list_1){foreach($TPL_VAR["list"] as $TPL_V1){?>
        <li style="height:30px"><a href="../board/view.php?bdId=<?php echo $TPL_VAR["bdId"]?>&sno=<?php echo $TPL_V1["sno"]?>">[<?php echo $TPL_VAR["bdName"]?>]&nbsp;<?php echo $TPL_V1["subject"]?></a></li>
<?php }}?>
    </ul>
</div>

<div class="notice-btn">
    <button type="button" class="prev" title="<?php echo __('이전')?>"><span><?php echo __('이전')?></span></button>
    <button type="button" class="next" title="<?php echo __('다음')?>"><span><?php echo __('다음')?></span></button>
</div>
<script>
    $(function () {
        var $scroller = $('#js-notice-list');
        $scroller.vTicker();

        $(".notice-btn .next").click(function(event){
            event.preventDefault();
            $scroller.vTicker('next', true);
        });
        $(".notice-btn .prev,.notice-btn .next").hover(function(){
            $scroller.vTicker('pause', true);
        }, function(){
            $scroller.vTicker('pause', false);
        });
        $(".notice-btn .prev").click(function(event){
            event.preventDefault();
            $scroller.vTicker('prev',true);
        });
    });
</script>
<?php }?>