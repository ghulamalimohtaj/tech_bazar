<?php
function is_photo( $extention ) {
  if ( $extention == "jpg" || $extention == "png" || $extention == "jpeg" || $extention == "gif" ) {
    return true;
  } else {
    return false;
  }
}

if(isset($_POST['id'])){
    session_start();
    require("connection.php");
    $shop_id = $_POST['id'];
    if(true ){
        if(isset($_SESSION["a".$shop_id])){
            $id = $_POST['id'];
            $model = $_POST['model'];
            $ram = $_POST['ram']."GB";
            $storage = $_POST['storage'].$_POST['storage_unit'];
            $charge = $_POST['charge']."";
            $price = $_POST['price'].$_POST['price_unit'];
            $size = $_POST['size'];
            $i = 0;
            require('connection.php');
            $add_pc = "INSERT INTO computer VALUES(null,".$shop_id.",'".$model."','".$ram."','".$storage."',".$size.",'".$charge."','".$price."',NOW())";
            
                if ( $conn->query( $add_pc ) ){
                  $last_id = $conn->insert_id;
                    move_uploaded_file( $_FILES[ "pc_images" ][ "tmp_name" ], "market/pc/" . $photo );
                    foreach($_FILES['images']['tmp_name'] as $key => $key){
                      $imageName = basename( $_FILES[ "images" ][ "name" ][$key] );
                      $photoType = strtolower( pathinfo( $imageName, PATHINFO_EXTENSION ) );
                      $photo = uniqid(time()).".".$photoType;
                      $imgTmpName = $_FILES['images']['tmp_name'][$key];
                        if(is_photo($photoType)){
                          if($i < 5){
                            if($conn->query("INSERT INTO images VALUES(NULL,".$last_id.",'".$photo."')")){
                              $result = move_uploaded_file($imgTmpName,"market/pc/".$photo);
                            }else{
                                echo "na mosha";
                            }
                          }else{
                            break;
                          }
                        }
                      $i++;
                  }

                    header("Location:market.php?id=".$shop_id);
                }else{
                        // header("Location:market.php?id=".$_POST['id']."&msg=<p style='color:red'>The file is not an image</p>");
                }
            
            
           
        }else{echo("session");}
    }else{echo("query");}
}else{echo("post");}
