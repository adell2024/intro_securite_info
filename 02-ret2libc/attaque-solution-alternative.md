objectifs: trouver les adresses des varibles:
libc_base_address
ret
pop_rdi
binsh_addr
system_addr
exit_addr

Installer ropper : 

Ropper est principalement écrit en Python. 

Il s'agit d'un outil open-source pour l'analyse de fichiers binaires et la recherche de gadgets ROP (Return-Oriented Programming), développé par Alexander Margaritov

sudo apt update ; sudo apt install ropper

lancer ropper: ropper (Entrée)

pop_rdi :

![poprdi gadget](https://raw.githubusercontent.com/adell2024/intro_securite_info/master/02-ret2libc/images/poprdi.png)


binsh_addr :

❯ strings -a -t x /usr/lib/x86_64-linux-gnu/libc.so.6 | grep /bin/sh

 1d8678 /bin/sh

system_addr :

❯ readelf -s  /usr/lib/x86_64-linux-gnu/libc.so.6 | grep system

  1481: 0000000000050d70    45 FUNC    WEAK   DEFAULT   15 system@@GLIBC_2.2.5

exit_addr:

❯ readelf -s  /usr/lib/x86_64-linux-gnu/libc.so.6 | grep exit

2760: 00000000000455f0    32 FUNC    GLOBAL DEFAULT   15 exit@@GLIBC_2.2.5







