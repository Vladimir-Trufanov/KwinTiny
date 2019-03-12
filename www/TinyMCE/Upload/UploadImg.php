<?php
// PHP7/HTML5, EDGE/CHROME                                *** UploadImg.php ***

// ****************************************************************************
// * KwinTiny                                 Обеспечить загрузку изображений *
// *                                        в хранилище подготовки материалов *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  23.01.2019
// Copyright © 2019 tve                              Посл.изменение: 11.03.2019

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

// Устанавливаем максимальный размер загружаемых файлов в байтах
$max = 850000;
if (isset($_POST['UploadImg'])) 
{
   // Решение 00
   // move the file to the upload folder and rename it
   // echo '***'.$destination.$_FILES['image']['name'].'***';
   //move_uploaded_file($_FILES['image']['tmp_name'], $DirImg.$_FILES['image']['name']);

   // Решение 01
   $destination = $DirImg;
   echo '***'.$destination.'***';
   require_once $SiteRoot."/Ps2/Upload.php";
   try 
   {
      $upload = new Ps2_Upload($destination);
      $upload->move01();
      $result = $upload->getMessages();
   } 
   catch (Exception $e) 
   {
      echo $e->getMessage();
   }
}
//phpinfo();

// Выводим возможные сообщения от объекта $upload
if (isset($result)) 
{
   echo '<ul>';
   foreach ($result as $message) 
   {
      echo "<li>$message</li>";
   }
   echo '</ul>';
}



?>

<form action="" method="post" enctype="multipart/form-data" id="uploadImage">
   <label for="image">Выбрать изображение</label>
   <?php
   /**
    * Размещаем в форме поле для загрузки файла, а перед ним (иначе не будет
    * работать) поле для контроля размера загружаемого файла. 
    * Преимущество скрытого поля с именем MAX_FILE_SIZE в том, что PHP остановит
    * процесс загрузки файла при превышении размера
   **/
   ?>
   <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max; ?>">
   <input type="file" name="image" id="image">
   <p>
   <input type="submit" name="UploadImg" id="upload" value="Загрузить">
   </p>
</form>

<pre>

<!-- -->
<?php
if (isset($_POST['UploadImg'])) {
  print_r($_FILES);
}
?>
</pre>

<?php
// ********************************************************** UploadImg.php ***
