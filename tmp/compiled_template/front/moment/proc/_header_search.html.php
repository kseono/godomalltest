<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/proc/_header_search.html 000003609 */  $this->include_("includeWidget");
if (is_array($TPL_VAR["recentKeyword"])) $TPL_recentKeyword_1=count($TPL_VAR["recentKeyword"]); else if (is_object($TPL_VAR["recentKeyword"]) && in_array("Countable", class_implements($TPL_VAR["recentKeyword"]))) $TPL_recentKeyword_1=$TPL_VAR["recentKeyword"]->count();else $TPL_recentKeyword_1=0;?>
<div class="top_search">
    <form name="frmSearchTop" id="frmSearchTop" action="../goods/goods_search.php" method="get">
<?php if($TPL_VAR["adUrl"]){?>
        <input type="hidden" name="adUrl" value="<?php echo $TPL_VAR["adUrl"]?>"/>
<?php }?>
        <fieldset>
            <legend><?php echo __('검색폼')?></legend>
            <div class="top_search_cont">
                <div class="top_text_cont">
                    <input type="text" id="search_form" name="keyword" class="top_srarch_text" title="<?php echo $TPL_VAR["adKeyword"]?>"  placeholder="<?php echo $TPL_VAR["adKeyword"]?>" autocomplete="off"/>
                    <input type="image" src="/data/skin/front/moment/img/common/btn/btn_top_search.png" id="btnSearchTop" class="btn_top_srarch" title="<?php echo __('검색')?>" value="<?php echo __('검색')?>" alt="<?php echo __('검색')?>"/>
                </div>
                <!-- //top_text_cont -->
                <div class="search_cont" style="display:none;">
                    <input type="hidden" name="recentCount" value="<?php echo $TPL_VAR["recentCount"]?>" />

                    <?php echo includewidget('proc/_recom_goods.html')?>

                    <!-- //recom_box -->

<?php if($TPL_VAR["recentCount"]> 0){?>
                    <div class="recent_box">
                        <dl class="js_recent_area">
                            <dt><?php echo __('최근검색어')?></dt>
<?php if($TPL_VAR["recentKeyword"]){?>
                            <dd>
                                <ul class="js_recent_list">
<?php if($TPL_recentKeyword_1){foreach($TPL_VAR["recentKeyword"] as $TPL_V1){?>
                                    <li>
                                        <a href="../goods/goods_search.php?keyword=<?php echo urlencode($TPL_V1[ 0])?>"><?php echo $TPL_V1[ 0]?></a>
                                        <span><?php echo $TPL_V1[ 1]?><button type="button" class="btn_top_search_del" data-recent-keyword="<?php echo $TPL_V1[ 0]?>">
                                            <img src="/data/skin/front/moment/img/common/btn/btn_top_search_del.png" alt="<?php echo __('삭제')?>"></button>
                                        </span>
                                    </li>
<?php }}?>
                                </ul>
                            </dd>
<?php }else{?>
                            <dd><?php echo __('최근 검색어가 없습니다.')?></dd>
<?php }?>
                        </dl>
                    </div>
<?php }?>
                    <!-- //recent_box -->
                    <div class="seach_top_all">
<?php if($TPL_VAR["recentKeyword"]){?><button type="button" class="btn_top_search_all_del"><strong><?php echo __('전체삭제')?></strong></button><?php }?>
                        <button type="button" class="btn_top_search_close"><strong><?php echo __('닫기')?></strong></button>
                    </div>
                    <!-- //seach_top_all -->

                </div>
                <!-- //search_cont -->
            </div>
            <!-- //top_search_cont -->
        </fieldset>
    </form>
</div>
<!-- //top_search -->