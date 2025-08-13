<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/outline/_header.html 000010285 */  $this->include_("setBrowserCache","includeFile");
if (is_array($TPL_VAR["headerMeta"])) $TPL_headerMeta_1=count($TPL_VAR["headerMeta"]); else if (is_object($TPL_VAR["headerMeta"]) && in_array("Countable", class_implements($TPL_VAR["headerMeta"]))) $TPL_headerMeta_1=$TPL_VAR["headerMeta"]->count();else $TPL_headerMeta_1=0;
if (is_array($TPL_VAR["snsShareMetaTag"])) $TPL_snsShareMetaTag_1=count($TPL_VAR["snsShareMetaTag"]); else if (is_object($TPL_VAR["snsShareMetaTag"]) && in_array("Countable", class_implements($TPL_VAR["snsShareMetaTag"]))) $TPL_snsShareMetaTag_1=$TPL_VAR["snsShareMetaTag"]->count();else $TPL_snsShareMetaTag_1=0;
if (is_array($TPL_VAR["headerStyle"])) $TPL_headerStyle_1=count($TPL_VAR["headerStyle"]); else if (is_object($TPL_VAR["headerStyle"]) && in_array("Countable", class_implements($TPL_VAR["headerStyle"]))) $TPL_headerStyle_1=$TPL_VAR["headerStyle"]->count();else $TPL_headerStyle_1=0;
if (is_array($TPL_VAR["headerScript"])) $TPL_headerScript_1=count($TPL_VAR["headerScript"]); else if (is_object($TPL_VAR["headerScript"]) && in_array("Countable", class_implements($TPL_VAR["headerScript"]))) $TPL_headerScript_1=$TPL_VAR["headerScript"]->count();else $TPL_headerScript_1=0;?>
<!doctype html>
<html lang="ko">
<head>
    <title><?php echo $TPL_VAR["gMall"]["mallTitle"]?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="<?php echo $TPL_VAR["gMall"]["mallAuthor"]?>" />
    <meta name="description" content="<?php echo $TPL_VAR["gMall"]["mallDescription"]?>" />
    <meta name="keywords" content="<?php echo $TPL_VAR["gMall"]["mallKeyword"]?>" />
    <meta name="csrf-token" content="<?php echo $TPL_VAR["token"]?>" />
<?php if($TPL_VAR["gMall"]["robotsFl"]=='n'){?>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="robots" content="noarchive" />
<?php }?>

<?php if(is_array(gd_isset($TPL_VAR["headerMeta"]))){?>
    <!-- Add Meta : start -->
<?php if($TPL_headerMeta_1){foreach($TPL_VAR["headerMeta"] as $TPL_V1){?>
            <?php echo $TPL_V1?>

<?php }}?>
    <!-- Add Meta : end -->
<?php }?>

<?php if($TPL_snsShareMetaTag_1){foreach($TPL_VAR["snsShareMetaTag"] as $TPL_V1){?>
    <?php echo $TPL_V1?>

<?php }}?>

<?php if($TPL_VAR["gMall"]["mallFavicon"]){?>
    <link rel="icon" href="/data/common/favicon.ico" type="image/x-icon" />
<?php }?>

    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/css/gd_reset.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/js/jquery/chosen/chosen.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/css/gd_layout.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/css/gd_common.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/css/gd_item-display.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/css/gd_goods-view.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/css/gd_contents.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/css/gd_share.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/css/gd_custom.css')?>" />
    <!--[if lte ie 8]><link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/css/gd_old-ie.css')?>" /><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<?php if(is_array(gd_isset($TPL_VAR["headerStyle"]))){?>
    <!-- Add style : start -->
<?php if($TPL_headerStyle_1){foreach($TPL_VAR["headerStyle"] as $TPL_V1){?>
    <link type="text/css" rel="stylesheet" href="<?php echo $TPL_V1?>" />
<?php }}?>
    <!-- Add style : end -->
