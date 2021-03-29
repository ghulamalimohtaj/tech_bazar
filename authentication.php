<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $market_user = $_POST['market_user'];
    $market_pass = $_POST['market_pass'];
    $getMarkets = "SELECT mkt_id FROM market WHERE state=1 AND mkt_owner_email='".$market_user."' AND mkt_owner_password = '".$market_pass."'";
    require ("connection.php");
    $exe = $conn->query($getMarkets);
    $msg ="";
    if($exe && $exe->num_rows>0){
        $markets = $exe->fetch_assoc();
        $_SESSION["a".$markets['mkt_id']] = "authenticated";
        header("Location:market.php?id=".$markets['mkt_id']);
        $msg="found";
    }
    else{
        header("Location:login.php?login=User or password is incorrect, try again!");
    }
}
else{
    header("Location:index.php");
}