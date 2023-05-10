Return 2 libc

Le binaire est compilé avec le flag NX activé (moyen de protection par le noyau rendant la pile non exécutable)


![ret1](https://github.com/aabda2000/sti3a-security/assets/38082725/a7908f53-49b0-4ed9-8a84-5e8b42212306)


## Comment retourner à libc ?
Ici, l'objectif est de détourner le flot d'exécution normal du processus : Il s'agit de le rediriger pour exéuter la fonction system de libc:
int system(const char *command). 

plus précisément, on voudrait exécuter l'instruction : system("/bin/sh")

## Gadget poprdi ?

On commence notre investigation par la recherche d'un gadget de type pop rdi (il faut d'abord faire un break et ensuite lancer le programme):


![ret2](https://github.com/aabda2000/sti3a-security/assets/38082725/b24826df-0697-4033-baf7-e3a3d395324a)

sinon, vous pouvez cherchez ce gadget en fournissant les adresses de début et de fin de mappage de libc:

![ret3](https://github.com/aabda2000/sti3a-security/assets/38082725/50c7c117-e152-4260-a75e-13440038dfa0)


gdb-peda$ ropsearch "pop rdi ; ret" 0x00007ffff7dee000 0x00007ffff7faf000

ou

gdb-peda$ dumprop

ou

gdb-peda$ asmsearch "pop rdi ; ret"

