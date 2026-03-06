<?php
session_start();
//Check if the data are stock in a session;
if(empty($_SESSION['panier'])){
    echo "Votre panier est vide";
    exit;
}
$table = "<table border='1'>
           <tr>
            <th>Product</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Total</th>
           </tr>";
//Variable to count the total;
$TotalPrix = 0;
foreach($_SESSION['panier'] as $panier){
    $total = (int)$panier['qte'] * (int)$panier['prix'];
    $TotalPrix+= $total;
    $table.= "<tr> <td>". $panier['nom'] . "</td>
            <td>" . $panier['qte'] . "</td>
            <td>" . $panier['prix'] . "</td>
            <td>" . $total . "</td>
            </tr>";
}
$table.= "<tr> 
            <td colspan='3'>Total Général</td>
            <td>" . $TotalPrix ."</td> 
         </tr> </table>";
echo $table;
?>
<a href="index.php">return</a>