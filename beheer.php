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
        <td>
        <button onclick=myFunction()>Click me</button>
           <script>
        function myFunction() {
          document.getElementById(demo).innerHTML = Hello World;
        }
        
        
     
        </script>
        </td>
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
$query= "select * FROM products where id = 1";
$data = mysqli_query($conn,$query);


if($total!=0){
    while($result=mysqli_fetch_assoc($data)){
        echo "
  
        <div class='doos2'>
        <li> bestelnr ".$result['bestelnr']."</li>
        <li> naam ".$result['naam']."</li>
        <li> afhaaltijd ".$result['afhaaltijd']."</li>
        </div>


        <div class='doos3'>
        <li> producten in winkelmand</li>
        <li>".$result['naam']."</li>
        <li>".$result['naam']."</li>
        <li>".$result['naam']."</li>
        </div>

        <div class='doos4'>
        <li><button onclick=myFunction()>klaar</button></li>
        <div>
         ";

    }
}
myFunction{
    
}

?>
</div>





