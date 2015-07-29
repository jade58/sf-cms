<?php
/*
@Name config.php
@Author JadeWizard
*/

require_once 'lib/safemysql.class.php';
require_once 'connect.php';

$s_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
$g_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

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

$vk_api = array('app_id' => '4950576','secret_key' => 'h6iDx3eADczomfZ39209','ref_url' => $url); //Данные для соеденения с VK api для авторизации

$auth_url = 'https://oauth.vk.com/authorize?
client_id='.$vk_api['app_id'].'
&scope=1&redirect_uri='.$s_url.'
&response_type=code
&state=auth';

$reg_url = 'https://oauth.vk.com/authorize?
client_id='.$vk_api['app_id'].'
&scope=1&redirect_uri='.$g_url.'
&response_type=code
&state=vk_reg';


?>