<?php
require_once 'functions.php';
require_once 'connect.php';
require_once 'lib/safemysql.class.php';

if ($_GET['state'] == 'vk_reg'){
	$token = get_token($_GET['code'],$g_url);
	if(!empty($token))
	{
		$mysql_check = $db_connect -> getRow("SELECT user_id FROM sf_user WHERE user_id='".($user_id)."'");

		if (count($mysql_check) > 0){
			$error = 'Вы уже зарегистрированны!';
		} else {

			$user_name = get_name($user_id);
			$user_login = $user_id;
			$user_pass = get_password(12);

			$db_input = $db_connect -> query("INSERT INTO sf_user (user_id, name, user_group, email, login, pass) VALUES ('$user_id','$user_name','1','vk@vk.com','$user_login','$user_pass')");

			if ($db_input == 1){
				$good_msg = 'Вы успешно зарегистрированны';
			} else {
				$good_msg = 'В процессе регистрации возникла ошибка, попробуйте ещё раз!';
			}
		}
	}
}


?>