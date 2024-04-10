## Objectifs : 
>> identifiez la vulnérabilité dans le programme classic.c.
- Exploitez cette vulnérabilité (injection d'un code malicieux sous la forme d'un shell)
- Outils : gdb-peda, readelf, file, checksec, objdump, strings, strace, hexdump

Pour cet exercise on désactive le mécanisme ASLR

>> Pour exploiter la faille de classic.c et obtenir un shellcode :

- Générer le payload avec exploit3.python : la taile du payload est de 110 octets
- Lancer l'exploit et obtenir un shell: (cat payload; cat) | ./classic
- Note: il faut modifer l'adresse de retour dans exploit3.py en fonction de vos adresses
- Si l'attaque ne marche pas: ouvrir une session gdb de débogage pour analyser pas à pas l'injection: gdb$ r < <(cat payload)
  

## Challenges  (dossier challenges):
>> vuln : une fonction qui manque à l'appel

>> even-password : cracker le mot de passe (facile)

>> Outils : gdb-peda, readelf, file, checksec, objdump, strings, strace, hexdump

## Challenge de la mort :
>> weird-password : cracker le mot de passe

- Hint : (kali㉿kali)- python -c 'import sys; sys.stdout.buffer.write(b"\x20"*4 + b"\x41")' 
