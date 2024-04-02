<?php 
    require 'php/function/session.php';
    start_session();  
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.typekit.net/wlt4nuq.css">
    <link rel="stylesheet" href="https://use.typekit.net/wlt4nuq.css">
    <script src="https://kit.fontawesome.com/77bb77f160.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="js/cookie_popup.js"></script>
</head>
<body>
    <header>
        <a href="#" class="nav-icon" aria-label="visiter la page d'accueil" aria-current="page">
            <img src="media/image/logo_rond.svg">
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
                <img src="media/image/event/user-solid-240.png">
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
    <main class="main">
        <div class="firstplan">
            <a href="#" aria-label="">
                <img src="media/image/Figma/wall BRENT.jpg">
            </a>
        </div>
        <section class="event">
            <h2 class="h2" style="white-space: nowrap;display: inline-block;font-size: 200px;">EVENEMENT</h2>
            <div class="carousel-container">
                <div class="carousel">
                    <div class="carousel-item">
                        <picture>
                            <img src="php/function/recup.php?id=1">
                        </picture>
                        <div class="c-button">
                            <div class="c-button border">
                                <a href="https://www.fnacspectacles.com/events/concerts-festivals-93/" target="_blank">
                                    <i class="fa-solid fa-ticket"></i>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-caption" title="voir fiche after_hours">
                            <h3 class="c-card_title">The weekend</h3>
                            <div class="c-card_suptile">18 déc.2023</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <picture>
                            <img src="php/function/recup.php?id=1">
                        </picture>
                        <div class="c-button">
                            <div class="c-button border">
                                <a href="https://www.fnacspectacles.com/events/concerts-festivals-93/" target="_blank">
                                    <i class="fa-solid fa-ticket"></i>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-caption" title="voir fiche after_hours">
                            <h3 class="c-card_title">Joji</h3>
                            <div class="c-card_suptile">22 déc.2023</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <picture>
                            <img src="php/function/recup.php?id=1">
                        </picture>
                        <div class="c-button">
                            <div class="c-button border">
                                <a href="https://www.fnacspectacles.com/events/concerts-festivals-93/" target="_blank">
                                    <i class="fa-solid fa-ticket"></i>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-caption" title="voir fiche after_hours">
                            <h3 class="c-card_title">Frank Ocean</h3>
                            <div class="c-card_suptile">10 jav.2024</div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <picture>
                            <img src="php/function/recup.php?id=1">
                        </picture>
                        <div class="c-button">
                            <div class="c-button border">
                                <a href="https://www.fnacspectacles.com/events/concerts-festivals-93/" target="_blank">
                                    <i class="fa-solid fa-ticket"></i>
                                </a>
                            </div>
                        </div>
                        <div class="carousel-caption" title="voir fiche after_hours">
                            <h3 class="c-card_title">Frank Ocean</h3>
                            <div class="c-card_suptile">10 jav.2024</div>
                        </div>
                    </div> 
                </div>
                <button class="carousel-btn prev" onclick="prevSlide()">
                    <span>
                        <i style='font-size:70px;font-weight: 400;'class="icon-arow-right">&#8592;</i>
                    </span>
                </button>
                <button class="carousel-btn next" onclick="nextSlide()">
                    <span>
                        <i style='font-size: 70px;'class="icon-arow-left">&#8594;</i>
                    </span>
                </button>
            </div>


        </section>
        <section class="Stat">
            <h2 class="h2_2" style="white-space: nowrap;display: inline-block;font-size: 200px;">STATISTIQUE</h2>
            <div class="wall">
                <picture>
                    <source media="(min-width:)" srcset="#">
                    <source media="(min-width:)" srcset="#">
                    <img src ="media/image/figma/wall SZA.jpg">
                </picture>
            </div>
        </section>
        <div id="cookie-banner" class="cookie-banner">
            <p>Nous utilisons des cookies pour améliorer votre expérience sur notre site. En continuant, vous acceptez notre utilisation des cookies.</p>
                <button id="accept-cookies" onclick="acceptCookies()">Accepter</button>
            </p>
        </div>
        <section class="Faq">

        </section>
    </main>
    <footer>
        <div class="container">
            <div class="footer_info">
                <p>
                    <strong>DECIBELOVE</strong>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    <br>
                    Curabitur dictum erat sed tortor fermentum mollis. 
                
                </p>
                <div class="footer_info-links">
                    <a href="#" class="c-button_link" target="_blank" title="Qui somme-nous ?">
                        <span>Qui somme-nous ? </span>
                    </a>
                    <a href="#" class="c-button_link" target="_self" title="Nous contacter">
                        <span>Nous contacter</span>
                    </a>
                </div>
                <ul class="c-social">
                    <li>
                        <a href="https://www.facebook.com/?locale=fr_FR"  target="_blank">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/home"  target="_blank">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/"  target="_blank">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/"  target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="footer_legal">
            <ul>
                <li><a href="#" target="_self">CVG</a></li>
                <li><a href="#" target="_self">Politique de confidencialité</a></li>
                <li><a href="#" target="_self">Mention légale</a></li>
                <li><a href="#" target="_self">Utilisation des cookies</a></li>
            </ul>
            <p> ©2023 Decibelove-tout droit réservés</p>
        </div>
    
    </footer>
    
</body>
</html>

