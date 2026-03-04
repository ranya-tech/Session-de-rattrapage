<?php
session_start();
$erreurs = [];
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $pswd = $_POST["pswd"];
    if(empty($email) || empty($password) || empty($pswd)){
        $erreurs[]=  "Champs vide";
    }else{
        if(!str_ends_with($email, "@ofppt.ma")){
            $erreurs[]= "email invalid";
        }
        if(strlen($password) < 8){
            $erreurs[]= "Password must have at least 8 caracteres";
        }
        if(!preg_match("/[A-Z]/" , $password)){
            $erreurs[]= "Password must have at least an upper case letter";
        }
        if(!preg_match("/[0-9]/", $password)){
            $erreurs[]= "Password must have at least a number";
        }
        if($password !== $pswd){
            $erreurs[]= "Password do not match";
        }
    }
    if(empty($erreurs)){
        $_SESSION['email'] = $email;
        header("Location: welcom.php");
        exit;
    }else{
        foreach($erreurs as $erreur){
            echo $erreur . "<br>";
        }
    }
}
?>