<<!DOCTYPE html>
<html lang="en">
<head>
    <title>image test</title>
</head>
<body>
<form method="POST" action="test.php" enctype="multipart/form-data">
    <input type="file" name="image" accept="image/*" placeholder="Upload hier uw productfoto">
    <button type="submit" name="submit">upload</button><br>
</form>

</body>
</html>>

<?php
include "conn.php";
if(isset($_POST['submit'])) {
    
    $target="clickcollectsnack/".basename($_FILES['image']['name']);
    $foto=$_FILES['image']['name'];
    //prepare en bind
    $insertSQL = "INSERT INTO product (foto) values('$image')";
    $sqlrun=mysqli_query($conn,$insertSQL);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo '<script>alert("FOTO UPLOADED")<script>';
    }else{
        echo '<script>alert("FOTO UPLOAD MISLUKT")<script>';
    }
}
?>

<?php 
$sql="SELECT * FROM product";
$result=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
    echo "<div>";
    echo "<img scr='clickcollectsnack/".$row['foto']."' >";
    echo "</div>";
}
?>