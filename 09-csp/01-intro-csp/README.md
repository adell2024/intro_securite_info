## Intro to CSP

Ouvrez dans un nouvel onlget l'URL suivante : https://challenge-1021.intigriti.io/challenge/challenge.php

![csp1](https://github.com/aabda2000/sti3a-security/assets/38082725/d42a1a31-ecd3-4c76-897b-f8d97db1df3f)

La description de la page indique clairement que la page challenge.php attend deux paramètres : html et xss.

Essayons  le paramètre "html": https://challenge-1021.intigriti.io/challenge/challenge.php?html=%3Ch1%3Enice%20protection%21%3C%2Fh1%3E

![csp2](https://github.com/aabda2000/sti3a-security/assets/38082725/5cde9f16-38e9-43e4-8460-38fd19faabd7)

Rien vraiment de méchant: nous avons juste réeusi à injecter la chaîne "nice protection".

Essayons avec une nouvelle chaîne :"<a href="javascript:alert(document.domain)">Click Me</a>"

https://challenge-1021.intigriti.io/challenge/challenge.php?html=%3Ca%20href%3D%22javascript%3Aalert%28document.domain%29%22%3EClick%20Me%3C%2Fa%3E

