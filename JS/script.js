"use strict";



// ! MENU-BURGER

/* 
* Déclaration d'une variable "currentSlide" en let égale à 0
* Déclaration de 3 constantes "slides", "container" et "dots"
* Sélectionne par "document.querySelectorAll" : les points, les slides et chaque div 
*/ 

let currentSlide = 0;
const slides = document.querySelectorAll('.carousel_mobile');
const container = document.querySelector('.slider-container');
const dots = document.querySelectorAll('.dot')

// Cela fait en sorte que mes boutons next et prev fonctionne. Comme la fonction est appelée dans le html, elle n'est donc pas accessible dans le "scope global" (le navigateur ne la trouve pas).
window.changeSlide = changeSlide;
window.setSlide = setSlide;


/*
* @paramètre Fonction appelée "updateSlider"
* Modification du style de la variable "container" : On demande à ce que les slides se déplace de 100% sur l'axe horizontale
* @paramètre Boucle : on ajoute/enlève la classList "active" sur le point en fonction du numéro de la slide sur laquelle on est actuellement
*/

function updateSlider() {
if (!container) return; // Ne fait rien si container n'existe pas
container.style.transform = `translateX(-${currentSlide * 100}%)`;  
dots.forEach(dot => dot.classList.remove('active')),
dots[currentSlide].classList.add('active');

}


/*
 * @paramètre Fonction nommée "changeSlide" qui a comme paramètre (n)
 * Permet de changer de slide
 * Itération de la slide présente avec une Condition "if"
 * 
 * 
*/
function changeSlide(n) {
    
    currentSlide += n;
    if (currentSlide < 0) currentSlide = slides.length -1;
    if (currentSlide >= slides.length) currentSlide = 0;
    updateSlider();
}

/* 
* Function nommée setSlide avec comme paramètre (n)
* La valeur de "n" est égale à la valeur de currentSlide = 0
*/
function setSlide(n) {
    currentSlide = n;
    updateSlider();
}

// Initialisation
updateSlider();


/*
* @paramètre Une boucle avec en paramètre (dot et i)
* @paramètre onclick = au click 
* L'index des points est relié à la slide  
*/
dots.forEach((dot, i) => dot.onclick = () => setSlide(i));