Same Origin Policy / 
Cross-Origin Resource Sharing 

## Same Origin Policy

Le Same origin policy est un mécanisme de sécurité présent dans les navigateurs Web. Ce mécanisme empêche une origine (un site Web) d’interagir avec les données d’une autre origine. Une origine correspond à un protocole, un port et un hôte.

![cors1](https://github.com/aabda2000/sti3a-security/assets/38082725/f7b7157c-79ea-421e-aad6-125bb56f0cf4)

## Exemple 

Allez sur le site https://webhook.site/ et récupérez (copiez) cette url unique :

![webkook1](https://user-images.githubusercontent.com/38082725/236836726-942ea548-1480-46ff-a21b-ead42791ed25.png)

Rendez-vous à n'importe quel autre site (lancez les outils de développement web de votre navigateur préféré):

![webhook2](https://user-images.githubusercontent.com/38082725/236837573-647f4bfa-7939-4fbd-b5be-5e8141e1f728.png)

Dans la console, faites appel au site webhook avec la la fonction fetch :
fetch("https://webhook.site/098a8825-5880-4c57-a235-13c48aa4345a")

En validant avec "Entrée", un message d'avertissement et des "erreurs" apparaissent:

![webhook3](https://user-images.githubusercontent.com/38082725/236838688-d35ff679-2eb2-4a01-a8da-f6c44bc20de7.png)

Ce message du navigateur nous informe que le domaine webhook.site ne fait pas confiance au domaine patapain.com : les deux domaines webhook.site et patapain ont des origines différentes.Le domaine webhook.site n'accepte pas des requêtes émanant d'une origine différente que la sienne (d'où le terme Same Origin policy) 

Rendons-nous sur le site webhoo.site:

![webhook4](https://user-images.githubusercontent.com/38082725/236846766-9b61eb26-b3c2-42d2-b1b6-c4952e1e383d.png)

Nous notons qu'une requête GET a été bien réçu par webhook.site : fetch("https://webhook.site/098a8825-5880-4c57-a235-13c48aa4345a"). Cette fonction envoie, par défaut, une demande de type GET à webhook. la demande est autoirsée par le navigateur : mais du fait sa politique SOP, leserveur ne peut pas traiter des requêtes d'origines différentes, et en informe le navigateur qui à son tour répond par un message d'avertissement ( CORS policy etc..). 

Dans certains cas, le navigateur commence par envoyer une requête "preflight" au serveur demandant si celui-ci autorise l'usage , par exemple, de la méthode DELETE dans la requête HTTP, avant d'envoyer la "vraie" requête avec la méthode DELETE:

fetch("https://webhook.site/098a8825-5880-4c57-a235-13c48aa4345a", 
{
 method: 'DELETE', 
 headers: {'content-type': 'text/plain'}, 
 body: 'patapain.com'
}
).then(r => console.log(r.body)).catch(() => console.log("failed"))

![webhook5](https://user-images.githubusercontent.com/38082725/236885151-4a3efe78-4dff-4fad-b399-42495a49a3cd.png)

et en se rendant sur le site webhook:

![webhook6](https://user-images.githubusercontent.com/38082725/236889068-733bb983-f13e-426e-9d9e-812a23bfeaac.png)

Dans ce dernier cas, une pre-requête de vérification OPTIONS (preflight request) est d'abord envoyée au domaine webhook.site : C'est une requête construite par le navigateur utilisant la méthode OPTIONS qui ajoute trois en-têtes HTTP : La méthode Access-Control-Request-Method (en-US), les en-têtes Access-Control-Request-Headers et Origin.

## challenge

Dans la requête fetch, essayez d'autres valeurs pour la clé "method". Utilisez la suite Burp

