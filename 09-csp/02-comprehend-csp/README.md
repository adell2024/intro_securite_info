## Comprehend CSP


## On débute
Récupérer les deux pages login.php et welcome.php

Démarrer une serveur web (php -S IP:5000) par exemple

Vérifier que la méthode javascript "check()" est bien appelée lors de la saisie du password.


## Décommenter la ligne meta de login.php

Expliquer pour quelle raison la méthode check() est boquée.

Observez les messages de Chrome lors de l'appel de l'URl http://IP:5000/login.php

## Ajout d'une directive

Ajouez une nouvelle directive dans l'attribut "content" pour autoriser l'exécution de "check" et tout script embarqué dans la page HTML:
Replacez "XXXXXXXX" par la bonne valeur trouvée dans content="default-src 'none';  script-src 'XXXXXXXX';"

Vérifiez que l'appel à la fonction JS fonctionne cette fois

## Ajout d'une directive nonce

Remplacez la valeur prédédente trouvée de la directive script-src dans l'attribut content par :

content="default-src 'none';  script-src 'nonce-123ab345';"


