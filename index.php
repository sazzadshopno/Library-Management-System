<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="./js/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/jquery-ui.css" />
    <script src="./js/jquery-ui.min.js"></script>
    <title>Log In</title>
</head>
<div class="container">
    <form method="post">
        <table align="center" style="margin-top: 15%;">
        <?php
        if(isset($_GET['error'])){
            ?>
            <tr>
            <td><div class="alert alert-danger alert-dismissible fade show" role="alert">
                Invalid username or password.
                <button type="button" class="close" onclick="this.blur();" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </td>
            </tr>
            <?php
        }else if(isset($_GET['notloggedin'])){
            ?>
            <tr>
            <td><div class="alert alert-danger alert-dismissible fade show" role="alert">
                You must login first.
                <button type="button" class="close" onclick="this.blur();" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </td>
            </tr>
            <?php
        }
    ?>
            <tr>
                <td>
                    <h4 style="letter-spacing: 5px;">LOGIN TO LIBSYS</h4>
                </td>
            </tr>
            <tr>
                <td><input type="text" name="username" placeholder="Username"></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td><button class='btn btn-secondary btn-sm' type="submit" name="login">LOGIN</button></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST['login'])) {
        include('./include/connection.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM librarian WHERE librarian_username = '$username' and librarian_password = '$password';";
        $result = $con->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $_SESSION['username'] = $row['librarian_username'];
            $_SESSION['password'] = $row['librarian_password'];
            $_SESSION['name'] = $row['librarian_name'];
            $_SESSION['id'] = $row['librarian_id'];
            ?>
            <script>
                window.location.replace('./page/index.php');
            </script>
            <?php
        } else {
    ?>
            <script>
                window.location.replace('index.php?error=invalid');
            </script>
    <?php
        }
    }
    ?>
</div>
</body>

</html>