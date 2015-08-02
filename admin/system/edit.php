<?php
if (isset($_GET['page']))
{
	switch ($_GET['items']) {
		case 'main':
		    $edit_page = 'templates/sub_page/mainform.php';
			break;
		
		default:
			$edit_page = 'templates/sub_page/staticform.php';
			break;
	}
}
?>