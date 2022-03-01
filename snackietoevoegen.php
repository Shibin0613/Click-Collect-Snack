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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profiel.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <title>profiel</title>
</head>

<body>
    <?php
    include "balkbeheerder.php";
    ?>
    <center>
        <div class="profiel-container">
            <h2 class="profiel">Snackie toevoegen</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <input class="naam" type="text" name="productnaam" placeholder="Naam" required><br>
                <input class="naam" type="text" name="bedrag" placeholder="Bedrag" required><br>
                <input class="" type="file" id="file" name="image" accept="image/*" required>
                <label for="file">
                    <i class="far fa-file-image"></i> &nbsp;
                    Voeg foto toe
                </label>
                <button class="submit" type="submit" name="submit">Opslaan</button>
            </form>
        </div>
    </center>

    <center>
        
        <div class="profiel-container"><table>
            <h2 class="profiel">Snackie wijzigen/verwijderen</h2>
            <tr>
        <th>Productnaam</th>
        <th>Bedrag</th>
        <th colspan="2" align="center">Wijzigen/Verwijderen</th>
    </tr>
<?php
include("conn.php");
error_reporting(0);
$query= "select * from product";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0){
    while($result=mysqli_fetch_assoc($data)){
        ?>
        <tr>
        <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $result['id'];?>"> 
        <td><input type="text" class="wijzigen" name="productnaam" value="<?php echo $result['productnaam'];?>"></td>
        <td><input type="text" class="wijzigen" name="bedrag" value="<?php echo $result['bedrag']; ?>"></td>
        <td><input type="submit" name="opslaan" class="submit" value="Opslaan"></td>
        </form>
        <td><a href="delete.php?id=<?php echo $result['id']; ?>" onclick="return checkdelete()"><input type="submit" class="submit" value="Verwijderen"></a></td>
        </tr>
    
        <?php
    }
}else{
    echo "
    <tr>
    <th colspan='2'>Er is geen data gevonden!!!</th>
    </tr>
    ";
}
?>
</table>
        </div>
    </center>
</body>

<script>
function checkdelete(){
  return confirm('Weet je zeker dat je deze account willen verwijderen?');
}
</script>

</html>



<?php
include "conn.php";
error_reporting(0);

// if (isset($_POST['submit'])) {
//     $naam = $_POST['naam'];
//     $bedrag = $_POST['bedrag'];
//     $sql = "INSERT INTO producten(naam, bedrag) values(?,?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ss", $naam, $bedrag);
//     $stmt->execute();
// }


if(isset($_POST['submit'])) {
    $productnaam=$_POST['productnaam'];
    $bedrag=$_POST['bedrag'];
    
    $image = $_FILES['image']['name'];
    $target = "image/".basename($image);
    
    $query = "INSERT INTO product(`productnaam`,`bedrag`,`foto`) VALUES('$productnaam','$bedrag','$image') ";
    $query_run= mysqli_query($conn, $query);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
    
    if($query_run){
        echo "<script>alert('Product is toegevoegd.')</script>";
        ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=snackietoevoegen.php">
    <?php
    }else{
        echo "<script>alert('Het is niet gelukt')</script>";
    }
}
}



if($_POST['opslaan']){
    $id=$_POST['id'];
    $productnaam=$_POST['productnaam'];
    $bedrag=$_POST['bedrag'];
    
    $query = "UPDATE product SET productnaam='$productnaam',bedrag='$bedrag' WHERE id='$id'";
    $query_run= mysqli_query($conn, $query);
    
    if($query_run){
        echo "<script>alert('gegevens opgeslagen')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=snackietoevoegen.php">
    <?php
    }else{
        echo "<script>alert('Het is niet gelukt om uw gegevens te wijzigen, Probeer later opnieuw')</script>";
    }
}


?>