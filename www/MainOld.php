<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Main.php ***

// ****************************************************************************
// *                                            KwinTiny-редактор материалов! *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  23.11.2018
// Copyright © 2018 tve                              Посл.изменение: 19.04.2021

// Инициируем рабочие переменные
require_once $SiteRoot."/iniMem.php";

// Записываем материал в файл при запросе 
if(isset($_POST['enter']))
{
   // Открыть текстовый файл
   //$f = fopen("../KwinTiny/textfile.html","w");
   $f = fopen("KwinTiny/textfile.html","w");
   // Записать текст
   fwrite($f, $_POST['dor']); 
   // Закрыть текстовый файл
   fclose($f);
}
// Начинаем разметку документа
echo '
   <!DOCTYPE html>
   <html lang="ru">
   <head>
   <title>KwinTiny-редактор материалов!</title>
   <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
   <meta name="description" content="Труфанов Владимир Евгеньевич, редактор материалов TinyMCE">
   <meta name="keywords" content="Труфанов Владимир Евгеньевич,KwinTiny,TinyMCE,редактор материалов">
';
// Подключаем шрифты и стили документа
echo '
   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Anonymous+Pro:400,400i,700,700i&amp;
      subset=cyrillic">
   <link rel="stylesheet" 
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="/Styles/Styles.css">
   <!-- theme: "modern", -->
';
echo '<link rel="stylesheet" type="text/css" href="Styles/Gallery-Image.css">';
// Подключаем TinyMCE
echo '
   <script src="/TinyMCE5-8-1/tinymce.min.js"></script>
   <script>tinymce.init
   ({
        selector: "#mytextarea",
        /*height: 460,*/
        /*width:  820,*/
        content_css: "/Styles/TinyMCE.css",
        
        plugins:
        [ 
            "advlist autolink link image imagetools lists charmap print preview hr anchor",
            "pagebreak spellchecker searchreplace wordcount visualblocks",
            "visualchars code fullscreen insertdatetime media nonbreaking",
            /* "contextmenu", */ // отключено для TinyMCE5-8-1
            /* "textcolor", */   // отключено для TinyMCE5-8-1
            "save table directionality emoticons template paste"
        ],
        
        language: "ru",
        toolbar:
        [
            "| link image | forecolor backcolor emoticons"
        ],
        /*
        toolbar:
        [
            "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons"
        ],
        */
        image_list: [
          {title: "My image 1", value: "KwinTiny/proba.jpg"},
          {title: "My image 2", value: "http://www.moxiecode.com/my2.gif"}
        ],
        a_plugin_option: true,
        a_configuration_option: 400
   });
   </script>
'; 
// Подключаем дополнительные js-crhbgns
echo '
   <script>
      console.log("Привет!");
   </script>
'; 
// --- разметка ---    
echo '
   </head>
   <body>
   <div class="Header">
   </div>
   <div class="Info">
   <div class="InfoLeft">
'; 
// Извлекаем прежнее содержимое материала в переменную $contents
$filename=$DirImg."textfile.html"; 
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
// Помещаем значение переменной в область редактирования TinyMCE
echo '
   <form id="frmTinyText" method="post" action="/Tiny.php">
   <textarea id="mytextarea" name="dor">
'; 
echo htmlspecialchars($contents);
echo '
   </textarea>
   </form>
'; 
require_once $SiteRoot."/UploadImg.php";
echo '
   </div>
   <div class="InfoRight">
   <div id="NewGallery">
'; 
   require_once "KwinTiny/GalleryNews.php";
echo '
   </div>
'; 
// Подключаем загрузку      
// require_once $SiteRoot."/UploadImg.php";
// --- разметка ---    
echo '
   </div>
   </div>
'; 
// Обустраиваем подвал
echo '
   <div class="Footer">
   <div class="LeftFooter">
      <img id="KwinLogo" src="../Images/Kwinflat.jpg" alt="Kwinflat-близкий всем!"/>
   </div>
   <div class="RightFooter">
      Copyright &copy; Владимир Труфанов
      <p>
      <input type="submit" name="enter" value="Сохранить материал" form="frmTinyText">
      </p>
   </div>
'; 
echo '
   </div>
'; 
// Завершаем разметку документа
echo '
   </body>
   </html>
'; 
// *** <!-- --> ************************************************** Main.php ***
