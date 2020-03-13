<?php
    include '../include/header.php';
?>
    <div class="container">
        <form action="widget/studententry.php" method="post">
            <table align="center">
                <?php
                include '../include/connection.php';
                include '../include/studententryerrorhandling.php';
                if (isset($_GET['student_id'])) {
                    $student_id = $_GET['student_id'];
                    if ($_GET['available'] == 'true') {
                        $sql = "SELECT * FROM student WHERE student_id = '$student_id' LIMIT 1;";
                        $result = $con->query($sql);
                        $row = $result->fetch_assoc();
                        echo '<tr><td>Student ID</td><td><input type="text" name="student_id" value = "' . $row['student_id'] . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Name</td><td><input type="text" name="student_name" value = "' . $row['student_name'] . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Session</td><td><input type="text" name="student_session" value = "' . $row['student_session'] . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Department</td><td><input type="text" name="student_department" value = "' . $row['student_department'] . '" autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Roll</td><td><input type="text" value = "'.$row['student_roll'].'" autofocus="true" name="student_roll" autocomplete="off" readonly ></td></tr>';
                        if((int)$row['student_fine'] > 0){
                            echo '<tr><td>Fine</td><td><input type="number" value = "'. $row['student_fine'] .'" name="student_fine"  autocomplete="off" readonly></td></tr>';
                            echo '<tr><td>Recieved Amount</td><td><input type="number" value = "0" min = "0" max = "'. $row['student_fine'] .'" name="student_fine_received"  autocomplete="off"></td></tr>';
                        }
                        echo '<tr><td><input type="submit" onclick="return studentdeleteClicked();" name="delete" value = "DELETE" ></td>';
                        if((int)$row['student_fine'] > 0){
                            echo '<td><input type="submit" onclick="return studentupdateClicked();" name="update" value = "UPDATE" ></td>';
                        }
                        echo '</tr>';

                    } else {
                        ?>
                        <div class="panel pale-red display-container">
                        <span onclick="this.parentElement.style.display='none'"
                        class="button display-right">&times;</span>
                            <p>The student id does not exist in our database. Add student using the form below. </p>
                        </div>
                        <?php    
                        echo '<tr><td>Student ID</td><td><input type="text" name="student_id" value = "'.$student_id.'" autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Name</td><td><input type="text" placeholder = "Enter Name.." name="student_name" required="" autocomplete="off"></td></tr>';
                        echo '<tr><td>Session</td><td><select name="student_session"><option value="2020-21">2020-21</option><option value="2019-20">2019-20</option><option value="2018-19">2018-19</option><option value="2017-18">2017-18</option><option value="2016-17">2016-17</option><option value="2015-16">2015-16</option></select></td></tr>';
                        echo '<tr><td>Department</td><td><select name="student_department"><option value="CSE">CSE</option><option value="ECE">ECE</option><option value="BBA">BBA</option></select></td></tr>';
                        echo '<tr><td>Roll</td><td><input type="number" min = "0" placeholder = "Enter Roll.." name="student_roll" required="" autocomplete="off" ></td></tr>';
                        echo '<tr><td></td><td><input type="submit" onclick="return studentaddClicked();" name="add" value = "ADD STUDENT" ></td></tr>';
                    }
                } else {
                    echo '<tr><td><input type="text" name="student_id" placeholder = "Student ID" required="" autocomplete="off"></td><td><input type="submit" name="validate" value = "VALIDATE"></td></tr>';
                }
                ?>
            </table>
        </form>
    </div>
    <script>
        function studentdeleteClicked() {
            return confirm('Do you really want to delete the student?');
        }
        function studentupdateClicked() {
            return confirm('Do you really want to update the student information?');
        }
        function studentaddClicked() {
            return confirm('Do you really want to add the student?');
        }
    </script>
</body>

</html>