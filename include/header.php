<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="../js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../js/jquery-3.4.1.min.js"></script>  
    <script src="../js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="../css/jquery-ui.css" />
    <script src="../js/jquery-ui.min.js"></script>
    <title><?php print $PAGE_TITLE; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="./index.php">LIBSYS</a>
        <button class="navbar-toggler" type="button" onclick="this.blur();" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
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
                <li class="nav-item <?php if ($CURRENT_PAGE == "Logout") { ?>active<?php } ?>">
                    <a class="nav-link" href="./logout.php">LOGOUT</a>
                </li>
            </ul>
        </div>
    </nav>