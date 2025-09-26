<?php 
require_once __DIR__ . '/../_csrf.php';
require_once __DIR__ . '/../_pdo.php';
require_once __DIR__ . '/../_shouldBeLogged.php';

include $_SERVER['DOCUMENT_ROOT'] . '/router/_header.php';

shouldBeLogged(true, "/");
$db = connexionPDO(); 
$sql = $db->prepare("SELECT * FROM users WHERE idUser=?");
$sql->execute([(int)$_SESSION["user_id"]]);
$user = $sql->fetch();

$username = $password= $email = "";
$error = [];
$regexPassword= "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

if ($_SERVER['REQUEST_METHOD']=== 'POST' && isset($_POST['update'])) {
    // Si le champ est vide, je regarde lancien prénom
    if (empty($_POST['username'])) {
        $username = $user['username'];
    }
    else{
        $username = cleanData($_POST['username']);

        if (preg_match("/^[a-zA-Z'  -]{2,25}$/", $username)) {
            $error["username"] = "Votre nom d'utilisateur ne doit contenir que des lettres" ;
        }
    }//Fin vérification username
    // Si le champ est vide ou qu'il n'a pas changé, je garde l'ancien email


if(empty($_POST['email']) || $_POST["email"] === $user["email"]) {
    $email = $user['email'];
}
else {
    $email = cleanData($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = "Veuillez saisir une adresse email valide";
    }
    else
    {
        $sql = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $sql->execute([$email]);
        $user =$sql->fetch();
        if($user)
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
    if (empty($_POST["passwordBis"])) {
        $error["passwordBis"] = "Veuillez confirmer votre mot de passe";
    }
    elseif ($_POST["passwordBis"] !== $_POST["password"]) {
        $error["passwordBis"] = "Veuillez saisir le même mot de passe";
    }
    if (!preg_match($regexPassword, $password)) {
        $error["password"] = "Veuillez saisir un mot de passe plus complexe";
    }
    else{
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
}//Fin vérification password

if (empty($error)) {
    $sql = $db->prepare("UPDATE users SET username=:us, email=:em, password=:mdp WHERE idUser=:id");
    $sql->execute([
        "id"=>$user["idUser"],
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

    ?>
<h1>Mettre à jour mon profil</h1>
<form action="" method="post">
    <!-- username -->
    <label for="username">Nom d'Utilisateur :</label>
    <input type="text" name="username" id="username" value="<?php echo $user["username"] ?>">
    <span class="erreur"><?php echo $error["username"]??""; ?></span>
    <br>
    <!-- Email -->
    <label for="email">Adresse Email :</label>
    <input type="email" name="email" id="email" value="<?php echo $user["email"] ?>">
    <span class="erreur"><?php echo $error["email"]??""; ?></span> 
    <br>
    <!-- Password -->
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password">
    <span class="erreur"><?php echo $error["password"]??""; ?></span> 
    <br>
    <!-- password verify -->
    <label for="passwordBis">Confirmation du mot de passe :</label>
    <input type="password" name="passwordBis" id="passwordBis">
    <span class="erreur"><?php echo $error["passwordBis"]??""; ?></span> 
    <br>

    <input type="submit" value="Mettre à jour" name="update">
</form>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/router/_footer.php'; ?>

<!--  Qu'est ce que le CRUD ?
    Le "CRUD" est un accronyme signifiant 
        Create Read Update Delete.
    Cela représente ce que la majorité des tables d'une BDD a besoin.
        Create : Créer de nouvelles lignes dans notre table.
        Read : Lire et afficher les données de notre table. 
        Update : Mettre à jour les données de notre table. 
        Delete : Supprimer les données de notre table. -->

        