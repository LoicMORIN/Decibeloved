<div class="case" id="general_profil">
    <h1> Sécurité  </h1>
    <form name="form_changement_mdp" method="post" onsubmit="return validateForm()" action="../../../php/function/change_password.php">
            <div class="input-box">
                <label>Ancien mot de passe</label>
                <input id="pass" name="password" type="password" placeholder="8 caractères minimum" required minlength="8" />
                <i class='bx bx-low-vision' id="eye" onclick="masquer1()"></i>
            </div>  
            <div class="input-box">
                <label>Nouveau mot de passe</label>
                <input id="pass" name="password" type="password" placeholder="8 caractères minimum" required minlength="8" />
                <i class='bx bx-low-vision' id="eye" onclick="masquer1()"></i>
            </div>  
            <div class="input-box">
                <label>Confirmation du nouveau mot de passe</label>
                <input id="conf_pass" name="conf_password"type="password" placeholder="8 caractères minimum" required minlength="8"/>
                <i class='bx bx-low-vision' id="eye2" onclick="masquer2()"></i>
            </div>  
            <input type="submit" class="btn" value="Valider">
    </form>
</div>
