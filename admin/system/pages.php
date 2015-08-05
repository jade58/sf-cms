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
			$page = 'templates/commerce.php';
			break;
		case 'materials':
			//include 'templates/materials.php';
			break;
		case 'edit':
			$page = 'templates/editpage.php';
			break;
		case 'addpage':
			$page = 'templates/addpage.php';
			break;
		case 'addplan':
			$page = 'templates/addplan.php';
			break;
		case 'addguar':
			$page = 'templates/addguar.php';
			break;
		
		default:
			$page = 'templates/main.php';
			break;
	}
} else {
			$page = 'templates/main.php';
}

include 'templates/index.php';

?>