xss via http headers

![xss-cookie-source](https://user-images.githubusercontent.com/38082725/236705431-90baee9d-cebc-4f98-9189-60d7c92392b4.png)


A partir de votre navigateur, demandez la page https://brutelogic.com.br/lab/welcome.php

A partie d'un terminal linux, utlisez curl pour demander la page welcome.php :
![HIT](https://user-images.githubusercontent.com/38082725/236705956-567e642d-3d3c-47b6-b04b-9d5d57145ab4.png)

Noter comment la valeur de l'entête x-sucuri-cache passe,après 3 appels à curl, de "MISS" à "HIT"

