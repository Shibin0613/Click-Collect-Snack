<?php
if(isset($_POST['bestel'])){ 
    $userid=$_POST['userid'];
    $voornaam=$_POST['voornaam'];
    $achternaam=$_POST['achternaam'];
    $telef=$_POST['telef'];
    $email=$_POST['email'];
    $ophaaltijd=$_POST['ophaaltijd'];
    $bestelling=$_POST['bestelling'];
    $bedrag=$_POST['bedrag'];
    
    $subject= "U heeft een bestelling geplaatst";
    $body = "<img scr='https://www.snackhoek-sneek.nl/www.snackhoek-sneek.nl/img/logo.png' alt='snacklogo'>\r\nBeste $achternaam, \r\nU heeft een bestelling gedaan:\r\n\r\n$bestelling \r\n\r\nDe totale bedrag is $bedrag.
    \r\nU kunt uw bestelling komen ophalen om $ophaaltijd. \r\n\r\nEet smakelijk!\r\n\r\nMet vriendelijke groet,\r\nSnackhoek";
    
    if(mail($email, $subject, $body)){
        echo "<script>alert('Het is gelukt om een bestelling te plaatsen!')</script>";
        ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=bestelpagina.php">
        <?php
    }else{
        echo "<script>alert('Sorry, bestellling is niet gelukt')</script>";
    }
       
}

include "conn.php";

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into bestelling(achternaam,telef,email,ophaaltijd,bestelling,bedrag) values(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$achternaam,$telef,$email,$ophaaltijd,$bestelling,$bedrag);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
?>
?>

      
