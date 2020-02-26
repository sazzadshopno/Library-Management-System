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
    <title><?php print $PAGE_TITLE; ?></title>
</head>
<body>
<header id="header">
    <div class="navbar">
        <a href="./index.php" id="title">LIBSYS</a>
        <a href="./index.php" class="<?php if ($CURRENT_PAGE == "Dashboard") {?>active<?php }?>">DASHBOARD</a>
        <a href="./issuebook.php" class="<?php if ($CURRENT_PAGE == "Issue Book") {?>active<?php }?>">ISSUE BOOK</a>
        <a href="./managebook.php" class="<?php if ($CURRENT_PAGE == "Manage Book") {?>active<?php }?>">MANAGE BOOK</a>
        <a href="./searchbook.php" class="<?php if ($CURRENT_PAGE == "Search Book") {?>active<?php }?>">SEARCH BOOK</a>
        <a href="./managestudent.php" class="<?php if ($CURRENT_PAGE == "Manage Student") {?>active<?php }?>">MANAGE STUDENT</a>
        <a href="./searchstudent.php" class="<?php if ($CURRENT_PAGE == "Search Student") {?>active<?php }?>">SEARCH STUDENT</a>
        <a href="./logout.php" class="<?php if ($CURRENT_PAGE == "Logout") {?>active<?php }?>">LOGOUT</a>
    </div>
</header>