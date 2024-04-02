<?php 
require 'session.php';
if(!is_logged_in()){
    header('location:../../page_connexion.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/77bb77f160.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <a href="#" class="nav-icon" aria-label="visiter la page d'accueil" aria-current="page">
            <img src="Image/logo_rond.svg">
            <!--<span>DECIBE<em>LOVED</em>-->

        </a>
        <div class="navlinks">
         
            <div class="navlinks-container">
                <a href="#" aria-current="page">Accueil</a>
                <a href="#" aria-current="">Evenement</a>
                <a href="#" aria-current="">A propos</a>
                <a href="#" aria-current="">Statistique</a>
                <a href="#" aria-current="">Contact</a>

               <!-- <a href="#" aria-current="page"></a>-->
            </div>
        </div>
        <div class="nav-authentication">
            <a href="#" class="user-toggler" aria-label="se connecter">
                <img src="Image/user-solid-240.png">
            </a>
            <button class="menu" onclick="this.classList.toggle('opened');this.setAttribute('aria-expanded', this.classList.contains('opened'))" aria-label="Main Menu">
                <svg width="60" height="60" viewBox="0 0 100 100">
                  <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                  <path class="line line2"  d="M 20,50 H 80" />
                  <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
                </svg>
            </button>
        </div>
    </header>
    <main>
        <h3>CONTACT US</h3>
        <h1></h1>
        <div id="chat-container">
        <?php foreach ($content as $content) : ?>
            <div>
                <strong><?php echo $content['auto_id']; ?></strong>
                <?php echo $content['content']; ?>
            </div>
        <?php endforeach; ?>
        </div>
            <form method="POST" action="traitement.php" align="center">
                <textarea name="content" id="content" rows="10"  cols="60" required></textarea>
                <input type="hidden" name="chat_id" value="<?php echo $chat_id; ?>">
                <input type="button" value="Envoyer">
            </form>
            <section id="messages"></section>
        </div>
    </main>
</body>
</html>