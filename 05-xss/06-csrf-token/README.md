## Anti CSRF

Comment protéger des failles CSRF, sachant qu'il n'existe pas de protection parfaite?

## Protection basée sur un jeton anti-falsification

Lorsqu’un utilisateur est authentifié, un jeton lui est émis. Lorsqu’un utilisateur tente d’accéder à une ressource, le jeton est envoyé à la ressource pour validation. Le jeton (constitué d'une suite de nombres et de lettres) est associé à la date d'accès pour chaque utlisateur et stocké dans sa session et dans dans un champ caché du formulaire demandé. Ceci permet que la personne qui tente d'exécuter la page est bien passée par le formulaire avant, où on lui a délivré le jeton.


## Eude de cas

Le formulaire dans la page index.php génère un token anti-falsification et le cache dans un champ et dans la session. La page process.php vérifie que le token renvoyé par le formulaire et le token de la session sont égaux. 

## Challenge

Sécurisez avec un token ani-csrf la page change_email.php du chapitre 05-csrf. 
