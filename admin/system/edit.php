<?php
if (isset($_GET['page']))
{
	if ($_GET['type'] == 'page')
	{

	  switch ($_GET['items']) 
	  {
		case 'main':
		    $edit_page = 'templates/sub_page/mainform.php';
			break;
		case 'scr':
		    $edit_page = 'templates/sub_page/scrform.php';
			break;
        case 'guar':
		    $edit_page = 'templates/sub_page/guarform.php';
			break;
        case 'guaredit':
		    $edit_page = 'templates/sub_page/guaredit_form.php';
			break;
        case 'static':
		    $edit_page = 'templates/sub_page/guaredit_form.php';
			break;
		
		default:
			$edit_page = 'templates/sub_page/staticform.php';
			break;

	  }

    }

    if ($_GET['type'] == 'plan')
    {
    	$edit_page = 'templates/sub_page/planform.php';
    }

    if ($_GET['page'] == 'manager')
    {
    	if (isset($_GET['items']))
    	{
    	  switch ($_GET['items']) 
    	  {

		  case 'scr':
			  $edit_page = 'templates/sub_page/scredit.php';
			  break;
		
		  default:
			  $edit_page = 'templates/sub_page/404.html';
			  break;
	      }

	    } else 

	    {
	    	$edit_page = 'templates/sub_page/404.html';
	    }

    }
}

?>