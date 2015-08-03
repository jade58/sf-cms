<?

//функция для получения массива пользователей сайта
function get_users()
{
	global $db_connect;

	$response_array = $db_connect->getAll("SELECT login,id FROM sf_user ORDER BY id DESC LIMIT 3");
	return $response_array;
}

//Функция для получения массива с информацией о всех страницах сайта
function get_pages()
{
	global $db_connect;

	$response_array = $db_connect->getAll("SELECT name,id,creator,datecreate,url FROM sf_page");
	return $response_array;
}

//Функция для получения массива с информацией об определённой странице сайта ($id)
function get_page_info($id)
{
	global $db_connect;

	$response_array = $db_connect->getAll("SELECT name,id,creator,datecreate,url,content FROM sf_page WHERE id='$id'");
	return $response_array[0];
}

//Функция при помощи которой обновляется информация выводимая на главной странице сайта.
function main_update($wtext,$des,$other)
{
	global $msg_code,$db_connect; //db_array -- Массив с данными из таблицы sf_config

		$update = $db_connect -> query("UPDATE bc_config SET value = CASE name WHEN 'description' THEN '$des' WHEN 'welcome_text' THEN '$wtext' ELSE 'site_name' END");

	if ($update == 1)
	{
		$upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items=main&msg=1';
		header("Location: ".$upd_url.""); //Обновляем страницу
		exit();
		
	} else 
	{
		$upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items=main&msg=2';
		header("Location: ".$upd_url.""); //Обновляем страницу
		exit();
	}

}

function scr_update($page_name)
{
	global $db_connect,$g_url;

	$update = $db_connect -> query("UPDATE bc_config SET value = '$page_name' WHERE name='scrtext'");
		
		header("Location: ".$g_url.""); //Обновляем страницу
		exit();
}

//Функция для создания страниц сайта
function page_create($name,$url,$content)
{
	global $db_connect;

	$db_query = $db_connect -> query("INSERT INTO sf_page (name, content, creator, datecreate, url) VALUES ('$name','$content','admin','21.01.15','$url')");
	if ($db_query > 0)
	{
		$get_id = $db_connect ->getAll("SELECT id FROM sf_page WHERE url='$url'");

		foreach ($get_id as $row) {
			$id = $row['id'];
		}

		$upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items='.$id.'&msg=3';
	    header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
	}
}

function msg_handler($msg_id)
{

	if ($msg_id == 1)
	{
		return 'Данные успешно обновленны!';
	}

	if ($msg_id == 2)
	{
		return 'Ошибка';
	}

	if ($msg_id == 3)
	{
		return 'Страница была успешно созданна!';
	}
}

function get_guar($id)
{
	global $db_connect;

    if ($id == 'all')
    {
	     $get_guar = $db_connect -> getAll("SELECT * FROM sf_guar");
         return $get_guar;
    } else {
	     $get_guar = $db_connect -> getAll("SELECT * FROM sf_guar WHERE id = '$id'");
	     return $get_guar[0];
    }
}

function add_guar($content)
{
	global $db_connect;

	$db_query = $db_connect -> query("INSERT INTO sf_guar (guar) VALUES ('$content')");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items=guar';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
}

?>