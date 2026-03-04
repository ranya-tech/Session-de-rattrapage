<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method='POST'>
        <input type="number" name="qte" placeholder="Quantite">
        <input type="number" name="prix" placeholder="Prix">
        <button type="submit">OK</button>
    </form>
</body>
</html>
<?php
function calculerPrix($qte, $prix){
    $total = $qte * $prix;
    if($qte > 10){
        $total = $total -($total * 0.10);
    }
    return $total;
}
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $qte = $_POST["qte"];
    $prix = $_POST["prix"];
    if(empty($qte) || empty($prix)){
        echo "Fill the fields";
    }elseif($qte < 0 || $prix < 0){
        echo "Valeurs invalide";
    }else{
        echo "Total : ". calculerPrix($qte, $prix);
    }
}
?>