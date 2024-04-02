<?php
    require 'session.php';
    start_session();

    $file_relative = '../scrud/scrud_users.php';
    $file_non_relative = 'php/scrud/scrud_users.php';

    if (file_exists($file_relative)) {
        include $file_relative;
    } elseif (file_exists($file_non_relative)) {
        include $file_non_relative;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email_db = recherche_users("email", "email", $email) ;
        $password_db = recherche_users("password", "email", $email) ;
        if ($email_db !== $email) {
            header("Location: ../../page_connexion.php?error_email");
            exit;
        }else{
            if (password_verify($password, $password_db)) {
                echo "Connexion réussie!";
                connect_session($email);
                header("Location: ../../page_profil.php");
                exit;
            }else{
                
                header("Location: ../../page_connexion.php?error_mdp");
                exit;
            }  
        }
    }
?>
