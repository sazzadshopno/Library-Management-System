<?php
    include('../../include/connection.php');
    if(isset($_POST['issue'])){
        $std_id = $_POST['std_id'];
        $isbn_no = $_POST['isbn_no'];
        $issuedate = date('Y-m-d', strtotime($_POST['issuedate']));
        $duedate = date('Y-m-d', strtotime($issuedate. ' + 14 days'));

        $studentExist = "SELECT * from student WHERE student_id = '$std_id'";
        $result = $con->query($studentExist);
        if($result->num_rows == 0){
            header("Location: ../issuebook.php?error=studentdoesnotexist");
            exit();
        }

        $studentEligibility = "SELECT * FROM borrowedby WHERE student_id = '$std_id' and return_date is null";
        $result = $con->query($studentEligibility);
        if($result && $result->num_rows >= 3){
            header("Location: ../issuebook.php?error=studentnoteligible");
            exit();
        }
        $bookCheck = "SELECT * FROM book WHERE isbn_no = '$isbn_no'";
        $available;
        $result = $con->query($bookCheck);
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $available = $row['available'];
            if($row['available'] <= 0){
                header("Location: ../issuebook.php?error=booknotavailable");
                exit();
            }
        }else{
            header("Location: ../issuebook.php?error=bookdoesnotexist");
            exit();
        }

        $borrowsql = "INSERT INTO borrowedby(student_id, isbn_no, issue_date, due_date) VALUES ('$std_id', '$isbn_no','$issuedate', '$duedate');";
        $firstresult = $con->query($borrowsql);
        
        if($firstresult){
            $available = $available - 1;
            $updateInventory = "UPDATE book SET available = $available WHERE isbn_no LIKE '$isbn_no';";
            $result = $con->query($updateInventory);
            $con->close();
            if($result){
                header("Location: ../issuebook.php?success=add");
                exit();
            }else{
                header("Location: ../issuebook.php?error=add");
                exit();
            }
        }else{
            header("Location: ../issuebook.php?error=add");
            exit();
        }
    }
?>
