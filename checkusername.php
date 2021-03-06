<?php
if(isset($_POST['username'])) {
    include('./include/connection.php');
    $username = $_POST['username'];
    $sql = "SELECT * FROM librarian WHERE librarian_username = '$username'";
    $result = $con->query($sql); 
    if($result->num_rows > 0) {
        echo "Taken";
    }else{
        echo "Not Taken";
    }
}
?>