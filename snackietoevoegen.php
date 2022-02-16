<?php
session_start();
// checken als de klant niet heeft ingelogd
if(!isset($_SESSION['userid'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['loguit'])){
    session_destroy();
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profiel.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>profiel</title>
</head>

<body>
<a href="beheer.php"><input type="submit" value="Beheer"></a>
<form method='POST' action="" >
        <input type="submit" value="Logout" name="loguit">
</form>
    <center>
        <div class="profiel-container">
            <h2 class="profiel">Snackie toevoegen</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <input class="naam" type="txt" name="productnaam" placeholder="Naam" required><br>
                <input class="naam" type="txt" name="bedrag" placeholder="Bedrag" required><br>
                <input class="" type="file" id="file" name="image" accept="image/*" required>
                <label for="file">
                    <i class="far fa-file-image"></i> &nbsp;
                    Voeg foto toe
                </label>
                <button class="submit" type="submit" name="submit">Opslaan</button>
            </form>
        </div>
    </center>
</body>

</html>



<?php
include "conn.php";

// if (isset($_POST['submit'])) {
//     $naam = $_POST['naam'];
//     $bedrag = $_POST['bedrag'];
//     $sql = "INSERT INTO producten(naam, bedrag) values(?,?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ss", $naam, $bedrag);
//     $stmt->execute();
// }


if(isset($_POST['submit'])) {
    $productnaam=$_POST['productnaam'];
    $bedrag=$_POST['bedrag'];
    
    $image = $_FILES['image']['name'];
    $target = "image/".basename($image);
    
    $query = "INSERT INTO product(`productnaam`,`bedrag`,`foto`) VALUES('$productnaam','$bedrag','$image') ";
    $query_run= mysqli_query($conn, $query);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
    
    if($query_run){
        echo "<script>alert('Product is toegevoegd.')</script>";
    }else{
        echo "<script>alert('Het is niet gelukt')</script>";
    }
}
}
?>