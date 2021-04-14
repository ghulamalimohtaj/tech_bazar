<!DOCTYPE html>
<?php
if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $market_id = $_GET['id'];
    
    $varify = "SELECT * FROM market WHERE mkt_id=" . $market_id;
    require ("connection.php");
    $exe = $conn->query($varify);
    $photo ="";
    if ($exe && $exe->num_rows === 1) {
        $getMarket = $exe->fetch_assoc();
        $shopName = $getMarket['mkt_name'];
        $ownerName = $getMarket['mkt_owner_name'];
        $ownerLName = $getMarket['mkt_owner_laname'];
        $address = $getMarket['mkt_address'];
        $photo = $getMarket['mkt_owner_photo'];
        $bg = $getMarket['bg_img'];
        if($bg == ""){
            $bg = "market/bg/Capture.PNG";
        }else{
            $bg = "market/bg/".$bg;
        }
        if (true) {
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
                               
                                <h1 class="logoname container-fluid"><a href="index.php">TechBazar</a></h1>
                               
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
                        background-color:rgba(0,0,0,0.4);
                        border:1px solid pink;
                    }
                    #header{
                        background-color:rgba(3,4,30,0.7);
                        width:100%;
                        margin:0px;
                    }
                    </style>
                    <div class="text-white" id="head">
                        <header id="header" class="hoc col-12 row p-2 pl-3 pr-3">
                            
                            <div class="w3-container p-2 full w3-center">
                                <img src="market/owner_photo/<?php echo($photo);?>" alt="user" style="width:100px;border-radius:50%;">
                                <h4 class=><?php echo($ownerName." ".$ownerLName);?></h4>
                            </div>
                            <div class="shop-name w3-center">
                                <h1><?php echo($shopName);?></h1>
                            </div>
                            <div class="w3-third p-3 fl">
                                <div class="p-2">Phone: <?php echo("0".$getMarket['mkt_owner_phone']);?> </div>
                                <div class="p-2">Address: <?php echo($address);?> </div>
                                <div class="p-2"><a href="login.php">Login</a></div>
                            <br>
                        </header>
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
                    ?>
                            <div class="col-lg-4 col-md-4 col-sm-12 w3-card" id="pc">
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
                            <div >
                                            <h1><?php echo($pc['model']); ?></h1>
                                            <p><?php echo("RAM: ".$pc['ram']); ?><br>
                                            <?php echo("Storage: ".$pc['storage']); ?><br>
                                            <?php echo("Size : ".$pc['size']); ?>Inches<br>
                                            <?php echo("Price: ".$pc['price']);?><br>
                                            <?php echo("Buttery Live: ".$pc['charge']." hours");?></p>                                                
                                        </div>
                                    </div>
                            <div class="modal fade" id="a<?php echo($pc['pc_id']);?>">
                        <div class="modal-dialog">
                            <div class="modal-content">


                                <!-- Modal body -->
                                <div class="modal-body" style="color:white">

                                    <form method="post" action="pc_update.php" enctype="multipart/form-data">


                                        <!-- Button to Open the Modal -->

                                        <!-- Modal body -->
                                        <input type="hidden" name="pcId" value="<?php echo($pc['pc_id']); ?>">
                                        <input type="hidden" name="shopId" value="<?php echo($market_id); ?>">

                                        <div class="form-group">
                                            <label for="model">Model</label>
                                            MOdel <input type="text" class="form-control" name="model" id="model" value="<?php echo($pc['model']);?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="ram">RAM</label>
                                            <input type="text" class="form-control" name="ram" id="ram" value="<?php echo($pc['ram']);?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="Storage">Storage</label>
                                            <input type="text" class="form-control" name="storage" id="storage"value="<?php echo($pc['storage']);?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="charge">Charge guarantee</label>
                                            <input type="text" class="form-control" name="charge" id="charge"value="<?php echo($pc['charge']);?>" >
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" name="price" class="form-control" value="<?php echo($pc['price']);?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="img">Photo</label>
                                            <input type="hidden" name="prePic" value="<?php echo($pc['pc_img']);?>">
                                            <input type="file" class="form-control" name="img"  >
                                        </div>

                                        <input type="submit" value="Update" class="btn btn-primary">


                                    </form>

                                </div>

                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                            
                    <?php
                }
            }else{echo("query");}
            ?>

                        </div>
                        <div class="modal fade" id="show_img">
                        <div class="modal-dialog" style="width:80%">
                            <span type="button" data-dismiss="modal" class="w3-button w3-black" style="cursor:pointer;position:absolute;top:0px">&cross;</span>
                            <img src="" alt="" id="modal_img" style="width:100%">
                        </div>
                    </div>
                    </main>
                </div>
                <?php
                require("footer.php");
                ?>
                
                <a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
                <!-- JAVASCRIPTS -->
                <script src="layout/scripts/jquery.min.js"></script>
                <script src="layout/scripts/jquery.backtotop.js"></script>
                <script src="layout/scripts/jquery.mobilemenu.js"></script>
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
