<?php
session_start();
if(!isset($_SESSION['username'])){
	?>
	<script type="text/javascript">
		window.location.replace('../index.php?notloggedin=true');
	</script>
	<?php
}
include '../include/header.php';
?>
<div id="content" class="p-4 p-md-5 pt-5">
<h3 class="custom_title">SEARCH BOOK</h3>
<div class="container">
    <?php 
        include '../include/searchbookerrorhandling.php';
    ?>
    <form action="widget/searchbook.php" method="post">
        <table align="center">
            <tr>
                <th style="padding-right:.5rem"><input type="text" name="isbnortitle" autocomplete = "off" placeholder="Enter the ISBN or Title of the book.."></th>
                <th><input type="submit" name="search" value="SEARCH"></th>
            </tr>
        </table>
    </form>
</div>
<div class="result">
    
    <?php
    include('../include/connection.php');
        if(isset($_GET['type'])){
            echo "<h4>Search result of: ". $_GET['value'] ." <button class= 'btn btn-secondary btn-sm' onclick='viewsearch()'>&#10007; Clear</button></h4>";
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
                
                echo '<th>Available</th><th>Option</th></tr>';
                $keyword = $_GET['value'];
                while($row = $result->fetch_assoc()){
                    $isbn = preg_replace("/$keyword/i", "<b style='background-color:yellow;'>$0</b>", $row['isbn_no']);
                    echo '<tr><td>'.$isbn.'</td>';
                    echo '<td>'.$row['book_title'].'</td>';
                    echo '<td>'.$row['book_author'].'</td>';
                    
                    echo '<td>'.$row['available'].'</td><td style="width:10%;"><button type="button" class="btn btn-secondary btn-sm" onclick="view('.$row["isbn_no"].')">Edit</button></td></tr>';
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
                echo '<th>Available</th><th>Option</th></tr>';
                $keyword = $_GET['value'];
                while($row = $result->fetch_assoc()){
                    $book = preg_replace("/$keyword/i", "<b style='background-color:yellow;'>$0</b>", $row['book_title']);
                    echo '<tr><td>'.$row['isbn_no'].'</td>';
                    echo '<td>'.$book.'</td>';
                    echo '<td>'.$row['book_author'].'</td>';
                    echo '<td>'.$row['available'].'</td><td style="width:10%;"><button type="button" class="btn btn-secondary btn-sm" onclick="view('.$row["isbn_no"].')">Edit</button></td></tr>';
                }
                echo "</table>";
                $con->close();
            }
        }else{
                echo "<h4><strong>All Books</strong></h4>";
                echo "<table align='center'>";
                echo '<tr><th>ISBN No.</th>';
                echo '<th>Title</th>';
                echo '<th>Author</th>';
                echo '<th>Available</th><th>Option</th></tr>';
                $sql = "SELECT * FROM book;";
                $result = $con->query($sql);
                if($result->num_rows == 0){
                    exit();
                }
                
                while($row = $result->fetch_assoc()){
                    echo '<tr><td>'.$row['isbn_no'].'</td>';
                    echo '<td>'.$row['book_title'].'</td>';
                    echo '<td>'.$row['book_author'].'</td>';
                    
                    echo '<td>'.$row['available'].'</td><td style="width:10%;"><button type="button" class="btn btn-secondary btn-sm" onclick="view('.$row["isbn_no"].')">Edit</button></td></tr>';
                }
                echo "</table>";
                $con->close();
        }
    ?>
    </div>
    <script type=text/javascript language="javascript" >
        function view(isbn){
            window.location = 'managebook.php?isbn=' + isbn;
        }
        function viewsearch(){
            location.replace("searchbook.php");
        }
    </script>
    </div>
</div>
</body>

</html>