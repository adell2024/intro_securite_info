# Objectifs: trouver les adresses des varibles:
libc_base_address,
ret,
pop_rdi,
binsh_addr,
system_addr,
exit_addr,

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

Comme vous l'avez compris, les décalages/offsets  que nous avons découverts ci-dessus seront ajoutés à l'adresse à laquelle la libc sera chargée. Étant donné que l'ASLR est désactivé, cette adresse sera la même à chaque exécution du programme vulnérable et peut être trouvée en examinant l'allocation mémoire du processus.


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

>> Initialisez une session GDB, importez le payload payload1 et procédez à une exécution pas à pas. Confirmez que toutes les adresses sont correctement configurées, mais notez que l'exécution complète aboutit à une violation de segmentation (segfault). Déterminez la fonction responsable de cette erreur.


## Alignement

Si nous déboguons le programme vulnérable en utilisant l'exploit mentionné ci-dessus et que nous plaçons un point d'arrêt à l'instruction de retour de la fonction, nous obtenons ce qui suit :

1 → RBP a été écrasé,
2 → l’instruction suivante (ret) va extraire l’adresse au sommet de la pile et la placer dans RIP,
3 → le gadget POP RDI ; RET sera exécuté, plaçant la chaîne "/bin/sh" dans le registre RDI.

Bien que tout fonctionne comme prévu, en laissant le programme continuer pas à pas , on arrive à l’instruction suivante :

movaps XMMWORD PTR .......

La convention d’appel 64 bits exige que la pile soit alignée sur 16 octets avant chaque instruction call, mais cette contrainte est facilement violée lors de l’exécution d’une chaîne ROP, ce qui entraîne un mauvais alignement de la pile pour tous les appels suivants effectués depuis cette fonction.

L’instruction movaps déclenche une erreur de protection générale (General Protection Fault) lorsqu’elle opère sur des données non alignées. Pour éviter cela, essayez d’ajouter un ret supplémentaire dans votre chaîne ROP avant de retourner dans une fonction, ou bien retournez plus loin dans la fonction afin de passer une instruction push.

On peut trouver une adresse contenant une instruction RET supplémentaire dans le fichier libc, en suivant exactement le même processus que pour trouver le gadget POP RDI ; RET (en utilisant ropper ou un outil similaire).

Le script final d’exploitation sera dans les exploits.py
