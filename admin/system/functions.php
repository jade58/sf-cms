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
	global $db_array,$db_connect,$g_url,$msg; //db_array -- Массив с данными из таблицы sf_config

	foreach ($db_array as $row) 
	{
		switch ($row['name']) 
		{
			case 'welcome_text':
				$current_wtext = $row['value'];
				break;
			case 'description':
				$current_des = $row['value'];
				break;
			
		}
	}

	if ($wtext != $current_wtext)
	{
		$update = $db_connect -> query("UPDATE bc_config SET value = '$wtext' WHERE name='welcome_text'");
	}

	if ($des != $current_des)
	{
		$update = $db_connect -> query("UPDATE bc_config SET value = '$des' WHERE name='description'");
	}

	if ($update == 1)
	{
		$msg = 'Новые данные были успешны сохранены!';
	} else {
		$msg = 'Ошибка';
	}

	header("Location: ".$g_url.""); //Обновляем страницу

}

//Функция для создания страниц сайта
function page_create($name,$url,$content)
{
	global $db_connect;

	$db_query = $db_connect -> query("INSERT INTO sf_page (name, content, creator, datecreate, url) VALUES ('$name','$content','admin','21.01.15','$url')");
	if ($db_query > 0)
	{
		header("Location: ".$g_url.""); //Обновляем страницу
	}
}

?>