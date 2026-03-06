<?php
session_start();
//Get the data from product.json;
$json = file_get_contents('product.json');
//Turn the data to an array;
$products = json_decode($json, true);
//An empty array where we can stock the erreurs;
$message = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $select = strtolower($_POST['select']);
//Transfer the string to an int;
    $qte = (int)$_POST['qte'];
//Check if the user choose a choice;
    if($select === "--"){
        $message[] = "Choisis un produit";
    }
//Check if the $qte have a valide numbre;
    if(empty($qte) || $qte <= 0){
        $message[] = "Enter une quantité validé";
    }
//Parcourir le tableau avec foreach;
    foreach($products as &$product){
//Check if the product name equal $select;
        if(strtolower($product['nom']) === $select){
            if($qte > $product['stock']){
                $message[] = "Quantité invalide";
            }else{
//Stoke the name && prix && qte in a session;
                $_SESSION['panier'][] = [
                    'nom' => $product['nom'],
                    'prix' => $product['prix'],
                    'qte' => $qte
                ];
//Decrease the qte from the stock;
                $product['stock']-=$qte;
//Save the changes in the JSON file;
                file_put_contents('product.json', json_encode($products, JSON_PRETTY_PRINT));
            }
        }
    }
//Affichage of the erreurs or the table;
    if(!empty($message)){
        foreach($message as $msg){
        echo $msg . "<br>";
        }
    }else{
        echo Select($select, $products, $qte);
    } 
}
//Creation of the table in a function;
function Select($select, $products,$qte){
    $table = "<table border='1'>
           <tr>
            <th>Product</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Total</th>
           </tr>";
//Affichage of the user's panier;
    if(isset($_SESSION['panier'])){
        foreach($_SESSION['panier'] as $panier){
            $table.= "<tr> <td>". $panier['nom'] . "</td>
            <td>" . $panier['qte'] . "</td>
            <td>" . $panier['prix'] . "</td>
            <td>" . Total($panier['prix'], $qte) . "</td> </tr>";
        }
    }
    $table.= "</table>";
    return $table;
}
//Function for calculating the total;
function Total($prix, $qte){
    $total = $qte * $prix;
    return $total;
}
?>