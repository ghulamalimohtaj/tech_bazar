<!DOCTYPE html>
<?php
function is_photo( $extention ) {
    if ( $extention == "jpg" || $extention == "png" || $extention == "jpeg" || $extention == "gif" ) {
      return true;
    } else {
      return false;
    }
  }
if ($_SERVER['REQUEST_METHOD'] === "GET" || $_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_GET['id'])){
        $market_id = $_GET['id'];
    }else{
        $market_id = $_POST['id'];
    }
    if(isset($_POST['pro_update'])){

        require('connection.php');
        $sql = $conn->query('select * from market where mkt_id='.$market_id);
        if($sql && $sql->num_rows == 1){
            $market = $sql->fetch_assoc();
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $pro_pic = "owner_photo/".$market['mkt_owner_photo'];
            $bg_img = "market/bg/".$market['bg_img'];
            
            // if(file_exists[$pro_pic]){
            //     unlink($pro_pic);
            // }
            $sql = $conn->query("UPDATE market  set mkt_address='".$address."' ,mkt_owner_phone='".$phone."' where mkt_id=".$market_id);
        if($_FILES['pro_pic']['error'] == 0){
            
            $imageName1 = basename( $_FILES[ "pro_pic" ][ "name" ]);
            $photoType1 = strtolower( pathinfo( $imageName1, PATHINFO_EXTENSION ) );
            $photo1 = uniqid(time()).".".$photoType1;
            $imgTmpName1 = $_FILES['pro_pic']['tmp_name'];
            if(is_photo($photoType1)){
                if(file_exists($pro_pic)){
                    unlink($pro_pic);
                }
            if($conn->query("UPDATE market set mkt_owner_photo='".$photo1."' where mkt_id=".$market_id)){
            $result = move_uploaded_file($imgTmpName1,"market/owner_photo/".$photo1);
            }
        }
        }
        if($_FILES['bg_img']['error'] == 0){
           
            $imageName = basename( $_FILES[ "bg_img" ][ "name" ]);
            $photoType = strtolower( pathinfo( $imageName, PATHINFO_EXTENSION ) );
            $photo = uniqid(time()).".".$photoType;
            $imgTmpName = $_FILES['bg_img']['tmp_name'];
            if(is_photo($photoType)){
                if(file_exists($bg_img)){
                    unlink($bg_img);
                }
            if($conn->query("UPDATE market set bg_img='".$photo."' where mkt_id=".$market_id)){
            $result = move_uploaded_file($imgTmpName,"market/bg/".$photo);
            }
        }
        }
    }
        
    }
    
    $varify = "SELECT * FROM market WHERE mkt_id=" . $market_id;
    require ("connection.php");
    $exe = $conn->query($varify);
    $photo ="";
    if ($exe && $exe->num_rows === 1) {
        $getMarket = $exe->fetch_assoc();
        $photo = $getMarket['mkt_owner_photo'];

        $shopName = $getMarket['mkt_name'];
        $ownerName = $getMarket['mkt_owner_name'];
        $ownerLName = $getMarket['mkt_owner_laname'];
        $address = $getMarket['mkt_address'];
        $photo = $getMarket['mkt_owner_photo'];
        $bg = "market/bg/".$getMarket['bg_img'];
        if($bg === ""){
            $bg = "market/bg/Capture.PNG";
        }
        session_start();
        if (isset($_SESSION["a".$market_id])) {
            ?>

            

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
                <body id="top">
                    <div class="wrapper row0" style="overflow: hidden;">
                        <div id="topbar" class="hoc clear"> 
                            <div class="fl_left">
                                <ul class="nospace">
                                <h1 class="logoname container-fluid"><a href="index.php">TechBazar</a></h1>

                                </ul>
                            </div>
                           
                            <div class="fl_right">
                                <ul class="nospace">
                                    <li><i class="fas fa-phone rgtspace-5"></i> <?php echo("0".$getMarket['mkt_owner_phone']);?></li>
                                    <li><i class="fas fa-envelope rgtspace-5"></i> <?php echo($getMarket['mkt_owner_email']);?></li>
                                    <li><span id="fire-sign-in"><a href="javascript:void(0)"  data-toggle="modal" data-target="#newpc" >Add new PC</a></span></li>
                                    <li><span><a href="login.php?logout=ok">Log out</a></span></li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    <style>
                    #head{
                        background-image: url(<?php echo($bg);?>);
                        background-size:100%;
                        background-repeat:no-repeat;
                    }
                    #mysearch{
                        background:none;
                        font-size:15px;
                    }
                    #mysearch:focus{
                        background-color:rgba(3,4,30,0.4);
                        border:1px solid pink;
                    }
                    #header{
                        background-color:rgba(3,4,30,0.7);
                        width:100%;
                        margin:0px;
                    }
                    fieldset{
                        padding:20px;
                        background-color:rgb(41 24 24);
                        border:2px solid blue;
                        border-radius:10px;
                    }
                    .form-group{
                        padding:0px 10px 0px 10px;
                        border-radius:5px
                    }
                    </style>
                    <div class="text-white" id="head">
                        <header id="header" class="hoc col-12 row p-2 pl-3 pr-3" onclick="close();">
                            <div class="col-12 p-2 w3-center ">
                            <div class="w3-left">
                                    <button class="w3-button w3-black" onclick="stateChange()" style="float:left">Edit profile</button>
                                    <form action="market.php" method="post" enctype="multipart/form-data" id="bg_change">
                                        <input type="hidden" name="id" value="<?php echo($market_id);?>">
                                        <div class="form-group">
                                            <label for="pro_pic">Profile picture</label>
                                            <input type="file" name="pro_pic" >
                                        </div>
                                        <div class="form-group">
                                            <label for="background">cover photo</label>
                                            <input type="file" name="bg_img">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="number" name="phone" class="form-control" value="<?php echo($getMarket['mkt_owner_phone']);?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" name="address" class="form-control" value="<?php echo($getMarket['mkt_address']);?>">
                                        </div>
                                        <div class="form-group">
                                            <span id="fire-sign-in"><a href="javascript:void(0)"  data-toggle="modal" data-target="#delete_account" class="btn btn-danger fr">Delete Account</a></span>
                                            <input type="submit" value="Update" name="pro_update" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>
                                <img src="market/owner_photo/<?php echo($photo);?>" alt="user" id="pro">
                                <h4><?php echo($ownerName." ".$ownerLName);?></h4>
                                <div class="shop-name w3-center">
                                <h1><?php echo($shopName);?></h1>
                            </div>
                                <form method="get" action="market.php" class="w3-right">
                                    <input type="hidden" name="id" value="<?php echo($market_id)?>">
                                    <input type="text" name="q" placeholder="search" value="<?php if(isset($_GET['q']))echo($_GET['q']);?>" class="w3-input" id="mysearch">
                                </form>
                            </div>
                            <p>Address: <?php echo($getMarket['mkt_address']);?></p>
                            </div>
                            
                            <br>
                        </header>
                    </div>
                    <style>
                    input,select{
                        padding:5px;
                    }
                    </style>
                    <div class="modal fade" id="delete_account">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-3" style="color:black">
                                <p>you need to enter your password to delete your account</p>
                                <form action="delete_account.php" method="post">
                                    <input type="password" name="confirm_delete" class="form-control" required>
                                    <input type="hidden" name="id" value="<?php echo($market_id);?>">
                                    <input type="submit" value="Delete" class="w3-button">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="newpc">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-3" style="color:black">
                                    <form method="post" action="add_pc.php" onsubmit="return validate()" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo($market_id); ?>" required>
                                        <div class="form-group">
                                            <label for="model">Company</label>
                                            <select name="model" id="model" class="form-control">
                                                <option value="DELL">DELL</option>
                                                <option value="hp">hp</option>
                                                <option value="Toshiba">Toshiba</option>
                                                <option value="eXtreme">eXtreme</option>
                                                <option value="Apple">Apple</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="ram_g">
                                            <label for="ram">RAM</label>
                                            <p id="ram_err" class="error"></p>
                                            <input type="number" min="0" max="1024" name="ram" id="ram" class="form-control" required>
                                            <select name="ram_unit" id="ram_unit" class="w3-rest">
                                                <option value="MB">MB</option>
                                                <option value="GB" selected>GB</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="storage_g">
                                            <label for="Storage">Storage</label>
                                            <p id="storage_err" class="error"></p>
                                            <input type="number" min="1" max="1024" class="form-control" name="storage" id="storage" required class="col-10">
                                            <select name="storage_unit" id="storage_unit" class="w3-rest">
                                                <option value="GB" selected>GB</option>
                                                <option value="TB">TB</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="charge_g">
                                            <p id="charge_err" class="error"></p>
                                            <label for="charge">Charge maintenance (hours)</label>
                                            <input type="number"  name="charge" id="charge" required class="form-control">
                                        </div>
                                        <div class="form-group" id="price_g">
                                            <label for="Storage">Price</label>
                                            <p id="price_err" class="error"></p>
                                            <input type="number"  min="1"  name="price" id="price" required class="form-control">
                                            <select name="price_unit" id="price_unit"  class="w3-rest">
                                                <option value="AF" selected>AF</option>
                                                <option value="$">Doller</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="img_g">
                                            <p id="img_err" class="error"></p>
                                            <label for="img">Photos (four or less)</label>
                                            <input type="file" id="files" name="images[]" multiple  required>
                                        </div>
                                        <input type="submit" value="Add" class="btn btn-primary">
                                        <input type="reset" value="Cancel" class="btn btn-danger" data-dismiss="modal">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="show_img">
                        <div class="modal-dialog" style="width:80%">
                            <span type="button" data-dismiss="modal" class="w3-button w3-black" style="cursor:pointer;position:absolute;top:0px">&cross;</span>
                            <img src="" alt="" id="modal_img" style="width:100%">
                        </div>
                    </div>

                </div>
                <div class="wrapper row3">
                    <main class="hoc container clear">
                        <div class="row">

            <?php
            if(isset($_GET['q'])){
                $q = $_GET['q'];
                $getComputers = "SELECT * FROM computer WHERE shop_id=" . $market_id ." AND (model LIKE '%".$q."%' OR ram LIKE '%".$q."%' OR storage LIKE '%".$q."%' OR price LIKE '%".$q."%' OR charge LIKE '%".$q."%')";
            }else{
                $getComputers = "SELECT * FROM computer WHERE shop_id=" . $market_id . " ORDER BY add_date DESC";
            }
            $exe = $conn->query($getComputers);
            if ($exe && $exe->num_rows > 0) {
                while ($pc = $exe->fetch_assoc()) {
                    $sql = $conn->query("SELECT name FROM images WHERE pc_id=".$pc['pc_id']);
                    ?>
                            <div class="col-lg-4 col-md-4 col-sm-12 w3-card" id="pc">
                            <div style="width:100%;height:50%;">
                                <?php
                                $i =0;
                                    while($images = $sql->fetch_assoc()){
                                        if($i ==0){
                                            echo "<img src='market/pc/".$images['name']."' class='w3-full pc_images' onclick='showMe(this.src)' data-toggle='modal' data-target='#show_img'>";
                                        }else{
                                            echo "<img src='market/pc/".$images['name']."' class='w3-third p-1 pc_images' onclick='showMe(this.src)'  data-toggle='modal' data-target='#show_img'>";
                                        }
                                        $i++;
                                        if($i == 4)
                                        break;
                                    }
                                ?>
                                </div>
                                        <div>
                                            <h1 style="clear:both;text-transform:<?php if($pc['model'] == "hp") echo 'lowercase;';?>;"><?php echo($pc['model']); ?></h1>
                                            <p><?php echo("RAM: ".$pc['ram']); ?><br>
                                            <?php echo("Storage: ".$pc['storage']); ?><br>
                                            <?php echo("Price: ".$pc['price']);?><br>
                                            <?php echo("Buttery Live: ".$pc['charge']." hr");?></p>
                                            
                                            <form method="post" action="pc_delete.php" class="form-row" style="display:inline">
                                                <input type="hidden" name="pcId" value="<?php echo($pc['pc_id']);?>">
                                                <input type="hidden" name="shopId" value="<?php echo($market_id);?>">
                                                <input type="submit" value="Delete" class="btn btn-danger" style="position:absolute;left:5px;width:80px;bottom:0px;">
                                            </form>
                                            <a href="pc_update.php?id=<?php echo($pc['pc_id']."&shopId=".$market_id."&model=".$pc['model']."&ram=".$pc['ram']."&storage=".$pc['storage']."&price=".$pc['price']."&charge=".$pc['charge']);?>" style="position:absolute;left:90px;width:80px;bottom:0px;" class="btn btn-primary">Edit</a>
                                        </div>
                                    </div>
                            
                                <?php
                            }
                        }
                        ?>

                        </div>
                    </main>
                </div>
                <div id="modal"></div>
                <?php
                require("footer.php");
                ?>
                
                <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
                <!-- JAVASCRIPTS -->
                <script src="layout/scripts/jquery.min.js"></script>
                <script src="layout/scripts/jquery.backtotop.js"></script>
                <script src="layout/scripts/jquery.mobilemenu.js"></script>
                <script>
                function validate(){
                    var ram_flag = true;
                    var storage_flag = true;
                    var charge_flag = true;
                    var price_flag = true;
                    var photo_flag = true;

                    var ram = document.getElementById('ram');
                    var ram_unit = document.getElementById('ram_unit');
                    var storage = document.getElementById('storage');
                    var storage_unit = document.getElementById('storage_unit');
                    var price = document.getElementById('price');
                    var price_unit = document.getElementById('price_unit');
                    var charge = document.getElementById('charge');
                    
                    var ram_err = document.getElementById('ram_err');
                    var storage_err = document.getElementById('storage_err');
                    var price_err = document.getElementById('price_err');
                    var charge_err = document.getElementById('charge_err');
                    var img_err = document.getElementById('img_err');

                    var storage_g = document.getElementById('storage_g');
                    var ram_g = document.getElementById('ram_g');
                    var charge_g = document.getElementById('charge_g');
                    var price_g = document.getElementById('price_g');
                    var img_g = document.getElementById('img_g');


                    if(ram_unit.value == "MB"){
                        if(ram.value<500){
                            ram_flag = false;
                            ram_err.innerHTML = "RAM capacity can't be less than 500 MB";
                            ram_g.style.border="1px solid red";
                        }else{
                            ram_flag = true;
                            ram_err.innerHTML = "";
                            ram_g.style.border="none";
                        }
                    }else{
                        if(ram.value<1){
                            ram_flag = false;
                            ram_err.innerHTML = "RAM capacity can't be less than 500 MB";
                            ram_g.style.border="1px solid red";
                        }else{
                            ram_flag = true;
                            ram_err.innerHTML = "";
                            ram_g.style.border="none";
                        }
                    }
                    if(storage_unit.value =="GB"){
                        if(storage.value<50){
                            storage_flag = false;
                            storage_err.innerHTML = storage.value+storage_unit.value+" is too low";
                            storage_g.style.border="1px solid red";
                        }else{
                            storage_flag = true;
                            storage_err.innerHTML = "";
                            storage_g.style.border="none";
                        }
                    }
                    else{
                        if(storage.value>3){
                            storage_flag = false;
                            storage_err.innerHTML = "Invalid storage capacity";
                            storage_g.style.border="1px solid red";   
                        }else{
                            storage_flag = true;
                            storage_err.innerHTML = "";
                            storage_g.style.border="none";
                        }
                    }
                    if(price_unit.value == "AF"){
                        if(price.value < 4000 || price.value > 500000){
                            price_flag = false;
                            price_err.innerHTML = "Invalid price";
                            price_g.style.border="1px solid red";
                        }else{
                            price_flag = true;
                            price_err.innerHTML = "";
                            price_g.style.border="none";
                        }
                    }else{
                        if(price.value>5000 || price.value < 50){
                            price_flag = false;
                            price_err.innerHTML = "Invalid price";
                            price_g.style.border="1px solid red";
                        }else{
                            price_flag = true;
                            price_err.innerHTML = "";
                            price_g.style.border="none";
                        }
                    }
                    if(charge.value>10){
                        charge_flag = false;
                        charge_err.innerHTML = "Invalid charge maintenance guarantee";
                        charge_g.style.border="1px solid red";
                    }else{
                        charge_flag = true;
                        charge_err.innerHTML = "";
                        charge_g.style.border="none";
                    }
                    var file = document.getElementById('files');
                    var photo_flag = true;
                    for(i = 0; i<file.files.length ; i++){ 
                        var filename = file.files[i].name;
                        var slicePoint = filename.lastIndexOf('.')+1;
                        var ext = filename.slice(slicePoint,filename.length);
                        if(ext == "jpg" || ext == "png" || ext == "jpeg" || ext == "gif")  {
                            photo_flag = true;
                        }else{
                            photo_flag = false;
                        }
                    }
                    if(photo_flag){
                        img_err.innerHTML = "";
                        img_g.style.border = "none";
                    }else{
                        img_err.innerHTML = "Invalid file type";
                        img_g.style.border = "1px solid red";
                        }
                    return photo_flag;
                    
                  return ram_flag && storage_flag && charge_flag && price_flag && photo_flag;
                    
                }
                function isValidFile(){
                    
                }
                </script>
            </body>
            </html>

            <?php
        } else {
            header("Location:index.php?msg=regFirst".$_SESSION["a".$market_id]);
        }
    } else {
        echo("not found");
    }
} else {
    header("Location:index.php?authentication=failed");
}
?>
<script src="layout/scripts/myscript.js">
 
</script>