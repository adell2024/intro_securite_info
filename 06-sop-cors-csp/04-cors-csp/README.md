## Challenge CORS CSP

## 1 Préparation: Certificats SSL

Générez les certifcats pour le sit-a.com et site-b.com :

sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/a_server.key -out /etc/ssl/certs/a_server.crt

sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/b_server.key -out /etc/ssl/certs/b_server.crt

## 2 Préparation: Définir les vhost


