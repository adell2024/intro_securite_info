## Challenge CORS CSP

## Certificats SSL

Générez les certifcats aux sites site-a.com et site-b.com :

sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/a_server.key -out /etc/ssl/certs/a_server.crt

sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/b_server.key -out /etc/ssl/certs/b_server.crt

## Définir les vhost

Dans le dossier /etc/apache2/sites-available ajouter le fichier de configuration cors.com.conf

Activer les deux sites: sudo a2ensite cors.com.conf


## Définir les sites

Créer les deux dossiers /var/www/site-a.com et /var/www/site-b.com. Ensuite, déployer la page 1-fecth.html dans /var/www/site-a.com et les deux pages 2-handler.php + 3-show.html dans /var/www/site-b.com

## Définir les noms

Dans le fichier /etc/hosts
votre_IP    site-a.com
vote_IP     site-b.com

Redémarrez votre serveur apache : sudo systemctl restart apach2. 

## Comment naviguer ?

Dans un onglet, on ouvre le site "site-a" et vous cliquez sur un des boutons et vous observez les messages dans Chrome (outils de dév). 

Dans un autre onlget, vous ouvrez le site-b : page 3-show.html

APrès chauqe tes, vous videz le cache récnt de votre navigateur (ce n'est pas obligatoire mais les observations sont ainsi plus claires)

## Challenge : Utilisez Chrome

Ouvrez les outlis de dév de Chrome

Accéder aux sites a et b et accépter les certifcats auto-signés.

Avant de cliquez sur bouton, observez les "erreurs" affichées par Chrome:

![cors2](https://github.com/aabda2000/sti3a-security/assets/38082725/c3e7d608-9923-48ad-ae5e-97db105e121a)

Identifiez et Corrigez ces "erreurs" (en corrigeant une "erreur" d'autres apparaîtront)


