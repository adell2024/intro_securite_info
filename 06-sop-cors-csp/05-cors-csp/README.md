Explications des concepts illustrés

    CORS (Cross-Origin Resource Sharing) :
        Dans api.php, les en-têtes Access-Control-Allow-Origin et autres autorisent explicitement les requêtes de a.exemple.local.
        Si vous supprimez ou modifiez Access-Control-Allow-Origin (par exemple, en mettant * ou en le supprimant), le navigateur bloquera la requête, illustrant une violation CORS.
        Testez en modifiant Access-Control-Allow-Credentials à false pour voir l'impact sur les cookies.
    CSP (Content Security Policy) :
        Dans index.php, la CSP restreint les sources de scripts (script-src 'self') et les connexions (connect-src 'self' http://api.exemple.local).
        Essayez d'ajouter un script externe non autorisé (par exemple, <script src="https://exemple.com/script.js"></script>) pour voir le navigateur bloquer son chargement.
    SameSite (Cookies) :
        Le cookie user_token est défini avec SameSite=Lax et le domaine .exemple.local, ce qui le rend accessible à a.exemple.local et api.exemple.local.
        Changez samesite à Strict pour empêcher l'envoi du cookie dans la requête fetch (car c'est une requête cross-origin).
        Testez avec samesite=None; Secure pour autoriser l'envoi du cookie cross-origin, mais nécessitant HTTPS.
Instructions pour tester

    Configurer le serveur local :
        Configurez deux virtual hosts dans votre serveur (par exemple, Apache) pour a.exemple.local et api.exemple.local.
        Ajoutez au fichier hosts (par exemple, /etc/hosts sur Linux ou C:\Windows\System32\drivers\etc\hosts sur Windows) :
        text

    127.0.0.1 a.exemple.local
    127.0.0.1 api.exemple.local

Déployer les fichiers :

    Placez les fichiers de a.exemple.local (index.php, styles.css, script.js) dans le dossier correspondant (par exemple, /var/www/a.exemple.local).
    Placez api.php dans le dossier de api.exemple.local (par exemple, /var/www/api.exemple.local).

Accéder et tester :

    Ouvrez http://a.exemple.local dans un navigateur.
    Cliquez sur le bouton pour envoyer une requête à api.exemple.local.
    Vérifiez la réponse affichée et inspectez les en-têtes réseau dans les outils de développement du navigateur (F12).
    Modifiez les paramètres (CORS, CSP, SameSite) pour observer les comportements.

Démonstrations  :

    CORS : Supprimez Access-Control-Allow-Origin dans api.php pour provoquer une erreur CORS.
    CSP : Ajoutez un script non autorisé dans index.php pour voir le blocage.
    SameSite : Changez samesite à Strict ou None et observez si le cookie est envoyé dans la requête.

Résultat attendu

    La page sur a.exemple.local affiche un bouton. En cliquant, elle envoie un objet JSON à api.exemple.local, qui répond avec les données reçues et la valeur du cookie.
    Les en-têtes CORS permettent la communication, la CSP restreint les sources, et l'attribut SameSite contrôle le comportement du cookie.
