<?php
$students = [
    ["nom" => "Alami", "prenom" => "Ahmed" ,"notes" => [10.5, 18, 12]],
    ["nom" => "Bakkali", "prenom" => "Ali" ,"notes" => [12, 9, 7.5]],
    ["nom" => "Serraj", "prenom" => "Karima" ,"notes" => [8, 13, 15.5]]
];
$table = "<table border='1'>
<tr>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Note 1</th>
    <th>Note 2</th>
    <th>Note 3</th>
    <th>Moyenne</th>
</tr>";
foreach($students as $student){
    $table.= "<tr> 
    <td>". $student['nom'] . "</td>
    <td>". $student['prenom'] . "</td>";
    foreach($student['notes'] as $note){
        $table.= "
    <td>". $note . "</td>";
    }
    $table.= "</tr>";
}
$table.= "</table>";
echo $table;
?>