<?php
if (isset($_GET['page']))
{
	switch ($_GET['page']) {
		case 'main':
			include 'templates/main.php';
			break;
		
		default:
			include 'templates/main.php';
			break;
	}
} else {
			include 'templates/main.php';
}
?>