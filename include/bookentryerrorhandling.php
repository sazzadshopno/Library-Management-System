<?php
    if(isset($_GET['success'])){
        if($_GET['success'] == 'add'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Book added into database.
                <button type="button" class="close" onclick="window.location.replace('managebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }else if($_GET['success'] == 'update'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Book updated.
                <button type="button" class="close" onclick="window.location.replace('managebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }else if($_GET['success'] == 'delete'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Book deleted from database.
                <button type="button" class="close" onclick="window.location.replace('managebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
    }else if(isset($_GET['error'])){
        if($_GET['error'] == 'isbn'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Invalid ISBN number.
                <button type="button" class="close" onclick="window.location.replace('managebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
        else if($_GET['error'] == 'add'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Could not add the book into database.
                <button type="button" class="close" onclick="window.location.replace('managebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }else if($_GET['error'] == 'update'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Could not update the book.
                <button type="button" class="close" onclick="window.location.replace('managebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }else if($_GET['error'] == 'delete'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Could not delete book from database.
                <button type="button" class="close" onclick="window.location.replace('managebook.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
    }
?>