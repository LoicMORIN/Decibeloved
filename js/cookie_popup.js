document.addEventListener("DOMContentLoaded", function () {
    if (!localStorage.getItem("cookiesAccepted")) {
        showCookieBanner();
    }
});

function showCookieBanner() {
    var cookieBanner = document.getElementById("cookie-banner");
    cookieBanner.style.display = "block";
}

function acceptCookies() {
    var cookieBanner = document.getElementById("cookie-banner");
    cookieBanner.style.display = "none";
    localStorage.setItem("cookiesAccepted", "true");
}
