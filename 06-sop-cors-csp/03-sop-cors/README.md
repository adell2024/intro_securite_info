## SOP CORS : PREFLIGHT REQUEST

Une requête de pré-vérification (preflight) cross-origin CORS est une requête de vérification faite pour contrôler si le protocole CORS est autorisé. Le navigateur construit,sous certaines conditions, des requêtes preflight destinées au serveur web avant d'envoyer la vraie requête. https://developer.mozilla.org/fr/docs/Glossary/Preflight_request

## Etude de cas

a) Récupérer les deux pages: page4.php et hello_from_different_origin.php

b) démarrer deux serveur web: le premier écoutant, par exemple, sur le port 5000 et le deuxième sur le port 8000


Analysez le contenu de la page web pag4.php: la requête asynchrone ajax fabrique un entête personnalisé ("Header-Custom-TizenCORS").Pour cette raison le navigateur fabrique une requête de pré-vérification (==OPTIONS) avant d'envoyer la vraie requête GET.

Avec les outlis web de Chrome: 

![preflight1](https://github.com/aabda2000/sti3a-security/assets/38082725/225eaf4f-8bee-4820-9132-fd41bd269670)


![preflight2](https://github.com/aabda2000/sti3a-security/assets/38082725/58948df8-99ef-4ab4-a0c5-0e5bf454c38d)

