<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'db';

$db_connect = new SafeMysql(array('user' => $db_user, 'pass' => $db_pass,'db' => $db_name, 'charset' => 'utf8'));

$db_array = $db_connect->getAll("SELECT * from bc_config");

?>