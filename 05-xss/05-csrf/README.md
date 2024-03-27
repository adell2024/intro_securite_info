## CSRF

CSRF signifie "Cross-Site Request Forgery". CSRF est une faille de sécurité web.

Les attaques CSRF (autrement prononcées « Sea Surf ») exploitent les utilisateurs et les rendent complices de l'attaque. Le principe est vraiment simple : on incite un internaute authentifié sur son site à se rendre sur une page afin qu'une requête spécifique soit déclenchée,sur son site, à son insu. Ainsi, par le fait qu'il se soit rendu sur la page, l'internaute devient complice de l'attaque.


## Etude de cas

Alice est admin d'un site, il peut donc ajouter, modifier, et supprimer une news, des mails, etc..ce qu'un utilisateur du site lambda ne peut PAS faire.
Bernard est un de ces utilisateurs lambda, et il aimerait pirater le site d'Alice ! Il va donc récupérer l'adresse URL permettant de supprimer modifier un mail, et envoyer un message privé à Alice contenant une image dont l'adresse sera celle de la page de modification de mail.

Et là, le navigateur entre en jeu. En essayant d'afficher l'image, il va aller sur la page web permettant de modifer le mail et donc l'exécuter.

Récupérer les pages web home.php , common.php et change_email.

la page web csrf_attack simule une attaque de type csrf.

Essayez cette attaque et constatez le changement de mail à l'insu de l'utlisateur Mat authentifié.

## Challenge

Cloner le site https://github.com/jrozner/csrf-demo.git 

Démarrer le serveur web

Cette application simule des transferts d'argent entre des comptes bancaires.

Le site est vulnérable aux attaques CSRF.

utlisateur authetifié: test/test

![csrf1](https://github.com/adell2024/intro_securite_info/assets/159798073/c180cf73-a07d-4891-bf1b-6f30581ff59a)

Trouver la faille et développer vos attaques CSRF :

a) En utlisant le tag img et son attribut src

b) En utlisant un formulaire html : ce formulaire est hébérgé par le site de l'attaquant

Hint: Pour la faille CSRF, essayer des transferts et chercher à comprendre identifier les élèments qui composent une opération de transfer. Etudier,aussi, le code source de la page account.php, surtout le formulaire

![csrf2](https://github.com/adell2024/intro_securite_info/assets/159798073/bd37b942-84d5-4bef-bc38-c545c8b006df)

