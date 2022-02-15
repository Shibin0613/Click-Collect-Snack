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

if(isset($_POST['delete'])){
    foreach($_SESSION['wagen'] as $key =>$product){
        if($product['productid'] == $_GET['id']){
            unset($_SESSION['wagen'][$key]);
        }
    }
    $_SESSION['wagen'] = array_values($_SESSION['wagen']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/winkelwagen1.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Winkelwagen</title>
</head>
<body>
<a href="bestelpagina.php">Meer bestellen</a>
    <form method='POST' action="" >
        <input type="submit" value="Logout" name="loguit">
    </form>
    <div class="flex">
        <div class="titlediv">
            <h1 class="titletext">Winkelwagen</h1>
        </div>

        <div class="titledivsummary">
            <h1 class="titletext">Overzicht</h1>
        </div>
    </div>



    <div class="flex">
        <div class="winkelwagenmain">
            
            <?php
            $totalebedrag = 0;
            if(!empty($_SESSION['wagen'])){
                foreach ($_SESSION['wagen'] as $key => $product):
                //$V = $Value["Name"];
                //echo "{$Key} => {$V} ";
                ?>
                <form method="POST" action="winkelwagen.php?action=delete&id=<?php echo $product['productid']; ?>" >
                <br>
                <div class='product'>
                    <div class='producttitlediv'>
                        <p class='producttitlecart'><?php echo $product['productnaam']; ?></p>
                    </div>
                        <button class='productminuscart'>-</button>
                        <p class='productamountcart'>x<?php echo $product['aantal']; ?></p>
                        <button class='productpluscart'>+</button>
                        <p class='pricecart'>€<?php echo $product['bedrag']; ?></p>
                        <button name="delete" class="buttoncla">Verwijderen</button>
                </div>
                </form>
                <?php
                $totalebedrag = $totalebedrag + ($product['aantal'] * $product['bedrag']);
            endforeach;

            }else{
                echo "Er zit niks in de winkelwagen, u kunt <a href='bestelpagina.php'><u>hier</u></a> kliken om terug te gaan om te bestellen";
            }
            ?>
        </div>
        <div class="summary">
            <div class="flex">
                <div class="alignleft">
                    <p>Open vandaag:</p>
                </div>
                <div class="alignright">
                    <p>12:00</p>
                </div>
            </div>

            <br>

            <div class="flex">
                <div class="alignleft">
                    <p>Totaal:</p>
                </div>
                <div class="alignright">
                    <p>€<?php echo number_format($totalebedrag, 2);?></p>
                </div>
            </div>
        <?php
        if (isset($_SESSION['wagen'])):
            if(count($_SESSION['wagen']) >0):
                ?>
            <form method='POST' action="mail.php">
            <input name="userid" value="<?php echo $_SESSION['userid']; ?>" hidden>
            <input name="email" value="<?php echo $_SESSION['email']; ?>" hidden>
            <input name="voornaam" value="<?php echo $_SESSION['voornaam']; ?>" hidden>
            <input name="achternaam" value="<?php echo $_SESSION['achternaam']; ?>" hidden>
            <input name="telef" value="<?php echo $_SESSION['telef']; ?>" hidden>
            <input name="ophaaltijd" type='time' value="now"/ required>
            <button name="bestel">Bestel</button>
            </form>
                <?php endif; endif; ?>
                

        
            
        </div>
    </div>
    
</body>

</html>