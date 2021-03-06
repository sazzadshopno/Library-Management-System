<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="../js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/jquery-ui.css" />
    <script src="../js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
    <title><?php print $PAGE_TITLE; ?></title>
</head>

<body>
<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="" style='height:100vh'>
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only"></span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="./index.php" class="logo">LIBSYS</a></h1>
	        <ul class="list-unstyled components mb-5">
            <li class="nav-item <?php if ($CURRENT_PAGE == "Dashboard") { ?>active<?php } ?>">
                    <a class="nav-link" href="./index.php">DASHBOARD</a>
                </li>
                <li class="nav-item <?php if ($CURRENT_PAGE == "Issue Book") { ?>active<?php } ?>">
                    <a class="nav-link" href="./issuebook.php">ISSUE BOOK</a>
                </li>
                <li class="nav-item <?php if ($CURRENT_PAGE == "Manage Book") { ?>active<?php } ?>">
                    <a class="nav-link" href="./managebook.php">MANAGE BOOK</a>
                </li>
                <li class="nav-item <?php if ($CURRENT_PAGE == "Search Book") { ?>active<?php } ?>">
                    <a class="nav-link" href="./searchbook.php">SEARCH BOOK</a>
                </li>
                <li class="nav-item <?php if ($CURRENT_PAGE == "Manage Student") { ?>active<?php } ?>">
                    <a class="nav-link" href="./managestudent.php">MANAGE STUDENT</a>
                </li>
                <li class="nav-item <?php if ($CURRENT_PAGE == "Search Student") { ?>active<?php } ?>">
                    <a class="nav-link" href="./searchstudent.php">SEARCH STUDENT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./logout.php">LOGOUT</a>
                </li>
	        </ul>

	        <div class="footer">
	        	<p>
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved to Sazzad Hossain.
						  </p>
	        </div>

	      </div>
    	</nav>
    
    <script src="../js/main.js"></script>