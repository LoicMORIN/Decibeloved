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
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];


        $email_db = recherche_users("email","email",$email);
        $first_name_db = recherche_users("first_name","email",$email);
        $last_name_db = recherche_users("last_name","email",$email);

        if($email===$email_db and $first_name===$first_name_db and $last_name===$last_name_db){
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $requete_id = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
            $requete_ex = $conn->query($requete_id);

            header("Location: ../../page_connexion.php?update_mdp"); 
            exit;
        }
        else{
            header("Location: ../../page_mdp.php?error_email");
            exit;
        }

    }else{
        session_destroy();
    }
?>