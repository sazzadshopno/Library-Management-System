<?php
include '../include/header.php';
?>
<div class="container">
    <form action="widget/issuebookentry.php" method="post">
        <table align="center">
            <?php
            include '../include/connection.php';
            include '../include/issuebookerrorhandling.php';
            echo '<tr><td>Student ID</td><td><input type="text" name="std_id" placeholder = "ID Number" autocomplete="off" required="" ></td></tr>';
            echo '<tr><td>ISBN No.</td><td><input type="text" id= "isbn" name="isbn_no" placeholder = "ISBN Number" required="" autocomplete="off"></td></tr>';
            echo '<tr><td>Issue Date</td><td><input type="date" name="issuedate" value="' . date("Y-m-d") . '" required="" autocomplete="off"></td></tr>';
            echo '<tr><td></td><td><input type="submit" onclick="return issueClicked();" name="issue" value = "ISSUE BOOK" ></td></tr>'
            ?>
        </table>
    </form>
</div>
<script>
    function issueClicked() {
        return confirm('Do you really want to issue the book?');
    }
</script>
</body>
</html>