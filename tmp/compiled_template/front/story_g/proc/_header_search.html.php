<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/proc/_header_search.html 000002775 */  $this->include_("includeWidget");
if (is_array($TPL_VAR["recentKeyword"])) $TPL_recentKeyword_1=count($TPL_VAR["recentKeyword"]); else if (is_object($TPL_VAR["recentKeyword"]) && in_array("Countable", class_implements($TPL_VAR["recentKeyword"]))) $TPL_recentKeyword_1=$TPL_VAR["recentKeyword"]->count();else $TPL_recentKeyword_1=0;?>
<div class="search">
    <form name="frmSearchTop" id="frmSearchTop" action="../goods/goods_search.php" method="get">

<?php if($TPL_VAR["adUrl"]){?>
        <input type="hidden" name="adUrl" value="<?php echo $TPL_VAR["adUrl"]?>">
<?php }?>

        <fieldset>
            <legend><?php echo __('검색폼')?></legend>
            <div>
                <input type="text" id="search-form" name="keyword" class="text" title="<?php echo $TPL_VAR["adKeyword"]?>" placeholder="<?php echo $TPL_VAR["adKeyword"]?>" autocomplete="off" />
                <input type="image" class="image" id="btnSearchTop" title="<?php echo __('검색')?>" value="<?php echo __('검색')?>" src="/data/skin/front/story_g/img/header/btn-search.png" alt="<?php echo __('검색')?>"/>
                <div class="search-area dn">
                    <input type="hidden" name="recentCount" value="<?php echo $TPL_VAR["recentCount"]?>" />
<?php if($TPL_VAR["recentCount"]> 0){?>
                    <div class="recent-area">
                        <ul class="recent-list">
                            <li class="li-tit"><?php echo __('최근검색어')?></li>
<?php if($TPL_VAR["recentKeyword"]){?>
<?php if($TPL_recentKeyword_1){foreach($TPL_VAR["recentKeyword"] as $TPL_V1){?>
                            <li>
                                <div>
                                    <span><a href="../goods/goods_search.php?keyword=<?php echo urlencode($TPL_V1[ 0])?>"><?php echo $TPL_V1[ 0]?></a></span>
                                    <small><?php echo $TPL_V1[ 1]?></small>
                                    <button type="button" class="dlt_bn js-recent-keyword-delete" data-recent-keyword="<?php echo $TPL_V1[ 0]?>">X</button>
                                </div>
                            </li>
<?php }}?>
                            <li class="li-tit hand js-recent-all-delete"><?php echo __('전체삭제')?></li>
<?php }else{?>
                            <li class="no-data"><?php echo __('최근 검색어가 없습니다.')?></li>
<?php }?>
                        </ul>
                    </div>
<?php }?>
                    <?php echo includewidget('proc/_recom_goods.html')?>

                </div>
            </div>
        </fieldset>
    </form>
</div>