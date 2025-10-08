"use strict";

/* 
*   Déclaration de 3 constantes "modaleDialog", "buttons", "closeButton"
*   @paramètre Boucle avec en paramètre (button et i) 
/   Pour chaque boutons faire aparaître la modale "Dialog" au "click" en fonction de l'index
*   @paramètre Condition : Fermeture de la modale correspondante au "click"
*   
*/

const closeButton = document.querySelector('.close');
const modaleDialog = document.querySelectorAll('dialog');
const buttons = document.querySelectorAll('button');

// Sélectionne tous les <dialog> précédés d'un <button>
document.querySelectorAll('button + dialog').forEach((dialog, i) => {
    const button = dialog.previousElementSibling;
    if (button && button.tagName === "BUTTON") {
        // Ouvre la modale au clic sur le bouton
        button.addEventListener("click", () => {
            dialog.showModal();
        });
        // Ferme la modale au clic sur le bouton .close à l'intérieur
        const closeBtn = dialog.querySelector('.close');
        if (closeBtn) {
            closeBtn.addEventListener("click", () => {
                dialog.close();
            });
        }
    }
});