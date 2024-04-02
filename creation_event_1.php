<?php
    require 'php/function/session.php';
    start_session();
    if (is_logged_in() == false){
        header("Location: page_connexion.php?error_conn");
        exit;
    } elseif  (get_role_id() == 1) {
        header("Location: page_profil.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Créer un évènement</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="js/dispalyFileName.js"></script>
    </head>
    <body>
        <div class="case">
            <form id= "formPage1" action="php\function\processFromPage1.php" method="POST" enctype="multipart/form-data">

                <h1>Créer un évènement</h1>

                <div class="input-box">
                    <label>Nom de l'évènement:</label>
                    <input type="text" name="title" required/>
                </div>  
                
                <div class="input-box">
                    <label>Description de l'évènement:</label>
                    <input type="text" name="description">
                </div>  
            
                <div class="input-box">
                    <label>Date de début:</label>
                    <input type="datetime-local" name="date_start" required min="<?php echo date('Y-m-d\TH:i'); ?>"/>
                </div>

                <div class="input-box">
                    <label>Date de fin:</label>
                    <input type="datetime-local" name="date_end" required min="<?php echo date('Y-m-d\TH:i'); ?>"/>
                </div>  

                <div class="input-box">
                    <label>Location:</label>
                    <input type="location" name="location" required/>
                </div>

                <div class="input-box">
                    <label>Banner:</label>
                    <div class="banner">
                        <label for="inputTag">Select Image</label>
                        <input id="inputTag" type="file" name="banner" accept="image/*" onchange="displayFileName(this)"/> 
                    </div>
                </div>
                <div class="input-checkbox">
                    <label for="active_checkbox">Evènement actif:</label>
                    <input type="checkbox" id="is_active" name="is_active" value="1">
                </div>
                <div class="input-checkbox">
                    <label for="open_checkbox">Evènement ouvert:</label>
                    <input type="checkbox" id="is_open" name="is_open" value="1">
                </div>
                <input type="submit" class="btn"value="Suivant">
            </form> 
        </div>   
    </body>
</html>

