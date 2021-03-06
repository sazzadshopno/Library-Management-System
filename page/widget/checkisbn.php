<?php
if(isset($_POST['isbn'])) {
    include('../../include/connection.php');
    $isbn = $_POST['isbn'];
    $sql = "SELECT * FROM book WHERE isbn_no = '$isbn'";
    $result = $con->query($sql); 
    if($result->num_rows > 0) {
        echo "Taken";
    }else{
        echo "Not Taken";
    }
}
?>