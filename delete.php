<?php
include("conn.php");
error_reporting(0);

$id= $_GET['id'];
$query = "DELETE FROM product WHERE id='$id'";

$data=mysqli_query($conn, $query);

if($data){
    echo "<script>alert('Snack is verwijderd uit Database')</script>";
    ?>
    <META HTTP-EQUIV="Refresh" CONTENT="0; URL=snackietoevoegen.php">
    <?php
}else{
    echo "<script>alert('Het is niet gelukt om snackie te verwijderen, Probeer later opnieuw')</script>";
}

?>