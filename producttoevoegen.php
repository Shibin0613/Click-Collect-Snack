<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product toevoegen</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" name="productnaam" placeholder="Productnaam"><br>
        <input type="file" name="image" accept="image/*"><br>
        <input type="submit" name="submit" value="Upload">
    </form>

</body>
</html>>

<?php
include "conn.php";

if(isset($_POST['submit'])) {
    
    $productnaam=$_POST['productnaam'];
    $foto = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    
    $query = "INSERT INTO product(`productnaam`,`foto`) VALUES('$productnaam','$foto') ";
    $query_run= mysqli_query($conn, $query);
    
    if($query_run){
        echo "<script>alert('Product is toegevoegd.')</script>";
    }else{
        echo "<script>alert('Het is niet gelukt')</script>";
    }
}
?>