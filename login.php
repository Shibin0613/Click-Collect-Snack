<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<fieldset class="container">
    <legend style='margin-left:45%;'>Login</legend>
    <form method="POST" action="#">
    <div class="user">
    <i class="fas fa-user"></i>
    <input class="geb-naam" type="txt" name="voornaam"placeholder="Gebruikersnaam">
    <br>
   </div>
   <div class="ww">
   <i class="fas fa-key"></i>
    <input class="wachtw" type="password" name="wachtwoord" placeholder="Wachtwoord"><br>
</div>
    <button class="login" name="but_submit">Login</button><br>
</form>
<center>
<p>als je geen account hebt <a class="a" href="registratie.php">klik hier</a><p>
</center><br>
</fieldset>


</body>
</html>



<?php

include "conn.php";


if(isset($_POST['but_submit'])){

    $voornaam = mysqli_real_escape_string($conn,$_POST['voornaam']);
    $wachtwoord = mysqli_real_escape_string($conn,$_POST['wachtwoord']);


    if ($voornaam != "" && $wachtwoord != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$voornaam."' and wachtwoord='".$wachtwoord."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['voornaam'] = $voornaam;
            header('Location: uitloggen.php');
        }else{
            echo "Gebruikersnaam en Wachtwoord komen niet overeen";
        }

    }

}
?>
