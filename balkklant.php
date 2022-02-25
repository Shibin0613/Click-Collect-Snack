<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klant</title> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/balk1.css">
</head>
<body>
    <div class="balk">
        <nav class="topnav">
                
                <a href="bestelpagina.php">Bestel</a>
                <a href="winkelwagen.php">Winkelwagen</a>
                <?php
                if(isset($_SESSION['wagen'])){
                    $count = count($_SESSION['wagen']);
                    echo "<span>$count</span>";
                }else{
                    echo "<span>0</span>";
                }
                ?>
                <form method='POST' action="" >
                    <button type="submit" name="loguit">Loguit</button>
                </form>
                
        </nav>
    </div>
</body>
</html>