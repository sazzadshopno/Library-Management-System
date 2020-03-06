<?php
    include('../../include/connection.php');
    if(isset($_POST['search'])){
        $string = trim($_POST['idorname']);
        if($string == "") {
            header("Location: ../searchstudent.php?error=empty");
            exit();
        }
        $isname = 0;
        for($i = 0; $i < strlen($string); $i++){
            if(!is_numeric($string[$i])){
                $isname = 1;
            }
        }
        if($isname == 1){
            header("Location: ../searchstudent.php?type=name&value=$string");
            exit();
        }else{
            header("Location: ../searchstudent.php?type=id&value=$string");
            exit();
        }
    }
?>
