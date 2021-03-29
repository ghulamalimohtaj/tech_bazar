<?php
session_start();
if(isset($_SESSION['varify'])){
?>
<!DOCTYPE html>

<html lang="">
<head>
<title>TechBazar</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="layout/styles/w3.css">
<link rel="stylesheet" href="layout/styles/font-awesome.min.css">
<link rel="stylesheet" href="layout/styles/bootstrap.css">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<link href="layout/styles/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/style.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery.min.js"></script>
<script src="js/myscript.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>

<!--<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">-->
</head>
<body id="top">

<div class="w3-bar w3-border gradient w3-top">
<span class="fl"><a href="index.php" class="w3-text-white"><h2 class="p-2 pr-4">TechBazar</h2></a></span>
  <a href="#all" class="w3-bar-item w3-button w3-padding-24" onclick="select(1)">All Shops</a>
  <a href="#pending" class="w3-bar-item w3-button w3-padding-24" onclick="select(2)">Pending Shops</a>
  <a href="#edit" class="w3-bar-item w3-button w3-padding-24" onclick="select(3)">Edit</a>
  <div style="float:right;padding:20px;text-align:center;"><a href="admin_login.php?logout=ok" class="w3-text-white">Logout</a></div>
</div>  
<div class="wrapper" style="background-color:white" id="pending">
  <section id="testimonials" class="hoc container clear"> 
    <div class="row">
      <h2>Pending accounts</h2>
      
    </div>
    <div class="row">
    <?php
    $pending ="SELECT * FROM market WHERE state=0 ORDER BY reg_date DESC";
    require("connection.php");
    $execute = $conn->query($pending);
    if($execute && $execute->num_rows>0){
        while($markets = $execute->fetch_assoc()){
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 w3-card pendingMarkets " style="color:black">
        <img src="market/owner_photo/<?php echo($markets['mkt_owner_photo']);?>" style="float:left;width:30%;border-radius:50%;text-align:center" alt="">
        <h3 style="float:left;width:70%"><?php echo($markets['mkt_name']);?></h3>
        <p><?php echo($markets['mkt_owner_name']." ".$markets['mkt_owner_laname']);?></p>
        <table class="w3-table-all">
                <tr>
                    <td>Address</td>
                    <td><?php echo($markets['mkt_address']);?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo($markets['mkt_owner_phone']);?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo("<a href='mailto:".$markets['mkt_owner_name']."'>".$markets['mkt_owner_email']."</a>");?></td>
                </tr>
                </table>
        <a href="javascript:void(0)"  data-toggle="modal" data-target="#<?php echo("a".$markets['mkt_id']);?>" type="button" class="w3-button">License</a>
        <span class="float-right accept-deny">
        <a href="approve_deny.php?what=approve&id=<?php echo($markets['mkt_id']);?>" type="button" class=" w3-button">Approve</a>
        <a href="approve_deny.php?what=deny&id=<?php echo($markets['mkt_id']);?>" type="button" class="w3-button">Deny</a>
        </span>       
            
        
             

  <div class="modal fade" id="<?php echo("a".$markets['mkt_id']);?>">
    <div class="modal-dialog" style="max-width:1000px">
      <div class="modal-content">
          
              <span><button type="button" class="btn btn-danger" data-dismiss="modal">x</button></span>
          
        
        <!-- Modal body -->
        <div class="modal-body m-0 text-black">
            <img src="market/license/<?php echo($markets['mkt_license']);?>" alt="market/license/<?php echo($markets['mkt_license']);?>">
        </div>
        
        <!-- Modal footer -->
        
          
        
        
      </div>
    </div>
  </div>
  

        
            
        </div>
      
    <?php
        }
    
    }
    else{
        echo "<h5 style='text-align:center;'>No Pending accounts!</h5>";
    }
    ?>
    </div>
  </section>
    <section class="container" id="all">
        <h2>All acounts</h2>
        <div class="row">
            
    <?php
    $pending ="SELECT * FROM market WHERE state=1 ORDER BY reg_date DESC";
    require("connection.php");
    $execute = $conn->query($pending);
    if($execute && $execute->num_rows>0){
        while($markets = $execute->fetch_assoc()){
        ?>
    
        <div class="col-lg-4 col-md-6 col-sm-12 w3-card pendingMarkets "  style="color:black">
        <img src="market/owner_photo/<?php echo($markets['mkt_owner_photo']);?>" style="float:left;width:30%;border-radius:50%;text-align:center" alt="">
        <h3 style="float:left;width:70%"><?php echo($markets['mkt_name']);?></h3>
        <p><?php echo($markets['mkt_owner_name']." ".$markets['mkt_owner_laname']);?></p>
        <table class="w3-table-all">
                <tr>
                    <td>Address</td>
                    <td><?php echo($markets['mkt_address']);?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo($markets['mkt_owner_phone']);?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo("<a href='mailto:".$markets['mkt_owner_name']."'>".$markets['mkt_owner_email']."</a>");?></td>
                </tr>
                </table>
        <a href="javascript:void(0)"  data-toggle="modal" data-target="#<?php echo("a".$markets['mkt_id']);?>" type="button" class="w3-button">License</a>
        <span class="float-right accept-deny">
        <a href="javascript:void(0)" onclick="delete_acc(<?php echo($markets['mkt_id']);?>)" type="button" class="w3-button">Delete</a>
        </span>       
            
        
             

  <div class="modal fade" id="<?php echo("a".$markets['mkt_id']);?>">
    <div class="modal-dialog" style="max-width:1000px">
      <div class="modal-content">
          
              <span><button type="button" class="btn btn-danger" data-dismiss="modal">x</button></span>
          
        
        <!-- Modal body -->
        <div class="modal-body text-black m-0">
            <img src="market/license/<?php echo($markets['mkt_license']);?>" alt="market/license/<?php echo($markets['mkt_license']);?>" >
        </div>
        
        <!-- Modal footer -->
        
          
        
        
      </div>
    </div>
  </div>
  

        
            
        </div>
      
    <?php
        }
    
    }
    ?>
    </div>
        
    </section>
</div>


<?php
require("footer.php");
?>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script>
function delete_acc(id){
    if(confirm('Are your sure to delete this account')){
        location.assign('approve_deny.php?what=deny&id='+id);
    }
}
</script>
</body>
</html>
<?php
}
 else {
     header("Location:index.php");
}
?>