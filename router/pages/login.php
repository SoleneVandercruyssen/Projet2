<?php 
session_start();
$pageBodyClass = 'white'; 

require "./_csrf.php";
require "./_pdo.php";
require "./_shouldBeLogged.php";

$error = [];

// Initialisation de la variable de session pour le nombre de tentatives de connexion
if(!isset($_SESSION['login_attempt'])) {
    $_SESSION['login_attempt'] = 0;
}

if(!isset($_SESSION['last_login_attempt'])) {
    $_SESSION['last_login_attempt'] = null;
}

$maxAttempts = 5; // Nombre maximum de tentatives
$blockDuration = 300; // 5 minutes = 300 secondes

// Vérification si l'utilisateur est bloqué
if($_SESSION['last_login_attempt'] && (time() - $_SESSION['last_login_attempt'])< $blockDuration) {
    $error['login'] = "Trop de tentatives de connexion. Veuillez réessayer plus tard.";
} elseif($_SESSION['last_login_attempt'] && (time() - $_SESSION['last_login_attempt']) >= $blockDuration) {
    // Réinitialiser les tentatives après la période de blocage
    $_SESSION['login_attempt'] = 0;
    $_SESSION['last_login_attempt'] = null;
}

// Connexion à la base de données
$pdo = new PDO('mysql:host=bddsql;dbname=quanticode', 'root', 'root');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Vérification du honeypot
    if (!empty($_POST['website'])) {
        // Si le champ caché a été rempli, on bloque immédiatement
        $error['login'] = "Suspicious activity detected.";
    }
    // Vérification du captcha
    if (!isset($_POST['captcha']) || $_POST['captcha'] != $_SESSION['captcha_answer']) {
    $error['login'] = "Captcha incorrect. Veuillez réessayer.";
    }  else{
        unset($_SESSION['captcha_answer']);
    // Vérification du token CSRF
    
    // Récupération et validation des données du formulaire
    $username = $_POST['prenom'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prépare et exécute la requête pour récupérer l'utilisateur par username
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();
//     var_dump($user);
// exit;

    if ($user && password_verify($password, $user['password'])) {
         // Connexion réussie : création des variables de session
        $_SESSION['login_attempt'] = 0; // Réinitialiser le compteur de tentatives
        $_SESSION['last_login_attempt'] = null; // Réinitialiser le temps de la dernière tentative
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header('Location: /plateforme');
        exit;
    } else {
    // Échec de la connexion : incrémenter le compteur de tentatives
    $_SESSION['login_attempt'] += 1;
    if ($_SESSION['login_attempt'] >= $maxAttempts) {
        $_SESSION['last_login_attempt'] = time();
        $error['login'] = "Trop de tentatives. Veuillez réessayer dans 5 minutes.";
    } else {
        $remainingAttempts = $maxAttempts - $_SESSION['login_attempt'];
        $error['login'] = "Identifiants incorrects. Il vous reste $remainingAttempts tentative(s).";
    }
 } 
} 
}
    // Gestion des erreurs de connexion
    if(isset($_GET['error']) && $_GET['error'] == 1) 
    {
    $error['login'] = "Identifiants incorrects";
    }


// Générer un captcha (une opération mathématique simple)
$number1 = rand(1, 9);
$number2 = rand(1, 9);
$_SESSION['captcha_answer'] = $number1 + $number2;

include $_SERVER['DOCUMENT_ROOT'] . '/router/_header.php';
?>

<!-- FORMULAIRE 1 : CONNEXION -->


    <!-- Accés utilisateur et accés entreprise -->
    <form action="" method="POST" id="formulaire1">   
    <h2> Connexion </h2>

    <?php 
    if (isset($_SESSION['logout_message'])) {
    echo "<p style='color: green;'>".$_SESSION['logout_message']."</p>";
    unset($_SESSION['logout_message']); //Pour éviter que le message n'apparaisse à chaque rechargement de la page
    }
    ?>
    <?php if (!empty($error['login'])): ?> 
    <p style="color: red; text-align: center;"><?php echo $error['login']; ?></p> 
    <?php endif; ?> 
        <br>
                <label for="prenom" id="prenom"></label>
                <div class="face-to-face">
                <img src="/images/icons8-name-tag-24.png" id="identity" alt="icône Identifiant">
                <input type="text" name="prenom" placeholder="Identifiant" required autocomplete="username">
                <span class="erreur"><?php echo $error["username"]??""; ?></span>
                </div> 
                <br>
                <label for="password" id="password"></label>
                <div class="face-to-face" >
                <img src="/images/icons8-password-24.png" id="password" alt="icône password">   
                <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
                <span class="erreur"><?php echo $error["password"]??""; ?></span>
                </div> 
                <br>
                <div style="display:none;">
                <label for="website">Ne pas remplir ce champ</label>
                <input type="text" name="website" id="website" autocomplete="off">
                </div>
                <div class="face-to-face">
                <label for="captcha">Combien font <?php echo $number1 . " + " . $number2; ?> ?</label>
                <input type="text" name="captcha" placeholder="Votre réponse" required>
                </div>
                <br>
                <button type="submit" id="sub">Valider</button>
                <ul id="connexionLiens">
                    <li id="NewPassword"> <a href="/update">Mot de passe oublié ?</a></li>
                <li id="lien"><a id="lien_inscription" href="/inscription">Cliquez sur ce lien pour créer votre compte</a></li>
                </ul>
        </form>
<br>


<?php include $_SERVER['DOCUMENT_ROOT'] . '/router/_footer.php'; ?>