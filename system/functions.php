<?php
/*
@Name functions.php
@Author JadeWizard
*/

require_once 'config.php';

//Функция получения access token
function get_token($sercet_code)
{
	global $vk_api,$user_id;
	if (!empty($sercet_code))
	{
        $api_url = 'https://oauth.vk.com/access_token?client_id='.$vk_api['app_id'].'&client_secret='.$vk_api['secret_key'].'&code='.$sercet_code.'&redirect_uri=http://'.$vk_api['ref_url'].''; 

        $api_qurey = curl_init();	

           curl_setopt($api_qurey, CURLOPT_URL, $api_url);
           curl_setopt($api_qurey, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt($api_qurey, CURLOPT_HEADER, 0);	

        $api_response = curl_exec($api_qurey);
        $api_array = json_decode($api_response,true);
        $user_id = $api_array['user_id'];

        return $api_array['access_token'];
	}
}

//Функция для получения имени пользователя
function get_name($user_id)
{
	if (!empty($user_id))
	{
		$api_url = 'https://api.vk.com/method/users.get?user_id='.$user_id.'';

        $api_qurey = curl_init();

           curl_setopt($api_qurey, CURLOPT_URL,$api_url);
           curl_setopt($api_qurey, CURLOPT_RETURNTRANSFER, 1);
           curl_setopt($api_qurey, CURLOPT_HEADER, 0);

        $api_response = curl_exec($api_qurey);
        $api_array = json_decode($api_response,true);

        $response_array = $api_array['response'];
        $zero_array = $response_array[0];
        $first_name = $zero_array['first_name'];

        return $first_name;
	}
}

?>