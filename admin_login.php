<!DOCTYPE html>
<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="layout/styles/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .login{
        margin:3px auto;
        width:400px;
        margin-top:5%;
    }
    fieldset{
        border:2px blue solid;
        border-radius:10px;
        padding:30px;

    }
    fieldset input{
        width:100%;
        padding:10px;
        margin:2px;
        border:2px solid blue;
        border-radius:3px;
    }
    legend{
        width:60px;
    }
    </style>
    <title>Document</title>
</head>
<body>
<?php
$err = "";
if(isset($_GET['logout'])){
    session_destroy();
    session_unset();
}
    if(isset($_POST['admin'])){
        $admin = $_POST['admin'];
        $pass = $_POST['pass'];
        require('connection.php');
        $sql = $conn->query("SELECT admin FROM admin where admin='".$admin."' AND password='".$pass."'");
        if($sql->num_rows == 1) {
            $_SESSION['varify'] = "authenticated";
            header("Location:dashboard.php");
        }else{
            $err = "Username or password is not correct!";
        }

    }
?>
    <div class="login container p-4">
    <form action="admin_login.php" method="post">
        <h4>Admin Login</h4>
        <fieldset>
            <div class="erorr text-red"><?php echo($err);?></div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="admin">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pass">
            </div>
        </fieldset>
        <br>
        <input type="submit" value="Log In" class="btn btn-primary" style="float:right;">
        <input type="submit" value="<< Back" class="btn btn-primary" style="float:left;">
    </form>
    </div>
</body>
</html>