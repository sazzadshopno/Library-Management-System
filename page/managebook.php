<?php
    include '../include/header.php';
?>
    <div class="box">
        <form action="widget/bookentry.php" method="post">
            <table align="center">
                <?php
                include '../include/connection.php';
                if(isset($_GET['success'])){
                    if($_GET['success'] == 'true'){
                        ?>
                        <div class="panel pale-green display-container">
                        <span onclick="this.parentElement.style.display='none'"
                            class="button display-right">&times;</span>
                            <p>Database updated.</p>
                        </div>
                        <?php
                    }else{
                        ?>
                        <div class="panel pale-red display-container">
                        <span onclick="this.parentElement.style.display='none'"
                        class="button display-right">&times;</span>
                            <p>There were some issue. Please fix it.</p>
                        </div>
                        <?php
                    }
                }
                if (isset($_GET['isbn'])) {
                    $isbn = $_GET['isbn'];
                    if ($_GET['available'] == 'true') {
                        $sql = "SELECT * FROM book WHERE isbn_no = $isbn LIMIT 1;";
                        $result = $con->query($sql);
                        $row = $result->fetch_assoc();
                        $isbn_no = $row['isbn_no'];
                        $title = $row['book_title'];
                        $author = $row['book_author'];
                        $stock = $row['stock'];
                        $available = $row['available'];
                        echo '<tr><td>ISBN No.</td><td><input type="text" name="isbn_no" value = "' . $isbn_no . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Title</td><td><input type="text" name="title" value = "' . $title . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Author</td><td><input type="text" name="author" value = "' . $author . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Stocked</td><td><input type="number" name="stock" value = "' . $stock . '" autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Quantity</td><td><input type="number" placeholder = "Enter Quanity.." name="quantity" required="" min="'.-$available.'" autocomplete="off" ></td></tr>';
                        echo '<tr><td><input type="hidden" value = "'.$available.'" name="available"  autocomplete="off" ></td></tr>';
                        echo '<tr><td></td><td><input type="submit" name="update" value = "UPDATE" ></td></tr>';
                    } else {
                        echo '<tr><td>ISBN No.</td><td><input type="text" name="isbn_no" value = "'.$isbn.'" autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Title</td><td><input type="text" placeholder = "Enter Title.." name="title" required="" autocomplete="off"></td></tr>';
                        echo '<tr><td>Author</td><td><input type="text" placeholder = "Enter Author.." name="author" required="" autocomplete="off"></td></tr>';
                        echo '<tr><td>Quantity</td><td><input type="number" placeholder = "Enter Quanity.." name="quantity" required="" min="0" autocomplete="off" ></td></tr>';
                        echo '<tr><td></td><td><input type="submit" name="add" value = "ADD BOOK" ></td></tr>';
                    }
                } else {
                    echo '<tr><td><input type="text" name="isbn_no" placeholder = "ISBN No."required="" autocomplete="off"></td><td><input type="submit" name="validate" value = "validate"></td></tr>';
                }
                ?>
            </table>
        </form>
    </div>
</body>

</html>