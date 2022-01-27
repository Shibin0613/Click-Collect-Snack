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
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bestellen</title>
    </head>
    <body>
        <h1>Bestelpagina</h1>

        <form action="" method="" enctyoe="multipart/form-data">
        <table border="1" cellpadding="4">
            <tr>
                <th>Productnaam</th>
                <th>Image</th>
            <tr>
            <?php 
            include "conn.php";
            $sql="SELECT * FROM product";
            $sql_run = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($sql_run)){
                ?>
                <tr>
                    <td> <?php echo $row['productnaam'] ?></td>
                    <td> <?php echo '<img src="data:image;base64,'.base64_encode($row['foto']).'" alt="Image">'; ?> </td>
                </tr>    
                <?php 
            }
            ?>
        </table>
        </form>
        
        <form method='POST' action="mail.php">
            <input name="userid" value="<?php echo $_SESSION['userid']; ?>" hidden>
            <input name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
            <input name="voornaam" value="<?php echo $_SESSION['voornaam']; ?>" hidden>
            <input name="achternaam" value="<?php echo $_SESSION['achternaam']; ?>" hidden>
            <input name="telef" value="<?php echo $_SESSION['telef']; ?>" hidden>
            <input name="ophaaltijd" type='time' name="ophaaltijd" value='now'/>
            <button name="bestel">Bestel</button>   
        </form>
        <form method='POST' action="" >
            <input type="submit" value="Logout" name="loguit">
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

