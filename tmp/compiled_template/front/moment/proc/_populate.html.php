<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/proc/_populate.html 000005424 */ 
if (is_array($TPL_VAR["data"])) $TPL_data_1=count($TPL_VAR["data"]); else if (is_object($TPL_VAR["data"]) && in_array("Countable", class_implements($TPL_VAR["data"]))) $TPL_data_1=$TPL_VAR["data"]->count();else $TPL_data_1=0;?>
<?php if($TPL_VAR["data"]){?>
<div class="popular-wrap popular-wrap-<?php echo $TPL_VAR["config"]["sno"]?>">
    <div class="popular-line">
        <strong>HOT</strong>
        <div class="rank_top_box rank_top_box-<?php echo $TPL_VAR["config"]["sno"]?>">
            <ul>
<?php if($TPL_data_1){$TPL_I1=-1;foreach($TPL_VAR["data"] as $TPL_V1){$TPL_I1++;?>
                <li<?php if($TPL_I1<= 2){?> class="top<?php echo $TPL_I1+ 1?>"<?php }?>><em><?php echo $TPL_I1+ 1?></em><a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_V1["goodsNo"]?>"><?php echo $TPL_V1["goodsNm"]?></a></li>
<?php }}?>
            </ul>
        </div>
<?php if($TPL_VAR["config"]["useFl"]=='y'){?><span class="popular_more"><a href="../goods/populate.php?sno=<?php echo $TPL_VAR["config"]["sno"]?>" target="_blank">더보기</a></span><?php }?>
    </div>
    <div class="popular-box popular-box-<?php echo $TPL_VAR["config"]["sno"]?>"<?php if($TPL_VAR["config"]["template"]== 01){?> style="display:block;"<?php }?>>
    <strong><span class="popular_color">HOT</span> ITEMS</strong>
<?php if($TPL_VAR["config"]["useFl"]=='y'){?><span class="popular_more"><a href="../goods/populate.php?sno=<?php echo $TPL_VAR["config"]["sno"]?>" target="_blank">더보기</a></span><?php }?>
    <div class="rank_item_box">
        <ul>
<?php if($TPL_data_1){$TPL_I1=-1;foreach($TPL_VAR["data"] as $TPL_V1){$TPL_I1++;?>
            <li<?php if($TPL_I1<= 2){?> class="top<?php echo $TPL_I1+ 1?>"<?php }?>><em><?php echo $TPL_I1+ 1?></em><a href="../goods/goods_view.php?goodsNo=<?php echo $TPL_V1["goodsNo"]?>"><?php echo $TPL_V1["goodsNm"]?></a></li>
<?php }}?>
        </ul>
    </div>
</div>
</div>

<style>
    .popular-wrap{position: absolute;left:-280px; top:0; width: 280px;}
    .popular-line{overflow:hidden; height: 49px;line-height: 48px;vertical-align: middle;padding: 0 19px 0 19px;}
    .popular-line strong{display:inline-block; float:left; font-size:15px; color:#fa2828;}
    .popular-line .rank_top_box {display:inline-block; width:160px;}
    .popular-line .rank_top_box li,
    .popular-box .rank_item_box li {width:140px; text-overflow:ellipsis; white-space:nowrap; word-wrap:normal; overflow:hidden;}
    .popular-line .rank_top_box li em{display:inline-block; background:url('/data/skin/front/moment/img/icon/bg_popular_rank.png') no-repeat 0 0; width:16px; height:16px; margin:0 7px 0 14px; line-height: 15px; font-size:10px; color:#fff; text-align:center;}
    .popular-line .rank_top_box .top1 em,
    .popular-line .rank_top_box .top2 em,
    .popular-line .rank_top_box .top3 em{background:url('/data/skin/front/moment/img/icon/bg_popular_toprank.png')}
    .popular-line .rank_top_box li a{color:#333333; font-size:13px; font-weight:bold;}
    .popular-wrap .popular-box{position:absolute; top:-1px; width: 280px;background:#fff;}
    .popular-wrap .popular-box strong{font-size: 15px; color: #333;}
    .popular-wrap .popular-box{display:none; padding:14px 19px 27px 18px; width:242px; border:1px solid #444; z-index:100;}
    .popular-wrap .popular-box.on{display:block;}
    .popular-wrap .popular_more {float:right;}
    .popular-wrap .popular_more a{display: inline-block;width: 48px;height: 22px;line-height: 20px;vertical-align: middle;font-size: 11px; color: #666;border: 1px solid #e0e0e0;text-align: center;}
    .popular_color{color: #fa2828;}
    .popular-box .rank_item_box {padding:11px 0 0 0;}
    .popular-box .rank_item_box li {width:180px; padding:0 0 13px 0;}
    .popular-box .rank_item_box li em{display:inline-block; background:url('/data/skin/front/moment/img/icon/bg_popular_rank.png') no-repeat 0 0; width:16px; height:16px; margin:0 8px 0 0; font-size:10px; color:#fff; text-align:center;}
    .popular-box .rank_item_box .top1 em,
    .popular-box .rank_item_box .top2 em,
    .popular-box .rank_item_box .top3 em{background:url('/data/skin/front/moment/img/icon/bg_popular_toprank.png')}
    .popular-box .rank_item_box li a:hover {text-decoration:underline;}
</style>

<script src="/data/skin/front/moment/js/jquery/vticker/jquery.vticker.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        $('.popular-wrap-<?php echo $TPL_VAR["config"]["sno"]?>').mouseenter(
            function() {
                var pb_height = $('.popular-box-<?php echo $TPL_VAR["config"]["sno"]?>').innerHeight();
                $('.side_cont').css('padding-bottom', pb_height + 50 + 'px');
                $('.popular-box-<?php echo $TPL_VAR["config"]["sno"]?>').addClass('on');
            }
        );
        $('.popular-wrap-<?php echo $TPL_VAR["config"]["sno"]?>').mouseleave(
            function() {
                $('.popular-box-<?php echo $TPL_VAR["config"]["sno"]?>').removeClass('on');
                $('.side_cont').css('padding-bottom', '50px');
            }
        );

        var $scroller = $('.rank_top_box-<?php echo $TPL_VAR["config"]["sno"]?>');
        $scroller.vTicker();
    });
</script>
<?php }?>