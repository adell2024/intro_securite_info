SOP :Same Origin Policy
Le "Same origin policy" est un mécanisme de sécurité présent dans les navigateurs Web. Ce mécanisme empêche une origine (un site Web) d’interagir avec les données d’une autre origine. Une origine correspond à un protocole, un port et un hôte.

Historiquement le SOP date des années 90. Pour bien comprendre d'où vient ce terme "SOP", prenons l'exemple historique qui a déclenché la problématique de sécurité liée au concept d'origine:

Dans votre navigateur, allez visiter la page "https://cas.insa-cvl.fr/cas/login" en activant les devtools:

![cors2](https://github.com/adell2024/intro_securite_info/assets/159798073/73b37231-999d-4c57-a060-8830ae1991e7)

dans la console du navigateur,tapez : newwin=window.open("https://ncatlab.org","mynewwindow"). Observez la réaction du naviagteur

![cors3](https://github.com/adell2024/intro_securite_info/assets/159798073/2a489209-7487-4c45-b03f-8b79abbbd9ff)

Toujours dans la console, tapez : newin. Les propriétes de cet objet s'afficheront:

![cors4](https://github.com/adell2024/intro_securite_info/assets/159798073/5685f0d0-9661-4fe4-a82a-af744c6ced94)
