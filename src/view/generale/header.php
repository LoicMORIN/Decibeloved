<header>
    <a href="page_accueil.php" class="nav-icon" aria-label="visiter la page d'accueil" aria-current="page">
        <?php
        $file_relative = '../../../media/image/logo_rond.svg';
        $file_non_relative = 'media/image/logo_rond.svg';
        
        if (file_exists($file_relative)) {
            $path = $file_relative;
        } elseif (file_exists($file_non_relative)) {
            $path = $file_non_relative;
        }

        echo '<img src='.$path.'>';
        ?>
        
        <!--<span>DECIBE<em>LOVED</em>-->

    </a>
    <div class="navlinks">
        
        <div class="navlinks-container">
            <a href="page_accueil.php" aria-current="page">Accueil</a>
            <a href="#" aria-current="">Evenement</a>
            <a href="#" aria-current="">A propos</a>
            <a href="#" aria-current="">Statistique</a>
            <a href="#" aria-current="">Contact</a>

            <!-- <a href="#" aria-current="page"></a>-->
        </div>
    </div>
    <div class="nav-authentication">
        <a href="page_profil.pjp" class="user-toggler" aria-label="se connecter">
            <?php
            $file_relative = '../../../media/image/event/user-solid-240.png';
            $file_non_relative = 'media/image/event/user-solid-240.png';
            
            if (file_exists($file_relative)) {
                $path = $file_relative;
            } elseif (file_exists($file_non_relative)) {
                $path = $file_non_relative;
            }

            echo '<img src='.$path.'>';
            ?>    
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