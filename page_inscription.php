<?php

require 'php/function/session.php';
start_session();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="js/inscription.js"> </script>
</head>

<body>
    <div class="case">
        <form name="form_inscription" method="post" action="php/function/inscription.php" onsubmit="return validateForm()">
            <h1>Créer un compte</h1>
            <div class="input-box">
                <label>Nom</label>
                <input name="last_name" type="text" required/>
                <i class='bx bxs-user' ></i>
            </div>  
            <div class="input-box">
                <label>Prénom</label>
                <input name="first_name" type="text" required/>
                <i class='bx bxs-user' ></i>
            </div>  
         
            <div class="input-box">
                <label>Email</label>
                <input name="email" type="text" placeholder="exemple@email.com" required/>
                <i class='bx bxl-gmail' ></i>   
            </div>
            <div class="error">
                <?php
                if(isset($_GET['error_email'])){
                echo "Erreur, l'adresse email est déjà utilisée";}
                ?>
            
            </div>  
            <div class="input-box">
                <label>Mot de passe</label>
                <input id="pass" name="password" type="password" placeholder="8 caractères minimum" required minlength="8" />
                <i class='bx bx-low-vision' id="eye" onclick="masquer1()"></i>
            </div>  
            <div class="input-box">
                <label>Confirmation du mot de passe</label>
                <input id="conf_pass" name="conf_password"type="password" placeholder="8 caractères minimum" required minlength="8"/>
                <i class='bx bx-low-vision' id="eye2" onclick="masquer2()"></i>
            </div>  
           
            <div class="oublie-mdp">
                <label class="cookie"><input name="condition" type="checkbox" class="cookie">Je confirme avoir lu et accepte  les <a href="">conditions générales d'utilisation</a></input></label>
            </div>
            <div class="oublie-mdp">
                <label class="cookie"><input name="politique" type="checkbox"class="cookie">Je confirme avoir lu et accepte la <a href="">politique de protection des données</a></input></label>
            </div>

            <input type="submit" class="btn" value="S'inscrire">
        </form> 
</body>
</html>