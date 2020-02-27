<?php
    if(isset($_GET['error'])){
        if($_GET['error'] == 'empty'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>Invalid input. Try again.</p>
            </div>
            <?php
        }else if($_GET['error'] == 'noresult'){
            ?>
            <div class="panel pale-red display-container">
            <span onclick="this.parentElement.style.display='none'"
                class="button display-right">&times;</span>
                <p>No result found.</p>
            </div>
            <?php
        }
    }
?>