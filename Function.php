<?php

function Product($conn) {
    $sql = " SELECT * FROM product";

    if ($result = $conn->query($sql)) {
        foreach ($result as $row) {
            echo "
            <div class='Productnested'>
                <div class='Productnaam'>$row[productnaam]</div>
                <div class='Productfoto'>foto</div>
                <div class='prijs'>€$row[bedrag]</div>
                <button class='button'>Voeg toe</button>
            </div>";
        }
    }
}