<?php /* Template_ 2.2.7 2025/05/22 10:03:57 /www/newmanjoo14_godomall_com/data/skin/front/moment/board/_board_article.html 000000841 */ 
if (is_array($TPL_VAR["list"])) $TPL_list_1=count($TPL_VAR["list"]); else if (is_object($TPL_VAR["list"]) && in_array("Countable", class_implements($TPL_VAR["list"]))) $TPL_list_1=$TPL_VAR["list"]->count();else $TPL_list_1=0;?>
<?php if($TPL_VAR["canList"]=='y'){?>
<ul>
<?php if($TPL_list_1){foreach($TPL_VAR["list"] as $TPL_V1){?>
    <li>
        <span><?php if($TPL_V1["isNew"]=='y'){?><img src="<?php echo $TPL_VAR["cfg"]["iconImage"]["new"]["url"]?>" alt="<?php echo __('신규 등록글')?>"/><?php }?></span>
        <a href="../board/view.php?bdId=<?php echo $TPL_VAR["bdId"]?>&sno=<?php echo $TPL_V1["sno"]?>"><?php echo $TPL_V1["subject"]?></a>
    </li>
<?php }}?>
</ul>
<?php }?>