<div class="case" id="onglet_profil">
    <a href="page_profil.php?view=general.php"  <?php echo ($activePage === 'gene') ? 'style="color: #FFDE59; border-left: 2px solid #FFDE59;"' : ''; ?>>    
        <p>Générales</p>
    </a>
    <a href="page_profil.php?view=info " <?php echo ($activePage === 'info') ? 'style="color: #FFDE59; border-left: 2px solid #FFDE59;"' : ''; ?>>    
        <p>Informations</p>
    </a>
    <a href="page_profil.php?view=security" <?php echo ($activePage === 'secu') ? 'style="color: #FFDE59; border-left: 2px solid #FFDE59;"' : ''; ?>>    
        <p>Sécurité</p>
    </a>
    <a href="page_profil.php?view=historique" <?php echo ($activePage === 'hist') ? 'style="color: #FFDE59; border-left: 2px solid #FFDE59;"' : ''; ?>>    
        <p>Historique</p>
    </a>
       
    <?php
    if(isset($_SESSION["role_id"])&&$_SESSION["role_id"]==3){ 
        echo "<a href='page_accueil_admin.php' > <p>Acceder à la partie administration</p></a>";
    }
    ?>
    <?php
    if(isset($_SESSION["role_id"])&&$_SESSION["role_id"]>1){ 
        echo "<a href='page_accueil_orga.php' > <p>Acceder à la partie des organisateurs</p></a>";
    }
    ?>
    <a href="php/function/deconnexion.php?fonction=deco"  onclick="return confirm('Êtes vous certain de vouloir vous déconnecter ?')">    
        <p>Déconnexion</p>
    </a>
    <a href="php/function/deconnexion.php?fonction=sup" onclick="return confirm('Êtes vous certain de vouloir supprimer votre compte ?')">    
        <p>Suppresion de compte</p>
    </a>
</div>
