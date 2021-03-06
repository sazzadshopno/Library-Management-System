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
<h3 class="custom_title">MANAGE BOOK</h3>
    <div class="container">
        <form action="widget/bookentry.php" method="post">
            <table align="center">
                <?php
                include '../include/connection.php';
                include '../include/bookentryerrorhandling.php';
                if (isset($_GET['isbn'])) {
                    $isbn = $_GET['isbn'];
                    $sql = "SELECT * FROM book WHERE isbn_no = $isbn LIMIT 1;";
                    $result = $con->query($sql);
                    $num_rows = $result->num_rows;
                    if($num_rows == 0 ){
                        ?>
                        <script>
                            window.location.replace('searchbook.php');
                        </script>
                        <<?php
                    }
                    $row = $result->fetch_assoc();

                    if ($result) {
                        echo '<tr><td>ISBN No.</td><td><input type="text" name="isbn_no" value = "' . $row['isbn_no'] . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Title</td><td><input type="text" name="title" value = "' . $row['book_title'] . '"  autocomplete="off" ></td></tr>';
                        echo '<tr><td>Author</td><td><input type="text" name="author" value = "' . $row['book_author'] . '"  autocomplete="off" ></td></tr>';
                        echo '<tr><td>Stocked</td><td><input type="number" min = "0" name="stock" value = "' . $row['stock'] . '" autocomplete="off" ></td></tr>';
                        echo '<tr><td><input type="hidden" value = "'. $row['available'] .'" name="available"  autocomplete="off" ></td></tr>';
                        echo '<tr><td><input type="hidden" value = "'. $row['stock'] .'" name="prevstock"  autocomplete="off" ></td></tr>';
                        echo '<tr><td><input type="submit" name="update" value = "SAVE" ></td><td><input type="submit" name="delete" value = "DELETE" ></td></tr>';
                    }else {
                        ?>
                        <script>
                            window.location.replace('managebook.php');
                        </script>
                        <<?php
                    }
                } else {
                    echo '<tr><td>ISBN No.</td><td><input type="text" id="isbn" name="isbn_no" autocomplete="off" onkeyup = "ValidateISBN(this); return false;" required="" placeholder="ISBN No."></td></tr>';
                    echo '<tr><td>Title</td><td><input type="text" placeholder = "Enter Title.." name="title" required="" autocomplete="off"></td></tr>';
                    echo '<tr><td>Author</td><td><input type="text" placeholder = "Enter Author.." name="author" required="" autocomplete="off"></td></tr>';
                    echo '<tr><td>Quantity</td><td><input type="number" placeholder = "Enter Quanity.." name="quantity" required="" min="0" autocomplete="off" ></td></tr>';
                    echo '<tr><td></td><td><input type="submit" id="submitBtn" disabled="true" name="add" value = "ADD BOOK" ></td></tr>';
                }
                ?>
            </table>
        </form>
    </div>
    </div>
</div>
<script>
function ValidateISBN(isbn){
    var badColor = "#ff6666";
    var submitBtn = document.getElementById('submitBtn')
    if(isbn.value.trim() == '' || isNaN(isbn.value * 1)){
        isbn.style.backgroundColor = badColor;
        submitBtn.disabled = true;
    }else{
        $.ajax({
        type: 'post',
        url: 'widget/checkisbn.php',
        data: {
            'isbn': isbn.value // all variables i want to pass. In this case, only one.
        },
        success: function(data) {
            
            if(data == 'Taken'){
                isbn.style.backgroundColor = badColor;
                submitBtn.disabled = true;
            }else{
                isbn.style.backgroundColor = "";
                submitBtn.disabled = false;
            }
        }
    });
    }
}
</script>
</body>

</html>