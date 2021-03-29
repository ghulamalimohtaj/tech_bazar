<?php
if(isset($_POST['pcId'])){
    $delete = "DELETE FROM computer WHERE pc_id=".$_POST['pcId'];
    require 'connection.php';
    $sql = $conn->query("SELECT name FROM images WHERE pc_id=".$_POST['pcId']);
    while($images = $sql->fetch_assoc()){
        $img_url = "market/pc/".$images['name'];
        if(file_exists($img_url)){
            unlink($img_url);
        }
    }
    $conn->query("DELETE FROM images WHERE pc_id=".$_POST['pcId']);
    if($conn->query($delete)){
        header("Location:market.php?id=".$_POST['shopId']."&msg=ok");
    }else{
        header("Location:market.php?id=".$_POST['shopId']."&msg=failed");
    }
}