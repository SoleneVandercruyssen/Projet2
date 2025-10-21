<?php
ob_start();
require_once __DIR__ . '/../_csrf.php';
require_once __DIR__ . '/../_pdo.php';

$user = [];
// génère 32 octets aléatoires de manière sécurisée
// convertit ces octets en une chaîne lisible en hexadécimal (64 caractères)
$token = bin2hex(random_bytes(32)); 

// Connexion à la BDD
$db = connexionPDO();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = $db->prepare("SELECT * FROM users WHERE reset_token = ? AND reset_token_expire > NOW()");
    $sql->execute([$token]);
    $user = $sql->fetch();

    if (!$user) {
        $_SESSION['flash'] = "Lien de réinitialisation invalide ou expiré.";
        header('Location: /login');
        exit;
    }
}

// $username = $password= $email = "";
$username = $user['username'] ?? '';
$email = $user['email'] ?? '';
// Tableau d'erreurs
$error = [];
// Regex mot de passe
$regexPassword= "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

if ($_SERVER['REQUEST_METHOD']=== 'POST' && isset($_POST['update'])) {
// Si password est vide, alors on garde l'ancien mot de passe
if (empty($_POST["password"])) {
    $password = $user["password"];
}
else
{
    // Je nettoie la donnée
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
        header("Location: /login");
        exit;
}
}
include $_SERVER['DOCUMENT_ROOT'] . '/router/_header.php';
?>
<section id="updateMDP">
<h1 id="MDP">Mettre à jour mon mot de passe</h1>
<form action="" method="post" id="formulaireMDP">

    <!-- Password -->
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="passwordUpdate">
    <span class="erreur"><?php echo $error["password"]??""; ?></span> 
    <br>
    <!-- password verify -->
    <label for="passwordBis">Confirmation du mot de passe :</label>
    <input type="password" name="passwordBis" id="passwordBisUpdate">
    <span class="erreur"><?php echo $error["passwordBis"]??""; ?></span> 
    <br>
    <input type="submit" id="mettreAJour" value="Mettre à jour" name="update">

    <li><a href="/login">Retour</a></li>
</form>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/router/_footer.php';
ob_end_flush();