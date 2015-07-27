<?php
/*
@Name config.php
@Author JadeWizard
*/

require_once 'lib/safemysql.class.php';
require_once 'connect.php';

$url = $_SERVER['HTTP_HOST'];

foreach ($db_array as $item){   
    switch ($item['name']) {

    	case 'site_title':
    		$site_title = $item['value']; //Заголовок сайта
    		break;

    	case 'description':
    		$description = $item['value']; //Описание сайта
    		break;

    	case 'welcome_text':
    	    $welcome_text = $item['value']; //Приветственный текст
    	    break;	
    }
}

$vk_api = array('app_id' => '5010567','secret_key' => 'h2fjkJ6po7GAZySAqNO6','ref_url' => $url); //Данные для соеденения с VK api для авторизации

$auth_url = 'https://oauth.vk.com/authorize?
client_id='.$vk_api['app_id'].'
&scope=1&redirect_uri=http://'.$vk_api['ref_url'].'
&response_type=code';

?>