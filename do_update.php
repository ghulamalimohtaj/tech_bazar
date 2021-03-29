<?php
if(isset($_POST['pc_id'])){
    $market_id = $_POST['market_id'];
    $pc_id = $_POST['pc_id'];
    $market_id = $_POST['market_id'];
    $model = $_POST['pre_model'];
    $ram = $_POST['pre_ram'];
    $storage = $_POST['pre_storage'];
    $charge = $_POST['pre_charge'];
    $price = $_POST['pre_price'];
    
    if(isset($_POST['model'])){
        $model = $_POST['model'];
    }
    if(isset($_POST['ram'])){
        $ram = $_POST['ram'].$_POST['ram_unit'];
    }
    if(isset($_POST['storage'])){
        $storage = $_POST['storage'].$_POST['storage_unit'];
    }
    if(isset($_POST['charge'])){
        $charge = $_POST['charge'];
    }
    if(isset($_POST['price'])){
        $price = $_POST['price'].$_POST['price_unit'];
    }
    require("connection.php");
    $sql = $conn->query("UPDATE computer SET model='".$model."', ram='".$ram."',storage='".$storage."',charge='".$charge."',price='".$price."' WHERE shop_id=".$market_id." AND pc_id=".$pc_id);
    if($sql){
        header("Location:market.php?id=".$market_id);
    }else{
        echo "ERROR!";
    }
}