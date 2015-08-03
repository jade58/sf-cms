<?

//функция для получения массива пользователей сайта
function get_users()
{
	global $db_connect;

	$response_array = $db_connect->getAll("SELECT login,id FROM sf_user ORDER BY id DESC LIMIT 3");
	return $response_array;
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

//Функция для работы со страницами сайта
function page_action($name,$url,$content,$method,$id)
{
	global $db_connect;

    if ($method == 'create')
    {
          $db_query = $db_connect -> query("INSERT INTO sf_page (name, content, creator, datecreate, url) VALUES ('$name','$content','admin','21.01.15','$url')");
	      if ($db_query > 0)
	   {
		   $get_id = $db_connect ->getAll("SELECT id FROM sf_page WHERE url='$url'");

		   foreach ($get_id as $row) 
		   {
			   $id = $row['id'];
		   }

		   $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items='.$id.'&msg=3';
	       header("Location: ".$upd_url.""); //Обновляем страницу
	       exit();
	   }
    }

    if ($method == 'list') //Get page list (array)
    {
	   $response_array = $db_connect->getAll("SELECT name,id,creator,datecreate,url FROM sf_page");
	   return $response_array;
    }

    if ($method == 'info') //GET Info (array)
    {
	   $response_array = $db_connect->getAll("SELECT name,id,creator,datecreate,url,content FROM sf_page WHERE id='$id'");
	   return $response_array[0];
    }

    if ($method == 'del') //Delete
    {
        $db_query = $db_connect -> query("DELETE FROM sf_page WHERE id='$id'");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=sitepage';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
    }

    if ($method == 'edit')
    {
    	$db_query = $db_connect -> query("UPDATE sf_page SET name = '$name',content = '$content',url = '$url' WHERE id='$id'");

    	$upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items='.$id.'';	
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

function guar_proc($content,$method,$id)
{
	global $db_connect;

    if ($method == 'add')
    {
    	$db_query = $db_connect -> query("INSERT INTO sf_guar (guar) VALUES ('$content')");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items=guar';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();

    } 

    if ($method == 'upd') 
    {
    	$db_query = $db_connect -> query("UPDATE sf_guar SET guar = '$content' WHERE id='$id'");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
    }

    if ($method == 'del')
    {
    	$db_query = $db_connect -> query("DELETE FROM sf_guar WHERE id='$id'");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items=guar';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
    }
}

?>