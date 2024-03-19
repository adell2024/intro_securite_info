## Objectifs : 
>> identifiez la vulnérabilité dans le programme classic.c.
- Exploitez cette vulnérabilité (injection d'un code malicieux sous la forme d'un shell)
- Outils : gdb-peda, readelf, file, checksec, objdump, strings, stracev, hexdump

>> pour l'exploit exploit3.py :

- désactiver le ASLR
- Générer le payload
- Lancer l'exploit : (cat payload; cat) | ./classic

## Challenges  (dossier challenges):
>> vuln : une fonction qui manque à l'appel

>> even-password : cracker le mot de passe (facile)

## Challenge de la mort :
>> weird-password : cracker le mot de passe

- Hint : (kali㉿kali)- python -c 'import sys; sys.stdout.buffer.write(b"\x20"*4 + b"\x41")' 
