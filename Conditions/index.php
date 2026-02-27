<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="note" placeholder="Note">
        <button>OK</button>
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $note = $_POST['note'];
        if(empty($note)){
            echo "Note Vide";
        }else{
            if(!is_numeric($note)){
            echo "Entre a note";
        }else{
            if($note >= 10){
                echo "Vous etes admin";
            }else{
                echo "Vous n'etes pas admin";
            }
        }
        
        }
        
    }
    ?>
</body>
</html>