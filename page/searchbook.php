<?php
include '../include/header.php';
?>
<div class="container">
    <?php 
        include '../include/searchbookerrorhandling.php';
    ?>
    <form action="widget/searchbook.php" method="post">
        <table align="center">
            <tr>
                <th><input type="text" name="isbnortitle" autocomplete = "off" placeholder="Enter the ISBN or Title of the book.."></th>
                <th><input type="submit" name="search" value="SEARCH"></th>
            </tr>
        </table>
    </form>
</div>
<div class="result">
    
    <?php
        if(isset($_GET['type'])){
            include('../include/connection.php');
            echo "<h3>Search result of: ". $_GET['value'] ."</h3>";
            if($_GET['type'] == 'isbn'){
                $isbn = $_GET['value'];
                $sql = "SELECT * FROM book WHERE isbn_no = $isbn;";
                $result = $con->query($sql);
                if($result->num_rows == 0){
                    header("Location: searchbook.php?error=noresult");
                    exit();
                }
                echo "<table align='center'>";
                echo '<tr><th>ISBN No.</th>';
                echo '<th>Title</th>';
                echo '<th>Author</th>';
                echo '<th>Stock</th>';
                echo '<th>Available</th></tr>';
                while($row = $result->fetch_assoc()){
                    echo '<tr onclick="view('.$row["isbn_no"].')"><td>'.$row['isbn_no'].'</td>';
                    echo '<td>'.$row['book_title'].'</td>';
                    echo '<td>'.$row['book_author'].'</td>';
                    echo '<td>'.$row['stock'].'</td>';
                    echo '<td>'.$row['available'].'</td></tr>';
                }
                echo "</table>";
                $con->close();
            }else{
                $title = "%" . $_GET['value'] . "%";
                $sql = "SELECT * FROM book WHERE book_title LIKE '$title';";
                $result = $con->query($sql);
                if($result->num_rows == 0){
                    header("Location: searchbook.php?error=noresult");
                    exit();
                }
                echo "<table align='center'>";
                echo '<tr><th>ISBN No.</th>';
                echo '<th>Title</th>';
                echo '<th>Author</th>';
                echo '<th>Stock</th>';
                echo '<th>Available</th></tr>';
                while($row = $result->fetch_assoc()){
                    echo '<tr onclick="view('.$row["isbn_no"].')"><td>'.$row['isbn_no'].'</td>';
                    echo '<td>'.$row['book_title'].'</td>';
                    echo '<td>'.$row['book_author'].'</td>';
                    echo '<td>'.$row['stock'].'</td>';
                    echo '<td>'.$row['available'].'</td></tr>';
                }
                echo "</table>";
                $con->close();
            }
        }
    ?>
    </div>
    <script type=text/javascript language="javascript" >
        function view(isbn){
            window.location = 'managebook.php?isbn=' + isbn + '&available=true';
        }
    </script>
</body>

</html>