<?php
	switch ($_SERVER["SCRIPT_NAME"]) {
		case "/library/page/issuebook.php":
			$CURRENT_PAGE = "Issue"; 
			$PAGE_TITLE = "Issue Book";
			break;
		case "/library/page/addbook.php":
			$CURRENT_PAGE = "Add"; 
			$PAGE_TITLE = "Add Book";
            break;
        case "/library/page/logout.php":
            $CURRENT_PAGE = "Logout"; 
            $PAGE_TITLE = "Logout";
            break;
		default:
			$CURRENT_PAGE = "Dashboard";
			$PAGE_TITLE = "Dashboard";
	}
?>