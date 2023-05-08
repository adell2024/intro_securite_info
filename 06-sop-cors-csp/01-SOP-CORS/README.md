Same Origin Policy / 
Cross-Origin Resource Sharing 

## Same Origin Policy

Le Same origin policy est un mécanisme de sécurité présent dans les navigateurs Web. Ce mécanisme empêche une origine (un site Web) d’interagir avec les données d’une autre origine. Une origine correspond à un protocole, un port et un hôte.

## Exemple 

Allez sur le site https://webhook.site/ et récupérez (copiez) cette url unique :

![webkook1](https://user-images.githubusercontent.com/38082725/236836726-942ea548-1480-46ff-a21b-ead42791ed25.png)

Rendez-vous à n'importe quel autre site (lancez les outils de développement web de votre navigateur préféré):

![webhook2](https://user-images.githubusercontent.com/38082725/236837573-647f4bfa-7939-4fbd-b5be-5e8141e1f728.png)

Dans la console, faites appel au site webhook avec la la fonction fetch :
fetch("https://webhook.site/098a8825-5880-4c57-a235-13c48aa4345a")

En validant avec "Entrée", un message d'avertissement et des "erreurs" apparaissent:

![webhook3](https://user-images.githubusercontent.com/38082725/236838688-d35ff679-2eb2-4a01-a8da-f6c44bc20de7.png)

Ce message du navigateur nous informe que le domaine que webhook.site ne fait pas confiance au domaine patapain.com : pour les deux domaines webhook.site et patapain ont des origines différentes.Le domaine webhook.site n'accepte pas des requêtes émanant d'une origine différente que la sienne (d'où le term Same Origin policy) 

Rendons-nous sur le site webhoo.site:

![webhook4](https://user-images.githubusercontent.com/38082725/236846766-9b61eb26-b3c2-42d2-b1b6-c4952e1e383d.png)

Nous notons qu'une requête GET a été bien réçu par webhook.site : fetch("https://webhook.site/098a8825-5880-4c57-a235-13c48aa4345a") envoie par défaut la demande avec la méthode GET.Dans ce cas précis, la navigateur a birn envoyé la requête telle quelle au domaine webhook.site qui à son tour l'a bien récu : mais du fait sa politique SOP, ne peut pas traiter des requêtes d'origine différente, et en informe le navigateur qui à son tour répond par un message d'avertissement ( CORS policy etc..). 
