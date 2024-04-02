<?php

$file_relative = '../scrud/scrud_users.php';
$file_non_relative = 'php/scrud/scrud_users.php';

if (file_exists($file_relative)) {
    include $file_relative;
} elseif (file_exists($file_non_relative)) {
    include $file_non_relative;
}
require 'session.php';
start_session();
require 'send_email.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Crypter le mot de passe
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Vérifier si l'email existe déjà
    $email_db = recherche_users("email","email",$email);

    if ($email === $email_db) { 
       
        header("Location: ../../page_inscription.php?error_email");
        exit;
        
    } else {
        create_users($email, $hashed_password, $first_name, $last_name);
        email_inscription($email, $first_name, $last_name);
        echo "Enregistrement réussi dans la base de données <br>";
        sleep(60);
        connect_session($email);
        header("Location: ../../page_profil.php");
    }
}
?>