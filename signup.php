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
                <button type="button" class="close" onclick="window.location.replace('index.php');" data-dismiss="alert" aria-label="Close">
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
                    <h4 style="letter-spacing: 2px; font-weight: bold; text-align: center;">LIBRARIAN SIGNUP</h4>
                </td>
            </tr>
            <tr>
                <td>
                    <input  type="text" name="firstname" id = "firstname" autocomplete="off" placeholder = "First Name" onkeyup = "Validate(this)" required /> 
                        <div id="errFirst"></div></td>
            </tr>
            <tr>
                <td><input  type="text" name="lastname" id = "lastname" autocomplete="off" placeholder = "Last Name" onkeyup = "Validate(this)" required />  
                        <div id="errLast"></div></td>
            </tr>
            <tr>
                <td><input  type="text" name="username" id = "username" autocomplete="off" onkeyup = "ValidateUsername(this); return false;" placeholder="Username" required />  
                        </td>
            </tr>
            <tr>
                <td><input required name="password" type="password"  autocomplete="off" minlength="4" maxlength="16" placeholder="Password"  id="pass1" /></td>
            </tr>
            <tr>
                <td>
                <input required name="password" type="password" autocomplete="off" minlength="4" maxlength="16" placeholder="Confirm Password"  id="pass2" onkeyup="checkPass(); return false;" />
                        </td>
            </tr>
            <tr>
                <td><button class='btn btn-secondary btn-sm' type="submit" disabled="disabled" id="submitBtn" name="signup">SIGNUP</button></td>
            </tr>
            <tr>
                <td><p>Already have an account? <a href="index.php" class="text-decoration-none">Login</a></p></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST['signup'])) {
        include('./include/connection.php');
        $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $tsql = "SELECT MAX(librarian_id) as mx FROM librarian;";
        $result = $con->query($tsql);
        
        $row = $result->fetch_assoc();
        $id = $row['mx'] + 1;
        $sql = "INSERT INTO librarian(librarian_id, librarian_name, librarian_username, librarian_password, is_active) VALUES ('$id', '$name', '$username', '$password', '0');";
        $result = $con->query($sql);
        if ($result) {
            ?>
            <script>
                window.location.replace('./index.php?error=notactive');
            </script>
            <?php
        } else {
    ?>
            <script>
                window.location.replace('./index.php?error=notactive');
            </script>
    <?php
        }
    }
    ?>
    <script>
function checkPass(){
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    var submitBtn = document.getElementById('submitBtn')
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass2.value.trim() == ''){
        pass2.style.backgroundColor = "";
    }
    else if(pass1.value != pass2.value){
        submitBtn.disabled = true;
        pass2.style.backgroundColor = badColor;
    }else{
        pass2.style.backgroundColor = "";
        submitBtn.disabled = false;
    }
} 
// validates text only
function Validate(txt) {
    txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
}

function ValidateUsername(usr){
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    var submitBtn = document.getElementById('submitBtn')
    if(usr.value.trim() == ''){
        usr.style.backgroundColor = "";
        submitBtn.disabled = true;
    }else{
        $.ajax({
        type: 'post',
        url: 'checkusername.php',
        data: {
            'username': usr.value // all variables i want to pass. In this case, only one.
        },
        success: function(data) {
            if(data == 'Taken'){
                usr.style.backgroundColor = badColor;
                submitBtn.disabled = true;
            }else{
                usr.style.backgroundColor = "";
                submitBtn.disabled = false;
            }
        }
    });
    }
}
</script>
</div>
</body>
</html>