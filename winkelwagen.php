<?php
session_start();
// checken als de klant niet heeft ingelogd

// logout
if(isset($_POST['loguit'])){
    session_destroy();
    header('Location: login.php');
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
            if(isset($_SESSION['wagen'])){
                foreach ($_SESSION['wagen'] as $key => $product) {
                //$V = $Value["Name"];
                //echo "{$Key} => {$V} ";

                $productnaam = $product['productnaam'];
                $aantal = $product['aantal'];
                $bedrag = $product['bedrag'];

                $TotalProductPrice = $aantal * $bedrag;

                echo "
                    <br>
                    <div class='product'>
                        <div class='producttitlediv'>
                            <p class='producttitlecart'>$productnaam</p>
                        </div>
                            <button class='productminuscart'>-</button>
                            <p class='productamountcart'>x$aantal</p>
                            <button class='productpluscart'>+</button>
                            <p class='pricecart'>€$TotalProductPrice</p>
                    </div>";
                }
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
                    <p>€3,00</p>
                </div>
            </div>

            <button class="orderbtn">Bestel nu</button>
        </div>
    </div>
    <form method='POST' action="" >
        <input type="submit" value="Logout" name="loguit">
    </form>
</body>

</html>