<?php
require_once 'functions.php';
require_once 'connect.php';

if (!isset($_COOKIE['token']))
{
	if (isset($_GET['code'])){
		$token = get_token($_GET['code']);

		if (!empty($token))
		{
			$mysql_check = $db_connect -> getRow("SELECT user_id FROM sf_user WHERE user_id='".($user_id)."'");

			if (count($mysql_check) > 0)
			{
				$user_name = get_name($user_id);
				setcookie('token',$token,time()+3600*24);
				setcookie('name',$user_name,time()+3600*24);
                header("Location: http://".$url.""); //Что бы кукисы обновились

			} else {
				$error = 'Аккаунт не зарегистрирован!';
			}
		}
	}
} else {
	$user_name = $_COOKIE['name'];
}
?>