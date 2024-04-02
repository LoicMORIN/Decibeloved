<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page d'utilisateur</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src='js/inscription.js'></script>
    </head>

    <body id="BG2">
        <?php
            $activePage = 'info';
            $file_relative = '../../view/profil/onglet.php';
            $file_non_relative = 'src/view/profil/onglet.php';
            
            if (file_exists($file_relative)) {
                include $file_relative;

            } elseif (file_exists($file_non_relative)) {
                include $file_non_relative;

            }
        // Pour le le contenu
        $file_relative = '../../view/profil/feed_info.php';
        $file_non_relative = 'src/view/profil/feed_info.php';
        
        if (file_exists($file_relative)) {
            include $file_relative;

        } elseif (file_exists($file_non_relative)) {
            include $file_non_relative;}
        ?>
    </body>
</html>