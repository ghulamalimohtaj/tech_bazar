<?php //
if($_SERVER['REQUEST_METHOD']=== 'POST'){
    
        function test_input( $data ) {
  $data = trim( $data );
  $data = stripslashes( $data );
  $data = htmlspecialchars( $data );
  return $data;
}
function is_photo( $extention ) {
  if ( $extention == "jpg" || $extention == "png" || $extention == "jpeg" || $extention == "gif" ) {
    return true;
  } else {
    return false;
  }
}
    
    $market_name = test_input($_POST['mkt_name']);
    $market_add = test_input($_POST['mkt_add']);
    $owner_name =test_input( $_POST['owner_name']);
    $owner_lname = test_input($_POST['owner_lname']);
    $owner_phone = test_input($_POST['owner_phone']);
    $owner_email = test_input($_POST['owner_email']);
    $owner_password = test_input($_POST['owner_password']);
    
    
  $photo = basename( $_FILES[ "photo" ][ "name" ] );
  $photoType = strtolower( pathinfo( $photo, PATHINFO_EXTENSION ) );
	$photo = uniqid(time()).".".$photoType;

  $license = basename( $_FILES[ "license" ][ "name" ] );
  $licenseType = strtolower( pathinfo( $license, PATHINFO_EXTENSION ) );
	$license = uniqid(time()).".".$licenseType;
        
  $newMarket = "INSERT INTO market VALUES (NULL,'".$market_name."','".$market_add."','".$license."','".$owner_name."','".$owner_lname."','".$photo."','".$owner_phone."','".$owner_email."','".$owner_password."',CURRENT_DATE,0,'Capture.jpg')";
        if ( is_photo( $photoType ) && is_photo( $licenseType ) ) {
            require ("connection.php");
    if ( $conn->query( $newMarket ) ) {
      move_uploaded_file( $_FILES[ "license" ][ "tmp_name" ], "market/license/" . $license );
      move_uploaded_file( $_FILES[ "photo" ][ "tmp_name" ], "market/owner_photo/" . $photo );
		header( "Location:index.php?reg=ok");
    } else {
      header("Location:index.php?reg=failedd");
    }
  }else{
	  header("Location:index.php?reg=failed");
  }
        
        
  }


//this is a comment
?>
