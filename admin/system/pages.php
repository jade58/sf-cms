<?php
if (isset($_GET['page']))
{
	switch ($_GET['page']) {
		case 'main':
			$page = 'templates/main.php';
			break;
		case 'sitepage':
			$page = 'templates/sitepage.php';
			break;
		case 'commerce':
			//include 'templates/commerce.php';
			break;
		case 'materials':
			//include 'templates/materials.php';
			break;
		
		default:
			include 'templates/main.php';
			break;
	}
} else {
			include 'templates/main.php';
}

include 'templates/index.php';
?>