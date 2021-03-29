<!DOCTYPE html>
<?php session_start();
if(isset($_GET['logout'])){
    session_destroy();
    session_unset();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/w3.css">
<link rel="stylesheet" href="layout/styles/font-awesome.min.css">
<link rel="stylesheet" href="layout/styles/bootstrap.css">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/style.css"/>
<link href="layout/styles/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">

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
<div class="wrapper row0" style="overflow: hidden;">
    <div id="topbar" class="hoc clear"> 
        <div class="fl_left">
            
            <h1 class="logoname container-fluid"><a href="index.php">TechBazar</a></h1>
            
        </div>
    </div>
</div>
<?php

$err = "";
    if(isset($_POST['admin'])){
        $admin = $_POST['admin'];
        $pass = $_POST['pass'];
        require('connection.php');
        $sql = $conn->query("SELECT admin FROM market where mkt_owner_password='".$admin."' AND password=password('".$pass."')");
        if($sql->num_rows == 1) {
            $_SESSION['varify'] = "authenticated";
            header("Location:dashboard.php");
        }else{
            $err = "Username or password is incorrect!";
        }
    }
?>
    <div class="login container p-4">
    <form action="authentication.php" method="post">
        <fieldset>
            <legend>Login</legend>
            <label for="" style="color:red"><?php if(isset($_GET['login']))echo($_GET['login']);?></label>
            <div class="erorr text-red"><?php echo($err);?></div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="market_user">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="market_pass">
            </div>
        </fieldset>
        <br>
        <input type="submit" value="Log In" class="btn btn-primary" style="float:right;">
        <input type="submit" value="<< Back" class="btn btn-primary" style="float:left;">
    </form>
    </div>
</body>
</html>