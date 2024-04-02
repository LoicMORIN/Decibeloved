// script.js
function confirmerBannissement(idUtilisateur, prenomUtilisateur,nomUtilisateur) {
    var confirmation = confirm("Êtes-vous sûr de vouloir bannir l'utilisateur " + prenomUtilisateur +" "+nomUtilisateur+ " ?");
    if (confirmation) {
        // Si l'utilisateur confirme, redirigez vers la page de bannissement avec l'ID de l'utilisateur
        window.location.href = "php/function/supprimer_user.php?id=" + idUtilisateur;
    }
}
