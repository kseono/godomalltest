<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/goods/goods_board_review_list.html 000004348 */ ?>
<table id="js-review-board-table" class="review-board" cellspacing="0" border="1">
    <colgroup>
        <col width="13%">
        <col>
        <col width="10%">
        <col width="10%">
    </colgroup>
    <thead>
    <tr>
        <th><?php echo __('평점')?></th>
        <th><?php echo __('제목')?></th>
        <th><?php echo __('작성자')?></th>
        <th><?php echo __('작성일')?></th>
    </tr>
    </thead>
    <tbody>

<?php if($TPL_VAR["bdList"]["noticeList"]){?>
<?php if((is_array($TPL_R1=$TPL_VAR["bdList"]["noticeList"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
    <tr class="preview js-data-row" data-bdid="<?php echo $TPL_VAR["req"]["bdId"]?>" data-sno="<?php echo $TPL_V1["sno"]?>" data-auth="<?php echo $TPL_V1["auth"]["view"]?>" data-notice="y">
        <td><img src="<?php echo $TPL_VAR["bdList"]["cfg"]["iconImage"]["notice"]["url"]?>" /></td>
        <td class="txt-la">
            <a href="javascript:void(0)" class="js-btn-view"><strong><?php echo $TPL_V1["subject"]?></strong></a>
        </td>
        <td class="txt-la"><?php echo $TPL_V1["writer"]?></td>
        <td><?php echo $TPL_V1["regDate"]?></td>
    </tr>
    <tr class="detail js-detail" data-bdid="<?php echo $TPL_VAR["req"]["bdId"]?>" data-sno="<?php echo $TPL_V1["sno"]?>" data-auth="<?php echo $TPL_V1["auth"]["view"]?>" data-notice="y">
        <td colspan="4"></td>
    </tr>
<?php }}?>
<?php }?>

<?php if($TPL_VAR["bdList"]["list"]){?>
<?php if((is_array($TPL_R1=$TPL_VAR["bdList"]["list"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
    <tr class="preview js-data-row" data-bdid="<?php echo $TPL_VAR["req"]["bdId"]?>" data-sno="<?php echo $TPL_V1["sno"]?>" data-auth="<?php echo $TPL_V1["auth"]["view"]?>" data-notice="n">
        <td><?php if(!$TPL_V1["groupThread"]){?><span class="rating"><span style="width:<?php echo $TPL_V1["goodsPt"]* 20?>%;"><?php echo __('별')?></span></span><?php }?></td>
        <td class="txt-la">
            <?php echo $TPL_V1["gapReply"]?>

            <span <?php if($TPL_V1["groupThread"]){?>class="reply" style="padding-left:15px;"  <?php }?>>
<?php if($TPL_V1["isSecret"]=='y'){?>
            <img src="<?php echo $TPL_VAR["bdList"]["cfg"]["iconImage"]["secret"]["url"]?>" align=absmiddle>
<?php }?>
            <!--<a href="javascript:showBoardDetail('<?php echo $TPL_VAR["req"]["bdId"]?>',<?php echo $TPL_V1["sno"]?>,'<?php echo $TPL_V1["auth"]["view"]?>')" ><?php echo $TPL_V1["subject"]?></a>-->
            <a href="javascript:void(0)" class="js-btn-view"><?php echo $TPL_V1["subject"]?></a>
<?php if($TPL_VAR["bdList"]["cfg"]["bdMemoFl"]=='y'&&$TPL_V1["memoCnt"]> 0){?>
            <span class="c-red js-comment-count">(<?php echo $TPL_V1["memoCnt"]?>)</span>
<?php }?>
<?php if($TPL_V1["isFile"]=='y'){?>
            <img src="<?php echo $TPL_VAR["bdList"]["cfg"]["iconImage"]["attach_file"]["url"]?>" alt="<?php echo __('파일첨부 있음')?>"/>
<?php }?>
<?php if($TPL_V1["isImage"]=='y'){?>
            <img src="<?php echo $TPL_VAR["bdList"]["cfg"]["iconImage"]["attach_img"]["url"]?>" alt="<?php echo __('이미지첨부 있음')?>"/>
<?php }?>
<?php if($TPL_V1["isNew"]=='y'){?>
            <img src="<?php echo $TPL_VAR["bdList"]["cfg"]["iconImage"]["new"]["url"]?>" alt="<?php echo __('신규 등록글')?>"/>
<?php }?>
            </span>
        </td>
        <td class="txt-la"><?php echo $TPL_V1["writer"]?></td>
        <td><?php echo $TPL_V1["regDate"]?></td>
    </tr>
    <tr class="detail js-detail" data-bdid="<?php echo $TPL_VAR["req"]["bdId"]?>" data-sno="<?php echo $TPL_V1["sno"]?>" data-auth="<?php echo $TPL_V1["auth"]["view"]?>" data-notice="n">
        <td colspan="4"></td>
    </tr>
<?php }}?>
<?php }else{?>
    <tr class="not-record">
        <td colspan="4" class="no-data"><?php echo __('등록된 상품후기가 없습니다.')?></td>
    </tr>
<?php }?>
    </tbody>
</table>
<?php echo $TPL_VAR["pagienation"]?>