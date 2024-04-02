
<?php
require 'php/function/session.php';
start_session();
if(isset($_GET['update_mdp'])){
echo "<script>alert('Mot de passe modifié');</script>";}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src='js/inscription.js'></script>
</head>

<body>
    <div class="case">
        <form action="php/function/connexion.php" method="post">
            <h1>Connexion</h1>
            <div class="input-box">
                <label>Email</label>
                <input id="email" name="email" type="text" placeholder="exemple@email.com" required/>
                <i class='bx bxs-user'></i>
            </div>
            <div class="error">
                <?php
                if(isset($_GET['error_email'])){
                echo "Addresse email inconnue";}
                ?>
            </div>  
            <div class="error">
                <?php
                if(isset($_GET['error_mdp'])){
                echo "Mot de passe incorrecte";}
                ?>
            </div> 
            <div class="error">
                <?php
                if(isset($_GET['error_conn'])){
                echo "Vous devez vous (re)connecter ";}
                ?>
            </div> 
            <div class="input-box">
                <label>Password</label>
                <input name="password" id="pass" type="password" placeholder="8 caractères minimum" required/>
                <i class='bx bx-low-vision' id="eye" onclick="masquer1()"></i>
            </div>
           
            <div class="oublie-mdp">
                <label><a href="page_mdp.php">Mot de passe oubliée ?</a></label>
            </div>

            <button type="submit" class="btn">Connexion</button>
        </form>

        <div class="case_incription">
            <button type="button" class="btn_ins" onclick="window.location.href='page_inscription.php'">
                Créer un compte
            </button>
        </div>
    </div>


</body>
</html>
