<?php
// include scrud users
$scrud_users_relative = '../scrud/scrud_users.php';
$scrud_users_non_relative = 'php/scrud/scrud_users.php';

if (file_exists($scrud_users_relative)) {
    include $scrud_users_relative;
} elseif (file_exists($scrud_users_non_relative)) {
    include $scrud_users_non_relative;
}

session_start();


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = $_GET['id'];

    // Récupérer les informations de l'utilisateur supprimé si nécessaire
    $prenom = recherche_users('first_name', 'id', $getid);
    $nom = recherche_users('last_name', 'id', $getid);

    // Utilisez la fonction delete_users du fichier scrud_users
    if (delete_users('id', $getid)) {

        // Afficher un message de confirmation avec JavaScript
        echo "<script>
                alert('L\'utilisateur $prenom $nom a bien été supprimé');
                window.location.href = 'gestion_user.php';
              </script>";
        header("Location: /page_profil.php");
    } else {
        echo "Erreur lors de la suppression de l'utilisateur";
    }
} else {
    echo "L'identifiant n'a pas été récupéré";
}
?>


