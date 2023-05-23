## SameSite

Pour se protéger des attaques CSRF, il existe une première solution à base token anti-CSRF. 

Depuis, une nouvelle solution a fait son apparition. Il s’agit de l’instruction « SameSite » qu’une application peut placer sur les cookies qu’elle communique au navigateur du client.

Lorsque cette instruction est placée sur les cookies de sessions, alors ceux-ci ne seront pas envoyés au serveur si la requête ne provient pas du domaine de l’application. 

## Illustartion du problème
