## Gymnastique XSS

Une série d'exercises XSS pour muscler vos connaissance en Cross-Site Scripting (XSS).

Aucun secret pour devenir agile en XSS : il faut pratiquer , pratiquer, .....

## Carctères spéciaux

Carriage return (\r): %0d || Linefeed (\n): %0a || %25 : % || %26 : & || &apos = %26apos; : ' ||
%20 : (space) || %23 : "

### Exo 1 : Injection dans le tag "title" de la page

https://brutelogic.com.br/gym.php?p01=title

idée: l'injection est possible : si je mets le paramètre p01 à toto, cette dernière est reflétée par la page web.


![title](https://github.com/aabda2000/sti3a-security/assets/38082725/d44e7975-45e9-40b6-8888-f1a185d93660)


### Exo 2 : Injection filtrée par un gestionnaire d'événements

https://brutelogic.com.br/gym.php?p04=toto

Idée : inspecter la source de la page et analyser le tag body contenant l'attribut onload="doSomething('toto')

### Exo 3 : Injection dans un entête HTTP

https://brutelogic.com.br/gym.php?p23=toto
  
Idée : Utiliser Burp Suite pour observer les entêtes de la réponse HTTP

### Exo 4 : Injection URL 

https://brutelogic.com.br/gym.php

Idée : On parle d'injection URL : et si on regarde le formulaire de la page et son attribut action 

&lt;form action="/gym.php" method="POST"&gt;
  
....

### Exo 5 : Injection dans un lien hypertexte 

https://brutelogic.com.br/gym.php?p21=https://www.google.com/search?q=brutelogic

Idée: Observer le code source de la page ; répérer la zone contenant
<script src="/file.js"></script>

<a href="https://www.google.com/search?q=brutelogic"><div id="k"></div></a>

Injecter votre code en suivant le format de la donnée fournie au paramètre p21

### Exo 6 : Injection dans le tag <script>
  
https://brutelogic.com.br/gym.php?p12=bbbbbbbbbbbbbbbb

Idée: cherchez la chaîne bbbbbbbbbbbbbbbbb dans le code source de la page.fermer le tage script (</script>)

### Exo 6 : Injection DOM

https://brutelogic.com.br/gym.php?p25=RocksRocksRocksRocksRocksRocks

Idée : Consultez le code source de la page : Cherchez la chaîne RocksRocksRocksRocksRocksRocks (valeur du paramètre p25)

