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

$product_ids = array();
if(isset($_POST['voegtoe'])){
    //print_r($_POST['productid']);

    if(isset($_SESSION['wagen'])){
        $count = count($_SESSION['wagen']);
        $product_ids = array_column($_SESSION['wagen'],'productid');
        if(!in_array($_POST['productid'],$product_ids)){
            $_SESSION['wagen'][$count] = array(
                'productid' => $_POST['productid'],
                'productnaam' => $_POST['productnaam'],
                'bedrag' => $_POST['bedrag'],
                'aantal' => $_POST['aantal']
            );
        }else{
            for ($i = 0; $i < count($product_ids); $i++){
                if ($product_ids[$i] == $_POST['productid']){
                    $_SESSION['wagen'][$i]['aantal'] += $_POST['aantal'];
                }
            }
        }
    }else{
        $_SESSION['wagen'][0] =array(
            'productid' => $_POST['productid'],
            'productnaam' => $_POST['productnaam'],
            'bedrag' => $_POST['bedrag'],
            'aantal' => $_POST['aantal']
        );
    }
}


function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bestelpagina.css">
    <title>Bestelpagina</title>
</head>
<body>
    <a href="winkelwagen.php"><button type="submit" name="winkelwagen">Winkelwagen</button></a>
        <?php
        if(isset($_SESSION['wagen'])){
            $count = count($_SESSION['wagen']);
            echo "<span>$count</span>";
        }else{
            echo "<span>0</span>";
        }
        ?>
        <div class="Productpagina">
            <div class="leftbar1"></div>
            <div class="rightbar1"></div>
            <?php
            include "conn.php";
            function Product($conn) {
                $sql = " SELECT * FROM product";
                if ($result = $conn->query($sql)) {
                    foreach ($result as $row) {
                        echo "
                        <form method='POST' action=''>
                        <div class='Productnested'>
                            <div class='Productnaam'>$row[productnaam]</div>
                            <div class='Productfoto'><img src='image/".$row['foto']."' ></div>
                            <div class='prijs'>€$row[bedrag]</div>
                            <input type='hidden' name='aantal' value='1'>
                            <button type='submit' class='button' name='voegtoe'>Voeg toe <i class='fas fa-plus'></i></button>
                            <input type='hidden' name='productid' value='$row[id]'>
                            <input type='hidden' name='productnaam' value='$row[productnaam]'>
                            <input type='hidden' name='bedrag' value='$row[bedrag]'>
                        </div></form>
                        ";
                    }
                }
            }
            Product($conn)
            ?>
        </div>
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