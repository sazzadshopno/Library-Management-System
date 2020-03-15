<?php
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
        echo "<h4>Search result of: " . $_GET['value'] . " <button class= 'btn btn-secondary' onclick='viewsearch()'>&#10007; Clear</button></h4>";
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
            echo '<th>Due</th><th>Option</th></tr>';
            $keyword = $_GET['value'];
            while ($row = $result->fetch_assoc()) {
                $stdid = preg_replace("/$keyword/i", "<b style='background-color:yellow;'>$0</b>", $row['student_id']);
                echo '<tr ><td>' . $stdid . '</td>';
                echo '<td>' . $row['student_name'] . '</td>';
                echo '<td>' . $row['student_session'] . '</td>';
                echo '<td>' . $row['student_department'] . '</td>';
                echo '<td>' . $row['student_roll'] . '</td>';
                echo '<td>' . $row['student_fine'] . '</td><td><td style="width:10%;"><button type="button" class="btn btn-secondary btn-sm" onclick="view(' . $row["student_id"] . ')">Update / Delete</button></td></tr>';
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
            echo '<th>Due</th><th>Option</th></tr>';
            $keyword = $_GET['value'];
            while ($row = $result->fetch_assoc()) {
                $name = preg_replace("/$keyword/i", "<b style='background-color:yellow;'>$0</b>", $row['student_name']);
                echo '<tr><td>' . $row["student_id"] . '</td>';
                echo '<td>' . $name . '</td>';
                echo '<td>' . $row['student_session'] . '</td>';
                echo '<td>' . $row['student_department'] . '</td>';
                echo '<td>' . $row['student_roll'] . '</td>';
                echo '<td>' . $row['student_fine'] . '</td><td style="width:10%;"><button type="button" class="btn btn-secondary btn-sm" onclick="view(' . $row["student_id"] . ')">Update / Delete</button></td></tr>';
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
        echo '<th>Due</th><th>Option</th></tr>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr><td>' . $row["student_id"] . '</td>';
            echo '<td>' . $row['student_name'] . '</td>';
            echo '<td>' . $row['student_session'] . '</td>';
            echo '<td>' . $row['student_department'] . '</td>';
            echo '<td>' . $row['student_roll'] . '</td>';
            echo '<td>' . $row['student_fine'] . '</td><td style="width:10%;"><button type="button" class="btn btn-secondary btn-sm" onclick="view(' . $row["student_id"] . ')">Update / Delete</button></td></tr>';
        }
        echo "</table>";
        $con->close();
    }
    ?>
</div>
<script type=text/javascript language="javascript">
    function view(id){
            window.location = 'managestudent.php?student_id=' + id + '&available=true';
        }
        function viewsearch(){
            window.location = 'searchstudent.php';
        }
    </script>
</body>

</html>