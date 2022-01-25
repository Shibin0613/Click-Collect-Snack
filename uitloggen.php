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
    <head></head>
    <body>
        <h1>Homepagina</h1>
        <form method='POST' action="mail.php">
            <input name="userid" value="<?php echo $_SESSION['userid']; ?>" >
            <input name="email" value="<?php echo $_SESSION['email']; ?>" >
            <input name="voornaam" value="<?php echo $_SESSION['voornaam']; ?>" >
            <input name="achternaam" value="<?php echo $_SESSION['achternaam']; ?>" >
            <input name="telef" value="<?php echo $_SESSION['telef']; ?>" >
            <input name="ophaaltijd" type='time' name="ophaaltijd" value='now'/>
            <button name="bestel">Bestel</button>
            
        </form>
    <form method='POST' action="">
        <input type="submit" value="Logout" name="but_logout">
    </form>
    </body>
</html>

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