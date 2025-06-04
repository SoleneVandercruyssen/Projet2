"use strict";



// ! MENU-BURGER


let currentSlide = 0;
const slides = document.querySelectorAll('.carousel_mobile');
const container = document.querySelector('.slider-container');
const dots = document.querySelectorAll('.dot')

// Cela fait en sorte que mes boutons next et prev fonctionne. Comme la fonction est appelée dans le html, elle n'est donc pas accessible dans le "scope global" (le navigateur ne la trouve pas).
window.changeSlide = changeSlide;
window.setSlide = setSlide;

function updateSlider() {
container.style.transform = `translateX(-${currentSlide * 100}%)`;  
dots.forEach(dot => dot.classList.remove('active')),
dots[currentSlide].classList.add('active');

}


/*
 * Function nommée changeSlide qui a comme paramètre (n)
 * Permet de changer de slide
 * Itération de la slide présente avec une Condition "if"
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
dots.forEach((dot, i) => dot.onclick = () => setSlide(i));