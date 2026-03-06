<h3>Produits</h3>
<?php
$json = file_get_contents('product.json');
$produits = json_decode($json, true);

function Select($produits){
    $table = "<table border='1'>
           <tr>
            <th>Product</th>
            <th>Prix</th>
            <th>Stock</th>
           </tr>";
    foreach($produits as $produit){
        $table.= "<tr> <td>". $produit['nom'] . "</td>
                    <td>" . $produit['prix'] . "</td>
                    <td>" . $produit['stock'] . "</td>";                
    }        
    $table.= "</table>";
    return $table;
}
echo Select($produits);
?>
