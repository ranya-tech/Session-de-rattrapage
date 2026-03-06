<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <select name="select">
            <option value="--">--Choisir un produit--</option>
            <option value="téléphone">Téléphone</option>
            <option value="casque">Casque</option>
            <option value="Tablette">Tablette</option>
            <option value="Montre connectée">Montre connectée</option>
        </select>
        <input type="number" name="qte" placeholder="Entrer la quantite">
        <button type="submit">Acheter</button>
    </form>
<?php
  require "script.php";
?>
<a href="facture.php">Visualiser la facture</a>
</body>
</html>