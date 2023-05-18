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

