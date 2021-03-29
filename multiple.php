<form action="multiple.php" method="post" enctype="multipart/form-data">
    <input type="file" name="images[]" multiple>
    <input type="submit" value="submit" name="submit">
</form>
<?php
require("connection.php");
$img = "";
    if(isset($_POST['submit'])){
        foreach($_FILES['images']['tmp_name'] as $key => $key){
            $imageName = $_FILES['images']['name'][$key];
            $imgTmpName = $_FILES['images']['tmp_name'][$key];
            $img .= $imageName.", ";
            $dir = "market/";
            $result = move_uploaded_file($imgTmpName,$dir.$imageName);
            $result = $conn->query("insert into images values('".$imageName."')");
        }
    }

    $result = $conn->query('SELECT name FROM images');
            while($images = $result->fetch_assoc()){
                echo "<img src='market/".$images['na     me']."' width='200px'>";
            }
?>