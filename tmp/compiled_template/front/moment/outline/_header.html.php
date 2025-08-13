<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/outline/_header.html 000010229 */  $this->include_("setBrowserCache","includeFile");
if (is_array($TPL_VAR["headerMeta"])) $TPL_headerMeta_1=count($TPL_VAR["headerMeta"]); else if (is_object($TPL_VAR["headerMeta"]) && in_array("Countable", class_implements($TPL_VAR["headerMeta"]))) $TPL_headerMeta_1=$TPL_VAR["headerMeta"]->count();else $TPL_headerMeta_1=0;
if (is_array($TPL_VAR["snsShareMetaTag"])) $TPL_snsShareMetaTag_1=count($TPL_VAR["snsShareMetaTag"]); else if (is_object($TPL_VAR["snsShareMetaTag"]) && in_array("Countable", class_implements($TPL_VAR["snsShareMetaTag"]))) $TPL_snsShareMetaTag_1=$TPL_VAR["snsShareMetaTag"]->count();else $TPL_snsShareMetaTag_1=0;
if (is_array($TPL_VAR["headerStyle"])) $TPL_headerStyle_1=count($TPL_VAR["headerStyle"]); else if (is_object($TPL_VAR["headerStyle"]) && in_array("Countable", class_implements($TPL_VAR["headerStyle"]))) $TPL_headerStyle_1=$TPL_VAR["headerStyle"]->count();else $TPL_headerStyle_1=0;
if (is_array($TPL_VAR["headerScript"])) $TPL_headerScript_1=count($TPL_VAR["headerScript"]); else if (is_object($TPL_VAR["headerScript"]) && in_array("Countable", class_implements($TPL_VAR["headerScript"]))) $TPL_headerScript_1=$TPL_VAR["headerScript"]->count();else $TPL_headerScript_1=0;?>
<!doctype html>
<html>
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

    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/moment/css/reset.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/moment/css/common/common.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/moment/css/common/layer/layer.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/moment/css/layout/layout.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/moment/css/goods/list.css')?>">
	<link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/moment/css/button.css')?>">
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache(PATH_SKIN.'css/'.$TPL_VAR["gThisDirName"].'/'.$TPL_VAR["gThisDirName"].'.css')?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/moment/js/jquery/chosen/chosen.css')?>" />
<?php if($TPL_VAR["gThisPageCss"]){?>
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache($TPL_VAR["gThisPageCss"])?>" />
<?php }?>
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/moment/css/custom.css')?>" />

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
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/gd_gettext.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/jquery/jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/underscore/underscore-min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/jquery/validation/jquery.validate.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/jquery/validation/additional-methods.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/numeral/numeral.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/global/accounting.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/global/money.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/jquery/chosen/chosen.jquery.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/jquery/placeholder/placeholders.jquery.min.js')?>"></script>
    <![if gt IE 8]>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/copyclipboard/clipboard.min.js')?>"></script>
    <![endif]>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/jquery/vticker/jquery.vticker.js')?>"></script>
    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/gd_ui.js')?>"></script>

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

    <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/moment/js/gd_common.js')?>"></script>

<?php if(is_array(gd_isset($TPL_VAR["headerScript"]))){?>
    <!-- Add script : start -->
<?php if($TPL_headerScript_1){foreach($TPL_VAR["headerScript"] as $TPL_V1){?>
    <script type="text/javascript" src="<?php echo $TPL_V1?>"></script>
<?php }}?>
    <!-- Add script : end -->
<?php }?>

    <?php echo $TPL_VAR["pgScript"]?>


    <style type="text/css">
        body {
<?php if($TPL_VAR["layout"]["outbg_img"]){?>background: url("<?php echo $TPL_VAR["layout"]["outbg_img"]?>") repeat left top;<?php }?>
<?php if($TPL_VAR["layout"]["outbg_color"]){?>background-color: #<?php echo str_replace('#','',$TPL_VAR["layout"]["outbg_color"])?>;<?php }?>
        }

        /* body > #wrap > #header_warp : 상단 영역 */
        #header_warp {
<?php if($TPL_VAR["layout"]["topbg_img"]){?>background: url("<?php echo $TPL_VAR["layout"]["topbg_img"]?>") repeat 0 0;<?php }?>
        }

        /* body > #wrap > #container : 메인 영역 */
        #container {
<?php if($TPL_VAR["layout"]["inbg_img"]){?>background: url("<?php echo $TPL_VAR["layout"]["inbg_img"]?>") repeat 0 0;<?php }?>
<?php if($TPL_VAR["layout"]["inbg_color"]){?>background-color: <?php echo $TPL_VAR["layout"]["inbg_color"]?>;<?php }?>
        }

        /* body > #wrap > #footer_wrap : 하단 영역 */
        #footer_wrap {
        }
    </style>

    <?php echo $TPL_VAR["customHeader"]?>


</head>

<body class="<?php echo $TPL_VAR["userBodyClass"]?>" <?php echo gd_copy_protect()?> >
<div class="top_area"></div>
<div id="wrap">

<?php if($TPL_VAR["tpls"]["header_inc"]){?>
    <div id="header_warp">
<?php $this->print_("header_inc",$TPL_SCP,1);?>

    </div>
<?php }?>
    <!-- //header_warp -->

    <div id="container">
        <div id="contents">
        <!-- 본문 시작 -->

<?php if($TPL_VAR["layout"]["current_page"]=='y'&&$TPL_VAR["layout"]["page_name"]){?>
            <div class="location_wrap">
                <div class="location_cont">
                    <em><a href="#" class="local_home">HOME</a> > <?php echo $TPL_VAR["layout"]["page_name"]?></em>
                </div>
            </div>
<?php }?>
            <!-- //location_wrap -->

            <div class="sub_content">

<?php if($TPL_VAR["tpls"]["side_inc"]&&$TPL_VAR["layout"]["outline_sidefloat"]=='left'){?>
                <div class="side_cont">
<?php $this->print_("side_inc",$TPL_SCP,1);?>

                </div>
<?php }?>
                <!-- //side_cont -->