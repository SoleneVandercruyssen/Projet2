<?php 
require_once __DIR__ . '/../_csrf.php';
require_once __DIR__ . '/../_pdo.php';
require_once __DIR__ . '/../_shouldBeLogged.php'; // vérifie si l'utilisateur est connecté
shouldBeLogged(true, '/login');

// Iniatialisation des variables
$db = connexionPDO();
$sql = $db->prepare("SELECT * FROM users WHERE id=?");
$sql->execute([(int)$_SESSION["user_id"]]);
$user = $sql->fetch();

$username = $password= $email = "";
// Tableau d'erreurs
$error = [];
// Regex mot de passe
$regexPassword= "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";


// Mise à jour du profil
if ($_SERVER['REQUEST_METHOD']=== 'POST' && isset($_POST['update'])) {
    // Si le champ est vide, je regarde lancien prénom
    if (empty($_POST["username"])) {
        $username = $user["username"];
    }
    else
    {
        $username = cleanData($_POST["username"]);
        // Je vérifie que le nom d'utilisateur ne contient que des lettres et qu'il fait entre 2 et 25 caractères
        if (!preg_match("/^[a-zA-Z' -]{2,25}$/", $username)) {
            $error["username"] = "Votre nom d'utilisateur ne doit contenir que des lettres" ;
        }
    }//Fin vérification username

// Si email est vide ou n'a pas changé, alors on garde l'ancien email   
if(empty($_POST["email"]) || $_POST["email"] === $user["email"]) {
    // Je garde l'ancien email
    $email = $user["email"];
}
else {
    // Je vérifie que l'email est valide et qu'il n'est pas déjà utilisé
    $email = cleanData($_POST["email"]);
// Vérification format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // L'email n'est pas valide
        $error["email"] = "Veuillez saisir une adresse email valide";
    }
    else
    {
        // Vérification unicité email
        $sql = $db->prepare("SELECT * FROM users WHERE email=?");
        $sql->execute([$email]);
        $existingUser =$sql->fetch();
        if($existingUser)
        {
            $error["email"] = "Cet email est déjà utilisé";
        }
    }
}// Fin vérification email 
// Si password est vide, alors on garde l'ancien mot de passe
if (empty($_POST["password"])) {
    $password = $user["password"];
}
else
{
    $password = trim($_POST["password"]);
    // Je vérifie que le mot de passe est complexe et que la confirmation est correcte
    if (empty($_POST["passwordBis"])) {
        $error["passwordBis"] = "Veuillez confirmer votre mot de passe";
    }
    // Si le mot de passe et la confirmation sont différents
    elseif ($_POST["password"] !== $_POST["passwordBis"]) {
        $error["passwordBis"] = "Veuillez saisir le même mot de passe";
    }
    // Vérification complexité mot de passe
    if (!preg_match($regexPassword, $password)) {
        $error["password"] = "Veuillez saisir un mot de passe plus complexe";
    }
    // Si pas d'erreur, je hash le mot de passe
    else{
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
}//Fin vérification password

if (empty($error)) {
    // Je met à jour les informations dans la base de données
    // $db = connexionPDO();
    $sql = $db->prepare("UPDATE users SET username=:us, email=:em, password=:mdp WHERE id=:id");
    $sql->execute([
        "id"=>$user["id"],
        "mdp"=>$password,
        "us"=>$username,
        "em"=>$email
    ]);
    // Je met à jour les informations stockés en session : 
        $_SESSION["username"] = $username;
        // Je crée un message flash qui disparaîtra au rechargement : 
        $_SESSION["flash"] = "Profil mis à jour";
        header("Location: /plateforme");
        exit;
}
}
// Suppression du compte
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_account'])) {
    $sql = $db->prepare("DELETE FROM users WHERE id = ?");
    $sql->execute([$user['id']]);
    session_destroy();
    header("Location: /login");
    exit;
}


$isPlateforme = true;
$pageBodyClass = 'white'; // Classe CSS spécifique pour la page plateforme
include $_SERVER['DOCUMENT_ROOT'] . '/router/_header.php';
include_once __DIR__ . '/update_profil.php';


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