SOP :Same Origin Policy
Le "Same origin policy" est un mécanisme de sécurité présent dans les navigateurs Web. Ce mécanisme empêche une origine (un site Web) d’interagir avec les données d’une autre origine. Une origine correspond à un protocole, un port et un hôte.

Historiquement le SOP date des années 90. Pour bien comprendre d'où vient ce terme "SOP", prenons l'exemple historique qui a déclenché la problématique de sécurité liée au concept d'origine:

# 1er Essai
Dans votre navigateur, allez visiter la page "https://cas.insa-cvl.fr/cas/login" en activant les devtools:

![cors2](https://github.com/adell2024/intro_securite_info/assets/159798073/73b37231-999d-4c57-a060-8830ae1991e7)
dans la console du navigateur,tapez : newwin=window.open("https://ncatlab.org","mynewwindow"). Observez la réaction du naviagteur

![cors3](https://github.com/adell2024/intro_securite_info/assets/159798073/2a489209-7487-4c45-b03f-8b79abbbd9ff)

Toujours dans la console, tapez : newin. Les propriétes de cet objet s'afficheront:

![cors4](https://github.com/adell2024/intro_securite_info/assets/159798073/5685f0d0-9661-4fe4-a82a-af744c6ced94)

Si je cherche à accéder au site "https://ncatlab.org", et plus particulièrement à "body", avec "newwin.document.body",le navigateur m'empêchera:

![cors5](https://github.com/adell2024/intro_securite_info/assets/159798073/ee4d4731-18d5-4bd4-a617-0022976cfcd9)

Le message est clair: "Uncaught DOMException: Permission denied to access property "document" on cross-origin object'

Et l'expression "cross-origin" est prononcée! C'est bien clair, je ne peux accéder,ici, à https://ncatlab.org à partir d'une origine différente.

# 2ème Essai
Toujours dans le naviageteur et dans l'onglet "inspecteur", je voudrais injecter une balise "iframe" dans le code HTML de la page d'accueil du site https://cas.insa-cvl.fr/cas/login:

<iframe src="https://ncatlab.org" title="W3Schools Free Online Web Tutorials"></iframe> :


![cors6](https://github.com/adell2024/intro_securite_info/assets/159798073/6a8de0ea-0585-40e1-a804-1d9a18c5b1e5)

En réponse à cette injection, FireFox réagit immédiatement:

![cors7](https://github.com/adell2024/intro_securite_info/assets/159798073/4199be0d-acdf-4eb6-9b72-49e145870d92)

En basculant dans l'onlget "réseau":

![cors8](https://github.com/adell2024/intro_securite_info/assets/159798073/5455f7dd-f48a-409d-8701-8463b9f1e142)

Notez bien, qu'une requête HTTP GET a bien été envoyé au site ncatlab.org, mais FireFox nous empêche d'accéder aux données de la réponse.

Regardons les entêtes de la requête et la réponse :

![cors9](https://github.com/adell2024/intro_securite_info/assets/159798073/65e19308-ab57-4d62-8d7f-0b7cfb8d56f3)

Ce qui bloque la réponse est le drapeu "X-Frame-Options:DENY". FireFox qui réceptionne ce drapeau, mis à DENY, en réponse à la requête HTTP GET (iframe), adressée au site ncatlab.org,rend indisponible les données de la réponse au site 
cas.insa-cvl.fr.
