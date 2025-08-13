<?php /* Template_ 2.2.7 2025/07/30 05:47:24 /www/newmanjoo14_godomall_com/data/skin/front/story_g/goods/goods_board_qa_list.html 000003187 */ ?>
<table id="js-qa-board-table" class="review-board" cellspacing="0" border="1">
    <colgroup>
        <col width="6%">
        <col>
        <col width="10%">
        <col width="10%">
        <col width="10%">
    </colgroup>
    <thead>
    <tr>
        <th><?php echo __('번호')?></th>
        <th><?php echo __('제목')?></th>
        <th><?php echo __('작성자')?></th>
        <th><?php echo __('작성일')?></th>
        <th><?php echo __('진행상황')?></th>
    </tr>
    </thead>
    <tbody>
<?php if($TPL_VAR["bdList"]["list"]){?>
<?php if((is_array($TPL_R1=$TPL_VAR["bdList"]["list"])&&!empty($TPL_R1)) || (is_object($TPL_R1) && in_array("Countable", class_implements($TPL_R1)) && $TPL_R1->count() > 0)) {foreach($TPL_R1 as $TPL_V1){?>
    <tr class="preview js-data-row" data-bdid="<?php echo $TPL_VAR["req"]["bdId"]?>" data-sno="<?php echo $TPL_V1["sno"]?>" data-auth="<?php echo $TPL_V1["auth"]["view"]?>">
        <td><?php echo $TPL_V1["articleListNo"]?></td>
        <td class="txt-la">
            <?php echo $TPL_V1["gapReply"]?>

            <span <?php if($TPL_V1["groupThread"]){?>class="reply" style="padding-left:15px;"  <?php }?>>
<?php if($TPL_V1["isSecret"]=='y'){?>
            <img src="<?php echo $TPL_VAR["bdList"]["cfg"]["iconImage"]["secret"]["url"]?>" align=absmiddle>
<?php }?>
            <a href="javascript:void(0)" class="js-btn-view"><?php echo $TPL_V1["subject"]?></a>
<?php if($TPL_VAR["bdList"]["cfg"]["bdMemoFl"]=='y'&&$TPL_V1["memoCnt"]> 0){?>
            <span class="c-red">(<?php echo $TPL_V1["memoCnt"]?>)</span>
<?php }?>
<?php if($TPL_V1["isFile"]=='y'){?>
            <img src="<?php echo $TPL_VAR["bdList"]["cfg"]["iconImage"]["attach_file"]["url"]?>" alt="<?php echo __('파일첨부 있음')?>"/>
<?php }?>
<?php if($TPL_V1["isImage"]=='y'){?>
            <img src="<?php echo $TPL_VAR["bdList"]["cfg"]["iconImage"]["attach_img"]["url"]?>" alt="<?php echo __('이미지첨부 있음')?>"/>
<?php }?>
<?php if($TPL_V1["isNew"]=='y'){?><!--<img alt="신규 등록글" src="/data/skin/front/story_g/goods/img/icon/new.png"/>-->
            <img src="<?php echo $TPL_VAR["bdList"]["cfg"]["iconImage"]["new"]["url"]?>" alt="<?php echo __('신규 등록글')?>"/>
<?php }?>
            </span>
        </td>
        <td class="txt-la"><?php echo $TPL_V1["writer"]?></td>
        <td><?php echo $TPL_V1["regDate"]?></td>
        <td <?php if($TPL_V1["replyComplete"]){?>class="complete"<?php }else{?>class="wait"<?php }?>><?php echo $TPL_V1["replyStatusText"]?></td>
    </tr>
    <tr class="detail js-detail" data-bdid="<?php echo $TPL_VAR["req"]["bdId"]?>" data-sno="<?php echo $TPL_V1["sno"]?>" data-auth="<?php echo $TPL_V1["auth"]["view"]?>">
        <td colspan="5"></td>
    </tr>
<?php }}?>
<?php }else{?>
    <tr class="not-record">
        <td class="no-data" colspan="5"><?php echo __('등록된 상품문의가 없습니다.')?></td>
    </tr>
<?php }?>
    </tbody>
</table>
<?php echo $TPL_VAR["pagienation"]?>