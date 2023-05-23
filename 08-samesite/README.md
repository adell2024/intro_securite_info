## SameSite

Pour se protéger des attaques CSRF, il existe une première solution à base token anti-CSRF. 

Depuis, une nouvelle solution a fait son apparition. Il s’agit de l’instruction « SameSite » qu’une application peut placer sur les cookies qu’elle communique au navigateur du client.

Lorsque cette instruction est placée sur les cookies de sessions, alors ceux-ci ne seront pas envoyés au serveur si la requête ne provient pas du domaine de l’application. 

## Illustartion du problème avec un exemple simple

Avec votre navigateur Chrome vous accédez,après authnetification, au site domaineA.fr ; le site vous renvoie une cookie, cookieA, pour valider votre authentififcation. La cookie est stockée et gérée par Chrome. La page suivante (counter.php) du site est une simple page qui ne fait qui'incrémenter un compteur global des visiteurs après avoir vérifier l'état de l'authentification.

Dans un nouvel onglet de votre nagivateur (ou dans une nouvelle instance de votre navigateur), vous vous accédez au site domainB.fr. Ce dernier, et sur page principale, propose un lien vers la page counter.php de domaineA.fr : en cliquant sur ce lien, Chrome envoie par défaut (on parle d'une requête intersite) la cookie cookieA au site domainA.fr et le compteur sera incrémenté sans autre forme de procès.

Si le site domainB.fr était le site de evil.com,vous pourriez imaginez sans grande diificulté les dégâts que le hacker pourrait faire subir à domainA.fr.

L'idée du flag "Samesite" apposé sur les cookies est de maitriser/limiter la circulation des cookies entre des domaines différents. 

Assez parler...

## Etude de cas



