## SYN flood
Pour acquérir une expérience de première main sur l'attaque par inondation SYN, nous lancerons l'attaque dans un environnement de machines virtuelles. Pour une configuration idélae, trois VM seront nécessaires :
une appelée Client (192.168.180.155), une appelée Server (192.168.180.153), et l'autre appelé Attacker (192.168.180.136). 

Attacker vise à empêcher Client d'accèder à Server (Pour Server, j'ai utlisée la VM vulnérable metasploitable2).

Avant l'attaque, nous effectuons d'abord un telnet depuis la machine Client, et plus tard nous vérifierons si l'attaque par inondation SYN a affecté les nouvelles demandes de connexion.


## Etablissement de connexion : 3-ways handshake

![flood1](https://github.com/aabda2000/sti3a-security/assets/38082725/f44f0de0-aca0-4285-b6ca-afb559d17efb)

🚩 Un segment SYN ne peut pas transporter de données, mais il consomme un "sequence number".

🚩 Un segment SYN + ACK ne peut pas transporter de données, mais il consomme un "sequence number".

🚩 Un segment ACK, s’il ne transporte pas de données, ne consumera aucun  "sequence number"

🚩 Un segment FIN, s’il ne transporte pas de données, consumera un "sequence number"


## Attaque par SYN flood

![flood2](https://github.com/aabda2000/sti3a-security/assets/38082725/ce691b7e-a8b1-4cb3-8886-01c1ad5862ac)

l'état dans lequel le serveur attend le paquet ACK d'un client est appelé semi-ouvert (half-open) : Dans cet état, le serveur a préparé la communication avec un client en affectant un buffer de mémoire pour contenir les paquets entrants ainsi que les informations d'état. Sur un serveur, le nombre de connexions semi-ouvertes est est limité par des contraintes mémoire.

Le but de l'attaque par SYN Flood est de remplir la mémoire du serveur avec des connexions semi-ouvertes. Des adresses IP usurpées sont utlisées par le Hacker faisant un nombre important de demandes de connexion au serveur, et par conséquent, les clients légitimes ne peuvent plus se connecter au serveur, dont les ressources sont épuisées.

## Description de l'attaque

Sur le serveur "Server", nous devons désactiver une contre-mesure appelée cookies SYN, qui est activée par défaut. Cette contre-mesure est efficace contre l'inondation SYN flooding

user@Server:~$ sudo sysctl -w net.ipv4.tcp_syncookies=0

Avant de lancer l'attaque, vérifions la situation des connexions sur le serveur
user@Server:~$ netstat -tan -c

L'attaquant utlise netwox pour inonder Server:

sudo netwox 76 -i 192.168.180.153 -p 23 -s raw


Observez l'état des connexions sur le Server:
![flood3](https://github.com/aabda2000/sti3a-security/assets/38082725/b885b8d7-a55f-4d02-9b11-4a976d79f4f2)

SYN Flood est une forme d'attaque DoS dans laquelle les attaquants envoient de nombreuses requêtes SYN au port TCP d'une victime : les attaquants n'ont aucunemet l'intention de terminer la procédure de négociation à trois phases. Les attaquants utilisent des adresses IP usurpées. Grâce à cette attaque, les attaquants peuvent inonder la file d'attente de la victime quisera épuisée par les connexions semi-ouvertes.

Lorsque la file d'attente est pleine, la victime ne pourrait plus prendre de connexion. La taille de la file d'attente peut être paramétrée au niveau du système. Sous Linux, nous pouvons vérifier le paramètre à l'aide de la commande suivante : 

### sysctl -q net.ipv4.tcp_max_syn_backlog

