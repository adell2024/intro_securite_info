# sti3a : intro to information security

Pour le premier TD (prévoir de venir 5' plus tôt):

    installer gdb : sudo apt-get install gdb
    
    se rendre sur le site https://github.com/longld/peda : au milieu de la page,  vous avez les instruction pour installer cette extension PEDA à gdb
    
    vérifiez le fonctionnement de gdb
    
    créer un compte sur le site https://portswigger.net/web-security (création de compte vraiment facile et rapide)
    
    créer un compte sur Hack the Box

Pour les TD à venir (prévoir de venir 5' plus tôt)::

    Machine Kali : vérifier que les outils que j'ai mentionnés sont tous installés ( premier slide)
    
    Machine virtuelle metsploitable2 : https://sourceforge.net/projects/metasploitable/files/Metasploitable2/.
    dézipper La VM et la démarrer avec VmWare Workstation
    
    Machine virtuelle OWASP Broken Web Application : https://sourceforge.net/projects/owaspbwa/files/ ( version 1.2)

De préférence et dans la mesure de possible, venez avec vos ordi personnels (et prêts)

## Vous n'avez pas d'ordi perso et nous sommes dans une salle VDI

Installer docker.io

Installer l'image docker de Kali : sudo docker pull kalilinux/kali-rolling

Installer l'image docker de matsploitable2 : docker pull tleemcjr/metasploitable2

Créer un réseau virtuel pentest: sudo docker network create pentest

Dans un terminal séparé : sudo docker run --network=pentest -h victim -it --rm --name metasploitable2 tleemcjr/metasploitable2

Dans un terminal séparé : sudo docker run --network=pentest -h attacker -it --rm --name kalibox kalilinux/kali-rolling

Dans le container Kali : apt update, apt install net-tools, apt install nmap, etc...
