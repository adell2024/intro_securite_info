## TCP Session Hijacking

L'objectif de l'attaque TCP Session Hijacking est de détourner une connexion TCP existante (session) entre deux victimes en injectant des contenus malveillants dans cette session.Dans la mesure où le contrôle d'authentification s'effectue uniquement à l'ouverture de la session, un pirate réussissant cette attaque parvient à prendre possession de la connexion pendant toute la durée de la session.

##Cas d'étude

 Pour cette attaque de vol de session, on aura des outils suivants:

    netwox
    wireshark
    netcat

L'attaque peut se faire en utilisant une seule machine; J'ai employé 3VMs:

    VM pour le serveur (IP=192.168.109.14)
    VM pour la victime (ou utilisateur) d'adresse IP 192.168.109.68
    VM pour l'attaquant d'adresse IP=IP 192.168.109.16

J'ai installé netwox et wireshark sur la machine de l'attaquant (une Debian 11).

Sur la machine serveur, j'ai installé un programme serveur (un programme C qui démarre un processus écoutant sur le port 9090) ; vous pouvez sans problème utiliser netcat pour lancer votre serveur.

La VM de la victime utilise netcat ent tant que client pour se connecter au serveur. 

L'attaquant commence par espionner la session de la victime; ensuite il envoie des paquets TCP forgés. Le serveur ne fera de différence entre les paquets forgés et les paquets légitimes.

Dans cet exercice, je forgerai un paquet immédiatement après l'établissement d'une connexion entre la victime et le serveur : 

