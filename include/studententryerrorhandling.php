<?php
    if(isset($_GET['success'])){
        if($_GET['success'] == 'add'){
            ?>
            <div class="panel pale-green display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>Student successfully added into database.</p>
            </div>
            <?php
        }else if($_GET['success'] == 'update'){
            ?>
            <div class="panel pale-green display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>Student successfully updated.</p>
            </div>
            <?php
        }else if($_GET['success'] == 'delete'){
            ?>
            <div class="panel pale-green display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>Student successfully deleted from database.</p>
            </div>
            <?php
        }
    }else if(isset($_GET['error'])){
        if($_GET['error'] == 'student_id'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>Invalid Student ID number.</p>
            </div>
            <?php
        }
        else if($_GET['error'] == 'add'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>Could not add the Student into database.</p>
            </div>
            <?php
        }else if($_GET['error'] == 'update'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>Could not update the Student.</p>
            </div>
            <?php
        }else if($_GET['error'] == 'delete'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>Could not delete Student from database.</p>
            </div>
            <?php
        }
    }
?>