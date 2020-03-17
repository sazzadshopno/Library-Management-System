
<?php
    include('../../include/connection.php');
    if(isset($_GET['borrowid'])){
        $borrowid = $_GET['borrowid'];
        $today = Date('Y-m-d');

        $sql = "UPDATE borrowedby SET return_date = '$today' WHERE borrow_id LIKE '$borrowid'";
        $res = $con->query($sql);

        $sql2 = "SELECT * FROM borrowedby WHERE borrow_id = '$borrowid'";
        $res2 = $con->query($sql2);

        $row = $res2->fetch_assoc();
        $due_date = $row['due_date'];
        $std_id = $row['student_id'];
        $isbn_no = $row['isbn_no'];


        $sql3 = "UPDATE book SET available = available + 1 WHERE isbn_no = '$isbn_no'";
        $res3 = $con->query($sql3);

        $due_date = strtotime($due_date);
        $today = strtotime($today);
        $fine = (int)($today - $due_date)/60/60/24;;
        if($fine > 0){
            $sql4 = "UPDATE student SET student_fine = student_fine + $fine WHERE student_id = '$std_id'";
            $res4 = $con->query($sql4);
            header("Location: ../index.php?fine=".$fine);
            $con->close();
            exit();
        }else{
            header("Location: ../index.php?return=success");
            $con->close();
            exit(); 
        }
    }
?>
