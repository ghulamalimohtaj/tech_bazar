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
<link rel="stylesheet" href="layout/styles/style.css"/>
<link href="layout/styles/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/style.css" rel="stylesheet" type="text/css" media="all">
<script src="js/jquery.min.js"></script>
<script src="js/myscript.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<!--<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">-->
</head>
<body>
    
<div class="wrapper row0" style="overflow: hidden;height: 60px">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_left">
      <ul class="nospace">
        <li><a href="index.php"><i class="fas fa-home fa-lg"></i></a></li>
        <li><a href="#about">About</a></li>
      </ul>
    </div>
     
    <div class="fl_right">
      <ul class="nospace">
        <li><span id="fire-sign-in"><a href="login.php" >Sign in</a></span></li>
        <li><span id="fire-sign-in"><a href="login.php"  data-toggle="modal" data-target="#signup" >Sign up</a></span></li>
      </ul>
        
 <div class="container">
  <!-- The Modal -->
</div>

    <div class="container mt-3">
    <style>
    .form-group{
      padding:0px 10px 0px 10px;
      border-radius:5px;
    }
    </style>
    <!-- Sign up form --> 
      <div class="modal fade" id="signup">
        <div class="modal-dialog">
          <div class="modal-content" >
            <!-- Modal body -->
            <div class="modal-body" style="color:black">
            <div > 
                <form method="post" action="signup.php" onsubmit="return validate()" enctype="multipart/form-data">
                    <div class="form-group" id="mkt_name_g">
                      <p id="mkt_name_err" class="error"></p>
                      <label for="">Shop Name</label>
                      <input type="text" name="mkt_name" class="form-control" id="mkt_name" placeholder="Enter your shop name" required>
                    </div>
                    <div class="form-group" id="mkt_add_g">
                      <p id="mkt_add_err" class="error"></p>
                      <label for="">Address</label>
                      <input type="text" name="mkt_add" class="form-control" id="mkt_add" placeholder="Enter your addrss" required>
                    </div>
                    <div class="form-group" id="owner_name_g">
                      <p id="owner_name_err" class="error"></p>
                      <label for="">Name</label>
                      <input type="text" name="owner_name" class="form-control" id="owner_name" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group" id="owner_lname_g">
                      <p id="owner_lname_err" class="error"></p>
                      <label for="">Lastname</label>
                      <input type="text" name="owner_lname" class="form-control"id="owner_lname" placeholder="Enter your lastname">
                    </div>
                    <div class="form-group">
                      <label for="">Phone(without +93 or 0)</label>
                      <input type="number" min="000000000" max="999999999" name="owner_phone" class="form-control" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                      <label for="">email</label>
                      <input type="email" name="owner_email" class="form-control" placeholder="Enter your email address" required>
                    </div>
                    <div class="form-group">
                      <p id="pro_err" class="error"></p>
                      <label for="">Photo</label>
                      <input type="file" name="photo" id="prof" class="form-control">
                    </div>
                    <div class="form-group">
                      <p id="license_err" class="error"></p>
                      <label for="">License</label>
                      <input type="file" name="license" id="license" class="form-control" required="">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" name="owner_password" class="form-control" id="pass" placeholder="Enter your password" required>
                      <p style="text-trnsform:lowercase;">The password must be at least 7 characters long!</p>
                    </div>
                    <div class="form-group">
                      <label for="">Confirm</label>
                      <input type="password" name="confirm" onkeyup="decide()" class="form-control" id="repass" placeholder="Retype your password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="sned" value="Register" class="btn btn-primary" id="submit">
                    </div>
                </form>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
   </div>
  </div>
</div>
    
     <?php
         // Show message wheather signing up was successful or not
        if(isset($_GET['reg'])){
            if($_GET['reg'] == 'ok'){
            echo ("<script>alert('successfull submission! you will be approved within 24 hours!');</script>");  
        }else{
            echo ("<script>alert('your submission was not successfull. please try again!');</script>");
        }
        }
    ?>
<!-- start header area -->
<div class="">
  <header id="header" class="hoc col-12 row container p-4"> 
    <div class="w3-half">
      <h1 class="logoname container-fluid"><a href="index.html" id="title"><span>Tech</span>Bazar</a></h1>
    </div>
    <!-- Search form -->
    <div class="w3-half ">
        <form method="get" action="index.php" class="search w3-half fr">
           <!-- keep searched word after the page was refreshed by searching -->
          <input type="text" name="q" value="<?php if(isset($_GET['q']))echo($_GET['q']);?>" placeholder="search">
        </form>
    </div>
  </header>
</div>
<!-- End header area -->

