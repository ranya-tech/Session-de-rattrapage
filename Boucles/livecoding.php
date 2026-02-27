<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method = "POST">
        <input type = "number" name = "numb">
        <button type = "submit" name = "ok">ok</button>
    </form>
    <ul>


<?php

if(isset($_POST['ok']))
    {
        $num = $_POST['numb'];
        $i = 1;
        if($num > 0)
        {
            while($i <= $num){
                if($num % $i == 0){
                    echo "<li>". $i . "</li>";
                }
                $i++;
            }
        }
        else
        {
            echo "entrer un nombre positif";
        }
    }
?>
</ul>
</body>
</html>