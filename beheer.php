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
    







    </body>
    </html>
    







<table class= "tabel">
<tr>
  <th>bestel nummer</th>
  <th>naam</th>
  <th>tijd</th>
  <th>status</th>
  <th>bestelling</th>
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
        <td>".$result['bestel nummer']."</td>
        <td>".$result['naam']."</td>
        <td>".$result['tijd']."</td>
        <td>".$result['status']."</td>
        <td>".$result['bestelling']."</td>
        </tr>
        ";
    }
}else{
    echo "
    <tr>
    <th colspan='2'>Er is geen data gevonden!!!</th>
    </tr>
    ";
}
?>
</table>


<div class="doos">
    

<?php
include "conn.php";
error_reporting(0);
$query= "select * FROM bestelling";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0){
    while($result=mysqli_fetch_assoc($data)){
        echo "
   <div class='doos2'>    
        
        <li>". 'Hallo'.$result['bestel nummer']."</li>
        <li>".$result['naam']."</li>
        <li>".$result['afhaaltijd']."</li>
        <li>".$result['bestel nummer']."</li>
        </div>
        <div class='doos3'>  
        <li>".$result['naam']."</li>
        <li>".$result['tijd']."</li>

       </div>
       <div class='doos4'>  
        <li>".$result['status']."</li>
        <li>".$result['bestelling']."</li>
        
        
        
        ";

    }
}else{
    echo "
    <tr>
    <th colspan='2'>Er is geen data gevonden!!!</th>
    </tr>
    ";
}


?>
</div>





