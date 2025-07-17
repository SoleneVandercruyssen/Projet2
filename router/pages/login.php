<?php 
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
session_start();
$pageBodyClass = 'white'; 

require "./_csrf.php";
require "./_pdo.php";
require "./_shouldBeLogged.php";


$error = [];

$pdo = new PDO('mysql:host=bddsql;dbname=quanticode', 'root', 'root');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['prenom'] ?? '';
    $password = $_POST['password'] ?? '';

    // Prépare et exécute la requête pour récupérer l'utilisateur par username
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();


    if ($user && password_verify($password, $user['password'])) {
         // Connexion réussie : création des variables de session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: /plateforme');
        exit;
    } 
}else {
        $error['login'] = "Identifiants incorrects";
    }

include $_SERVER['DOCUMENT_ROOT'] . '/router/_header.php';
?>

<!-- FORMULAIRE 1 : CONNEXION -->


    <!-- Accés utilisateur et accés entreprise -->
    <div id="Forms">
    <div class="mirroir">
    <form action="login" method="POST" id="form1">   
    <h2 >Connexion</h2>

<?php 
if (isset($_GET['logout']) && $_GET['logout'] == 1) {
    echo "<p style='color: green;'>Vous avez été déconnecté avec succès.</p>";
}
?>
<?php if (!empty($error['login'])): ?>
    <p style="color: red; text-align: center;"><?php echo $error['login']; ?></p>
<?php endif; ?>

        <div class="compte">
            <!-- Accès aux cours de la formation -->
            <button type="button" id="private">Privé</button>
            <!--   Accès à des courts gratuits pour tous -->
            <button type="button" id="public">Public</button>
        </div>
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
                <button type="submit" id="sub">Valider</button>
                <ul id="connexionLiens">
                    <li id="NewPassword"> <a href="/update">Mot de passe oublié ?</a></li>
                <li id="lien"><a id="lien_inscription" href="/inscription">Cliquez sur ce lien pour créer votre compte</a></li>
                </ul>
        </form>
<br>
</div>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/router/_footer.php'; ?>