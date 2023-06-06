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

1️⃣ Principe de vol de session
L'attaquant commence par espionner la session de la victime; ensuite il envoie des paquets TCP forgés. Le serveur ne fera de différence entre les paquets forgés et les paquets légitimes.

Dans cet exercice, je forgerai un paquet immédiatement après l'établissement d'une connexion entre la victime et le serveur. Par exemple, sur la figure, le prochain paquet attendu par le serveur a pour numéro de séquence = 8001 (le paquet numéro 8001 envoyé par le client de type ACK ne consomme aucun octet, pour cette raison l'attaquant doit forger un paquet avec le même numéro).
![tcp6](https://github.com/aabda2000/sti3a-security/assets/38082725/e199bb78-611f-431d-8c99-86ea3dfa6af9)

2️⃣ l'attaque

On lance wireshark
sur le serveur on lance le programme: ./server ( démarre un processus sur le port 9090)

le fonctionnement de ce programme est simple: il fait un écho de la chaîne envoyée par la victime + le nombre d'octets reçus (c'est tout).

sur la VM de la victime: nc 192.168.109.14 9090 (avec cette commande la victime établit une connexion avec le serveur).

![tcp7](https://github.com/aabda2000/sti3a-security/assets/38082725/e5d814fb-2fe2-40a9-bcda-ecb5335b9f74)

