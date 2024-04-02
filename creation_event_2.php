<!DOCTYPE html>
<html lang="en">
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
            <form id ="formPage2" action="php\function\processFormPage2.php" method="POST" enctype="multipart/form-data">

                <h1>Créer un évènement</h1>

                <div class="input-box">
                    <label>Nom de la salle:</label>
                    <input type="text" name="space_name" />
                </div>  


                <div class="input-box">
                    <label>Capacité:</label>
                    <input type="number" name="nb_place" />
                </div>  
                
                <div class="input-box">
                    <label>Carte de la salle:</label>
                    <div class="banner">
                        <label for="inputTag"> Choisissez une image </label>
                    </div>
                        <input id="inputTag" type="file" name="map_image" accept="image/*" onchange="displayFileName(this)"/>
                </div>

                <div class="input-box">
                    <label>Longueur de la salle (en m):</label>
                    <input type="number" name="lenght" />
                </div>  
            
                <div class="input-box">
                    <label>Largeur de la salle (en m):</label>
                    <input type="number" name="width"/>
                </div>  
                
                <div class="input-box">
                    <label>Image de l'artiste:</label>
                    <div class="banner">
                        <label for="docTag">Choisir un document</label>
                        <input id="docTag" type="file" name="artist_image" accept="image/*" onchange="displayFileName(this)"/> 
                        <div id="artistName" class="text_image"></div>
                    </div>
                </div>
                <input type="submit" class="btn" value="Suivant">
            </form> 
                <button type="submit" onclick="window.location.href='creation_event_1.php'" class="btn" id="previous">Précédent</button>
        </div>

    </body>
</html>





