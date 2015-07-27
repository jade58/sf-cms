<?php
require_once 'functions.php';

if (!isset($_COOKIE['token']))
{
	if (isset($_GET['code']))
	{
		$token = get_token($_GET['code']);

		if (!empty($token))
		{
			$user_name = get_name($user_id);
			setcookie('token', $token, time() + 3600);
            header("Location: http://".$url.""); //Что бы кукисы обновились
		}
	}
} else {
	$token = $_COOKIE['token'];
	$user_name = $_COOKIE['name'];
}
?>