<?php

require_once 'system/config.php';

  if (isset($_GET['page']))
  {
    switch ($_GET['page']) 
    {
      case 'main':
       $curent_page = 'news.php';
      break;

      case 'bet':
       $curent_page = 'bet.php';
      break;

      case 'answer':
       $curent_page = 'answer.php';
      break;

      case 'guar':
       $curent_page = 'guar.php';
      break;

      case 'registration':
       $curent_page = 'registration.php';
      break;

      case 'login':
       $curent_page = 'login.php';
      break;      

      case 'lk':
       $curent_page = 'cabinet.php';
      break;  

      default:
      $curent_page = 'news.php';
      break;
    }

  } else {
      $curent_page = 'news.php';
  }

    $mysql_check = $db_connect -> getRow("SELECT url FROM sf_page WHERE url='".($_GET['page'])."'");
    if ($mysql_check > 0)
    {
      $get_content = $db_connect -> getRow("SELECT content FROM sf_page WHERE url='".($_GET['page'])."'");
      $page_content = $get_content['content'];
    }

  include 'templates/index.php';
?>
