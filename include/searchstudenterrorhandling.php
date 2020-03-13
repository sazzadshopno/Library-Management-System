<?php
    if(isset($_GET['error'])){
        if($_GET['error'] == 'empty'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Invalid input. Try again.
                <button type="button" class="close" onclick="this.blur();" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }else if($_GET['error'] == 'noresult'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> No result found.
                <button type="button" class="close" onclick="this.blur();" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
    }
?>