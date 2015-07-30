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
			$l_msg = 'Вы уже зарегистрированны!';
		} else {

			$user_name = get_name($user_id);
			$user_login = $user_id;
			$user_pass = get_password(12);

			$db_input = $db_connect -> query("INSERT INTO sf_user (user_id, name, user_group, email, login, pass) VALUES ('$user_id','$user_name','1','vk@vk.com','$user_login','$user_pass')");

			if ($db_input == 1){
				$l_msg = 'Вы успешно зарегистрированны';
			} else {
				$l_msg = 'В процессе регистрации возникла ошибка, попробуйте ещё раз!';
			}
		}
	}
}

if ($_GET['state'] == 'login_reg')
{
	$user_login = $_POST['login'];
	$user_pass = $_POST['pass'];
    $user_mail = $_POST['mail'];
    $md5_pass = md5($user_pass);

    if ((!empty($user_login)) and (!empty($user_pass)) and (!empty($user_mail)))
    {

    $mysql_check = $db_connect -> getRow("SELECT login FROM sf_user WHERE login='".($user_login)."'");

    if (count($mysql_check) > 0)
    {
    	$r_msg = 'Такой аккаунт уже зарегистрирован!';

    } else {
			$db_input = $db_connect -> query("INSERT INTO sf_user (user_group, email, login, pass) VALUES ('1','$user_mail ','$user_login','$md5_pass')");
			if ($db_input == 1){
				$r_msg = 'Вы успешно зарегистрированны! 
				<br><b>Ваш логин: </b>'.$user_login.'
				<br><b>Ваш пароль: </b>'.$user_pass.'';

			} else {
				$r_msg = 'Ошибка, повторите попытку!';
			}
    }

    } else {
    	$r_msg = 'Заполните все поля!';
    }

header("Location: ",$g_url); //Обнуляем post запрос

}


?>