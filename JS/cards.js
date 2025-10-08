"use strict";

document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.cards');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('slide-in-center');
            }
        });
    }, { threshold: 0.3 });

    cards.forEach(card => observer.observe(card));
});