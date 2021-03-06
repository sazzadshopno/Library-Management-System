<?php
    if(isset($_GET['success'])){
        if($_GET['success'] == 'add'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Book issued.
                <button type="button" class="close" onclick="window.location.replace('issuebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
    }else if(isset($_GET['error'])){
        if($_GET['error'] == 'add'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> occured while issuing the book. Please try again..
                <button type="button" class="close" onclick="window.location.replace('issuebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
        else if($_GET['error'] == 'studentdoesnotexist'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> The student with given ID does not exist in our database.
                <button type="button" class="close" onclick="window.location.replace('issuebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }else if($_GET['error'] == 'studentnoteligible'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> The student already has 3 actively issued book..
                <button type="button" class="close" onclick="window.location.replace('issuebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }else if($_GET['error'] == 'booknotavailable'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> The book is not available right now. Try again tomorrow.
                <button type="button" class="close" onclick="window.location.replace('issuebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }else if($_GET['error'] == 'bookdoesnotexist'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> The book with given ISBN No. does not exist in our database.
                <button type="button" class="close" onclick="window.location.replace('issuebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
    }
?>