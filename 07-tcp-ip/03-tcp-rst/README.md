## TCP RST

L'attaque TCP RST peut mettre fin à une connexion TCP établie entre deux victimes.

## Comment détruire une connexion établie entre deux entités

![tcp2](https://github.com/aabda2000/sti3a-security/assets/38082725/b98f7940-63ac-44b6-acd0-249e6bbcea48)

Pour "casser" la connexion, l'attaquant doit forger un segment TCP RST destiné à l'une de des deux entités. Si une entité reçoit un segment RST avec un numéro de séquence "non attendu", elle le rejettera. Une attaque par TCP RST réussie nécessite donc un numéro de séquence "crédible".

## Cas d'étude

Client : 192.168.180.136

Server : 192.168.180.153

Le client se connecte en telnet à Server : telnet 192.168.180.153

Attacker : Any IP

L'attaquant supposé être dans cet exemple dans le même LAN que CLient&Server. Avec Wireshark, il a pu voir le traffic circulant entre les deux entitées. Voilà le dernier segment de l'échange:

![tcp3](https://github.com/aabda2000/sti3a-security/assets/38082725/9cbe965f-c71a-4551-9516-1d0907c68653)

La bôite netwox dispose de l'outil numéro 4 qui permet de forger des segments TCP à volonté. Pour bien mener l'attaque, l'attaquant doit insérer son segment RST avec un numéro de séquence cohérent. En étudiant le dernier échange, il voit que le prochain numéro de séquence envisagé par le client vaut: 122558572. Le port source du client est le port éphémére 33780. le port destination est le port standard telnet 23.

Attacker :

sudo netwox 40 -l 192.168.180.136 -m 192.168.180.153 -p 23 -o 33780 -B -q 122558572

Dans Wireshark, on voit passer le segment RST comme provenant du client 192.168.180.136:

![tcp4](https://github.com/aabda2000/sti3a-security/assets/38082725/ccdd8f8d-59d0-4677-8169-3a76dbe2f7b5)

et la connexion telnet brisée:

![tcp5](https://github.com/aabda2000/sti3a-security/assets/38082725/78ba4872-a387-48b6-beef-7387a27a37d2)

## Challenge

Utlisez et complétez le script python (fourni) pour rompre la connexion entre deux entités en communication.

