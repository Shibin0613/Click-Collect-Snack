<?php
if(isset($_POST['bestel'])){ 
    $userid=$_POST['userid'];
    $voornaam=$_POST['voornaam'];
    $achternaam=$_POST['achternaam'];
    $telef=$_POST['telef'];
    $email=$_POST['email'];
    $ophaaltijd=$_POST['ophaaltijd'];
    
    $receiver = $email;
    $subject= "U heeft een bestelling geplaatst";
    $body = "Beste $achternaam, \r\nu heeft een bestelling gedaan
    \r\nU kunt uw bestelling komen ophalen om $ophaaltijd. \r\n\r\nEet smakelijk!\r\n\r\nMet vriendelijke groet,\r\nSnackhoek";
    
    if(mail($receiver, $subject, $body)){
        echo "<script>alert('Het is gelukt om een bestelling te plaatsen!')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=bestelpagina.php">
        <?php
    }else{
        echo "<script>alert('Sorry, bestellling is niet gelukt')</script>";
    }
       
}
?>

      
