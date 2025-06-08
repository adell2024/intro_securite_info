<?php
// Définir un cookie pour le domaine exemple.local avec SameSite
setcookie('user_token', 'example_token_123', [
    'expires' => time() + 3600, // Expire dans 1 heure
    'path' => '/',
    'domain' => '.exemple.local', // Accessible à tous les sous-domaines
    'secure' => true, // Seulement via HTTPS
    'httponly' => true, // Non accessible via JavaScript
    'samesite' => 'Lax' // Peut être Strict ou None selon le test
]);

// Définir la Content Security Policy
header("Content-Security-Policy: default-src 'self'; script-src 'self'; connect-src 'self' http://api.exemple.local; style-src 'self';");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démonstration CORS, CSP, SameSite</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Démonstration CORS, CSP et SameSite</h1>
    <p>Cookie 'user_token' créé avec SameSite=Lax pour le domaine .exemple.local.</p>
    <button onclick="sendRequest()">Envoyer une requête à api.exemple.local</button>
    <div id="response"></div>
    <script src="script.js"></script>
</body>
</html>
