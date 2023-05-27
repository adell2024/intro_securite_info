## Comprehend CSP


## On débute
Récupérer les deux pages login.php et welcome.php

Démarrer une serveur web (php -S IP:5000) par exemple

Vérifier que la méthode javascript "check()" est bien appelée lors de la saisie du password.


## Décommenter la ligne meta de login.php

Expliquer pour quelle raison la méthode check() est boquée.

Observez les messages de Chrome lors de l'appel de l'URl http://IP:5000/login.php

## Ajout de la directive 'unsafe-inline'

Ajouez une nouvelle directive dans l'attribut "content" pour autoriser l'exécution de "check" et tout script embarqué dans la page HTML:
Replacez 'XXXXXXXX' par "unsafe-inline" dans: content="default-src 'none';  script-src 'XXXXXXXX';"

Vérifiez que l'appel à la fonction JS fonctionne cette fois. 

## Ajout de la directive nonce

Remplacez la valeur prédédente de la directive script-src dans l'attribut content par :
<code>
content="default-src 'none';  script-src 'nonce-123ab345';"
</code>

Ajoutez le nonce au tag script. Décomnentez la première ligne dans le script. voilà la page login.php final:
<code>
<script nonce='123ab345'>
    document.getElementById("password").onkeyup = check; //décommentez cette ligne
    function check() {
        var password = document.getElementById("password").value;
        alert(password);
    }
</script>
</code>
