<?php
    if(isset($_GET['success'])){
        if($_GET['success'] == 'add'){
            ?>
            <div class="panel pale-green display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>Book successfully issued.</p>
            </div>
            <?php
        }
    }else if(isset($_GET['error'])){
        if($_GET['error'] == 'add'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>Error occured while issuing the book. Please try again.</p>
            </div>
            <?php
        }
        else if($_GET['error'] == 'studentdoesnotexist'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>The student with given ID does not exist in our database.</p>
            </div>
            <?php
        }else if($_GET['error'] == 'studentnoteligible'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>The student already has 3 actively issued book.</p>
            </div>
            <?php
        }else if($_GET['error'] == 'booknotavailable'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>The book is not available right now. Try again tomorrow.</p>
            </div>
            <?php
        }else if($_GET['error'] == 'bookdoesnotexist'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
            class="button display-right">&times;</span>
                <p>The book with given ISBN No. does not exist in our database.</p>
            </div>
            <?php
        }
    }
?>