"use strict";

/* 
*   Déclaration de 3 constantes "modaleDialog", "buttons", "closeButton"
*   @paramètre Boucle avec en paramètre (button et i) 
/   Pour chaque boutons faire aparaître la modale "Dialog" au "click" en fonction de l'index
*   @paramètre Condition : Fermeture de la modale correspondante au "click"
*   
*/


const modaleDialog = document.querySelectorAll('dialog')
const buttons = document.querySelectorAll('button');
const closeButton = document.querySelectorAll('.close')

buttons.forEach((button, i )=>{
    button.addEventListener("click", () => {
    
        modaleDialog[i].showModale();
})})


if(closeButton){
    closeButton.addEventListener("click", ()=>
    {
        modaleDialog[i].close();
    })
}
