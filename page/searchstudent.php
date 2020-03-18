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
<div class="container">
    <?php
    include '../include/searchstudenterrorhandling.php';
    ?>
    <form action="widget/searchstudent.php" method="post">
        <table align="center">
            <tr>
                <th style="padding-right:.5rem"><input type="text" name="idorname" autocomplete="off" placeholder="Enter the ID or Name of the student.."></th>
                <th><input type="submit" name="search" value="SEARCH"></th>
            </tr>
        </table>
    </form>
</div>
<div class="result">

    <?php
    include('../include/connection.php');
    if (isset($_GET['type'])) {
        echo "<h4>Search result of: " . $_GET['value'] . " <button class= 'btn btn-secondary btn-sm' onclick='viewsearch()'>&#10007; Clear</button></h4>";
        if ($_GET['type'] == 'id') {
            $id = $_GET['value'];
            $sql = "SELECT * FROM student WHERE student_id = $id;";
            $result = $con->query($sql);
            if ($result->num_rows == 0) {
                header("Location: searchstudent.php?error=noresult");
                exit();
            }

            echo "<table align='center'>";
            echo '<tr><th>ID</th>';
            echo '<th>Name</th>';
            echo '<th>Session</th>';
            echo '<th>Department</th>';
            echo '<th>Roll</th>';
            echo '<th>Option</th><th>Action</th></tr>';
            $keyword = $_GET['value'];
            while ($row = $result->fetch_assoc()) {
                $stdid = preg_replace("/$keyword/i", "<b style='background-color:yellow;'>$0</b>", $row['student_id']);
                echo '<tr ><td>' . $stdid . '</td>';
                echo '<td>' . $row['student_name'] . '</td>';
                echo '<td>' . $row['student_session'] . '</td>';
                echo '<td>' . $row['student_department'] . '</td>';
                echo '<td>' . $row['student_roll'] . '</td>';
                echo '<td style="width:5%;"> <button type="button"  class="btn btn-secondary btn-sm" onclick="view(' . $row["student_id"] . ')">View</button> </td><td style="width:10%;"><button type="button" class="btn btn-secondary btn-sm" onclick="edit(' . $row["student_id"] . ')">Update / Delete</button></td></tr>';
            }
            echo "</table>";
            $con->close();
        } else {
            $name = "%" . $_GET['value'] . "%";
            $sql = "SELECT * FROM student WHERE student_name LIKE '$name';";
            $result = $con->query($sql);
            if ($result->num_rows == 0) {
                header("Location: searchstudent.php?error=noresult");
                exit();
            }
            echo "<table align='center'>";
            echo '<tr><th>ID</th>';
            echo '<th>Name</th>';
            echo '<th>Session</th>';
            echo '<th>Department</th>';
            echo '<th>Roll</th>';
            echo '<th>Option</th><th>Action</th></tr>';
            $keyword = $_GET['value'];
            while ($row = $result->fetch_assoc()) {
                $name = preg_replace("/$keyword/i", "<b style='background-color:yellow;'>$0</b>", $row['student_name']);
                echo '<tr><td>' . $row["student_id"] . '</td>';
                echo '<td>' . $name . '</td>';
                echo '<td>' . $row['student_session'] . '</td>';
                echo '<td>' . $row['student_department'] . '</td>';
                echo '<td>' . $row['student_roll'] . '</td>';
                echo '<td style="width:5%;"> <button type="button"  class="btn btn-secondary btn-sm" onclick="view(' . $row["student_id"] . ')">View</button> </td><td style="width:10%;"><button type="button" class="btn btn-secondary btn-sm" onclick="edit(' . $row["student_id"] . ')">Update / Delete</button></td></tr>';
            }
            echo "</table>";
            $con->close();
        }
    } else {
        echo "<h4><strong><u>All Students</u></strong></h4>";
        $sql = "SELECT * FROM student;";
        $result = $con->query($sql);
        if ($result->num_rows == 0) {
            exit();
        }
        echo "<table align='center'>";
        echo '<tr><th>ID</th>';
        echo '<th>Name</th>';
        echo '<th>Session</th>';
        echo '<th>Department</th>';
        echo '<th>Roll</th>';
        echo '<th>Option</th><th>Action</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr><td>' . $row["student_id"] . '</td>';
            echo '<td>' . $row['student_name'] . '</td>';
            echo '<td>' . $row['student_session'] . '</td>';
            echo '<td>' . $row['student_department'] . '</td>';
            echo '<td>' . $row['student_roll'] . '</td>';
            echo '<td style="width:5%;"> <button type="button"  class="btn btn-secondary btn-sm" onclick="view(' . $row["student_id"] . ')">View</button> </td><td style="width:10%;"><button type="button" class="btn btn-secondary btn-sm" onclick="edit(' . $row["student_id"] . ')">Update / Delete</button></td></tr>';
        }
        echo "</table>";
        $con->close();
    }
    ?>
