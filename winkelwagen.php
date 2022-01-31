<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="winkelwagen.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>Winkelwagen</title>
</head>

<body>
    <div class="flex">
        <div class="titlediv">
            <h1 class="titletext">Winkelwagen</h1>
            <p class="titleamount">2 producten</p>
        </div>

        <div class="titledivsummary">
            <h1 class="titletext">Overzicht</h1>
        </div>
    </div>



    <div class="flex">
        <div class="winkelwagenmain">

            <br>
            <div class="product">
                <img width="60" height="50"
                    src="http://www.snackweetjes.nl/wp-content/uploads/2016/03/frituur-snacks.png" alt="productfoto">
                <p class="producttitlecart">Frikandel</p>
                <button class="productminuscart">-</button>
                <p class="productamountcart">x1</p>
                <button class="productpluscart">+</button>
                <p class="pricecart">€1,50</p>
            </div>
            <br>
            <div class="product">
                <img width="60" height="50"
                    src="http://www.snackweetjes.nl/wp-content/uploads/2016/03/frituur-snacks.png" alt="productfoto">
                <p class="producttitlecart">Frikandel</p>
                <button class="productminuscart">-</button>
                <p class="productamountcart">x1</p>
                <button class="productpluscart">+</button>
                <p class="pricecart">€1,50</p>
            </div>
            <br>
        </div>

        <div class="summary">
            <div class="flex">
                <p class="alignleft">Open vandaag: 12:00</p>
            </div>

            <br>

            <div class="flex">
                <p class="alignleft">TOTAAL: €3,00</p>
            </div>

            <button class="orderbtn">Bestel nu</button>
        </div>
    </div>
</body>

</html>