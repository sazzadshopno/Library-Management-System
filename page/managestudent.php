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
<h3 class="custom_title">MANAGE STUDENT</h3>
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
                        echo '<tr><td>Name</td><td><input type="text" name="student_name" value = "' . $row['student_name'] . '"  autocomplete="off" ></td></tr>';
                        echo '<tr><td>Session</td><td><input type="text" name="student_session" value = "' . $row['student_session'] . '"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Department</td><td><input type="text" name="student_department" value = "' . $row['student_department'] . '" autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Roll</td><td><input type="text" value = "'.$row['student_roll'].'" name="student_roll" autocomplete="off"  ></td></tr>';
                        echo '<tr><td>Fine</td><td><input type="number" value = "'. $row['student_fine'] .'" name="student_fine"  autocomplete="off" readonly></td></tr>';
                        echo '<tr><td>Recieved Amount</td><td><input type="number" value = "0" min = "0" max = "'. $row['student_fine'] .'" name="student_fine_received"  autocomplete="off"></td></tr>';
                        
                        echo '<tr><td><input type="submit" onclick="return studentupdateClicked();" name="update" value = "SAVE" ></td>';
                        echo '<td><input type="submit" onclick="return studentdeleteClicked();" name="delete" value = "DELETE" ></td></tr>';

                    } else {
                        ?>
                        <script>
                            window.location.replace('managestudent.php');
                        </script>
                        <<?php
                    }
                } else {
                    echo '<tr><td>Student ID</td><td><input type="text" id="student_id" name="student_id" autocomplete="off" onkeyup = "ValidateID(this); return false;" required="" placeholder="Student ID"></td></tr>';
                    echo '<tr><td>Name</td><td><input type="text" placeholder = "Enter Name.." name="student_name" required="" autocomplete="off"></td></tr>';
                        echo '<tr><td>Session</td><td><select name="student_session"><option value="2020-21">2020-21</option><option value="2019-20">2019-20</option><option value="2018-19">2018-19</option><option value="2017-18">2017-18</option><option value="2016-17">2016-17</option><option value="2015-16">2015-16</option></select></td></tr>';
                        echo '<tr><td>Department</td><td><select name="student_department"><option value="CSE">CSE</option><option value="ECE">ECE</option><option value="BBA">BBA</option></select></td></tr>';
                        echo '<tr><td>Roll</td><td><input type="number" min = "0" placeholder = "Enter Roll.." name="student_roll" required="" autocomplete="off" ></td></tr>';
                        echo '<tr><td></td><td><input type="submit" id="submitBtn" disabled="true" onclick="return studentaddClicked();" name="add" value = "ADD STUDENT" ></td></tr>';
                }
                ?>
            </table>
        </form>
    </div>
    </div>
</div>
    <script>
function ValidateID(student_id){
    var badColor = "#ff6666";
    var submitBtn = document.getElementById('submitBtn')
    if(student_id.value.trim() == '' || isNaN(student_id.value * 1)){
        student_id.style.backgroundColor = badColor;
        submitBtn.disabled = true;
    }else{
        $.ajax({
        type: 'post',
        url: 'widget/checkid.php',
        data: {
            'id': student_id.value // all variables i want to pass. In this case, only one.
        },
        success: function(data) {
            console.log(data)
            if(data == 'Taken'){
                student_id.style.backgroundColor = badColor;
                submitBtn.disabled = true;
            }else{
                student_id.style.backgroundColor = "";
                submitBtn.disabled = false;
            }
        }
    });
    }
}
    </script>
</body>
</html>