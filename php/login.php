<?php 

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=quanticode', 'user', 'motdepasse');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE prenom = ?');
    $stmt->execute([$prenom]);
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
    <!-- Accés utilisateur et accés entreprise -->
    <div id="Forms">
    <div class="mirroir">
    <!-- Button switch : couleur -->
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
                </div> 
                <br>
                <label for="password" id="password"></label>
                <div class="face-to-face" >
                <img src="./images/icons8-password-24.png" id="password" alt="icône password">   
                <input type="password" name="password" placeholder="Password" required>
                </div> 
                <br>
                <button type="submit" id="sub">Valider</button>
    </form>
<br>
</div>