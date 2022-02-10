<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/winkelwagen.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Winkelwagen</title>
</head>

<?php
    $GLOBALS["Products"] = [
        0 => [
            "Name" => "Frikandel",
            "Amount" => 1,
            "PricePerUnitEur" => 1.50,
            "Image" => "http://www.snackweetjes.nl/wp-content/uploads/2016/03/frituur-snacks.png"
        ],

        1 => [
            "Name" => "Kroket",
            "Amount" => 2,
            "PricePerUnitEur" => 2,
            "Image" => "http://www.snackweetjes.nl/wp-content/uploads/2016/03/frituur-snacks.png"
        ],

        2 => [
            "Name" => "Kromartijnket",
            "Amount" => 2,
            "PricePerUnitEur" => 25,
            "Image" => "http://www.snackweetjes.nl/wp-content/uploads/2016/03/frituur-snacks.png"
        ],
    ];
?>

<body>
    <div class="flex">
        <div class="titlediv">
            <h1 class="titletext">Winkelwagen</h1>
            <?php
                $ProductAmount = 1;
                echo "<p class='titleamount'>$ProductAmount producten</p>"
            ?>
        </div>

        <div class="titledivsummary">
            <h1 class="titletext">Overzicht</h1>
        </div>
    </div>



    <div class="flex">
        <div class="winkelwagenmain">


            <?php
            $Products = $GLOBALS["Products"];
            $TotalPrice = 0;

            foreach ($Products as $Key => $Value) {
                $Name = $Value["Name"];
                $Amount = $Value["Amount"];
                $PPU = $Value["PricePerUnitEur"];
                $Img = $Value["Image"];

                $TotalProductPrice = $Amount * $PPU;

                $TotalPrice = $TotalPrice + $TotalProductPrice;

                echo "
                    <br>
                    <div class='product'>
                        <img width='60' height='50' src='$Img' alt='productfoto'>
                    
                        <div class='producttitlediv'>
                            <p class='producttitlecart'>$Name</p>
                        </div>

                            <form class='freeform' method='POST' action='' enctype='multipart/form-data'>
                                <p class='productamountcart' name='productamount'>x$Amount</p>
                                <p class='pricecart'>€$TotalProductPrice</p>
                            </form>
                    </div>";
            }

            
            $GLOBALS["TotalProductPrice"] = $TotalPrice;
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
                    <?php
                        $TotalePrijs = number_format( $GLOBALS["TotalProductPrice"], 2, "," );

                        echo "
                            <p>€$TotalePrijs</p>
                        ";
                    ?>
                </div>
            </div>

            <button class="orderbtn">Bestel nu</button>
        </div>
    </div>
</body>

</html>