<?php
    include('../../include/connection.php');
    if(isset($_POST['search'])){
        if($_POST['choose'] == 'isbn'){
            $isbn = trim($_POST['isbn']);
            $flag = 0;
            for($i = 0; $i < strlen($isbn); $i++){
                if(!is_numeric($isbn[$i])){
                    $flag = 1;
                    break;
                }
            }
            if($flag || $isbn == ""){
                header("Location: ../index.php?error=isbn");
                exit();
            }else{
                $sql = "SELECT * FROM borrowedby WHERE return_date is null and isbn_no = '$isbn' ORDER BY due_date";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                    header("Location: ../index.php?isbn=".$isbn);
                    exit();
                }else{
                    header("Location: ../index.php?empty=isbn");
                    exit();
                }
            }
        }else if($_POST['choose'] == 'std_id'){
            $std_id = trim($_POST['std_id']);
            if($std_id == ""){
                header("Location: ../index.php?error=std_id");
                exit();
            }else{
                $sql = "SELECT * FROM borrowedby WHERE return_date is null and student_id = '$std_id' ORDER BY due_date";
                $result = $con->query($sql);
                if($result->num_rows > 0){
                    header("Location: ../index.php?std_id=".$std_id);
                    exit();
                }else{
                    header("Location: ../index.php?empty=std_id");
                    exit();
                }
            }
        }
    }
?>
