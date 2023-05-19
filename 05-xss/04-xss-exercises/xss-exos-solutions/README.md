### solutions to some xss exos

## Exo 3 : Injection dans un entête HTTP

Plusieurs solutions sont possibles. Une solution amusante est la suivante.

Analysons, d'abord, la requête http avec BurpSuite:

![xss4](https://github.com/aabda2000/sti3a-security/assets/38082725/5c7b9a51-f8cf-4f5d-8a86-fab341f296a5)

On remarque que le script gym.php a ajouté la chaîne "potatoes" à l'entête Set-Cookie de la réponse en créant le cookie XSS:

"Set-Cookie: XSS=potatoes".

Est-il possible d'injecter un code qui ajoutera un entête tout à fait légitime à HTTP de réponse? en principe oui, à condition de bien repecter la formation d'un entête de type "clé:valeur" séparé du précédent entête par \r\n.

Je tente cette injection:
<pre>
potatoes
Location: http://myweb.com
</pre>

J'encode ce paramètre correctement pour obtenir: p23=potatoes%0d%0aLocation:%20http://myweb.com

https://brutelogic.com.br/gym.php?p23=potatoes%0d%0aLocation:%20http://myweb.com

![xss5](https://github.com/aabda2000/sti3a-security/assets/38082725/1bd2f6e1-5202-46c1-aac1-3251343b2850)

Parfait, l'entête Location a été ajouté aux autres entêtes. Après un forward de BurpSuite: J'ai été dirigé vers le site myweb.com (rien de méchant):

![xss6](https://github.com/aabda2000/sti3a-security/assets/38082725/e115b5c0-2319-408b-9631-11e0729fbcca)

Exo 5 : Injection dans un lien hypertexte

Après injection de la chaîne proposée par l'exo: 

![xss7](https://github.com/aabda2000/sti3a-security/assets/38082725/87a9e664-9cc9-4194-b54b-700fd8ebedd9)

Donc la valeur de l'attribut href de l'élément <a> est la valeur passée en parmètre de l'URL.
  
Si on cherche à injecter une chaîne ainsi:https://brutelogic.com.br/gym.php?p21=<svg/onmouseover=alert(1)>, la valeur de href est vide cette fois: <a href="">...</a>.
Donc, la page gym.php utilise des fonction de validation PHP pour la chaîne injectée (FILTER_VALIDATE_URL Filter : https://www.w3schools.com/php/filter_validate_url.asp). 
pour duper le filtre, nous pouvons injecter une chaîne qui commence par "javascript:" : l'intéret est que le code qui vient après "javascript:" sera exécuté en cliquant sur le lien hypertexte <a>. Malheureusement, le filtre FILTER_VALIDATE_URL finit par nettoyer la chaîne à moins d'injecter une chaîne qui commence par "javascript://foo.com?" ou "javascript://c?",...bref une chaîne qui contient aussi "?"sinon elle sera filtrée!
  
voilà des injections qui marchent: 
https://brutelogic.com.br/gym.php?p21=javascript://c?%250D%250A%27%3Csvg/onmouseover=alert(2)%3E%27
(note: il faut cliquer sur le logo "KNOSS" qui clignote et passer le curseur sur l'espace blanc renvoyé=onmouseover)

https://brutelogic.com.br/gym.php?p21=javascript://c?%250D%250A%27\x3c\x73\x76\x67\x20\x6f\x6e\x6c\x6f\x61\x64\x3d\x61\x6c\x65\x72\x74\x28\x31\x29\x3e%27
  
  
 
  
  
 
  





