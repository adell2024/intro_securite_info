## xss via http headers

Pour cette activité, Nous aurons besoin de "Burp Suite Community Edition" ; cette suite logicielle (écrite en Java) est installée par défaut avec la distribution Kali. Si vous voulez l'installer dans votre distribution alors rendez-vous au site: https://portswigger.net/burp/communitydownload.

## Découverte de Burp Suite

Lancer la suite Burp Suite et dans la foulée lancer navigateur Web qui l'accompagne : vous remarquerez que le bouton "intercept is on" est actif ; ce bouton permet d'intercepter les requêtes http avant d'atteindre leurs cibles ( vous permettant d'analyser et modifier la requête et ses entêtes. En clqiuant sur le bouton "forward", les requêtes seront transmises à leurs cibles:

![burp1](https://user-images.githubusercontent.com/38082725/236813494-47bcb764-0302-4267-889c-1867abf56e6c.png)

A partir du navigateur, demandez la page https://brutelogic.com.br/lab/header.php

![burp2](https://user-images.githubusercontent.com/38082725/236814152-6fe08b39-3f7a-4a45-ba2f-4cb685d11d02.png)

Cliquez sur le bouton "forward" pour transmettre la requête au serveur hébergeant la page header.php ; Cliquez ensuite sur le bouton "HTTP History"

![burp3](https://user-images.githubusercontent.com/38082725/236814646-eb97496d-8137-40a0-8acc-5b692ec4413b.png)

N'hésitez pas à découvir tout le potentiel de ce superbe outil.

## Activité XSS avec le Terminal Linux

Avec l'outil curl, injectez  "Test: 42" dans les entêtes de la requête http. 

Veuillez choisir une chaine autre que la mienne("azerty") pour votre injection! 

curl -iH "Test: 42"  https://brutelogic.com.br/lab/header.php?azerty

HTTP/2 200

server: nginx

date: Mon, 08 May 2023 11:48:26 GMT

content-type: text/html; charset=UTF-8

content-length: 232

x-sucuri-id: 13005

vary: Accept-Encoding

x-sucuri-cache: MISS

{"Host":"brutelogic.com.br","X-Forwarded-For":"5.182.170.53","X-Forwarded-Proto":"https","X-Real-IP":"5.182.170.53","X-Sucuri-ClientIP":"5.182.170.53","X-Sucuri-Country":"FR","user-agent":"curl\/7.82.0","accept":"*\/*","test":"42"}

Notez bien que le champs x-sucuri-cache vaut MISS: le cache web n'a pas caché encore notre requête.

Exécutez la commande curl 3 fois : la valeur de la clé x-sucuri-cache passe de MISS à HIT

Après quelques exécutions, la requête est cachée (HIT).

A partir de votre navigateur, vérifiez que le cache web a bien caché votre requête :

![hit](https://github.com/adell2024/intro_securite_info/assets/159798073/94da03d8-4929-4dc1-9b63-921892888bb1)


## Burp Suite

Dans Burp Suite, demandez la même URL:

![burp4](https://user-images.githubusercontent.com/38082725/236817199-8aab5f83-cda5-4fe7-a77b-dd7af086fb98.png)

On remarque que la clé "Test" a été bien injectée!

## Challenge XSS : Injectez un code javascript

Dans la chaîne "Test: 42", remplacez la valeur "42" par un code javascript qui, à son exécution par le navigateur", affichera une boîte popup avec le message "Hacked".

Démarche :

1 - avec curl injectez le code malicieux. Exécutez curl autant de fois que nécessaire; le champs x-sucuri-cache doit se mettre à HIT

2- Pour vérifez l'attaque XSS, donnez au navigateur la même URL

3- A chaque test, vous devriez changer la valeur du paramètre de la requête : si vous commencez avec la chaîne "toto", par exemple, le test suivant mettez "toto2", "toto3", etc...

4- pour les payloads, voilà une source utile : https://github.com/ihebski/XSS-Payloads

