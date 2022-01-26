<?php
include "conn.php";

// checken of de klant ingelogd heeft
if(!isset($_SESSION['email'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: login.php');
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="registratie.css">
        <title>Bestellen</title>
    </head>
    <body>
        <h1>Bestelpagina</h1>
        <form method='POST' action="mail.php">
            <input name="userid" value="<?php echo $_SESSION['userid']; ?>" >
            <input name="email" value="<?php echo $_SESSION['email']; ?>" >
            <input name="voornaam" value="<?php echo $_SESSION['voornaam']; ?>" >
            <input name="achternaam" value="<?php echo $_SESSION['achternaam']; ?>" >
            <input name="telef" value="<?php echo $_SESSION['telef']; ?>" >
            <input name="ophaaltijd" type='time' name="ophaaltijd" value='now'/>
            <button name="bestel">Bestel</button>   
        </form>
    <form method='POST' action="" >
        <input type="submit" value="Logout" name="but_logout">
    </form>
    </body>
<script>
$(function(){     
  var d = new Date(),        
      h = d.getHours(),
      m = d.getMinutes();
  if(h < 10) h = '0' + h; 
  if(m < 10) m = '0' + m; 
  $('input[type="time"][value="now"]').each(function(){ 
    $(this).attr({'value': h + ':' + m});
  });
});
</script>

</html>

