<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/page/issuebook.php":
			$CURRENT_PAGE = "Issue Book"; 
			$PAGE_TITLE = "Issue Book";
			break;
		case "/page/managebook.php":
			$CURRENT_PAGE = "Manage Book"; 
			$PAGE_TITLE = "Manage Book";
            break;
        case "/page/logout.php":
            $CURRENT_PAGE = "Logout"; 
            $PAGE_TITLE = "Logout";
			break;
		case "/page/searchbook.php":
			$CURRENT_PAGE = "Search Book"; 
			$PAGE_TITLE = "Search Book";
			break;
		case "/page/searchstudent.php":
			$CURRENT_PAGE = "Search Student"; 
			$PAGE_TITLE = "Search Student";
			break;
		case "/page/managestudent.php":
			$CURRENT_PAGE = "Manage Student"; 
			$PAGE_TITLE = "Manage Student";
			break;
		default:
			$CURRENT_PAGE = "Dashboard";
			$PAGE_TITLE = "Dashboard";
	}
?>