<?php
    if(isset($_GET['success'])){
        if($_GET['success'] == 'add'){
            ?>
            <div class="panel pale-green display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>Book successfully added into database.</p>
            </div>
            <?php
        }else if($_GET['success'] == 'update'){
            ?>
            <div class="panel pale-green display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>Book successfully updated.</p>
            </div>
            <?php
        }else if($_GET['success'] == 'delete'){
            ?>
            <div class="panel pale-green display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>Book successfully deleted from database.</p>
            </div>
            <?php
        }
    }else if(isset($_GET['error'])){
        if($_GET['error'] == 'isbn'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>Invalid ISBN number.</p>
            </div>
            <?php
        }
        else if($_GET['error'] == 'add'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>Could not add the book into database.</p>
            </div>
            <?php
        }else if($_GET['error'] == 'update'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>Could not update the book.</p>
            </div>
            <?php
        }else if($_GET['error'] == 'delete'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>Could not delete book from database.</p>
            </div>
            <?php
        }
    }
?>