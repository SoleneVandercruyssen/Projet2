"use strict";

// document.getElementById('downloa-btn').addEventListener('click', function() {
//     const select = document.getElementById('pdf-select');
//     const file = select.value;
//     if (file) {
//         window.open(file, '_blank');
//     }
// });

// Gestion de la modale pour ajouter un événement
document.addEventListener('DOMContentLoaded', () => {

    const messageModal = document.getElementById('messageModal');
    const openMessageModalBtn = document.getElementById('openMessageModal');
    const closeMessageModalBtn = document.getElementById('closeMessageModal');

    if (!openMessageModalBtn || !messageModal || !closeMessageModalBtn) {
        console.error('Un ou plusieurs éléments de la modale sont introuvables');
        return;
    }


    openMessageModalBtn.addEventListener('click', () => {
        messageModal.style.display = 'flex';
    });

    closeMessageModalBtn.addEventListener('click', () => {
        messageModal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === messageModal) {
            messageModal.style.display = 'none';
        }
    });
});
