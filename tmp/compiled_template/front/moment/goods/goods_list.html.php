<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/goods/goods_list.html 000007968 */  $this->include_("pollViewBanner","includeWidget");
if (is_array($TPL_VAR["goodsCategoryList"])) $TPL_goodsCategoryList_1=count($TPL_VAR["goodsCategoryList"]); else if (is_object($TPL_VAR["goodsCategoryList"]) && in_array("Countable", class_implements($TPL_VAR["goodsCategoryList"]))) $TPL_goodsCategoryList_1=$TPL_VAR["goodsCategoryList"]->count();else $TPL_goodsCategoryList_1=0;
if (is_array($TPL_VAR["goodsDataSubCategory"])) $TPL_goodsDataSubCategory_1=count($TPL_VAR["goodsDataSubCategory"]); else if (is_object($TPL_VAR["goodsDataSubCategory"]) && in_array("Countable", class_implements($TPL_VAR["goodsDataSubCategory"]))) $TPL_goodsDataSubCategory_1=$TPL_VAR["goodsDataSubCategory"]->count();else $TPL_goodsDataSubCategory_1=0;?>
<?php $this->print_("header",$TPL_SCP,1);?>

<div class="content">
    <div class="location_wrap">
        <div class="location_cont">
            <em><a href="#" class="local_home">HOME</a> &nbsp;</em>
<?php if($TPL_VAR["goodsCategoryList"]){?>
<?php if($TPL_goodsCategoryList_1){foreach($TPL_VAR["goodsCategoryList"] as $TPL_V1){?>
            <span>&gt; </span>
            <div class="location_select">
                <div class="location_tit"><a href="#"><span><?php echo $TPL_V1["cateNm"]?></span></a></div>
                <ul style="display:none;">
<?php if((is_array($TPL_R2=$TPL_V1["data"])&&!empty($TPL_R2)) || (is_object($TPL_R2) && in_array("Countable", class_implements($TPL_R2)) && $TPL_R2->count() > 0)) {foreach($TPL_R2 as $TPL_K2=>$TPL_V2){?>
                    <li><a href="?<?php echo $TPL_VAR["cateType"]?>Cd=<?php echo $TPL_K2?>"><span><?php echo $TPL_V2?></span></a></li>
<?php }}?>
                </ul>
            </div>
<?php }}?>
<?php }?>
        </div>
    </div>
    <!-- //location_wrap -->

    <div class="goods_list_item">

        <div class="goods_list_item_tit">
            <h2><?php echo $TPL_VAR["goodsCategoryList"][$TPL_VAR["cateCd"]]['cateNm']?></h2>
        </div>
<?php if($TPL_VAR["naviDisplay"]["naviUse"]=='y'){?>
<?php if($TPL_VAR["themeInfo"]["cateHtml1"]){?>
        <!-- 상단 꾸미기 영역 -->
        <div class="addition_zone">
            <?php echo stripslashes(str_replace('&nbsp;',' ',$TPL_VAR["themeInfo"]["cateHtml1"]))?>

        </div>
<?php }?>
<?php if($TPL_VAR["goodsDataSubCategory"]){?>
        <div class="list_item_category">
            <ul>
<?php if($TPL_goodsDataSubCategory_1){foreach($TPL_VAR["goodsDataSubCategory"] as $TPL_V1){?>
                <li class="<?php if($TPL_VAR["cateCd"]==$TPL_V1["cateCd"]){?>on<?php }?>">
                    <a href="?<?php echo $TPL_VAR["cateType"]?>Cd=<?php echo $TPL_V1["cateCd"]?>"><span><?php echo $TPL_V1["cateNm"]?> <?php if($TPL_VAR["naviDisplay"]["naviCount"]=='y'){?><em>(<?php echo $TPL_V1["goodsCnt"]+ 0?>)</em><?php }?></span></a>
                </li>
<?php }}?>
            </ul>
        </div>
<?php }?>
<?php }?>

        <!-- 설문조사 배너 --><?php echo pollviewbanner()?><!-- 설문조사 배너 -->

