<?php
    include('../../include/connection.php');
    if(isset($_POST['search'])){
        $string = trim($_POST['isbnortitle']);
        if($string == "") {
            header("Location: ../searchbook.php?error=empty");
            exit();
        }
        $istitle = 0;
        for($i = 0; $i < strlen($string); $i++){
            if(!is_numeric($string[$i])){
                $istitle = 1;
            }
        }
        if($istitle == 1){
            header("Location: ../searchbook.php?type=title&value=$string");
            exit();
        }else{
            header("Location: ../searchbook.php?type=isbn&value=$string");
            exit();
        }
    }
?>
