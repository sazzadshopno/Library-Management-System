<?php
    include('../../include/connection.php');
    if(isset($_GET['term'])){
        $string = '%'.$_GET['term'].'%';
        $sql = "SELECT * FROM student WHERE student_id LIKE '$string';";
        $res = $con->query($sql);
        $data = array();
        if($res->num_rows > 0){ 
            while($row = $res->fetch_assoc()){ 
                $data[] = $row['student_id'];
            } 
        }
        $con->close();
        echo json_encode($data); 
    }
?>
