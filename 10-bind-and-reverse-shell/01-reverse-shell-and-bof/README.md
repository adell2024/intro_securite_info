## Reverse shell and BufferOverflow

L'attaque par reverse shell est une technique "facile" à mettre en œuvre et elle est assez amusante à essayer! Cette ataque tire profit d'une vulnérabilité de type buffer overflow. 

 Les outils  :

    Attacker : msfvenom de metasploit framework (MSF de Kali)
    attacker: netcat
    Victim : une application vulnérable

## La VM Kali de l'attaquant:

On démarre netcat sur le port 4444 

![reverse1](https://github.com/aabda2000/sti3a-security/assets/38082725/cada8c28-2033-4cb5-9dea-1172cf78d633)

## Sur la VM Victim :

Où l'on suppose avoir installé le programme vulnérable au débordement de tampon (Buffer Overflow). Un petit programme en C fera l'affaire : 

#include <stdio.h

#include <unistd.h>

/* Compile: gcc -fno-stack-protector -z execstack demo_msf.c -o demo_msf -g */

int vuln(){

    char buffer[600];
    
    int characters_read;
    
        //printf("bufer =%p\n",buffer);
        
    printf("Enter message:\n");
    
    characters_read = read(0, buffer, 1000);
    
    printf("You entered: %s", buffer);
    
    return 0;
}

void main(){

    vuln();
    
        //atterissage après retour de vuln  
}


## Principe

Sur la machine Kali, l'attaquant génère un shell code inversé: un binaire qui permettra, un fois injecté dans le programme vulnérable, de se connecter au serveur netcat de l'attaquant en offrant un shell sur la Victime. Ce binaire doit être paramétré avec l'adresse IP de Kali et le numéro de port 4444.

La machine Kali dispose d'un outil permettant de générer ce shell inversé: 

![reverse2](https://github.com/aabda2000/sti3a-security/assets/38082725/429bb3c6-888a-4052-a535-2a8c01173691)


## L'attaque

Le script python suivant créera la charge utile à injecter dans le programme vulnérable:
![reverse3](https://github.com/aabda2000/sti3a-security/assets/38082725/7494cba7-e15f-47f1-b627-15f5e8175a41)

sur Kali, l'attaquant tape la commande suivante: python2 demo_msf.py > payload

Le fichier payload contiendra la charge à injecter au programme vulnérable.

On suppose que l'on ait réussi (d'une manière ou d'une autre) à convaincre un utilisateur sur la VM Victime d'injecter le code vérolé (par ingéniérie sociale ou autre duperie): 

![reverse4](https://github.com/aabda2000/sti3a-security/assets/38082725/85d91a0f-b6a5-4ecf-9d70-8b163e9cb74c)


Immédiatement sur Kali, l'attaquant constate qu'une connexion s'est établie entre lui et la victime :

![reverse5](https://github.com/aabda2000/sti3a-security/assets/38082725/e5fe699a-8445-44de-8394-7a1629f7b062)

