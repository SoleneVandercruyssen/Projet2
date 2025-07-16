<?php 

// booléan à faux : n'active pas la mise en page du header de la page Plateforme 
$isPlateforme = false;

// variable : fond bleu
$pageBodyClass = 'blue';

// lien vers le header
include $_SERVER['DOCUMENT_ROOT'] . '/router/_header.php';
?>



<main class="background-contact" class="main-contact">
    <!-- Section MAP -->
    <section id="section" class="section1" >
    <div id="face-to-face">
        <div  class="desktop_mirror">
        <div id="map">
            <h2 id="Nous-trouver">Où nous trouver !</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d162519.69705728866!2d2.9913000390577893!3d50.47145029567714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d77942699c0f%3A0x662161a01a841aa0!2sAFCI%20Formation%20-%20Villeneuve-d&#39;Ascq!5e0!3m2!1sfr!2sfr!4v1747225313365!5m2!1sfr!2sfr" width="300" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div id="mobile_column">
        <div class="blanco">
        <div class="face-to-face-contact"   id="parking_desktop">
        <img src="./images/icons8-parking-60.png" id="parking" alt="icône parking">
        <p>Accès au parking gratuit</p>
        </div>
        <br>
        <div class="face-to-face-contact" id="handicap_desktop">
        <img src="./images/icons8-handicapé-100.png" id="handicap" alt="icône handicap">
        <p>Accès aux handicapés</p>
        </div>
        <br>
        <div class="face-to-face-contact"  id="local_desktop">
        <img src="./images/icons8-local-90.png" id="local" alt="icône local">
        <p>Adresse : 25 Rue de la Vague, Villeneuve D'Ascq </p>
        </div>
        </div>
        <br>
        </div>
        </div>

        <!-- FORMULAIRE -->
        <h2 id="Contact_title">Contactez-nous !</h2>
        
        <div id="form">
            <form action="https://api.web3forms.com/submit" method="post" id="form-contact">
                <!-- Pour web3form -->
                <input type="hidden" name="access_key" value="14eea2ca-f23e-40b7-9162-270fb9763a68">
                <label for="nom" id="nom"></label>
                <input type="text" name="nom" placeholder="Dupont" required> 
                <br>
                <label for="prenom" id="prenom"></label>
                <input type="text" name="prenom" placeholder="Lucas" required> 
                <br>
                <label for="ville" id="ville"></label>
                <input type="text" name="ville" placeholder="Lille" required> 
                <br>
                <label for="email" id="email"></label>
                <input type="email" name="email" placeholder="Dupont@gmail.com" required>
                <br>
                <textarea name="message" id="message" cols="30" rows="10" placeholder="Votre message..." required></textarea>
                <br>
                <button type="submit" id="sub">Envoyer</button>
            </form>
        </div>
        <!-- Fin du FORMULAIRE -->

    </div>

</section>
<img src="/images/icons8-flèche-haut.gif" alt="gif flèche vers le haut" id="gif-flèche">
</main>



<!-- <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
<script>
(function(){
    emailjs.init("TON_USER_ID"); // Remplace avec ton User ID EmailJS
})();

document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();

    emailjs.sendForm('TON_SERVICE_ID', 'TON_TEMPLATE_ID', this)
    .then(function() {
        document.getElementById("confirmation").innerText = "Message envoyé avec succès !";
    }, function(error) {
        document.getElementById("confirmation").innerText = "Erreur : " + JSON.stringify(error);
    });
});
</script> -->
<!-- Lien vers le footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/router/_footer.php'; ?>