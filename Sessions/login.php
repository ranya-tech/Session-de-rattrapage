<?php
session_start();
$valide = true;
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $pswd = $_POST["pswd"];
    if(empty($email) || empty($password) || empty($pswd)){
        echo "Champs vide";
    }else{
        if(!str_ends_with($email, "@ofppt.ma")){
            echo "email invalid";
            $valide = false;
        }
        if(strlen($password) < 8){
            echo "Password must have at least 8 caracteres";
            $valide = false;
        }
        if(!preg_match("/[A-Z]/" , $password)){
            echo "Password must have at least an upper case letter";
            $valide = false;
        }
        if(!preg_match("/[0-9]/", $password)){
            echo "Password must have at least a caractere";
            $valide = false;
        }
        if($password !== $pswd){
            echo "Password do not match";
            $valide = false;
        }
    }
    if($valide == true){
        $_SESSION['email'] = $email;
        header("Location: welcom.php");
        exit;
    }
}
?>