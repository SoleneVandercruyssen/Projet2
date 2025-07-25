<?php 

$pageBodyClass = 'white'; 
include $_SERVER['DOCUMENT_ROOT'] . '/router/_header.php'; 

$error = [];

$pdo = new PDO('mysql:host=bddsql;port=3306;dbname=quanticode', 'root', 'root');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'register') {
    $username = $_POST['prenom'] ?? '';
    $email = $_POST['mail'] ?? '';
    $password = $_POST['password'] ?? '';

    // Vérifie que les champs ne sont pas vides
    if ($username && $email && $password) {
        // Hachage du mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insertion dans la base
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        if ($stmt->execute([$username, $email, $hashedPassword])) {
            echo "Inscription réussie, vous pouvez vous connecter.";
        } else {
            echo "Erreur lors de l'inscription.";
        }
    } else {
        echo "Tous les champs sont obligatoires.";
    }
}
?>



<!-- FORMULAIRE 2 : INSCRIPTION -->

<div class="mirroir">

<!-- Je n'ai rien dans action pour que la requête puisse aller vers le fichier PHP.-->
    <form action="" method="post" id="formulaire">
    <input type="hidden" name="action" value="register">
    <h2 id="inscription">Inscription</h2>

    <label for="prenom"></label>
    <div class="face-to-face">
        <img src="/images/icons8-name-tag-24.png" id="name" alt="icône Identifiant">
        <input type="text" name="prenom" placeholder="Prénom">
        <span class="erreur"><?php echo $error["username"]??""; ?></span>
    </div> 
    <br>
    <label for="mail"></label>
    <div class="face-to-face">
        <img src="/images/icons8-courrier-50.png" id="mail_form1" alt="icône mail">   
        <input type="email" name="mail" placeholder="Paul@gmail.com">
        <span class="erreur"><?php echo $error["email"]??""; ?></span>
    </div> 
    <br>
    <label for="password"></label>
    <div class="face-to-face">
        <img src="/images/icons8-password-24.png" alt="icône password" id="img_password">
        <input type="password" name="password" placeholder="Mot de passe">
        <span class="erreur"><?php echo $error["password"]??""; ?></span>
    </div>
    <br>
    <button type="submit" id="sub2">Valider</button>
    <ul>
        <li id="lien2"><a id="lien_retour" href="/login">Retour</a></li>
    </ul>
</form>
</div>
</div>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/router/_footer.php'; ?>