<?php
    require_once('db.php');
    $db = new DATABASE();
    $con = $db->connect();
    if($con->connect_errno){
        die('failed to connect to the database ' . $con->connect_errno);
    }
?>