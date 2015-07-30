<?php

require_once 'system/config.php';

  if (isset($_GET['page'])){
    switch ($_GET['page']) {
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

  include 'templates/index.php';
?>
