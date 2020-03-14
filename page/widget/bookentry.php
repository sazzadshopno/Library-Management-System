<?php
    include('../../include/connection.php');
    if(isset($_POST['validate'])){
        $isbn = trim($_POST['isbn_no']);
        $flag = 0;
        for($i = 0; $i < strlen($isbn); $i++){
            if(!is_numeric($isbn[$i])){
                $flag = 1;
                break;
            }
        }
        if($flag){
            header("Location: ../managebook.php?error=isbn");
            exit();
        }
        $sql = "SELECT * FROM book WHERE isbn_no = $isbn LIMIT 1;";
        $result = $con->query($sql);
        $available = $result->num_rows == 1? 'true' : 'false';
        $con->close();
        header("Location: ../managebook.php?isbn=$isbn&available=$available"); 
        exit();
    }else if(isset($_POST['add'])){
        $isbn_no = $_POST['isbn_no'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $quantity = $_POST['quantity'];
        $librarian = '1';
        $date = date('Y-m-d');

        $booktablesql = "INSERT INTO book (isbn_no, book_title, book_author, stock, available, librarian_id, stock_date) VALUES ('$isbn_no', '$title', '$author', '$quantity', '$quantity', '$librarian', '$date');";
        $firstresult = $con->query($booktablesql);
        
        $con->close();
        if($firstresult){
            header("Location: ../managebook.php?success=add");
        }else{
            header("Location: ../managebook.php?error=add");
        }
        exit();
    }else if(isset($_POST['update'])){
        $isbn_no = $_POST['isbn_no'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $stock = $_POST['stock'];
        $available = $_POST['available'];
        $prevstock = $_POST['prevstock'];
        $newavailable = (int)$_POST['available'] + ((int)$_POST['stock'] - (int)$_POST['prevstock']);
        echo $newavailable;
        if($newavailable < 0){
            header("Location: ../managebook.php?error=update");
            exit();
        }
        $booktablesql = "UPDATE book SET stock = $stock, available = $newavailable, book_title = '$title', book_author = '$author'  WHERE isbn_no LIKE $isbn_no;";
        $firstresult = $con->query($booktablesql);
        $con->close();
        if($firstresult){
            header("Location: ../managebook.php?success=update");
        }else{
            header("Location: ../managebook.php?error=update");
        }
        exit();
    }else if(isset($_POST['delete'])){
        $isbn_no = $_POST['isbn_no'];
        $librarian = 'LIB_001';
        
        $sql = "DELETE FROM book WHERE isbn_no = $isbn_no;";
        $firstresult = $con->query($sql);
        $con->close();
        if($firstresult){
            header("Location: ../managebook.php?success=delete");
        }else{
            header("Location: ../managebook.php?error=delete");
        }
        exit();
    }
?>
