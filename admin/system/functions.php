<?

function get_users()
{
	global $db_connect;

	$response_array = $db_connect->getAll("SELECT login,id FROM sf_user ORDER BY id DESC LIMIT 3");
	return $response_array;
}

function get_pages()
{
	global $db_connect;

	$response_array = $db_connect->getAll("SELECT name,id,creator,datecreate,url FROM sf_page");
	return $response_array;
}

function main_update($wtext,$des,$other)
{
	global $db_array,$db_connect,$g_url; //db_array -- Массив с данными из таблицы sf_config

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

	header("Location: ".$g_url.""); //Обновляем страницу

}

function page_create($name,$url,$content)
{
	global $db_connect;

	$db_query = $db_connect -> query("INSERT INTO sf_page (name, content, creator, datecreate, url) VALUES ('$name','$content','admin','21.01.15','$url')");
}

?>