</div>
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <?php
                include('../include/connection.php');
                $std_id = $_GET['student_id'];
                $sql1 = "SELECT * FROM student WHERE student_id = '$std_id';";
                $result1 = $con->query($sql1);
                $row1 = $result1->fetch_assoc();
                $student_name = $row1['student_name'];
                $student_fine = $row1['student_fine'];
                ?>
                <h5 class="modal-title" id="myModalTitle"> <b><?php echo $student_name ?>'s</b> Information</h5>
                <button type="button" class="close" onclick="viewsearch();" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5><strong>Fine</strong></h5>
                <p style="font-size: 14px;"><?php echo $student_name ?> has fined <strong <?php if ($student_fine != 0) {
                                                                                                echo "style = 'color:red'";
                                                                                            } ?>><?php echo $student_fine ?> Taka.</strong></p>
                <h5><strong>Issue Book History</strong></h5>
                <?php
                $sql2 = "SELECT * FROM borrowedby WHERE student_id = '$std_id' and return_date is null;";
                $result2 = $con->query($sql2);
                ?>
                <div class="result">
                    <?php
                    if ($result2->num_rows > 0) {
                    ?>
                        <table align='center'>
                            <tr style="font-size: 14px;">
                                <th>ISBN No.</th>
                                <th>Issue Date</th>
                                <th>Due Date</th>
                            </tr>
                        <?php

                        while ($issuebook = $result2->fetch_assoc()) {
                            echo "<tr style='font-size: 14px;'><td>" . $issuebook['isbn_no'] . "</td><td>" . $issuebook['issue_date'] . "</td><td>" . $issuebook['due_date'] . "</td></tr>";
                        }
                        echo "</table>";
                    }else{
                        echo "<p>No active issue book available.</p>";
                    }
                        ?>
                </div>
                <h5><strong>Return Book History</strong></h5>
                <?php
                $sql3 = "SELECT * FROM borrowedby WHERE student_id = '$std_id' and return_date is not null;";
                $result3 = $con->query($sql3);
                ?>
                <div class="result">
                    <?php
                    if ($result3->num_rows > 0) {
                    ?>
                        <table align='center'>
                            <tr style="font-size: 14px;">
                                <th>ISBN No.</th>
                                <th>Issue Date</th>
                                <th>Return Date</th>
                            </tr>
                        <?php


                        while ($returnbook = $result3->fetch_assoc()) {
                            echo "<tr style='font-size: 14px;'><td>" . $returnbook['isbn_no'] . "</td><td>" . $returnbook['issue_date'] . "</td>" .  "<td>" . $returnbook['return_date'] . "</td></tr>";
                        }
                        echo "</table>";
                    }else{
                        echo "<p>Return book not available.</p>";
                    }
                        ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="viewsearch();" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_GET['student_id'])) {
    echo "<script> $('#myModal').modal('show'); </script>";
}
?>

</body>
<script type=text/javascript language="javascript">
    function edit(id){
            window.location = 'managestudent.php?student_id=' + id + '&available=true';
    }
    function view(id){
        window.location.replace('searchstudent.php?student_id=' + id);
    }
    function viewsearch(){
        location.replace("searchstudent.php");
    }
</script>

</html>