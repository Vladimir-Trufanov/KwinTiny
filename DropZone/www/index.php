<?php
// PHP7/HTML5, EDGE/CHROME                               *** .php ***

// ****************************************************************************
// *  * 
// *                               *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  07.01.2019
// Copyright © 2019 tve                              Посл.изменение: 06.02.2019
?>

<!DOCTYPE html>
<html lang="ru">
<head>
   <title>Загрузить изображение</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
   <meta name="description" content="Труфанов Владимир Евгеньевич, его жизнь и жизнь его близких">
   <meta name="keywords" content="Труфанов Владимир Евгеньевич, жизнь и увлечения">
</head>

<body>

<?php
/**
 * Настройки конфигурации PHP, влияющие на загрузку файлов
 * (настройки находятся в разделе Core файла php.ini)
 *
 * Разрешена ли серверу загрузка файлов?
 * file_uploads = On
 * 
 * Максимальное время в секундах, отводимое на выполнение сценария.
 * Если выполнение сценария занимает больше времени, интерпретатор PHP
 * генерирует фатальную ошибку
 * max_execution_time = 30
 * 
 * Максимальное число секунд, отводимое сценарию PHP на разбор содержимого
 * массивов $_POST, $_GET и загрузку файлов. При загрузке очень больших файлов
 * указанного времени, скорее всего не хватит
 * max_input_time = 60
 * 
 * Максимально допустимый размер всех данных, хранящихся в массиве $_POST,
 * в том числе загружаемых файлов
 * post_max_size = 8M
 * 
 * Временный каталог хранения загруженных файлов до тех пор, пока сценарий не
 * переместит их в постоянное месторасположение. Если не указано, то 
 * используется стандартный системный каталог для временных файлов: 
 * C:\Windows\Temp
 * upload_tmp_dir =
 * 
 * Максимально допустимый размер одного загружаемого файла
 * upload_max_filesize = 2M
**/
?>

<?php
// Устанавливаем максимальный размер загружаемых файлов в байтах
$max = 85000;
if (isset($_POST['UploadImg'])) {
  // define the path to the upload folder
  $destination = 'C:/upload_test/';
  // move the file to the upload folder and rename it
  move_uploaded_file($_FILES['image']['tmp_name'], $destination . $_FILES['image']['name']);
}
?>

<form action="" method="post" enctype="multipart/form-data" id="uploadImage">
   <label for="image">Выбрать изображение</label>
   <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max; ?>">
   <input type="file" name="image" id="image">
   <p>
   <input type="submit" name="UploadImg" id="upload" value="Загрузить">
   </p>
</form>

<pre>
<?php
if (isset($_POST['UploadImg'])) {
  print_r($_FILES);
}
?>
</pre>



</body>
</html>