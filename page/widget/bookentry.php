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
        $isbn_no = $_POST['isbn_no'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $quantity = $_POST['quantity'];
        $librarian = 'LIB_001';
        $date = date('Y-m-d');

        $booktablesql = "INSERT INTO book (isbn_no, book_title, book_author, stock, available) VALUES ('$isbn_no', '$title', '$author', '$quantity', '$quantity');";
        $firstresult = $con->query($booktablesql);
        $bookmanagetablesql = "INSERT INTO bookmanagedby (librarian_id, isbn_no, stock_date) VALUES ('$librarian', '$isbn_no', '$date');";
        $secondresult = $con->query($bookmanagetablesql);
        $con->close();
        if($firstresult && $secondresult){
            header("Location: ../addbook.php?success=true");
        }else{
            header("Location: ../addbook.php?success=false");
        }
        exit();
    }else if(isset($_POST['update'])){
        $isbn_no = $_POST['isbn_no'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $stock = $_POST['stock'];
        $quantity = $_POST['quantity'];
        $available = $_POST['available'];
        $newstock = (string)((int)$_POST['stock'] + (int)$_POST['quantity']);
        $newavailable = (string)((int)$_POST['available'] + (int)$_POST['quantity']);
        $librarian = 'LIB_001';
        $date = date('Y-m-d');

        $booktablesql = "UPDATE book SET stock = $newstock, available = $newavailable WHERE isbn_no LIKE $isbn_no;";
        $firstresult = $con->query($booktablesql);
        $bookmanagetablesql = "INSERT INTO bookmanagedby (librarian_id, isbn_no, stock_date) VALUES ('$librarian', '$isbn_no', '$date');";
        $secondresult = $con->query($bookmanagetablesql);
        $con->close();
        if($firstresult && $secondresult){
            header("Location: ../addbook.php?success=true");
        }else{
            header("Location: ../addbook.php?success=false");
        }
        exit();
    }
?>
