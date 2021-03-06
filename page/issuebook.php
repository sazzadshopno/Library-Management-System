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
<h3 class="custom_title">ISSUE BOOK</h3>
<div class="container">
    <form action="widget/issuebookentry.php" method="post">
        <table align="center">
            <?php
            include '../include/connection.php';
            include '../include/issuebookerrorhandling.php';
            echo '<tr><td>Student ID</td><td><input type="text" id= "std_id" name="std_id" placeholder = "ID Number" autocomplete="off" required="" ></td></tr>';
            echo '<tr><td>ISBN No.</td><td><input type="text" id= "isbn" name="isbn_no" placeholder = "ISBN Number" required="" autocomplete="off"></td></tr>';
            echo '<tr><td>Issue Date</td><td><input type="date" name="issuedate" value="' . date("Y-m-d") . '" required="" autocomplete="off"></td></tr>';
            echo '<tr><td></td><td><input type="submit" onclick="return issueClicked();" name="issue" value = "ISSUE BOOK" ></td></tr>'
            ?>
        </table>
    </form>
</div>
</div>
</div>
<script>
    function issueClicked() {
        return confirm('Do you really want to issue the book?');
    }
    $(function() {
        $("#std_id").autocomplete({
        source: "./widget/studentidac.php",
        });
    });
    $(function() {
        $("#isbn").autocomplete({
        source: "./widget/isbnac.php",
        });
    });
</script>

</body>
</html>