## HTTP Response Splitting

HTTP Response Splitting est une forme de vulnérabilité d'application Web, résultant de l'échec de l'application ou de son environnement à nettoyer correctement les valeurs entrées par un utlisteur : Cette vulnérabilité Web  permet à un attaquant d'injecter des caractères CRLF (%0d%0a) dans une réponse HTTP. On parle de vulnérabilités de type CRLF(\r\n).Cela permet à l'attaquant de forcer le serveur à envoyer (sur le fil) des données qui seront interprétées comme 2 messages de réponse HTTP.

une seule requête HTTP--> 2 réponses HTTP

Si  une donée entrée est reflétée dans un en-tête de réponse, alors une injection CRLF est possible :

CRLF --> Http Response Splitting--> XSS

CRLF--> Header Injection (--> redirection

## La vulnérabilité 

Une application qui intègre les données utilisateur dans les en-têtes de réponse HTTP (par exemple, Location, Set-Cookie) sans les assainir!

## Exemple de requête/réponse HTTP:

![request1](https://github.com/aabda2000/sti3a-security/assets/38082725/9701cf10-293c-4c8e-bec4-fdf607f3e984)

![response](https://github.com/aabda2000/sti3a-security/assets/38082725/7152bc21-5c78-4fd6-9fb2-0dd4b0939729)

# Scenario d'attaque et empoisonnement du cache web

![hrs4](https://github.com/aabda2000/sti3a-security/assets/38082725/40273ce5-30e3-4fe3-b483-91ddf3bb0d69)

## Etude de cas
Pour réaliser (et étudier) cette attaque HRS, on emploie la suite BurpSuite. La machine vulnérable cible est la fameuse VM "OWASP Broken Web Apps".

L'application web vulnérable, objet de cette attaque est l'application web (java) webgoat:

![hrs1](https://github.com/aabda2000/sti3a-security/assets/38082725/4240387c-ce1f-43f4-a518-4d86a2cd560b)





La chaîne à injecter dans le champ "search by country" :

![hrs3](https://github.com/aabda2000/sti3a-security/assets/38082725/6623e37d-8e45-499d-95a7-42e9ebe73650)

Pour pouvoir la recopier, voilà la chaîne au format texte:

Content-Length: 0

HTTP/1.1 200 OK

Content-Type: text/html

Content-Length: 61

Last-Modified: Fri, 30 Dec 2025 17:32:47 GMT

<html><script>alert("stealing your data:")</script></html>

## Encodage

Le site http://yehg.net/encoding/ permet d'encoder correctement la chaîne à injecter: En effet, c'est la chaîne encodée qui sera injectée dans le formulaire. voilà la chaîne dans le bon format (bouton encodeURIComponenent et decodeURIComponent)

![hrs2](https://github.com/aabda2000/sti3a-security/assets/38082725/ddf8f780-a241-48ac-9849-44f741e0b352)
