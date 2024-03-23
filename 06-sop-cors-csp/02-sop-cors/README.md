### SOP CORS

Déployez les 4 pages php dans le même dossier et démarrez ensuite votre serveur web (serveur php intégré ou Apache).Assurez-vous d'avoir l' interpréteur de PHP installé sur votre machine (tapez la commande php)

Vous avez le choix entre: 
++ Mettre les pages php dans le dossier /var/www/html du serveur APACHE

++ Laisser les pages dans le dossier actuel, pour ensuite démarrer un petit serveur web php :

insa@matrix:~/intro_securite_info/06-sop-cors-csp/02-sop-cors$ php -S localhost:2025 -d error_reporting=E_ALL


## page1.php

Tout en ouvrant les outils web de votre navigateur, appelez la page page1.php. 

Constatez la présence d'une erreur CORS.

Expliquez la raison de cette erreur


## page2.php

Tout en ouvrant les outils web de votre navigateur, appelez la page page2.php. 

Justifiez l'absence d'erreur d'origine CORS

## page3.php

Tout en ouvrant les outils web de votre navigateur, appelez la page page3.php. 

Justifiez l'absence d'erreur d'origine CORS


Refaire la même expérience tout en utlisant Burpsuite
