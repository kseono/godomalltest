<?php /* Template_ 2.2.7 2025/08/06 07:03:17 /www/system/error/alert.html 000000795 */ 
if (is_array($TPL_VAR["script"])) $TPL_script_1=count($TPL_VAR["script"]); else if (is_object($TPL_VAR["script"]) && in_array("Countable", class_implements($TPL_VAR["script"]))) $TPL_script_1=$TPL_VAR["script"]->count();else $TPL_script_1=0;?>
<!doctype html>
<html lang="ko">
<head>
    <!--<title>결과</title>-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
<?php if($TPL_script_1){foreach($TPL_VAR["script"] as $TPL_V1){?>
    <?php echo $TPL_V1?>

<?php }}?>
    </script>
</head>
<body>
</body>
</html>