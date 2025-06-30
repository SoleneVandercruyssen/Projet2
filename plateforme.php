<?php 
$pageBodyClass = 'white'; 
$isPlateforme = true;
require "./_header.php";

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
    <button type="button" class="button_mini_header" ><img src="./images/icons8-message-30.png" alt="icon message"></button>
    <button type="button" class="button_mini_header"><img src="./images/icons8-language-50.png" alt="icon langue"></button>

<form action="_logout.php" method="post" style="display:inline;">
  <button type="submit" class="Btn">
    <div class="sign">
      <svg viewBox="0 0 512 512">
        <path
          d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"
        ></path>
        </svg>
    </div>
    <div class="text">Logout</div>
  </button>
</form>
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
    <!-- Liste déroulante -->
<select id="pdf-select">
    <option value="" disabled selected>Choisissez un cours</option>
    <option value="docs/intro_programmation.pdf">Cours HTML</option>
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
    <div>
<a href=""download=""><img src="./images/icons8-import-50.png" id="import" alt="icon_import"></a>
<p>Importez un fichier</p>
</div>
<div>
<a href=""><img src="./images/icons8-export-50.png" id="export" alt="icon_export"></a>
<p>Exporter un fichier</p>
</div>
</section>
</section>
<img src="./images/icons8-flèche-haut.gif" alt="gif flèche vers le haut" id="gif-flèche">
    </main>




<?php 
require "./_footer.php";
?>