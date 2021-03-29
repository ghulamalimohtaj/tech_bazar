<?php

if($_SERVER['REQUEST_METHOD']==="GET"){
    if(isset($_GET['what'])){
        if($_GET['what']==="approve"){
            $id = $_GET['id'];
            $forEmail = "SELECT mkt_owner_name,mkt_owner_email FROM market WHERE mkt_id=".$id;
            $approve = "UPDATE market SET state=1 WHERE mkt_id=".$id;
            require ("connection.php");
            $affected = $conn->query($approve);
            if($affected){
//                $exeEmail = $conn->query($forEmail);
//                if($exeEmail){
//                    $getEmail = $exeEmail->fetch_assoc();
//                    $email = $getEmail['mkt_owner_email'];
//                    $to= $email['mkt_owner_email'];
//                    $msg = "CONGRACULATIONS MR ".$email['mkt_owner_name']." !"
//                            . "\n your Submission to <a href='http:www.techbazar.com'>techbazar.com</a> was approved\n"
//                            . "now your can advertize your computers with this website";
//                    $msg = wordwrap($msg,70);
//                    mail($to,"Account Approval",$msg);
//                
//                    
//                }
                header("Location:dashboard.php?approve=ok");
            }
        }
        
        if($_GET['what']==="deny"){
            $id = $_GET['id'];
            require('connection.php');
            $sql = $conn->query("SELECT * FROM market WHERE mkt_id=".$id);
            $shop = $sql->fetch_assoc();
            $pro = "market/owner_photo/".$shop['mkt_owner_photo'];
            $license = "market/license/".$shop['mkt_license'];
            if(file_exists($pro)){
                unlink($pro);
            }
            if(file_exists($license)){
                unlink($license);
            }
            $delete_pc = "DELETE FROM computer WHERE shop_id=".$id;
            $deny = "DELETE FROM market WHERE mkt_id=".$id;
            require ("connection.php");
//            
//                $exeEmail = $conn->query($forEmail);
//                if($exeEmail){
//                    $getEmail = $exeEmail->fetch_assoc();
//                    $email = $getEmail['mkt_owner_email'];
//                    $to= $email['mkt_owner_email'];
//                    $msg = "SORRY OF DENYING YOUR SUBISSION MR ".$email['mkt_owner_name']." !"
//                            . "\n The License you submitted wasn't suitable of your claim but still you can see computers for purchase on <a href='http:www.techbazar.com'>techbazar.com</a>";
//                    $msg = wordwrap($msg,70);
//                    mail($to,"Account Approval",$msg);
//                    
//                    
//                }
                if($conn->query($delete_pc)){
                    $conn->query($deny);
                    header("Location:dashboard.php?deny=ok");
                }
        }
    }
}

