<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Inloggen</title>
</head>
<body>
<fieldset class="container">
    <legend style='margin-left:45%;'>Login</legend>
    <form method="POST" action="#">
        <div class="user">
            <i class="fas fa-user"></i>
            <input class="geb-naam" type="email" name="email" placeholder="Emailadres" maxlength="30" required>
            <br>
        </div>
        <div class="ww">
            <i class="fas fa-key"></i>
            <input class="wachtw" type="password" name="wachtwoord" placeholder="Wachtwoord" maxlength="20" required><br>
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
error_reporting(0);
if (isset($_SESSION['voornaam'])){
    header("Location: uitloggen.php");
}

if(isset($_POST['but_submit'])){

    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];
    $sql = "SELECT * FROM users WHERE email='$email' AND wachtwoord='$wachtwoord'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0){
        $rows= mysqli_fetch_assoc($result);
        $_SESSION['userid'] = $rows['userid'];
        $_SESSION['email'] = $email;
        $_SESSION['voornaam'] = $rows['voornaam'];
        $_SESSION['achternaam'] = $rows['achternaam'];
        $_SESSION['telef'] = $rows['telef'];
        header('Location: bestelpagina.php');
        }else{
            echo "Gebruikersnaam en Wachtwoord komen niet overeen";
        }
}
?>
