<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registratie1.css">
    <title></title>
</head>
<body>
<div class="container">
<h2 class="top-tekst">Account aanmaken</h2>
      <form action="mail.php" method="POST" class="column, ">
        <input name="id" value="<?php echo "$id" ?>" hidden>
        <input name="productnaam" value="<?php echo "$productnaam" ?>" hidden>
        <input name="beschikbaarheid" value="Uitgeleend" hidden>
        <input name="beschrijving" value="<?php echo "$beschrijving" ?>" hidden>
        <br>
        <input class="apparaatnaam" type="text" name="voornaam" placeholder="Voornaam" minlength="2" maxlength="20" required>
        <br>
        <input class="apparaatnaam" type="text" name="Achternaam" placeholder="Achternaam" minlength="2" maxlength="20" required>
        <br>
        <input class="apparaatnaam" type="text" name="email" placeholder="Uw emailadres" minlength="4" maxlength="8"required>
        <br>
        <input class="apparaatnaam" type="password" name="wachtwoord" placeholder="Wachtwoord" required>
        <br>
        <button class="voeg-toe" type="submit" name="submit">Registreren</button>
      </form>
</div>
</body>
</html>