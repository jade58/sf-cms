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

      default:
      $curent_page = 'news.php';
      break;
    }
  } else {
      $curent_page = 'news.php';
  }

  include 'templates/index.php';
?>
