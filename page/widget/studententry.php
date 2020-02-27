<?php
    include('../../include/connection.php');
    if(isset($_POST['validate'])){
        $student_id = trim($_POST['student_id']);
        if($student_id == ""){
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
        $librarian = 'LIB_001';
        $date = date('Y-m-d');
        echo $student_session;
        $studenttablesql = "INSERT INTO student (student_id, student_name, student_session, student_department, student_roll, student_fine) VALUES ('$student_id', '$student_name', '$student_session', '$student_department', '$student_roll', '0');";
        $firstresult = $con->query($studenttablesql);
        $studentmanagetablesql = "INSERT INTO studentmanagedby (librarian_id, student_id, std_reg_date) VALUES ('$librarian', '$student_id', '$date');";
        $secondresult = $con->query($studentmanagetablesql);
        $con->close();
        if($firstresult && $secondresult){
            header("Location: ../managestudent.php?success=add");
        }else{
            header("Location: ../managestudent.php?error=add");
        }
        exit();
    }else if(isset($_POST['update'])){
        $student_id = $_POST['student_id'];
        $newfine = (string)((int)$_POST['student_fine'] - (int)$_POST['student_fine_received']);
        
        $studenttablesql = "UPDATE student SET student_fine = $newfine WHERE student_id LIKE '$student_id';";
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
        $librarian = 'LIB_001';
        
        $sql = "DELETE FROM student WHERE student_id = $student_id;";
        $firstresult = $con->query($sql);
        $con->close();
        if($firstresult){
            header("Location: ../managestudent.php?success=delete");
        }else{
            header("Location: ../managestudent.php?error=delete");
        }
        exit();
    }else if(isset($_POST['goback'])){
        $student_id = $_POST['student_id'];
        $librarian = 'LIB_001';
        
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
