<?php 
$pageBodyClass = 'white'; 
$isPlateforme = true;
include $_SERVER['DOCUMENT_ROOT'] . '/router/_header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    echo "Connecté en tant que " . htmlspecialchars($_SESSION['username']);
} else {
    echo "Utilisateur non connecté";
}

?>

<!-- ! Mini Header -->
<section id="plateforme_icons">
    <button type="button" class="button_mini_header" ><img src="/images/icons8-message-30.png" alt="icon message"></button>
    <button type="button" class="button_mini_header"><img src="/images/icons8-language-50.png" alt="icon langue"></button>
</section>

    <main>
<div id='calendar'></div>


<!-- Modale cachée par défaut -->
<div id="eventModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index:1000; align-items:center; justify-content:center;">
    <form id="eventForm" style="background:#fff; padding:20px; border-radius:10px; min-width:250px; display:flex; flex-direction:column; gap:10px;">
    <label>
        Titre de l'événement :
        <input type="text" id="eventTitle" required>
    </label>
    <label>
        Date :
        <input type="date" id="eventDate" required>
    </label>
    <label>
        Couleur :
        <input type="color" id="eventColor" value="#2DBBD4">
    </label>
    <div style="display:flex; gap:10px; justify-content:flex-end;">
        <button type="button" id="closeModal">Annuler</button>
        <button type="submit">Ajouter</button>
    </div>
</form>
</div>

<button id="addEventBtn">Ajouter un événement</button>

<!-- ! Section  calendrier -->


<!-- ! Section Liste des Cours -->

<section id="plateforme_liste">

<div class="list" >
    <div class="list_item">
    <h3>Mise à disposition des cours</h3>
    <hr>
    <!-- Liste déroulante -->
<select id="pdf-select">
    <option value="" disabled selected>Choisissez un cours</option>
    <option value="pdf/cours_html.pdf">Cours HTML</option>
    <option value="docs/cours_css.pdf">Cours CSS</option>
    <option value="docs/cours_sass.pdf">Cours SASS</option>
</select>
<button id="download-btn">Télécharger</button>
    </div>
</div>

</section>
<section id="Administratif">
<!-- ! Administratif -->
<h2 id="title-administratif">! Veuillez renommer vos fichiers <em>ex: Nom_Prenom_absence_01-12-2028</em> </h2>

<section id="plateforme_pdf">
    
    <div class="card">
        <div  class="together">
        <input type="file" name="import" id="fileId">
    <a href=""download=""><img src="/images/icons8-import-50.png" id="import" alt="icon_import"></a>
</div>
</div>

</section>
</section>
<img src="/images/icons8-flèche-haut.gif" alt="gif flèche vers le haut" id="gif-flèche">
    </main>




<?php include $_SERVER['DOCUMENT_ROOT'] . '/router/_footer.php'; ?>