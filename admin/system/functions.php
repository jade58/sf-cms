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
		$upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&type=page&items=main&msg=1';
		header("Location: ".$upd_url.""); //Обновляем страницу
		exit();
		
	} else 
	{
		$upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&type=page&items=main&msg=2';
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
		$chek_page = $db_connect->getAll("SELECT id FROM sf_page WHERE url='$url'");
		print_r($chek_page);

		if (count($chek_page[0]) == 0)
		{
			$db_query = $db_connect -> query("INSERT INTO sf_page (name, content, creator, datecreate, url) VALUES ('$name','$content','admin','21.01.15','$url')");
			if ($db_query > 0)
			{
				$get_id = $db_connect ->getAll("SELECT id FROM sf_page WHERE url='$url'");

				foreach ($get_id as $row) 
				{
					$id = $row['id'];
				}

		   $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&type=page&items='.$id.'&msg=3';
	       
	       header("Location: ".$upd_url.""); //Обновляем страницу
	       exit();

	        } 

	    } else {

	      	$msg_code = 100; //Такая страница уже есть!

		    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=addpage&msg='.$msg_code.'';
	        
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

        if ($db_query == 1)
        {
           $msg_code = 110;
           $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&type=page&items='.$id.'&msg='.$msg_code.'';	
		   header("Location: ".$upd_url.""); //Обновляем страницу
	       exit();
        }
    }
}

function msg_handler($msg_id)
{
	switch ($msg_id) {
		case 1:
			return 'Данные успешно обновленны!';
			break;

		case 2:
			return 'Ошибка';
			break;

		case 3:
			return 'Страница была успешно созданна!';
			break;

		case 100:
			return 'Такая страница уже существует!';
			break;

		case 110:
			return 'Успешно!';
			break;

		case 200:
			return 'Заполните все поля!';
			break;

		case 210:
			return 'Тариф успешно добавлен!';
			break;

		case 212:
			return 'Тариф успешно обновлён!';
			break;

		case 202:
			return 'Все поля должны быть заполенны!';
			break;
	
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

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&type=page&items=guar';	
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

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&type=page&items=guar';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
    }
}

function price_action($method, $name, $price, $number, $id)
{
	global $db_connect;

	if ($method == 'add')
	{
		if (!empty($name) && !empty($price) && !empty($number))
		{

			$db_query = $db_connect -> query("INSERT INTO sf_price (name, price, num_b) VALUES ('$name','$price','$number')");
			if ($db_query > 0)
			{
				$msg_code = 210;
	              $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items='.$id.'&type=plan&msg='.$msg_code.'';	
		          header("Location: ".$upd_url.""); //Обновляем страницу
	              exit();				
            }

		} else {
		   $msg_code = 200;

	         $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=addplan&msg='.$msg_code.'';	
		     header("Location: ".$upd_url.""); //Обновляем страницу
	         exit();
		}
	}

	if ($method == 'get')
	{
		$price_array = $db_connect -> getAll("SELECT * FROM sf_price");
		return $price_array;
	}

	if ($method == 'getinfo')
	{
		$price_array = $db_connect -> getAll("SELECT * FROM sf_price WHERE id='$id'");
		return $price_array[0];
	}

	if ($method == 'update')
	{
		if (!empty($name) && !empty($price) && !empty($number))
		{

			$db_query = $db_connect -> query("UPDATE sf_price SET name = '$name',price = '$price',num_b = '$number' WHERE id='$id'");
			if ($db_query > 0)
			{
				$msg_code = 212;
	              $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&items='.$id.'&type=plan&msg='.$msg_code.'';	
		          header("Location: ".$upd_url.""); //Обновляем страницу
	              exit();				
            }

		} else {
		   $msg_code = 202;

	         $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=addplan&msg='.$msg_code.'';	
		     header("Location: ".$upd_url.""); //Обновляем страницу
	         exit();
		}
	}
}

?>