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
            	$error_msg = 'Аккаунт не зарегистрирован!';
            }
        }
    }

  }

}
?>