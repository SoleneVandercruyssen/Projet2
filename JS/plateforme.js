"use strict";

document.getElementById('downloa-btn').addEventListener('click', function() {
    const select = document.getElementById('pdf-select');
    const file = select.value;
    if (file) {
        window.open(file, '_blank');
    }
});

// Gestion de la modale pour ajouter un événement
    const messageModal = document.getElementById('messageModal');
    const openMessageModalBtn = document.getElementById('openMessageModal');
    const closeMessageModalBtn = document.getElementById('closeMessageModal');

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
