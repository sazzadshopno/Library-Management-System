<?php
    include_once('../../include/connection.php');
    if(isset($_POST['check'])){
        $isbn = $_POST['isbn_no'];
        $available = $_POST['isbn_no'] == '150'? 'true' : 'false';
        header("Location: http://localhost/library/page/addbook.php?isbn=$isbn&available=$available"); 
        exit();
    }else if(isset($_POST['add'])){
        echo "Added";
    }
?>
