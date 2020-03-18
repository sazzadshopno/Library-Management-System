<?php
    session_start();
    include('../../include/connection.php');
    if(isset($_POST['validate'])){
        $student_id = trim($_POST['student_id']);
        $flag = 0;
        for($i = 0; $i < strlen($student_id); $i++){
            if(!is_numeric($student_id[$i])){
                $flag = 1;
                break;
            }
        }
        if($flag || $student_id == ""){
            header("Location: ../managestudent.php?error=student_id");
            exit();
        }
        $sql = "SELECT * FROM student WHERE student_id = '$student_id' LIMIT 1;";
        $result = $con->query($sql);
        $available = $result->num_rows == 1? 'true' : 'false';
        $con->close();
        header("Location: ../managestudent.php?student_id=$student_id&available=$available"); 
        exit();
    }else if(isset($_POST['add'])){
        $student_id = $_POST['student_id'];
        $student_name = $_POST['student_name'];
        $student_session = $_POST['student_session'];
        $student_department = $_POST['student_department'];
        $student_roll = $_POST['student_roll'];
        $librarian = $_SESSION['id'];
        $date = date('Y-m-d');
        
        $studenttablesql = "INSERT INTO student (student_id, librarian_id, student_name, student_session, student_department, student_roll, student_fine, std_reg_date) VALUES ('$student_id', '$librarian','$student_name', '$student_session', '$student_department', '$student_roll', '0', '$date');";
        $firstresult = $con->query($studenttablesql);
        
        $con->close();
        if($firstresult){
            header("Location: ../managestudent.php?success=add");
        }else{
            header("Location: ../managestudent.php?error=add");
        }
        exit();
    }else if(isset($_POST['update'])){
        $student_id = $_POST['student_id'];
        $newfine = (string)((int)$_POST['student_fine'] - (int)$_POST['student_fine_received']);
        $student_name = $_POST['student_name'];
        $student_roll = $_POST['student_roll'];
        $studenttablesql = "UPDATE student SET student_fine = $newfine, student_name = '$student_name', student_roll = '$student_roll' WHERE student_id LIKE '$student_id';";
        $firstresult = $con->query($studenttablesql);
        $con->close();
        if($firstresult){
            header("Location: ../managestudent.php?success=update");
        }else{
            header("Location: ../managestudent.php?error=update");
        }
        exit();
    }else if(isset($_POST['delete'])){
        $student_id = $_POST['student_id'];
        
        $sql = "DELETE FROM student WHERE student_id = $student_id;";
        $firstresult = $con->query($sql);
        $con->close();
        if($firstresult){
            header("Location: ../managestudent.php?success=delete");
        }else{
            header("Location: ../managestudent.php?error=delete");
        }
        exit();
    }
?>
