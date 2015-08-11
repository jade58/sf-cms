<?php
require_once 'functions.php';
require_once 'connect.php';
require_once 'config.php';

if ((isset($_GET['state'])) and (($_GET['state']) == 'auth'))
{

    if (!isset($_COOKIE['token']))
	{
		if (isset($_GET['code'])){
			$token = get_token($_GET['code'],$s_url);

			if (!empty($token))
			{
				$mysql_check = $db_connect -> getRow("SELECT user_id FROM sf_user WHERE user_id='".($user_id)."'");

				if (count($mysql_check) > 0)
				{
					$user_name = get_name($user_id);
					setcookie('token',$token,time()+3600*24);
					setcookie('name',$user_name,time()+3600*24);
					setcookie('user_id',$user_id,time()+3600*24);

                    header("Location: ".$s_url.""); //Что бы кукисы обновились

            } else {
            	$l_msg = 'Аккаунт не зарегистрирован!';
            }
        }
    }

  }

} elseif ((isset($_GET['state'])) and ($_GET['state'] == 'login_auth')) {
	$login = $_POST['login'];
	$pass = $_POST['pass'];

	if ((!empty($login)) and (!empty($pass)))
	{
		$mysql_check = $db_connect -> getRow("SELECT pass FROM sf_user WHERE login='".($login)."'");

		if (count($mysql_check) > 0)
		{
			if (md5($pass) == $mysql_check['pass'])
			{
				$token = md5(rand());
			    setcookie('token',$token,time()+3600*24);
				setcookie('name',$login,time()+3600*24);

				header("Location: ".$s_url.""); //Что бы кукисы обновились

			} else {
				$r_msg = 'Логин или пароль не верны!';
			}
		} else {
			$r_msg = 'Логин или пароль не верны!';
		}

	} else {
		$r_msg = 'Заполните все поля!';
	}
}
?>