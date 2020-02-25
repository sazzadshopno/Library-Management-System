<?php
    include '../include/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include '../include/head.php';
?>

<body>
    <?php
        include '../include/header.php';
    ?>
    <div class="box">
        <form action="widget/bookentry.php" method="post">
            <table align="center">
                <?php
                if (isset($_GET['isbn'])) {
                    $isbn = $_GET['isbn'];
                    $title = 'Software Engineering';
                    $author = 'Sommerville';
                    echo '<tr><td>ISBN No.</td><td><input type="text" name="isbn_no" value = ' . $isbn . ' required="" autocomplete="off" disabled></td></tr>';
                    if ($_GET['available'] == 'true') {
                        echo '<tr><td>Title</td><td><input type="text" name="title" value = "'.$title.'" required="" autocomplete="off" disabled></td></tr>';
                        echo '<tr><td>Author</td><td><input type="text" name="author" value = "'.$author.'" required="" autocomplete="off" disabled></td></tr>';
                        echo '<tr><td>Quantity</td><td><input type="number" name="quantity" required="" autocomplete="off" ></td></tr>';
                    } else {
                        echo '<tr><td>Title</td><td><input type="text" placeholder = "Enter Title.." name="title" required="" autocomplete="off"></td></tr>';
                        echo '<tr><td>Author</td><td><input type="text" placeholder = "Enter Author.." name="author" required="" autocomplete="off"></td></tr>';
                        echo '<tr><td>Quantity</td><td><input type="number" placeholder = "Enter Quanity.." name="quantity" required="" autocomplete="off" ></td></tr>';
                    }
                    echo '<tr><td></td><td><input type="submit" id = "button" name="add" value = "ADD BOOK" ></td></tr>';
                } else {
                    echo '<tr><td><input type="text" name="isbn_no" placeholder = "ISBN No."required="" autocomplete="off"></td><td><input type="submit" name="check" value = "CHECK"></td></tr>';
                }
                ?>
            </table>
        </form>
    </div>
</body>
</html>