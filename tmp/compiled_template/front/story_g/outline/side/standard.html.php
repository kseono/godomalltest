<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/outline/side/standard.html 000000736 */  $this->include_("includeWidget");?>
<!--
    == 스킨수정 안내 ==
    아래 includeFile 함수내 파일경로에 따라 카테고리 출력 메뉴 방식을 변경하실 수 있습니다.

    ==== 카테고리 트리형으로 변경 ====

    ==== 카테고리 레이어형으로 변경 ====
-->
<div class="lnb">
    <!-- 사이드 카테고리 시작 -->
    <h2 class="dn"><?php echo __('사이드 카테고리')?></h2>
    <?php echo includewidget('proc/category_side','type','layer','cateType','cate','menuType','all')?>

    <!-- 사이드 카테고리 끝 -->
</div>