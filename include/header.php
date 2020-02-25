<header id="header">
    <div class="navbar">
        <a href="./index.php" id="title">LIBSYS</a>
        <a href="./index.php" class="<?php if ($CURRENT_PAGE == "Dashboard") {?>active<?php }?>">DASHBOARD</a>
        <a href="./issuebook.php" class="<?php if ($CURRENT_PAGE == "Issue") {?>active<?php }?>">ISSUE BOOK</a>
        <a href="./addbook.php" class="<?php if ($CURRENT_PAGE == "Add") {?>active<?php }?>">ADD BOOK</a>
        <a href="./logout.php" class="<?php if ($CURRENT_PAGE == "Logout") {?>active<?php }?>">LOGOUT</a>
    </div>
</header>