<?php /* Template_ 2.2.7 2025/08/06 07:03:17 /www/system/error/layer.html 000002324 */ ?>
<!doctype html>
<html lang="ko">
<head>
    <!--<title>결과</title>-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        // 다이얼로그 자동으로 닫기
        if (top.BootstrapDialog != undefined) {
            target = top;
        } else if (parent.BootstrapDialog != undefined) {
            target = parent;
        }

        if (target) {
            var count = 0;
            var dialogs = target.BootstrapDialog.dialogs;

            for(var index in dialogs) {
                var dialog = dialogs[index];
                if (dialog.isRealized() && dialog.isOpened()) {
                    count++;
//                    dialog.getModalHeader().hide();
                    dialog.setMessage('<?php echo $TPL_VAR["message"]?>');
                    setTimeout(function(){
                        dialog.close();
                    }, <?php echo $TPL_VAR["timeOut"]?>);
                    dialog.onHidden(function(){
<?php if($TPL_VAR["addScript"]){?>
                        <?php echo $TPL_VAR["addScript"]?>

<?php }else{?>
<?php if($TPL_VAR["isReload"]==true){?>
                        target.location.reload(true);
<?php }?>
<?php }?>
                    });
                }
            }

            // 레이어 호출을 해야하지만 parent에 오픈된 layer가 없는 경우 만들어서 호출
            if (count == 0) {
                target.BootstrapDialog.show({
                    message: '<?php echo $TPL_VAR["message"]?>',
                    onshown: function(dialog) {
                        setTimeout(function(){
                            dialog.close();
                        }, <?php echo $TPL_VAR["timeOut"]?>);
                    },
                    onhidden: function(dialog){
<?php if($TPL_VAR["addScript"]){?>
                        <?php echo $TPL_VAR["addScript"]?>

<?php }else{?>
<?php if($TPL_VAR["isReload"]==true){?>
                        target.location.reload(true);
<?php }?>
<?php }?>
                    }
                });
            }
        }
    </script>
</head>
<body>
</body>
</html>