
    function masquer1() {
        var passwordInput = document.getElementById("pass");
        var eyeIcon = document.getElementById("eye");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("bx-low-vision");
            eyeIcon.classList.add("bx-show");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("bx-show");
            eyeIcon.classList.add("bx-low-vision");
        }
    }

    function masquer2() {
        var passwordInput = document.getElementById("conf_pass");
        var eyeIcon = document.getElementById("eye2");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.remove("bx-low-vision");
            eyeIcon.classList.add("bx-show");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.remove("bx-show");
            eyeIcon.classList.add("bx-low-vision");
        }
    }

    function validateForm() {
        var password = document.getElementById("pass");
        var confirmPassword = document.getElementById("conf_pass");
        var conditionCheckbox = document.getElementsByName("condition")[0];
        var politiqueCheckbox = document.getElementsByName("politique")[0];


        // Vérification que le mot de passe et la confirmation sont les mêmes
        if (password.value !== confirmPassword.value) {
            alert("Le mot de passe et la confirmation ne correspondent pas.");
            password.focus();
            confirmPassword.focus();
            return false;
        }

        // Vérification que les checkboxes sont cochées
        if (!conditionCheckbox.checked || !politiqueCheckbox.checked) {
            alert("Veuillez accepter les conditions générales d'utilisation et la politique de protection des données.");
            conditionCheckbox.focus();
            politiqueCheckbox.focus();
            return false;
        }

        // Si toutes les conditions sont remplies, le formulaire est valide
        alert("inscription réussie");
        return true;

        }
    
