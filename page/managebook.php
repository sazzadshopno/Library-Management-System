<?php
    include '../include/header.php';
?>
    <div class="box">
        <form action="widget/bookentry.php" method="post">
            <table align="center">
                <?php
                include '../include/connection.php';
                include '../include/bookentryerrorhandling.php';
                if (isset($_GET['isbn'])) {
                    $isbn = $_GET['isbn'];
                    if ($_GET['available'] == 'true') {
                        $sql = "SELECT * FROM book WHERE isbn_no = $isbn LIMIT 1;";
                        $result = $con->query($sql);
                        $row = $result->fetch_assoc();
                        echo '<tr><td>ISBN No.</td><td><input type="text" name="isbn_no" value = "' . $row['isbn_no'] . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Title</td><td><input type="text" name="title" value = "' . $row['book_title'] . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Author</td><td><input type="text" name="author" value = "' . $row['book_author'] . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Stocked</td><td><input type="number" name="stock" value = "' . $row['stock'] . '" autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Quantity</td><td><input type="number" value = "0" autofocus="true" name="quantity" min="'.-$row['available'].'" autocomplete="off" ></td></tr>';
                        echo '<tr><td><input type="hidden" value = "'. $row['available'] .'" name="available"  autocomplete="off" ></td></tr>';
                        echo '<tr><td><input type="submit" onclick="return deleteClicked();" name="delete" value = "DELETE" ></td><td><input type="submit" onclick="return updateClicked();" name="update" value = "UPDATE" ></td></tr>';
                    } else {
                        ?>
                        <div class="panel pale-red display-container">
                        <span onclick="this.parentElement.style.display='none'"
                        class="button display-right">&times;</span>
                            <p>The book does not exist in our database. Add book using the form below. </p>
                        </div>
                        <?php
                        echo '<tr><td>ISBN No.</td><td><input type="text" name="isbn_no" value = "'.$isbn.'" autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Title</td><td><input type="text" placeholder = "Enter Title.." name="title" required="" autocomplete="off"></td></tr>';
                        echo '<tr><td>Author</td><td><input type="text" placeholder = "Enter Author.." name="author" required="" autocomplete="off"></td></tr>';
                        echo '<tr><td>Quantity</td><td><input type="number" placeholder = "Enter Quanity.." name="quantity" required="" min="0" autocomplete="off" ></td></tr>';
                        echo '<tr><td></td><td><input type="submit" onclick="return addClicked();" name="add" value = "ADD BOOK" ></td></tr>';
                    }
                } else {
                    echo '<tr><td><input type="text" name="isbn_no" placeholder = "ISBN No."required="" autocomplete="off"></td><td><input type="submit" name="validate" value = "VALIDATE"></td></tr>';
                }
                ?>
            </table>
        </form>
    </div>
    <script src="../js/main.js"></script>
</body>

</html>