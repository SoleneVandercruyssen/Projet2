# <font color='red'> ![Quanticode](images/logo_1_Quanticode.png) </font>

 * Pour ce projet j'ai décidé de créer un site web responsive sur une entreprise nommée *Quanticode*. 
   Le site web mettra en avant les spécialités de l'entreprise ainsi qu'un accès à une Plateforme d'e-learning.


   > **Quanticode** est une entreprise spécialisée dans le **développement web** et **la formation professionnelle**. Nous accompagnons les entreprises
   > dans la création de sites performants et sur mesure, tout en formant des talents aux métiers du numérique : **SEO**, **DevOps**, **UX/UI Design**
   > et **développement web**.
   > Notre mission : allier innovation, pédagogie et expertise pour propulser les projets et les carrières digitales.


 ## Fonctionnalités principales

- Présentation de l’entreprise et de ses services
- Plateforme d’e-learning avec gestion des utilisateurs (inscription, connexion, sessions)
- Téléchargement de cours au format PDF
- Gestion d’un calendrier d’événements (FullCalendar)
- Formulaire de contact avec envoi d’e-mail (PHPMailer)
- Interface responsive (mobile & desktop)
- Administration basique (import/export de fichiers, gestion des utilisateurs)

---

## Technologies utilisées

- **Frontend** : HTML5, CSS3 (custom + Tailwind), JavaScript (modules)
- **Backend** : PHP 8+, PDO (MySQL/MariaDB)
- **Base de données** : MariaDB (SQL)
- **Envoi d’e-mails** : PHPMailer (SMTP Gmail ou Mailtrap pour le dev)
- **Gestion de projet** : Docker, Docker Compose
- **Autres** : FullCalendar, Fontes personnalisées, icônes

---

## Installation

### Prérequis

- Docker & Docker Compose installés
- Accès à un serveur SMTP (Mailtrap pour le dev, Gmail/OVH/Infomaniak pour la prod)

### Lancer le projet

``sh
docker-compose up --build 

* Le site sera accessible sur http://localhost:8087

Accès à phpMyAdmin 

* http://localhost:8093
* Utilisateur : root
* Mot de passe : root


#### Configuration de l’envoi d’e-mails


* Pour le développement, configurez PHPMailer avec Mailtrap (voir fichier _mail).
* Pour la production, utilisez le SMTP de votre fournisseur (Gmail, OVH, etc.) et un mot de passe d’application si besoin.



##### Structure du projet

> /
> ├── html/                # Pages statiques HTML
> ├── JS/                  # Scripts JavaScript
> ├── images/              # Images et icônes
> ├── fonts/               # Polices personnalisées
> ├── sql/                 # Scripts SQL (structure et données)
> ├── vendor/              # Librairies PHP (PHPMailer, Composer)
> ├── [style.css](http://_vscodecontentref_/0)            # Styles > globaux
> ├── [contact.css](http://_vscodecontentref_/1)          # Styles page contact
> ├── [login.css](http://_vscodecontentref_/2)            # Styles page login
> ├── [plateforme.css](http://_vscodecontentref_/3)       # Styles plateforme e-learning
> ├── [_header.php](http://_vscodecontentref_/4)          # Header commun
> ├── [_footer.php](http://_vscodecontentref_/5)          # Footer commun
> ├── [_inscription.php](http://_vscodecontentref_/6)     # Formulaire d’inscription
> ├── [login.php](http://_vscodecontentref_/7)            # Formulaire de connexion
> ├── [plateforme.php](http://_vscodecontentref_/8)       # Plateforme e-learning
> ├── _mail                # Script d’envoi d’e-mail (PHPMailer)
> ├── dockerfile           # Dockerfile pour le service web
> ├── [compose.yaml](http://_vscodecontentref_/9)         # Docker Compose
> └── [README.md](http://_vscodecontentref_/10)            # Ce fichier

### Auteurs

* Projet réalisé par Vandercruyssen Solène dans le cadre d’un exercice de développement web.
  
### Remarques

* Pour toute question ou bug, ouvrez une issue ou contactez l’auteur.
* Ce projet est un exemple pédagogique et peut être adapté à vos besoins.