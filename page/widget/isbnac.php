<?php
    include('../../include/connection.php');
    if(isset($_GET['term'])){
        $string = '%'.$_GET['term'].'%';
        $sql = "SELECT * FROM book WHERE isbn_no LIKE '$string';";
        $res = $con->query($sql);
        $data = array();
        if($res->num_rows > 0){ 
            while($row = $res->fetch_assoc()){ 
                $data[] = $row['isbn_no'];
            } 
        }
        $con->close();
        echo json_encode($data); 
    }
?>
