"use strict";

document.getElementById('downloa-btn').addEventListener('click', function() {
    const select = document.getElementById('pdf-select');
    const file = select.value;
    if (file) {
        window.open(file, '_blank');
        // Ou pour forcer le téléchargement :
        // const a = document.createElement('a');
        // a.href = file;
        // a.download = file.split('/').pop();
        // a.click();
    }
});