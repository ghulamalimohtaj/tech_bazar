<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  
  <link rel="stylesheet" href="layout/styles/bootstrap.css">
  <link rel="stylesheet" href="layout/styles/w3.css">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === "GET"){
  $pcId = $_GET['id'];
  $model = $_GET['model'];
  $market_id = $_GET['shopId'];
  $ram = $_GET['ram'];
  $storage = $_GET['storage'];
  $charge = $_GET['charge'];
  $price = $_GET['price'];
  if (isset($_SESSION["a".$market_id])) { 
           
            ?>
            <style>
            input[type="checkbox"]{
              display:inline;
            }
            </style>
            <div class="container w3-card" style="margin:0px auto; width:400px">
            <h3>Edit Computer</h3>
              <form action="do_update.php" method="post">
              <input type="hidden" name="market_id" value="<?php echo($market_id);?>">
              <input type="hidden" name="pc_id" value="<?php echo($pcId);?>">
                <div class="form-group">
                  <label for="">Model-> <?php echo($model);?>  Edit <input type="checkbox" name="chekc" id="model_ch" onclick="myFunction()"></label>
                  <input type="hidden" name="pre_model" value="<?php echo($model);?>">
                  <select name="model" id="model_input" style="width:100%">
                    <option value="DELL">DELL</option>
                    <option value="hp">hp</option>
                    <option value="Toshiba">Toshiba</option>
                    <option value="eXtreme">eXtreme</option>
                    <option value="Apple">Apple</option>
                </select>
                </div>
                <div class="form-group">
                <input type="hidden" name="pre_ram" value="<?php echo($ram);?>">
                  <label for="">RAM -> <?php echo($ram);?>  Edit <input type="checkbox" name="chekc" id="ram_ch" onclick="myFunction()"></label>
                  <input type="number" min="1" name="ram" id="ram" class="form-control">
                  <select name="ram_unit" id="" class="w3-rest" id="ram_u">
                    <option value="MB">MB</option>
                    <option value="GB" selected>GB</option>
                    <option value="TB">TB</option>
                  </select>
                </div>

                <div class="form-group">
                <input type="hidden" name="pre_storage" value="<?php echo($storage);?>">
                  <label for="Storage">Storage -> <?php echo($storage);?> Edit <input type="checkbox" name="chekc" id="storage_ch" onclick="myFunction()"></label>
                  <div class="">
                      <input type="number" min="0"  name="storage" id="storage" required class="form-control">
                      <select name="storage_unit" id="storage_unit" class="w3-rest">
                          <option value="MB">     MB</option>
                          <option value="GB" selected>GB</option>
                          <option value="TB">TB</option>
                      </select>
                  </div>
              </div>
              <div class="form-group">
              <input type="hidden" name="pre_charge" value="<?php echo($charge);?>">
                  <label for="charge">Charge guarantee -> <?php echo($charge." hr")?> Edit <input type="checkbox" name="chekc" id="charge_ch" onclick="myFunction()"></label>
                  <input type="number" min="0" name="charge" id="charge" required class="form-control">
              </div>
              <div class="form-group">
              <input type="hidden" name="pre_price" value="<?php echo($price);?>">
                  <label for="Storage">Price -> <?php echo($price)?> Edit <input type="checkbox" name="chekc" id="price_ch" onclick="myFunction()"></label>
                  <div class="">
                      <input type="number" min="0"  name="price" id="price" required class="form-control">
                      <select name="price_unit" id="price_unit" class="w3-rest">
                          <option value="AF" selected>AF</option>
                          <option value="$">Doller</option>
                      </select>
                  </div>
              </div>
                <input type="submit" name="submit" value="update" class="btn btn_primary">
                <span onclick="history.back()" class="btn btn-primary">Back</span>
              </form>
            </div>
            <script>
              myFunction();
              function active(){
                var input = document.getElementById("model_input");
                input.disabled = "false";
              }
              function myFunction() {
                var model_ch = document.getElementById("model_ch");
                var model = document.getElementById("model_input");
                model.disabled = !model_ch.checked;
                model.value="";

                var ram_ch = document.getElementById("ram_ch");
                var ram = document.getElementById("ram");
                var ram_unit = document.getElementById("ram_u");
                ram.disabled = !ram_ch.checked;
                
                ram.value = "";

                var storage_ch = document.getElementById("storage_ch");
                var storage = document.getElementById("storage");
                var storage_unit = document.getElementById("storage_unit");
                storage.disabled = !storage_ch.checked;
                storage_unit.disabled = !storage_ch.checked;
                storage.value = "";

                var charge_ch = document.getElementById("charge_ch");
                var charge = document.getElementById("charge");
                charge.disabled = !charge_ch.checked;
                charge.value="";
                

                var price_ch = document.getElementById("price_ch");
                var price = document.getElementById("price");
                var price_unit = document.getElementById("price_unit");
                price.disabled = !price_ch.checked;
                price_unit.disabled = !price_ch.checked;
                price.value="";
                
                
                
                
              }
            </script>
<?php
      }
    }
    ?>
 
  </body>
</html>