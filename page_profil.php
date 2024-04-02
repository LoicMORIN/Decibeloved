<?php
    require 'php/function/session.php';
    start_session();
    if (is_logged_in() == false){
        header("Location: page_connexion.php?error_conn");
        exit;
    } else {
        $user_id = get_user_id();
        // Pour les SCRUDs 
        include "php/scrud/scrud_users.php";
        $user_fname = recherche_users("first_name","id",$user_id);
        $user_lname = recherche_users("last_name","id",$user_id);
        $user_email = recherche_users("email","id",$user_id);
        //echo "Temps de session : ".time()." alors que ".$_SESSION['time'];
        if (isset($_GET['view']) && $_GET['view'] ==  'general'){
            include 'src/model/profil/general.php';
        } else if (isset($_GET['view']) && $_GET['view'] ==  'info') {
            include 'src/model/profil/info.php';
        } else if (isset($_GET['view']) && $_GET['view'] ==  'security') {
            include 'src/model/profil/security.php';
        }else if (isset($_GET['view']) && $_GET['view'] ==  'historique') {
            include 'src/model/profil/historique.php';
        }else {
            header("Location: page_profil.php?view=general");
            exit;
        }
    }
?>
