
<?php
    require 'php/function/session.php';
    start_session();
    if (is_logged_in() == false){
        header("Location: page_connexion.php?error_conn");
        exit;
    } elseif(isset($_SESSION["role_id"])&&$_SESSION["role_id"]>1){ 
        include "src/view/orga/accueil.php";
    }else{
        header("Location: page_profil.php");
    }
?>