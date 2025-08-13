<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/proc/_global_select.html 000003899 */  $this->include_("setBrowserCache");
if (is_array($TPL_VAR["mallList"])) $TPL_mallList_1=count($TPL_VAR["mallList"]); else if (is_object($TPL_VAR["mallList"]) && in_array("Countable", class_implements($TPL_VAR["mallList"]))) $TPL_mallList_1=$TPL_VAR["mallList"]->count();else $TPL_mallList_1=0;?>
<?php if($TPL_VAR["mallCnt"]> 1){?>
<?php if($TPL_VAR["addChosenScript"]==true){?>
        <script type="text/javascript" src="<?php echo setbrowsercache('/data/skin/front/story_g/js/jquery/chosen-imageselect/src/ImageSelect.jquery.js')?>"></script>
<?php }?>
    <link type="text/css" rel="stylesheet" href="<?php echo setbrowsercache('/data/skin/front/story_g/js/jquery/chosen-imageselect/src/ImageSelect.css')?>" />
    <div class="mall-select">
<?php if($TPL_VAR["iconType"]=='check'){?>
<?php if($TPL_mallList_1){foreach($TPL_VAR["mallList"] as $TPL_K1=>$TPL_V1){?>
                <img class="mall hand" data-domain-fl="<?php echo $TPL_V1["domainFl"]?>" data-domain="<?php echo $TPL_V1["domain"]?>" src="<?php echo $TPL_VAR["uriCommon"]?>/<?php echo $TPL_VAR["mallIcon"][$TPL_K1]?>" />
<?php }}?>
<?php }elseif($TPL_VAR["iconType"]=='select_flag'){?>
            <select name="mallSelect" class="tune" style="width:60px;">
<?php if($TPL_mallList_1){foreach($TPL_VAR["mallList"] as $TPL_K1=>$TPL_V1){?>
                <option data-img-src="<?php echo $TPL_VAR["uriCommon"]?>/<?php echo $TPL_VAR["mallIcon"][$TPL_K1]?>" data-domain="<?php echo $TPL_V1["domain"]?>" data-domain-fl="<?php echo $TPL_V1["domainFl"]?>" <?php if($TPL_VAR["nowMall"]==$TPL_K1){?>selected="selected"<?php }?>>&nbsp;</option>
<?php }}?>
            </select>
<?php }elseif($TPL_VAR["iconType"]=='select_language'){?>
            <select name="mallSelect" class="tune" style="width:180px;">
<?php if($TPL_mallList_1){foreach($TPL_VAR["mallList"] as $TPL_K1=>$TPL_V1){?>
                <option data-img-src="<?php echo $TPL_VAR["uriCommon"]?>/<?php echo $TPL_VAR["mallIcon"][$TPL_K1]?>" data-domain="<?php echo $TPL_V1["domain"]?>" data-domain-fl="<?php echo $TPL_V1["domainFl"]?>" <?php if($TPL_VAR["nowMall"]==$TPL_K1){?>selected="selected"<?php }?>><?php echo $TPL_V1["languageFl"]?></option>
<?php }}?>
            </select>
<?php }?>
    </div>
    <style>
        .mall-select {position:absolute; top:0; left:0; margin-top:2px;}
        .mall-select img {margin-top:5px; border:none;}
    </style>
    <script type="text/javascript">
        $(function(){
            $('.mall').click(function(){
                var url = $(this).data('domain');
                var lastStr = url.substr(url.length - 1);
                if (lastStr != '/') {
                    url = url+'/';
                }
                switch($(this).data('domain-fl')) {
                    case 'kr':
                        window.open(url+'main/index.php', "_blank");
                        break;
                    default:
                        window.open(url, "_blank");
                        break;
                }
            });
            $('select[name="mallSelect"]').change(function(){
                var selected = $(this).find('option:selected');
                var url = selected.data('domain');
                var lastStr = url.substr(url.length - 1);
                if (lastStr != '/') {
                    url = url+'/';
                }
                switch(selected.data('domain-fl')) {
                    case 'kr':
                        window.open(url+'main/index.php', "_blank");
                        break;
                    default:
                        window.open(url, "_blank");
                        break;
                }
            });
        })
    </script>
<?php }?>