<!-- Start background image area -->
<div class="wrapper bgded overlay" style="<?php if(isset($_GET['q']))echo("display:none;");else{echo("display:block;");}?>background-image:url('images/demo/backgrounds/computer.jpg');">
  <div id="pageintro" class="hoc clear"> 
    <article>
      <h1>Find a computer of your dream without wasting much time visiting every shops!</h1>
    </article>
  </div>
</div>
<!-- End background image area -->

<!-- Start computers section area -->
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="sectiontitle">
      <h3 class="" style="<?php if(isset($_GET['q']))echo("display:none;");else{echo("display:block;");} /* Hide background image while searching */?>">Recently posted computers</h3>
    </div>
    
    <div class="row">
            <?php
            // if 
            if(isset($_GET['q'])){// in searching mode
                $q = $_GET['q'];
                $getComputers = "SELECT * FROM computer WHERE model LIKE '%".$q."%' OR ram LIKE '%".$q."%' OR storage LIKE '%".$q."%' OR charge LIKE '%".$q."%' OR price LIKE '%".$q."%'";
              }else{
            // Query all computers from the database
            $getComputers = "SELECT * FROM computer ORDER BY add_date DESC LIMIT 6";
            }
            //connect to the database
            require 'connection.php';
            $exe = $conn->query($getComputers);
            if ($exe && $exe->num_rows > 0) {
                while ($pc = $exe->fetch_assoc()) {
                    
                    // fetch all computer properties
                        $shop_id = $pc['shop_id'];
                        $getMarket = "SELECT * FROM market WHERE mkt_id=".$pc['shop_id'];
                        $exeGetMember = $conn->query($getMarket);
                        $market = $exeGetMember->fetch_assoc();
                        $market_name = $market['mkt_name'];
                        $market_owner_name = $market['mkt_owner_name'];
                        $market_phone = $market['mkt_owner_phone'];
                        $market_email = $market['mkt_owner_email'];
                        $market_owner_photo = $market['mkt_owner_photo'];
                        $market_address = $market['mkt_address'];
                    
                    ?>
                           <!-- Each computer area which is repeated by the php while loop -->
                            <div class="col-lg-4 col-md-4 col-sm-12 w3-card" id="pc" >         
                            <div style="width:100%;height:50%;">
                                <?php
                                $i =0;
                                $sql = $conn->query("SELECT name FROM images WHERE pc_id=".$pc['pc_id']);

                                    while($images = $sql->fetch_assoc()){
                                        if($i ==0){
                                            echo "<img src='market/pc/".$images['name']."' class='w3-full pc_images' onclick='showMe(this.src)'  data-toggle='modal' data-target='#show_img'>";
                                        }else{
                                            echo "<img src='market/pc/".$images['name']."' class='w3-third p-1 pc_images' onclick='showMe(this.src)'  data-toggle='modal' data-target='#show_img'>";
                                        }
                                        $i++;
                                        if($i == 4)
                                        break;
                                    }
                                ?>
                                </div>
                                <br>
                                <!-- show computer properties -->
                            <div class="cursor-pointer" style="display:block;text-align:left">
                                <h1 style="clear:both;text-transform:<?php if($pc['model'] == "hp") echo 'lowercase;';?>;"><?php echo($pc['model']); ?></h1>
                                <p><?php echo("RAM: ".$pc['ram']); ?><br>
                                <?php echo("Storage: ".$pc['storage']); ?><br>
                                <?php echo("Size: ".$pc['size']); ?>Inches<br>
                                <?php echo("Price: ".$pc['price']);?><br>
                                <?php echo("Battery Live: ".$pc['charge']." hr");?></p>
                              <br>
                              <br>

                            </div>
                            <a href="markets.php?id=<?php echo($pc['shop_id']);?>" class="w3-link w3-button w3-black" style="position:absolute;left:5px;bottom:5px;">See Owner</a>
                          </div>       
                    <?php
                }
            }
            ?>

    </div>
    <div class="modal fade" id="show_img">
        <div class="modal-dialog" style="width:80%">
            <span type="button" data-dismiss="modal" class="w3-button w3-black" style="cursor:pointer;position:absolute;top:0px">&cross;</span>
            <img src="" alt="" id="modal_img" style="width:100%">
        </div>
    </div>
      
      <!-- Start About areat -->
    <div class="wrapper container about" id="about">
      <div class="w3-center p-3">
          <h1>About us</h1>
          <p>TechBazar is an advertising platform for computer's sellers to upload thier compters' information in order to be available to customers</p>
      </div>
    </div>
      <!-- End About area -->
      
  </main>
</div>
<!-- End Main Section -->



