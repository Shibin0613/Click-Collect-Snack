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
    <link rel="stylesheet" href="css/beheer.css">
    <title>Beheer</title>
    </head>
<body>
    <?php include "balkbeheerder.php"; ?>
<table class= "tabel">
<tr>
  <th>Bestelnr</th>
  <th>Achternaam</th>
  <th>Telef</th>
  <th>Email</th>
  <th>Ophaaltijd</th>
  
  <th>Bedrag</th>
</tr>

<?php
include "conn.php";
error_reporting(0);
$query= "select * FROM bestelling";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0){
    while($result=mysqli_fetch_assoc($data)){
        echo "
        <tr>
        <td>".$result['bestelnr']."</td>
        <td>".$result['achternaam']."</td>
        <td>".$result['telef']."</td>
        <td>".$result['email']."</td>
        <td>".$result['ophaaltijd']."</td>
        <td>".$result['bedrag']."</td>
        <td>
        <button id='myButton".$result['bestelnr']."' onclick=myFunction(".$result['bestelnr'].")>Tonen</button>
        

<div class=popup onclick=myFunction() >
<span class=popuptext id= myPopup".$result['bestelnr'].">
<li>

 archternaam :".$result['achternaam']." 
 <br> <br>
email :".$result['email']."
<br><br>
telnr :".$result['telef']."
<br>
<br>
".$result['bestelling']."
</li>
";}
 

}else{
    echo "
    <tr>
    <th colspan='2'>Er is geen data gevonden!!!</th>
    </tr>
    ";
}
?>
</table>

</div>
<script>

function myFunction(bestelnummer) {
  var popup = document.getElementById("myPopup"+bestelnummer);
  popup.classList.toggle("show");


  var btn = document.getElementById("myButton"+bestelnummer);
  console.log(btn.value);
    if (btn.value=="Tonen"){
        btn.value = "Verbergen";
        btn.innerHTML = 'Tonen';
    }else{
        btn.value = "Tonen";
        btn.innerHTML = 'Verbergen';
    } 
}
</script>




