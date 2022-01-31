<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profiel1.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>profiel</title>
</head>
<body>
    <center>
    <div class="profiel-container">
        <h2 class="profiel">Snackie toevoegen</h2>
        <form method="POST" action="#">
            <input class="naam" type="txt" name="naam" placeholder="Naam"><br>
            <input class="naam" type="txt" name="bedrag" placeholder="Bedrag"><br>
            <input class="" type="file" id="file" name="image" accept="image/*" placeholder="Voeg foto toe">
                <label for="file">
                  <i class="far fa-file-image"></i> &nbsp;
                  Voeg foto toe  
                </label>
            <button class="submit" type="submit" name="submit">Opslaan</button>

        </form> 
        <!-- moet nog gemaakt worden -->
        <div class="foto-container">
            <h3 class="foto">foto</h3>
        </div>
    </div>
</center>



</body>
</html>

<?php
include "conn.php";
if(isset($_POST['submit'])){
   $naam= $_POST['naam'];
   $bedrag = $_POST['bedrag'];
    $sql="INSERT INTO `producten`(`naam`, `bedrag`) values(?,?)";
    $stmt= $conn->prepare($sql);
<<<<<<< Updated upstream
    $stmt->bind_param("ss", $naam, $bedrag);
    $stmt->execute();
}
?>

<!-- zorgt dat het niet opnieuw toegevoegd wordt aan de database als je refreshed -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
=======
    $stmt=bind_param("ss", $naam, $bedrag);
    $stmt->execute();
}
?>
>>>>>>> Stashed changes
