## Gymnastique XSS

Une série d'exercises XSS pour muscler vos connaissance en Cross-Site Scripting (XSS).

Aucun secret pour devenir agile en XSS : il faut pratiquer , pratiquer, .....

### Exo 1 : Injecter dans le tag "title" de la page

https://brutelogic.com.br/gym.php?p01=title

idée: l'injection est possible : si je mets le paramètre p01 à toto, cette dernière est reflétée par la page web.


![title](https://github.com/aabda2000/sti3a-security/assets/38082725/d44e7975-45e9-40b6-8888-f1a185d93660)


Essayez : p01=</title><svg/onload=alert(1)>

### Exo 2 : Injection filtrée par un gestionnaire d'événements

https://brutelogic.com.br/gym.php?p04=toto

Idée : inspecter la source de la page et analyser le tag body contenant l'attribut onload="doSomething('toto')

### Exo 3 : Injection dans un entête HTTP

https://brutelogic.com.br/gym.php?p23=toto
  
Idée : Utiliser Burp Suite pour observer les entêtes de la réponse HTTP

### Exo 4 : Injection URL 

https://brutelogic.com.br/gym.php

Idée : On parle d'injection URL : et si on regarde le formulaire de la page et son attribut action 

&lt;form action="/gym.php" method="POST"&lgt;
  
....
  


