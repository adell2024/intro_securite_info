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

Le site domainA.fr est consitué des pages web suivantes:
homeA.php et somePageA.php

Le site domaineB.fr est constitué d'une seule page web: indexB.php

La page homeA.php contient la ligne:

setcookie('myCookie', 'worked', ['expires' => 0, 'path' => '/', 'domain' => 'asterix',  'httponly' => true, 'samesite' => 'lax']);

Je crée une cookie avec l'attribut samesite='lax'.

Les valeurs possibles de attribut sont: None, lax et strict.

lax : le cookie est envoyé lorsqu’un utilisateur accède à l’URL de domaineA à partir d’un site externe, par exemple, en suivant un lien
strict : Si la requête provient d’une URL différente de celle de l’emplacement actuel, aucun des cookies marqués avec l'attribut n’est envoyé.

Passons maitenant à la pratique:

1 - j'accède à la page homeA.php directement qui me renvoie à somepageA.php:

![samesite1](https://github.com/aabda2000/sti3a-security/assets/38082725/6defcacb-7cf9-493b-aedd-81ca0863657f)

Remarque: le cookie avec l'attribut "samesite=none" n'a pas été transmis par Chrome (la raison est que Chrome exige l'attribut "secure" quand samesite vaut none; secure=SSL).

Rafraichssons la page somepageA.php plusieurs fois:

![samesite2](https://github.com/aabda2000/sti3a-security/assets/38082725/b18d7deb-1954-4589-8267-667cc4844ebe)


Les compteurs respectifs ont été incrémentés.


Maintenant, nous accédons à la page somepageA.php à partir d'un lien se trouvant sur un domaine différent (sur la page indexB.php):

![samesite4](https://github.com/aabda2000/sti3a-security/assets/38082725/a71bf525-a0d0-43ad-aea7-b0ba7fa4cd23)

Questions:

pourquoi le compteur lax_count a été incrémenté?

Pourquoi le compteur strict_count n'a pas bougé ?




