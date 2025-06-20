"use strict";

document.addEventListener("DOMContentLoaded", function() {
    const fleche = document.getElementById("gif-flèche");
    if (fleche) {
        fleche.addEventListener("click", function() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }
});