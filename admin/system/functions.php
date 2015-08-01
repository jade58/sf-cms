<?

function get_users()
{
	global $db_connect;

	$response_array = $db_connect->getAll("SELECT login,id FROM sf_user ORDER BY id DESC LIMIT 3");
	return $response_array;
}

?>