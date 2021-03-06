<?php
if(isset($_POST['id'])) {
    include('../../include/connection.php');
    $id = $_POST['id'];
    $sql = "SELECT * FROM student WHERE student_id = '$id'";
    $result = $con->query($sql); 
    if($result->num_rows > 0) {
        echo "Taken";
    }else{
        echo "Not Taken";
    }
}
?>