<?php
include "balkbeheerder.php";
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
    <title>beheer</title>
    </head>
<body>

<table class= "tabel">
<tr>
  <th>Bestelnr</th>
  <th>Achternaam</th>
  <th>Ophaaltijd</th>
  <th>Status</th>
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
        <td>".$result['ophaaltijd']."</td>
      
        <td>".$result['bestelling']."</td>
        <td>
        <button onclick=myFunction()>Click me</button>
        
       
               <div class=popup onclick=myFunction() >
    <span class=popuptext id=myPopup>
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


<form method='POST' action="" >
        <input type="submit" value="Logout" name="loguit">
</form>

</div>
<script>

function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>




