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
        include '../include/borrowbookerrorhandling.php';
    ?>
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
    
    <?php 
        if(isset($_GET['isbn']) || isset($_GET['std_id'])){
            $val = isset($_GET['isbn']) ? $_GET['isbn'] : $_GET['std_id'];
            echo "<h4><u><strong>Search result of:</strong></u> ". $val ." <button class= 'btn btn-secondary btn-sm' onclick='viewsearch()'>&#10007; Clear</button></h4>";
        }else{
            echo "<h4><strong><u>Active Issued Books</u></strong></h4>";
        }
    ?>
    
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
        if(isset($_GET['isbn'])){
            $isbn = $_GET['isbn'];
            $sql = "SELECT * FROM borrowedby WHERE return_date is null and isbn_no = '$isbn' ORDER BY due_date";
            $result = $con->query($sql);
            $keyword = $_GET['isbn'];
            while ($row = $result->fetch_assoc()) {
                $isbn = preg_replace("/$keyword/i", "<b style='background-color:yellow;'>$0</b>", $row['isbn_no']);
                echo "<tr><td>" . $isbn . "</td><td>" . $row['student_id'] . "</td><td>" . $row['issue_date'] . "</td><td>" . $row['due_date'] . "</td><td style='width:10%;'><button type='button' class='btn btn-secondary btn-sm' onclick='recievebook(".$row['borrow_id'].")'>Receive</button></td></tr>";
            }
            $con->close();
        }else if(isset($_GET['std_id'])){
            $std_id = $_GET['std_id'];
            $sql = "SELECT * FROM borrowedby WHERE return_date is null and student_id = '$std_id' ORDER BY due_date";
            $result = $con->query($sql);
            $keyword = $_GET['std_id'];
            while ($row = $result->fetch_assoc()) {
                $std_id = preg_replace("/$keyword/i", "<b style='background-color:yellow;'>$0</b>", $row['student_id']);
                echo "<tr><td>" . $row['isbn_no'] . "</td><td>" . $std_id . "</td><td>" . $row['issue_date'] . "</td><td>" . $row['due_date'] . "</td><td style='width:10%;'><button type='button' class='btn btn-secondary btn-sm' onclick='recievebook(".$row['borrow_id'].")'>Receive</button></td></tr>";
            }
            $con->close();
        }else{
            $sql = "SELECT * FROM borrowedby WHERE return_date is null ORDER BY due_date";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['isbn_no'] . "</td><td>" . $row['student_id'] . "</td><td>" . $row['issue_date'] . "</td><td>" . $row['due_date'] . "</td><td style='width:10%;'><button type='button' class='btn btn-secondary btn-sm' onclick='recievebook(".$row['borrow_id'].")'>Receive</button></td></tr>";
            }
            $con->close();
        }
        ?>
    </table>
</div>
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModallabel" style="color:red;"><strong>FINED!</strong></h5>
        <button type="button" class="close" onclick="viewsearch();" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        because of late return <b>BDT <?php echo $_GET['fine'] ?></b> added as fine.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="viewsearch();">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
    if(isset($_GET['fine'])){
        echo "<script> $('#myModal').modal('show'); </script>";
    }
?>
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
    function viewsearch(){
            location.replace("index.php");
    }
    function recievebook(borrowid){
        if(confirm('Do you really want to receive the book?')){
            window.location = './widget/receivebook.php?borrowid=' + borrowid;
        }
    }
</script>

</html>