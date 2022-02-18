<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registratie1.css">
    <title>Registreren</title>
</head>
<body>
<div class="container">
<h2 class="top-tekst">Account aanmaken</h2>
      <form action="" method="POST" class="column, ">
        <br>
        <input class="registratie" type="text" name="voornaam" placeholder="Voornaam" minlength="3" maxlength="10" required>
        <br>
        <input class="registratie" type="text" name="achternaam" placeholder="Achternaam" minlength="3" maxlength="10" required>
        <br>
        <input class="registratie" type="email" name="email" placeholder="Uw emailadres" minlength="6" maxlength="30"required>
        <br>
        <input class="registratie" type="telef" name="telef" placeholder="Uw telefoonnummer" minlength="6" maxlength="12"required>
        <br>
        <input class="registratie" type="password" name="wachtwoord" placeholder="Wachtwoord" minlength="8" maxlength="20" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" title="Minimaal 8 karakters, met een hoofdletter, kleinletter en een getal"required>
        <br>
        <input name="usertype" value="user" hidden>
        <button class="voeg-toe" type="submit" name="registreren">Registreren</button>
      </form>
</div>
</body>


</html>

<?php
include "conn.php";

error_reporting(0);
session_start();

if(isset($_SESSION['userid'])){
  header('Location: login.php');
}

if(isset($_POST['registreren'])) {
  $voornaam=$_POST['voornaam'];
  $achternaam=$_POST['achternaam'];
  $telef=$_POST['telef'];
  $email=$_POST['email'];
  $wachtwoord=$_POST['wachtwoord'];
  $user=$_POST['usertype'];
  
  //prepare en bind
  $SELECT = "SELECT email from users Where email = ? Limit 1";
  $insertSQL = "INSERT INTO users(`voornaam`, `achternaam`,`telef`,`email`,`wachtwoord`,`usertype`) values(?,?,?,?,?,?)";
  
  $stmt = $conn->prepare($SELECT);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($email);
  $stmt->store_result();
  $rnum = $stmt->num_rows;
  
  
  if($rnum==0){
    $stmt->close();
    
    $stmt = $conn->prepare($insertSQL);
    $stmt->bind_param("ssssss",$voornaam,$achternaam, $telef,$email,$wachtwoord,$user);
    $stmt->execute();
    echo "<script>alert('Gefeliciteerd, uw account is aangemaakt, u mag door met bestellen')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">
    <?php
  }else{
    echo "<script>alert('Er bestaat al $email om in te loggen, Probeer een andere email')</script>";
  }
  $stmt->close();
  $conn->close();
}
?>