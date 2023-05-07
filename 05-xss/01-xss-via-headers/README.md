XSS via http headers

![xss-cookie-source](https://user-images.githubusercontent.com/38082725/236705431-90baee9d-cebc-4f98-9189-60d7c92392b4.png)


A partir de votre navigateur, demandez la page https://brutelogic.com.br/lab/welcome.php

A partir d'un terminal linux, utlisez curl pour demander la page welcome.php :

![HIT](https://user-images.githubusercontent.com/38082725/236705956-567e642d-3d3c-47b6-b04b-9d5d57145ab4.png)

Noter comment la valeur de l'entête x-sucuri-cache passe,après 3 appels à curl, de "MISS" à "HIT" : le serveur de cache (CDN ou WAF) qui s'interpos entre le client et le serveur web a fini par cacher votre requête http qui correspond à l'url https://brutelogic.com.br/lab/welcome.php?x=titi

Pour empoisonner le cache et ainsi tromper les autres clients, injectons dans l'entête http une cookie ayant pour valeur insa:

curl --cookie "name=insa" https://brutelogic.com.br/lab/welcome.php?x=lolololo

Réponse du serveur :
<!DOCTYPE html>
<body>
<p>Welcome, insa!</p>
</body>
</html>

A partir du navigateur, demander le même URL : https://brutelogic.com.br/lab/welcome.php?x=lolololo
La navigateur affiche :
Welcome, insa!