<?php
// Attach Footer at the bottom of the the page 
require("footer.php");
?>
    
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<script type="text/javascript">
    var submit = document.getElementById('submit');
    submit.disabled=true;
    // Enable submit button if password and conform password mached
    function decide(){
        var pass = document.getElementById('pass');
        var repass = document.getElementById('repass');
       if(pass.value==repass.value && pass.value.length>6){
         submit.disabled=false;
       }else{
         submit.disabled=true;
       }
 }
</script>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script type="text/javascript">
 
    // Form Validation 
  function validate(){
    var mkt_name = document.getElementById('mkt_name').value;
    var mkt_add = document.getElementById('mkt_add').value;
    var owner_name = document.getElementById('owner_name').value;
    var owner_lname = document.getElementById('owner_lname').value;
    var prof = document.getElementById('prof').value;
    var license = document.getElementById('license').value;
    let myRegex = /[^A-z ]/ig;
    let addressRegex = /[!@#$%^&*+=/.>?{}<]/ig;

    var mkt_name_g = document.getElementById('mkt_name_g');
    var mkt_add_g = document.getElementById('mkt_add_g');
    var owner_name_g = document.getElementById('owner_name_g');
    var owner_lname_g = document.getElementById('owner_lname_g');
    
    var mkt_name_err = document.getElementById('mkt_name_err');
    var mkt_add_err = document.getElementById('mkt_add_err');
    var owner_name_err = document.getElementById('owner_name_err');
    var woner_lname_err = document.getElementById('owner_lname_err');
    //photos
    var license_err = document.getElementById('license_err');
    var pro_err = document.getElementById('pro_err');
 
    let mkt_name_result = mkt_name.match(myRegex);
    let mkt_add_result = mkt_add.match(addressRegex);
    let owner_name_result = owner_name.match(myRegex);
    let owner_lname_result = owner_lname.match(myRegex);

    var mkt_name_flag = true;
    var mkt_add_flag = true;
    var owner_name_flag = true;
    var owner_lname_flag = true;

    if(mkt_name_result != null || mkt_name.length<5 || mkt_name.length > 40){
      mkt_name_flag = false;
      mkt_name_err.innerHTML = "Invalid Name!";
      mkt_name_g.style.border = "1px solid red";
    }else{
      mkt_name_flag = true;
      mkt_name_err.innerHTML = "";
      mkt_name_g.style.border = "none";
    }
  
    if(mkt_add_result != null || mkt_add.length<10 || mkt_add > 100){
      mkt_add_flag = false;
      mkt_add_err.innerHTML = "Invalid address!";
      mkt_add_g.style.border = "1px solid red";
    }else{
      mkt_add_flag = true;
      mkt_add_err.innerHTML = "";
      mkt_add_g.style.border = "none";
    }
 
    //Sayed Hagi mohammad kabir haidarabadi -->> the longest possible length for a name
    if(owner_name_result != null ){
      owner_name_flag = false;
      owner_name_err.innerHTML = "Invalid name!";
      owner_name_g.style.border = "1px solid red";
    }else{
      
      owner_name_flag = true;
      owner_name_err.innerHTML = "";
      owner_name_g.style.border = "none";
    }
 
    if(owner_lname_result != null || owner_lname.length < 3 || owner_lname.length > 40){
      owner_lname_flag = false;
      owner_lname_err.innerHTML = "Invalid last name!";
      owner_lname_g.style.border = "1px solid red";
    }else{
      owner_lname_flag = true;
      owner_lname_err.innerHTML = "";
      owner_lname_g.style.border = "none";
    }
    var pro_img_flag = true;
    var license_img_flag = true;
  
        var slicePoint = prof.lastIndexOf('.')+1;
        var proExt = prof.slice(slicePoint,prof.length);
        if(proExt == "jpg" || proExt == "png" || proExt == "JFIF" || proExt == "jpeg" || proExt == "gif")  {
          pro_img_flag = true;
          pro_err.innerHTML="";
          document.getElementById('prof').style.border = "none";
        }else{
          pro_img_flag = false;
          document.getElementById('prof').style.border = "1px solid red";
          pro_err.innerHTML = "Invalid File type";
        
        }

        var slicePoint = license.lastIndexOf('.')+1;
        var licenseExt = license.slice(slicePoint,license.length);
        if(licenseExt == "jpg" || licenseExt == "png" || licenseExt == "jpeg" || licenseExt == "gif")  {
            license_img_flag = true;
            license_err.innerHTML = "Invalid File type";
            document.getElementById('license').style.border = "none";
        }else{
            license_img_flag = false;
            license_err.innerHTML = "Invalid File type";
            document.getElementById('license').style.border = "1px solid red";
        }
    
    // Send form if everything was ok
    return mkt_name_flag && mkt_add_flag && owner_name_flag && owner_lname_flag && pro_img_flag && license_img_flag;
    
  }
</script>
</body>
</html>
