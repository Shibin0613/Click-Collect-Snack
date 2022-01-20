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
    <input class="geb-naam" type="txt" id="txt_uname" name="txt_uname"placeholder="Gebruikersnaam">
    <br>
   </div>
   <div class="ww">
   <i class="fas fa-key"></i>
    <input class="wachtw" type="password" id="txt_uname"  name="txt_pwd" placeholder="Wachtwoord"><br>
</div>
    <button class="login" value="Submit" type="submit" name="but_submit" id="but_submit" name="but_submit">Login</button><br>
</form>
<center>
<p>als je geen account hebt klik <a class="a" href="#">hier</a><p>
</center><br>
</fieldset>


</body>
</html>



<?php

include "config.php";


if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);


    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: uitloggen.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
