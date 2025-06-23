<?php 
require "./_csrf.php";
require "./_pdo.php";
require "./_shouldBeLogged.php";
require "./_header.php";
$error = [];

// session_start();
$pdo = new PDO('mysql:host=bddsql;dbname=quanticode', 'root', 'root');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['prenom'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: ./plateforme.html');
        exit;
    } else {
        echo "<p style='color:red;'>Identifiants incorrects</p>";
    }
}

?>

<!-- FORMULAIRE 1 : CONNEXION -->


    <!-- Accés utilisateur et accés entreprise -->
    <div id="Forms">
    <div class="mirroir">
    <form action="login.php" method="POST" id="form1">   
    <h2>Connexion</h2>
        <div class="compte">
            <button type="button" id="private">Privé</button>
            <button type="button" id="public">Public</button>
        </div>
        <br>
                <label for="prenom" id="prenom"></label>
                <div class="face-to-face">
                <img src="./images/icons8-name-tag-24.png" id="identity" alt="icône Identifiant">
                <input type="text" name="prenom" placeholder="Identifiant" required>
                <span class="erreur"><?php echo $error["username"]??""; ?></span>
                </div> 
                <br>
                <label for="password" id="password"></label>
                <div class="face-to-face" >
                <img src="./images/icons8-password-24.png" id="password" alt="icône password">   
                <input type="password" name="password" placeholder="Password" required>
                <span class="erreur"><?php echo $error["password"]??""; ?></span>
                </div> 
                <br>
                <button type="submit" id="sub">Valider</button>
    </form>
<br>
</div>

<!-- FORMULAIRE 2 : INSCRIPTION -->

<div class="mirroir">
<!-- ! Formulaire d'inscription -->
    <form action="" method="get" id="formulaire">
        <div class="compte">
            <h2>Inscription</h2>
        </div>
        <!-- <br> -->
                <label for="prenom" id="prenom"></label>
                <div class="face-to-face">
                <img src="./images/icons8-name-tag-24.png" id="identity" alt="icône Identifiant">
                <input type="text" name="prenom" placeholder="Identifiant">
                <span class="erreur"><?php echo $error["username"]??""; ?></span>
                </div> 
                <br>
                <label for="password" id="password"></label>
                <div class="face-to-face" >
                <img src="./images/icons8-password-24.png" id="mail_form" alt="icône mail">   
                <input type="mail" name="mail" placeholder="Paul@gmail.com">
                <span class="erreur"><?php echo $error["email"]??""; ?></span>
                </div> 
                <br>
                <button type="submit" id="sub2">Valider</button>
            </form>
</div>
</div>








































<?php 
require "./_footer.php";
?>