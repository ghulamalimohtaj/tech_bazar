<?php

if(isset($_GET['q'])){
    $q = $_GET['q'];
    require("connection.php");
    $sql = $conn->query("SELECT * FROM computer WHERE model LIKE '%".$q."%' OR ram LIKE '%".$q."%' OR storage LIKE '%".$q."%' OR charge LIKE '%".$q."%' OR price LIKE '%".$q."%' LIMIT 8");
    if($sql && $sql->num_rows>0){
        while($result = $sql->fetch_assoc()){
            
        }
    }
}