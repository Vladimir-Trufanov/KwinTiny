<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Tiny.php ***

// ****************************************************************************
// * KwinTiny      Инициализировать рабочее пространство и погрузить страницу *
// *                                 в оболочку обработки ошибок и исключений *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  23.11.2018
// Copyright © 2018 tve                              Посл.изменение: 21.05.2021

// Инициализируем рабочее пространство: корневой каталог сайта и т.д.
require_once 'iniWorkSpace.php';
$_WORKSPACE=iniWorkSpace();

$SiteRoot    = $_WORKSPACE[wsSiteRoot];     // Корневой каталог сайта
$SiteAbove   = $_WORKSPACE[wsSiteAbove];    // Надсайтовый каталог
$SiteHost    = $_WORKSPACE[wsSiteHost];     // Каталог хостинга
$SiteDevice  = $_WORKSPACE[wsSiteDevice];   // 'Computer' | 'Mobile' | 'Tablet'
$UserAgent   = $_WORKSPACE[wsUserAgent];    // HTTP_USER_AGENT

// Подключаем сайт сбора сообщений об ошибках/исключениях и формирования 
// страницы с выводом сообщений, а также комментариев для PHP5-PHP7
require_once $SiteHost."/TDoorTryer/DoorTryerPage.php";
try 
{
   // Запускаем сценарий сайта
   require_once $_SERVER['DOCUMENT_ROOT']."/Main.php";
}
catch (E_EXCEPTION $e) 
{
   /**
    * ПОМНИТЬ(16.02.2019)! Если в коде сайта включается своя обработка исключений,
    * то управление выводом ошибок display_errors на сайте NIC.RU отключается и
    * работает только error_reporting (нужно разрешить обработку всех ошибок)
   **/
   // Подключаем обработку исключений верхнего уровня
   DoorTryPage($e);
}
// ****************************************************************************
// *            Вывести (определить HTML-разметку) одну карточку галереи      *
// ****************************************************************************
function GViewImage($FileName,$Comment,$AreaText=false,$Action='Image')
{
   echo 
      '<div class="Card"> '.
      '<button class="bCard" type="submit" name="'.$Action.'" value="'.$FileName.'">'.
      '<img class="imgCard" src="'.$FileName.'" alt="'.$FileName.'">'.
      '</button>';
   // Выводим существующий комментарий или 
   // текст для редактирования
   /*
   if ($AreaText) 
   {
      echo '
         <textarea class="taCard" name="aream">Текст комментария к картинке</textarea>
         ';
   }
   else 
   */
   echo '<p class="pCard">'.$Comment.'</p>';
   echo 
      '</div>';
}
function GLoadImage($FileName,$Comment,$AreaText=false,$Action='Image')
{
   /*
   ?>
   <!-- -->
   <div class="Card">
   <input type="file" name="image" id="image">
   <img class="imgCard" src="sampo.jpg" alt="FileName">
   <input type="submit" name="upload" id="upload" value="Upload">
   <textarea class="taCard" name="aream">Текст комментария к картинке</textarea>
   </div>
   <?php
   */
      ?>
   <!-- -->
   <div class="Card">
   <button class="bCard" type="submit" name="upload" value="FileName">
   <input type="hidden" name="MAX_FILE_SIZE" value="57200">
   <input type="file" name="image" id="image">
   <img class="imgCard" src="sampo.jpg" alt="FileName">
   <!-- 
   <input type="submit" name="upload" id="upload" value="Upload">
   -->
   </button>
   <textarea class="taCard" name="aream">Текст комментария к картинке</textarea>
   </div>
   <?php

}

// *************************************************************** Tiny.php ***