<?php }?>

    <script type="text/javascript">
        <?php echo includefile($TPL_VAR["gGlobal"]["languageJson"])?>

    </script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/gd_gettext.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/jquery/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/underscore/underscore-min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/jquery/validation/jquery.validate.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/jquery/validation/additional-methods.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/numeral/numeral.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/global/accounting.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/global/money.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/jquery/chosen/chosen.jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/jquery/placeholder/placeholders.jquery.min.js')?>"></script>
    <![if gt IE 8]>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/copyclipboard/clipboard.min.js')?>"></script>
    <![endif]>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/jquery/vticker/jquery.vticker.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/gd_ui.js')?>"></script>
    <script type="text/javascript">
        // 고도몰5 통화정책
        var gdCurrencyDecimal = <?php echo $TPL_VAR["gGlobalCurrency"]["decimal"]?>;
        var gdCurrencyDecimalFormat = '<?php echo $TPL_VAR["gGlobalCurrency"]["decimalFormat"]?>';
        var gdCurrencyCode = '<?php echo $TPL_VAR["gGlobalCurrency"]["code"]?>';
        var gdCurrencyAddDecimal = <?php echo gd_isset($TPL_VAR["gGlobalCurrency"]["addDecimal"], 0)?>;
        var gdCurrencyAddDecimalFormat = '<?php echo $TPL_VAR["gGlobalCurrency"]["addDecimalFormat"]?>';
        var gdCurrencyAddCode = '<?php echo $TPL_VAR["gGlobalCurrency"]["addCode"]?>';
        var gdLocale = '<?php echo $TPL_VAR["gGlobal"]["locale"]?>';
        var gdCurrencySymbol = '<?php echo gd_global_currency_symbol()?>';
        var gdCurrencyString = '<?php echo gd_global_currency_string()?>';

        // 환율변환 정책
        fx.base = "KRW";
        fx.settings = {
            from : "KRW",
            to : gdCurrencyCode
        };
        fx.rates = {
            "KRW" : 1,
<?php if((is_array($TPL_R1=$TPL_VAR["gGlobalCurrency"]["perRate"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_K1=>$TPL_V1){?>
            "<?php echo $TPL_K1?>" : <?php echo $TPL_V1?>,
<?php }}?>
        }
    </script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/gd_common.js')?>"></script>

<?php if(is_array(gd_isset($TPL_VAR["headerScript"]))){?>
    <!-- Add script : start -->
<?php if($TPL_headerScript_1){foreach($TPL_VAR["headerScript"] as $TPL_V1){?>
    <script type="text/javascript" src="<?php echo $TPL_V1?>"></script>
<?php }}?>
    <!-- Add script : end -->
<?php }?>

    <?php echo $TPL_VAR["pgScript"]?>


    <!--{ ? }-->

    <style type="text/css">
    body {
<?php if($TPL_VAR["layout"]["outbg_img"]){?>background: url("<?php echo $TPL_VAR["layout"]["outbg_img"]?>") repeat left top;<?php }?>
<?php if($TPL_VAR["layout"]["outbg_color"]){?>background-color: #<?php echo str_replace('#','',$TPL_VAR["layout"]["outbg_color"])?>;<?php }?>
    }

    /* body > #wrap > #top : 상단 영역 */
    #top {
<?php if($TPL_VAR["layout"]["topbg_img"]){?>background: url("<?php echo $TPL_VAR["layout"]["topbg_img"]?>") repeat 0 0;<?php }?>
    }

    /* body > #wrap > #container : 메인 영역 */
    #container {
<?php if($TPL_VAR["layout"]["inbg_img"]){?>background: url("<?php echo $TPL_VAR["layout"]["inbg_img"]?>") repeat 0 0;<?php }?>
<?php if($TPL_VAR["layout"]["inbg_color"]){?>background-color: <?php echo $TPL_VAR["layout"]["inbg_color"]?>;<?php }?>
    }

    /* body > #wrap > #footer : 하단 영역 */
    #footer {
    }
    </style>

    <?php echo $TPL_VAR["customHeader"]?>

</head>

<body class="<?php echo $TPL_VAR["userBodyClass"]?>" <?php echo gd_copy_protect()?> >
<div class="top-area"></div>
<div id="wrap">
<?php if($TPL_VAR["tpls"]["header_inc"]){?>
    <div id="top" class="header">
<?php $this->print_("header_inc",$TPL_SCP,1);?>

    </div>
<?php }?>

<?php if($TPL_VAR["layout"]["current_page"]=='y'&&$TPL_VAR["layout"]["page_name"]){?>
    <div id="route">
        <div>
            <span><a href="#">Home</a></span>
            <span><?php echo $TPL_VAR["layout"]["page_name"]?></span>
        </div>
    </div>
<?php }?>

    <div id="container">

<?php if($TPL_VAR["tpls"]["side_inc"]&&$TPL_VAR["layout"]["outline_sidefloat"]=='left'){?>
        <div id="side">
<?php $this->print_("side_inc",$TPL_SCP,1);?>

        </div>
<?php }?>

        <!-- 본문 시작 : start -->
        <div id="content">