<?php
session_start();
if(isset($_SESSION['username'])){
    ?>
    <script>
        window.location.replace('./page/index.php');
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="./js/popper.min.js" crossorigin="anonymous"></script>
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/jquery-ui.css" />
    <script src="./js/jquery-ui.min.js"></script>
    <title>Log In</title>
</head>
<div class="container">
    <form method="post">
        <table align="center" style="margin-top: 15%;">
        <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == 'notactive'){
            ?>
            <tr>
            <td><div class="alert alert-danger alert-dismissible fade show" role="alert">
                Account currently under review.
                <button type="button" class="close" onclick="window.location.replace('index.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </td>
            </tr>
            <?php
            }else{
                ?>
            <tr>
            <td><div class="alert alert-danger alert-dismissible fade show" role="alert">
                Invalid username or password.
                <button type="button" class="close" onclick="window.location.replace('index.php');" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </td>
            </tr>
            <?php
            }
        }else if(isset($_GET['notloggedin'])){
            ?>
            <tr>
            <td><div class="alert alert-danger alert-dismissible fade show" role="alert">
                You must login first.
                <button type="button" class="close" onclick="window.location.replace('index.php');" data-dismiss="alert" aria-label="Close">
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
                    <h4 style="letter-spacing: 2px; font-weight: bold; text-align: center;">LIBRARIAN LOGIN</h4>
                </td>
            </tr>
            <tr>
                <td><input type="text" name="username" autocomplete='off' placeholder="Username"></td>
            </tr>
            <tr>
                <td><input type="password" name="password" autocomplete='off' placeholder="Password"></td>
            </tr>
            <tr>
                <td><button class='btn btn-secondary btn-sm' type="submit" name="login">LOGIN</button></td>
            </tr>
            <tr>
                <td><p>Do not have an account? <a href="signup.php" class="text-decoration-none">Create Account</a></p></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST['login'])) {
        include('./include/connection.php');
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM librarian WHERE librarian_username = '$username';";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $hash = $row['librarian_password'];
        if(password_verify($password, $hash)){
            if($row['is_active'] == 0){
                ?>
                <script>
                    console.log('not active')
                    window.location.replace('./index.php?error=notactive');
                </script>
                <?php
            }else{
                $_SESSION['username'] = $row['librarian_username'];
                $_SESSION['password'] = $row['librarian_password'];
                $_SESSION['name'] = $row['librarian_name'];
                $_SESSION['id'] = $row['librarian_id'];
                ?>
                <script>
                    window.location.replace('./page/index.php');
                </script>
                <?php
            }
        }else{
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