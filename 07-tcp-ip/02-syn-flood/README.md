## SYN flood
Pour acquérir une expérience de première main sur l'attaque par inondation SYN, nous lancerons l'attaque dans un environnement de machines virtuelles. Pour une configuration idélae, trois VM seront nécessaires :
une appelée Client (10.0.2.68), une appelée Server (10.0.2.69), et l'autre appelé Attacker (10.0.2.70). 

Attacker vise à empêcher Client d'accèder à Target.

Avant l'attaque, nous faisons d'abord un telnet de la machine Client, et plus tard nous vérifierons si l'attaque par inondation SYN affecte les  demandes de connexions suivantes.


## Etablissement de connexion : 3-ways handshake

![flood1](https://github.com/aabda2000/sti3a-security/assets/38082725/f44f0de0-aca0-4285-b6ca-afb559d17efb)

🚩 Un segment SYN ne peut pas transporter de données, mais il consomme un "sequence number".

🚩 Un segment SYN + ACK ne peut pas transporter de données, mais il consomme un "sequence number".

🚩 Un segment ACK, s’il ne transporte pas de données, ne consumera aucun  "sequence number"

🚩 Un segment FIN, s’il ne transporte pas de données, consumera un "sequence number"


## Attaque par SYN flood

![flood2](https://github.com/aabda2000/sti3a-security/assets/38082725/ce691b7e-a8b1-4cb3-8886-01c1ad5862ac)

l'état dans lequel le serveur attend le paquet ACK d'un client est appelé semi-ouvert (half-open) : Dans cet état, le serveur a préparé la communication avec un client en affectant un buffer de mémoire pour contenir les paquets entrants ainsi que les informations d'état. Sur un serveur, le nombre de connexions semi-ouvertes est est limité par des contraintes mémoire.
