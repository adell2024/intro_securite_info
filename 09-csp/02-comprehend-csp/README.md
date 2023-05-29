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

Ajoutez le nonce au tag script. Décomentez la première ligne dans le script. voilà la page login.php finale:

![csp6](https://github.com/aabda2000/sti3a-security/assets/38082725/c8f0d089-dba4-43f7-b77d-57c6341fbe75)

Vérifier l'appel à la fonction "check()"

## script.js et style.css

La page login.php devient

![csp7](https://github.com/aabda2000/sti3a-security/assets/38082725/8286ad47-f26c-413e-a802-98167d033987)

Vérifiez que l'appel à la fonction JS fonctionne et la feuille de style est bien appliquée.



