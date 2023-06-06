## Cas d'étude

Ouvrez dans un nouvel onlget l'URL suivante : https://challenge-1021.intigriti.io/challenge/challenge.php

![csp1](https://github.com/aabda2000/sti3a-security/assets/38082725/d42a1a31-ecd3-4c76-897b-f8d97db1df3f)

La description de la page indique clairement que la page challenge.php attend deux paramètres : html et xss.

Essayons  le paramètre "html": https://challenge-1021.intigriti.io/challenge/challenge.php?html=%3Ch1%3Enice%20protection%21%3C%2Fh1%3E

![csp2](https://github.com/aabda2000/sti3a-security/assets/38082725/5cde9f16-38e9-43e4-8460-38fd19faabd7)

Rien vraiment de méchant: nous avons juste réeusi à injecter la chaîne "nice protection".

Essayons avec une nouvelle chaîne :&lt;a href="javascript:alert(document.domain)"&gt;Click Me&lt;/a&gt;

https://challenge-1021.intigriti.io/challenge/challenge.php?html=%3Ca%20href%3D%22javascript%3Aalert%28document.domain%29%22%3EClick%20Me%3C%2Fa%3E

![csp03](https://github.com/aabda2000/sti3a-security/assets/38082725/8c16a228-48aa-4108-8db3-978f3c148535)


Notre injection a été bien embarquée dans la page :

![csp4](https://github.com/aabda2000/sti3a-security/assets/38082725/6f16a774-f8ea-4911-bfc6-7f3429a73074)

Mais, en cliquant sur "Click Me", le script ne s'exécute pas.

Pourquoi ?

Je vous montre le tag "meta" de la page HTML: 

![csp5](https://github.com/aabda2000/sti3a-security/assets/38082725/71b1bcb2-79ce-45af-83b6-c20a024e2424)

Ce qui a empêché notre script de s'exécuter est la mise place d'une politique de sécurité des contenus (CSP)!

## CSP

"Content Security Policy" permet de définir une stratégie de contrôle des accès aux ressources atteignables d’un site par l’application de restrictions sous forme de "liste blanche", réduisant ainsi le risque d’apparition et l’exploitabilité de vulnérabilités XSS.

Les politiques CSP sont définies sur le serveur et envoyées soit en tant que entête dans la réponse HTTP ou bien en tant que balise HTML "meta" avec http-equiv et l'attribut de contenu "content". Les Navigateurs Web sont priés ensuite de les appliquer.

## Stratégie CSP

&lt;meta

      http-equiv="Content-Security-Policy"
      
      content="default-src 'none'; script-src 'unsafe-eval' 'strict-dynamic' 'nonce-4b3e5204032863cc409596405da4e1bf'; style-src 'nonce-da02fcdb0523d8db8c846f0bb900ca0e'" />;

default-src 'none'; 

⬇️ cette stratégie CSP demande au navigateur : "par défaut, n'accordez votre confiance à aucune source" 

script-src 'unsafe-eval' 'strict-dynamic' 'nonce-4b3e5204032863cc409596405da4e1bf';
 
⬇️ cette stratégie CSP demande au navigateur d'exécuter/évaluer le code JavaScript représenté sous forme d'une chaîne de caractères. Par exemple, la chaîne 'alert("Your query string was ' + unescape(document.location.search) + '");' sera exécutée si elle est passée à eval :eval('alert("Your query string was ' + unescape(document.location.search) + '");') avec bien sûr les risques associés à cette autorisation!ce qui n’est pas une bonne pratique.

La valeur 'strict-dynamic' 'nonce-4b3e5204032863cc409596405da4e1bf' indique que la confiance explicitement donnée à un script de la page, par le biais du nonce 4b3e5204032863cc409596405da4e1bf, doit être propagée à tous les scripts chargés par celui-ci.


style-src 'nonce-da02fcdb0523d8db8c846f0bb900ca0e' 

⬇️ style-src spécifie des sources valides pour les feuilles de style. Vous pouvez utiliser un nonce-source (c'est le cas ici avec nonce=da02fcdb0523d8db8c846f0bb900ca0e) pour n'autoriser que certains blocs de style en ligne.


Dans le tag meta la directive "script-src 'unsafe-inline'" n'est pas explicitement défini: donc,à cause de "default-src 'none'; ",tous les scripts inline (emabrqués dans la page HTML) seront bloqués.


