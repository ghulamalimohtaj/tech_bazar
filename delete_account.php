<?php
session_start();
if(isset($_POST['confirm_delete'])){
    if(isset($_SESSION["a".$_POST['id']])){
        $password = $_POST['confirm_delete'];
        require('connection.php');
        $sql = $conn->query("SELECT mkt_id FROM market WHERE mkt_owner_password=password('".$password."') AND mkt_id=".$_POST['id']);
        if($sql && $sql->num_rows === 1){
            $sql = $conn->query("DELETE FROM market WHERE mkt_owner_password=password('".$password."') AND mkt_id=".$_POST['id']);
            if($sql){
                header("Location:index.php?msg=account deleted");
            }else{
                header("Location:market.php?msg=incorrect password!&id=".$_POST['id']);
            }
        }else{
            header("Location:market.php?msg=<script>alert('incorrect password');</script>&id=".$_POST['id']);
        }
    }else{
        header("Location:index.php");
    }
}else{
    header("Location:index.php");
}
echo($_SESSION["a".$_POST['id']]);
echo($_POST['confirm_delete']);