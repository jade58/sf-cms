<?php

//функция для получения массива пользователей сайта
function get_users()
{
	global $db_connect;

	$response_array = $db_connect->getAll("SELECT login,id FROM sf_user ORDER BY id DESC LIMIT 3");
	return $response_array;
}

//Функция при помощи которой обновляется информация выводимая на главной странице сайта.
function main_update($options)
{
	global $msg_code,$db_connect; //db_array -- Массив с данными из таблицы sf_config

		$update = $db_connect -> query("UPDATE bc_config SET value = CASE name WHEN 'description' THEN '$options[des]' WHEN 'welcome_text' THEN '$options[wtext]' ELSE 'site_name' END");

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

function scr_update($options)
{
	global $db_connect,$g_url;

	$update = $db_connect -> query("UPDATE bc_config SET value = '$options[page_name]' WHERE name='scrtext'");
		
		header("Location: ".$g_url.""); //Обновляем страницу
		exit();
}

//Функция для работы со страницами сайта
//function page_action($name,$url,$content,$method,$id)
function page_action($options)
{
	global $db_connect;

	if ($options['method'] == 'create')
	{     
		$chek_page = $db_connect->getAll("SELECT id FROM sf_page WHERE url='$options[page_url]'");
		print_r($chek_page);

		if (count($chek_page[0]) == 0)
		{
			$date = date('Y.m.d'); //Текущая дата.

			$db_query = $db_connect -> query("INSERT INTO sf_page (name, content, creator, datecreate, url) VALUES ('$options[page_name]','$options[content]','admin','$date','$options[page_url]')");
			if ($db_query > 0)
			{
				$get_id = $db_connect ->getAll("SELECT id FROM sf_page WHERE url='$options[page_url]'");

				foreach ($get_id as $row) 
				{
					$id = $row['id'];
				}

		   $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&type=page&items='.$id.'&msg=3';
	       
	       header("Location: ".$upd_url.""); //Обновляем страницу
	       exit();

	        } 

	    } else {

	      	$msg_code = 100;

		    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=addpage&msg='.$msg_code.'';
	        
	        header("Location: ".$upd_url.""); //Обновляем страницу
	        exit();
	}

}

    if ($options['method'] == 'list') //Get page list (array)
    {
	   $response_array = $db_connect->getAll("SELECT name,id,creator,datecreate,url FROM sf_page");
	   return $response_array;
    }

    if ($options['method'] == 'info') //GET Info (array)
    {
	   $response_array = $db_connect->getAll("SELECT * FROM sf_page WHERE id='$options[id]'");
	   return $response_array[0];
    }

    if ($options['method'] == 'del') //Delete
    {
        $db_query = $db_connect -> query("DELETE FROM sf_page WHERE id='$options[id]'");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=sitepage';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
    }

    if ($options['method'] == 'edit')
    {
    	$db_query = $db_connect -> query("UPDATE sf_page SET name = '$options[name]',content = '$options[content]',url = '$options[url]' WHERE id='$options[id]'");

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

function guar_proc($options)
{
	global $db_connect;

	if ($options['method'] == 'list')
	{
         $get_guar = $db_connect -> getAll("SELECT * FROM sf_guar");
         return $get_guar;
	}

	if ($options['method'] == 'info')
	{
	     $get_guar = $db_connect -> getAll("SELECT * FROM sf_guar WHERE id = '$options[id]'");
	     return $get_guar[0];
	}

    if ($options['method'] == 'add')
    {
    	$db_query = $db_connect -> query("INSERT INTO sf_guar (guar) VALUES ('$options[content]')");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=edit&type=page&items=guar';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();

    } 

    if ($options['method'] == 'edit') 
    {
    	$db_query = $db_connect -> query("UPDATE sf_guar SET guar = '$options[content]' WHERE id='$options[id]'");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
    }

    if ($options['method'] == 'del')
    {
    	$db_query = $db_connect -> query("DELETE FROM sf_guar WHERE id='$options[id]'");

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

	if ($method == 'del')
	{
    	$db_query = $db_connect -> query("DELETE FROM sf_price WHERE id='$id'");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=commerce';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
	}
}

function scr_action($options)
{
    global $db_connect;

    if ($options['method'] == 'get')
    {
       $img_array = $db_connect -> getAll("SELECT * FROM sf_scr");

       return $img_array;
    }

    if ($options['method'] == 'add')
    {
    	$db_query = $db_connect -> query("INSERT INTO sf_scr (img_url, bet_date, description) VALUES ('$options[img_url]','$options[date_bet]','$options[description]')");
         
         $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=manager&items=scr';	
		 header("Location: ".$upd_url.""); //Обновляем страницу
	     exit();
    }

    if ($options['method'] == 'del')
    {
    	$db_query = $db_connect -> query("DELETE FROM sf_scr WHERE id='$options[id]'");

	    $upd_url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'].'?page=manager&items=scr';	
		header("Location: ".$upd_url.""); //Обновляем страницу
	    exit();
    }

}

?>