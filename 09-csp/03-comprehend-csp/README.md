## Comprehend CSP

Dans ce challenge, on suppose qu'un hacker a réeusi à injecter le code JS contenant la fonction leakData et le handler onsubmit (voi login.php).


## Test 1

Etudiez la politique de sécurité CSP dans le tag meta.

En testant l'appli, avec Chrome, j'obtiens les résulats suivants:

![csp8](https://github.com/aabda2000/sti3a-security/assets/38082725/b324008c-1ef8-4921-8000-ac6735e60157)

Pour quelle raison le navigateur a déclenché cette protection? quel script est en cause?

N'oubliez pas de tester le bouton "Register" qui déclencherait la fonction "leak" sur l'événement "onsubmit".

<pre>
NOTE IMPORTANTE :

'strict-dynamic' a été défini, ce qui signifie qu'en général, un script ne sera exécuté que s'il est fourni avec un jeton à usage unique approuvé (nonce).Mais............ il existe une exception à la règle dynamique stricte. Cette exception permet d'exécuter du code JavaScript s'il est créé à l'aide de la fonction document.createElement("script")
</pre>

## Test 2

Ajouter le "nonce" adéquant pour permettre l'exécution du script. 

Refaire le Test...

Mais une nouvelle protection est décenchée. laquelle? pourquoi?

Laissez le hacker réussir son attaque : ajouter une politique CSP de type img-src


