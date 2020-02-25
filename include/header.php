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
        <a href="./issuebook.php" class="<?php if ($CURRENT_PAGE == "Issue") {?>active<?php }?>">ISSUE BOOK</a>
        <a href="./addbook.php" class="<?php if ($CURRENT_PAGE == "Add") {?>active<?php }?>">ADD BOOK</a>
        <a href="./logout.php" class="<?php if ($CURRENT_PAGE == "Logout") {?>active<?php }?>">LOGOUT</a>
    </div>
</header>