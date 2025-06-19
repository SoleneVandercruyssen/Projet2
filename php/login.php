<?php 



?>
   <!-- Accés utilisateur et accés entreprise -->
    <div id="Forms">
    <div class="mirroir">
    <!-- Button switch : couleur -->
    <form action="" method="get" id="form1">   
    <h2>Connexion</h2>
        <div class="compte">
            <button type="button" id="private">Privé</button>
            <button type="button" id="public">Public</button>
        </div>
        <br>
                <label for="prenom" id="prenom"></label>
                <div class="face-to-face">
                <img src="./images/icons8-name-tag-24.png" id="identity" alt="icône Identifiant">
                <input type="text" name="prenom" placeholder="Identifiant">
                </div> 
                <br>
                <label for="password" id="password"></label>
                <div class="face-to-face" >
                <img src="./images/icons8-password-24.png" id="password" alt="icône password">   
                <input type="password" name="password" placeholder="Password">
                </div> 
                <br>
                <button type="submit" id="sub">Valider</button>
    </form>
<br>
</div>