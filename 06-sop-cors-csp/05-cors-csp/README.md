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
