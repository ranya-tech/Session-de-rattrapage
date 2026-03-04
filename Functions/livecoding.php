<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <input type="number" name="qte">
    <input type="number" name="prix">
    <button type="submit" name ="ok">ok</button>

</form>
<?php
function calculerprix($prix,$qte){
    $total=$prix*$qte;
    if($qte>=10){
        $total=$total-($total*0.1);
        return 'Vous avez bénéficié d une réduction'.$total;

    }
  return $total;

}
if(isset($_POST['ok'])){
    $prix=$_POST['prix'];
    $qte=$_POST['qte'];
    if(empty($prix)||empty($qte))
       { echo"champs vide";}
    elseif($qte<=0 || $prix<=0){
        echo "champs négative";
    }
    else{ echo calculerprix($prix,$qte);}

    }
    ?>
    
</body>
</html>