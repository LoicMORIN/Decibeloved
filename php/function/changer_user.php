<?php
session_start();
require 'php/scrud/scrud_users.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = $_GET['id'];

    // Utiliser la fonction update_users du fichier scrud_users
    if (update_users('1', 'role_id', 'id', $getid)) {

        // Récupérer les informations de l'utilisateur modifié si nécessaire
        $prenom = recherche_users('first_name', 'id', $getid);
        $nom = recherche_users('last_name', 'id', $getid);

        // Afficher un message de confirmation avec JavaScript
        echo "<script>
                alert('L\'utilisateur $prenom $nom a bien été changé en utilisateur');
                window.location.href = 'gestion_user.php';
              </script>";

    } else {
        echo "Erreur lors de la mise à jour du rôle de l'utilisateur";
    }
} else {
    echo "L'identifiant n'a pas été récupéré";
}
?>


