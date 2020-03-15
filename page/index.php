<?php
include '../include/header.php';
?>
<div class="container">
    <form action="widget/searchborrow.php" method="post">
        <table align="center">
            <tr>
                <th style="padding-right:.5rem"><input type="text" id="isbn" name="isbn" autocomplete="off" placeholder="Enter the ISBN No.">
                    <input type="text" id="std_id" name="std_id" autocomplete="off" placeholder="Enter Student ID"></th>
                <th><input type="submit" name="search" value="SEARCH"></th>
            </tr>
            <tr>
                <th style="padding-top: 5px">
                    <input type="radio" name="choose" value='isbn' checked> <label>Search by ISBN No.</label>
                </th>
            </tr>

            <tr>
                <th>
                    <input type="radio" name="choose" value='std_id'> <label>Search by Student ID</label>
                </th>
            </tr>

        </table>
    </form>
</div>
<div class="result">
    <h4><strong><u>Active Issued Books</u></strong></h4>
    <table align='center'>
        <tr>
            <th>ISBN No.</th>
            <th>Student ID</th>
            <th>Issue Date</th>
            <th>Due Date</th>
            <th>Option</th>
        </tr>
        <?php
        include('../include/connection.php');
        $sql = "SELECT * FROM borrowedby WHERE return_date is null ORDER BY due_date";
        $result = $con->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['isbn_no'] . "</td><td>" . $row['student_id'] . "</td><td>" . $row['issue_date'] . "</td><td>" . $row['due_date'] . "</td><td style='width:10%;'><button type='button' class='btn btn-secondary btn-sm'>Receive</button></td></tr>";
        }
        $con->close();
        ?>
    </table>
</div>
</body>
<script>
    $('input[name="choose"]').click(function(e) {
        if (e.target.value === 'isbn') {
            $('#isbn').show();
            $('#std_id').hide();
        } else {
            $('#std_id').show();
            $('#isbn').hide();
        }
    })
    $('#std_id').hide();
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

</html>