<?php if($TPL_VAR["themeInfo"]["recomDisplayFl"]=='y'&&$TPL_VAR["widgetGoodsList"]){?>
<?php if($TPL_VAR["themeInfo"]["cateHtml2"]){?>
        <!-- 추천상품 상단 꾸미기 영역 -->
        <div class="addition_zone">
            <?php echo stripslashes(str_replace('&nbsp;',' ',$TPL_VAR["themeInfo"]["cateHtml2"]))?>

        </div>
        <!-- //추천상품 상단 꾸미기 영역 -->
<?php }?>

        <!-- 추천 상품 나오는영역 -->
        <div class="best_item_view">
            <div class="best_item_view_tit">
                <h3><?php echo __('추천상품')?></h3>
            </div>
            <div class="goods_list">
                <div class="goods_list_cont">
                    <p><?php echo includewidget('goods/_goods_display.html')?></p>
                </div>
            </div>
        </div>
        <!-- //추천 상품 나오는영역 -->
<?php }?>

<?php if($TPL_VAR["themeInfo"]["cateHtml3"]){?>
        <div class="addition_zone">
            <?php echo stripslashes(str_replace('&nbsp;',' ',$TPL_VAR["themeInfo"]["cateHtml3"]))?>

        </div>
<?php }?>
        <div class="goods_pick_list">
            <span class="pick_list_num"><?php echo __('상품')?> <strong><?php echo number_format(gd_isset($TPL_VAR["page"]->recode['total']))?></strong> <?php echo __('개')?></span>
            <form name="frmList" action="">
                <input type="hidden" name="<?php echo $TPL_VAR["cateType"]?>Cd" value="<?php echo $TPL_VAR["cateCd"]?>"/>
                <div class="pick_list_box">
                    <ul class="pick_list">
                        <li>
                            <input type="radio" id="sort1" class="radio" name="sort" value=""/>
                            <label for="sort1"><?php echo __('추천순')?></label>
                        </li>
                        <li>
                            <input type="radio" id="sort2" class="radio" name="sort" value="sellcnt"/>
                            <label for="sort2"><?php echo __('판매인기순')?></label>
                        </li>
                        <li>
                            <input type="radio" id="sort3" class="radio" name="sort" value="price_asc"/>
                            <label for="sort3"><?php echo __('낮은가격순')?></label>
                        </li>
                        <li>
                            <input type="radio" id="sort4" class="radio" name="sort" value="price_dsc"/>
                            <label for="sort4"><?php echo __('높은가격순')?></label>
                        </li>
                        <li>
                            <input type="radio" id="sort5" class="radio" name="sort" value="review"/>
                            <label for="sort5"><?php echo __('상품평순')?></label>
                        </li>
                        <li>
                            <input type="radio" id="sort6" class="radio" name="sort" value="date"/>
                            <label for="sort6"><?php echo __('등록일순')?></label>
                        </li>
                    </ul>
                    <div class="choice_num_view">
                        <select class="chosen-select" name="pageNum">
<?php if((is_array($TPL_R1=$TPL_VAR["goodsData"]["multiple"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
                            <option value="<?php echo $TPL_V1?>"  <?php if($TPL_VAR["pageNum"]==$TPL_V1){?>selected='selected'<?php }?>><?php echo $TPL_V1?><?php echo __('개씩보기')?></option>
<?php }}?>
                        </select>
                    </div>
                    <!-- //choice_num_view -->
                </div>
                <!-- //pick_list_box -->
            </form>
        </div>
        <!-- //goods_pick_list -->

        <div class="goods_list">
            <div class="goods_list_cont">
                <!-- 상품 리스트 -->
<?php $this->print_("goodsTemplate",$TPL_SCP,1);?>

                <!-- //상품 리스트 -->
            </div>
        </div>

        <div class="pagination">
            <?php echo $TPL_VAR["page"]->getPage()?>

        </div>

    </div>
    <!-- //goods_list_item -->
	<script type="text/javascript">
		$(document).ready(function () {

			$('form[name=frmList] select[name=pageNum]').change(function() {
				$('form[name=frmList]').get(0).submit();
			});

			$('form[name=frmList] input[name=sort]').click(function() {
				$('form[name=frmList]').get(0).submit();
			});

			$(':radio[name="sort"][value="<?php echo $TPL_VAR["sort"]?>"]').prop("checked","checked")
			$(':radio[name="sort"][value="<?php echo $TPL_VAR["sort"]?>"]').next().addClass('on');

		});
	</script>
</div>
<!-- //content -->

<?php $this->print_("footer",$TPL_SCP,1);?>