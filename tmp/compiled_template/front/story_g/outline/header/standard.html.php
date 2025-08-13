<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/outline/header/standard.html 000003888 */  $this->include_("dataBanner","includeWidget","dataCartGoodsCnt");?>
<div class="head">
    <div class="container">
        <div class="main-logo"><?php if((is_array($TPL_R1=databanner('3793079315'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?></div>

        <!-- 검색 폼 -->
        <?php echo includewidget('proc/_header_search.html')?>

        <!-- 검색 폼 -->

        <div class="ad">
            <strong class="dn"><?php echo __('이벤트 배너')?></strong>
<?php if((is_array($TPL_R1=databanner('3373105465'))&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?><?php echo $TPL_V1["tag"]?><?php }}?>
        </div>
    </div>
</div>

<div class="navi">
    <!-- 퀵 검색 폼 -->
<?php if($TPL_VAR["tpls"]["quick_search"]){?>
    <?php echo includewidget('proc/_quick_search.html')?>

<?php }?>
    <!-- 퀵 검색 폼 -->
    <div class="container">
        <h2 class="dn"><?php echo __('상단 글로벌 메뉴')?></h2>

        <!-- 멀티상점 선택 -->
        <?php echo includewidget('proc/_global_select.html')?>

        <!-- 멀티상점 선택 -->

        <ul>
<?php if(gd_is_login()===false){?>
            <li><a href="../member/login.php"><?php echo __('로그인')?></a></li>
            <li><a href="../member/join_method.php"><?php echo __('회원가입')?></a></li>
<?php }else{?>
            <li><a href="../member/logout.php?returnUrl=<?php echo $TPL_VAR["logoutReturnUrl"]?>"><?php echo __('로그아웃')?></a></li>
<?php }?>
            <li class="mypage">
                <a href="../mypage/index.php"><?php echo __('마이페이지')?></a>

                <div>
                    <a href="../mypage/order_list.php"><?php echo __('주문조회')?></a>
                    <a href="../mypage/my_page_password.php"><?php echo __('내정보수정')?></a>
                    <a href="../mypage/wish_list.php"><?php echo __('찜 리스트')?></a>
                    <a href="../mypage/mypage_qa.php">1:1 <?php echo __('문의')?></a>
                </div>
            </li>
            <li><a href="../service/index.php"><?php echo __('고객센터')?></a></li>
            <li>
                <a href="../order/cart.php"><?php echo __('장바구니')?></a>
                <span>
                    <em class="dn"><?php echo __('담긴상품')?></em>
                    <strong><?php echo datacartgoodscnt()?></strong>
                </span>
            </li>
        </ul>
    </div>
</div>
<hr/>
<div class="top-service">
    <div class="container">
        <!-- 전체 카테고리 출력 레이어 시작 -->
        <h2 class="dn"><?php echo __('전체 카테고리')?></h2>
        <?php echo includewidget("proc/category_all.html")?>

        <!-- 전체 카테고리 출력 레이어 끝 -->

        <h2 class="dn"><?php echo __('추천 메뉴')?></h2>
        <ul class="link">
            <li><a href="../goods/brand.php"><?php echo __('브랜드')?></a></li>
            <li><a href="#"><?php echo __('상단메뉴')?>1</a></li>
            <li><a href="#"><?php echo __('상단메뉴')?>2</a></li>
            <li><a href="#"><?php echo __('상단메뉴')?>3</a></li>
        </ul>
        <!--스크롤 게시글 시작-->
        <div class="notice">
        <?php echo includewidget('board/board_article_scrolling','bdId',$TPL_VAR["noticeBdId"],'listCount', 10,'strCut', 15)?>

        </div>
        <!--스크롤 게시글 끝-->
    </div>
</div>
<hr/>