<?php
    include('../../include/connection.php');
    if(isset($_POST['validate'])){
        $isbn = trim($_POST['isbn_no']);
        if($isbn == ""){
            header("Location: ../addbook.php?success=false");
            exit();
        }
        $sql = "SELECT * FROM book WHERE isbn_no = $isbn LIMIT 1;";
        $result = $con->query($sql);
        $available = $result->num_rows == 1? 'true' : 'false';
        $con->close();
        header("Location: ../addbook.php?isbn=$isbn&available=$available"); 
        exit();
    }else if(isset($_POST['add'])){
        echo "Added";
    }
?>
