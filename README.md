# <font color='red'> ![Quanticode](images/logo_1_Quanticode.png) </font>

 * Pour ce projet j'ai décidé de créer un site web responsive sur une entreprise nommée *Quanticode*. 
   Le site web mettra en avant les spécialités de l'entreprise ainsi qu'un accès à une Plateforme d'e-learning.


   > **Quanticode** est une entreprise spécialisée dans le **développement web** et **la formation professionnelle**. Nous accompagnons les entreprises
   > dans la création de sites performants et sur mesure, tout en formant des talents aux métiers du numérique : **SEO**, **DevOps**, **UX/UI Design**
   > et **développement web**.
   > Notre mission : allier innovation, pédagogie et expertise pour propulser les projets et les carrières digitales.
   > De plus notre entreprise met en place une plateforme e-learning pour ceux et celles qui souhaitent recevoir des cours gratuits et être au courant des prochains événements


 ## Fonctionnalités principales

- Présentation de l’entreprise et de ses services
- Plateforme d’e-learning avec gestion des utilisateurs (inscription, connexion, sessions)
- Téléchargement de cours au format PDF
- Gestion d’un calendrier d’événements (FullCalendar)
- Formulaire de contact avec envoi d’e-mail (Web3Form)
- Interface responsive (mobile & desktop)
- Administration basique (import/export de fichiers, gestion des utilisateurs)

---

## Technologies utilisées

- **Frontend** : HTML5, CSS3 (custom + Tailwind), JavaScript (modules)
- **Backend** : PHP 8+, PDO (MySQL/MariaDB)
- **Base de données** : MariaDB (SQL)
- **Envoi d’e-mails** : Web3Form
- **Gestion de projet** : Docker, Docker Compose
- **Autres** : FullCalendar, Fontes personnalisées, icônes

---

## Installation

### Prérequis

- Docker & Docker Compose installés

### Lancer le projet

``sh
docker-compose up --build 

* Le site sera accessible sur http://localhost:8087

Accès à phpMyAdmin 

* http://localhost:8093
* Utilisateur : root
* Mot de passe : root


##### Structure du projet

> /
> |__ config/              [blog_config.php]              # configuration
> |__ env/                 [.env]                         # variables d'environnements
> ├── fonts/               # Polices personnalisées
> ├── images/              # Images et icônes
> ├── JS/                  # Scripts JavaScript
> |__ router/              [_deconnexion.php],            # Page deconnexion
>                          [_footer.php],                 # Footer commun
>                          [captcha.php],
>                          [_csrf.php], 
>                          [_header.php],                 # Header commun
>                          [_mail.php], 
>                          [_pdo.php],                    # Connexion PDO
>                          [_routes.php],                 # Chemin des routes
>                          [_shouldBeLogged.php], 
>                          [index.php]                    # URL
>
> |__ router/pages/        [404.php],                     # Page erreur 404
>                          [contact.php],                 # Page contact
>                          [formation.php],               # Page formations
>                          [home.php],                    # Page d'accueil
>                          [inscription.php],             # Formulaire d’inscription
>                          [login.php],                   # Formulaire de connexion
>                          [logout.php],                  # Redirection déconnexion de plateforme.php
>                          [plateforme.php],              # Plateforme e-learning
>                          [send_message.php],            # Page envoie d'un message
>                          [update_profil],               # Update du profil
>                          [update.php]                   # Update du MDP
> ├── sql/                 # Scripts SQL (structure et données)
> ├── vendor/              # Librairies PHP (PHPMailer, Composer)
> |__ [.htaccess]
> ├── [compose.yaml]       # Docker Compose
> ├── [style.css]          # Styles > globaux
> ├── [contact.css]        # Styles page contact
> ├── [login.css]          # Styles page login
> ├── [plateforme.css]     # Styles plateforme e-learning
> ├── [update_profil.css]  # Styles update (Profil) 
> ├── [update.css]         # Styles page update (MDP) 
> ├── _mail                # Script d’envoi d’e-mail (PHPMailer)
> ├── dockerfile           # Dockerfile pour le service web
> └── [README.md](http://_vscodecontentref_/10)            # Ce fichier

### Auteurs

* Projet réalisé par Vandercruyssen Solène dans le cadre d’un exercice de développement web.

### Remarques

* Pour toute question ou bug, ouvrez une issue ou contactez l’auteur.
* Ce projet est un exemple pédagogique et peut être adapté à vos besoins.