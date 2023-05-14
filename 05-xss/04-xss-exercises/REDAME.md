## Gymnastique XSS

Une série d'exercises XSS pour muscler vos connaissance en Cross-Site Scripting

### Exo 1 : Injecter dans le tag "title" de la page

https://brutelogic.com.br/gym.php?p01=title

idée: l'injection est possible : si je mets le paramètre p01 à toto, cette dernière est reflétée par la page web.


![title](https://github.com/aabda2000/sti3a-security/assets/38082725/d44e7975-45e9-40b6-8888-f1a185d93660)


Essayez : p01=</title><svg/onload=alert(1)>
