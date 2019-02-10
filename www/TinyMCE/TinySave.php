<!DOCTYPE html> 
<!-- 
-->
<html>

<head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8" />
   <title>Сохранение!</title>
</head>

<body>
<?php
if(isset($_POST['enter']))
{
   // Открыть текстовый файл
   $f = fopen("../KwinTiny/Arc/textfile.html","w");
   // Записать текст
   fwrite($f, $_POST['dor']); 
   // Закрыть текстовый файл
   fclose($f);
}
$page="/TinyMCE/TinyOpen.php";
//echo "Location: http://".$_SERVER['HTTP_HOST'].$page;
Header("Location: http://".$_SERVER['HTTP_HOST'].$page);
?>
</body>
</html>
