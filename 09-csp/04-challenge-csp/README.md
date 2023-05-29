## CSP Challenge

URL: https://challenge-1021.intigriti.io/challenge/challenge.php

Votre objectif est d'injecter le code alert(document.domain) ou alert(1).

Sur Internet des solutions existent: Mais franchement quel est l'intérêt de chercher la solution avant d'essayer de le résoudre vous-même le challenge.


Quelques notes pour vous aider dans votre investigation :

a) Observez le tag meta et la politique CSP de protection mise en oeuvre

b) Les nonces changent à chaque requête http ( ce qui est le cas normal)

c) L'URL accepte les deux paramètres html et xss: Essayez-les séparément et ensemble...la solution emploie les deux paramètres

exemples:
https://challenge-1021.intigriti.io/challenge/challenge.php?html=test

https://challenge-1021.intigriti.io/challenge/challenge.php?xss=test

https://challenge-1021.intigriti.io/challenge/challenge.php?html=test&xss=test

e) N'oubliez pas la régle concernant la fonction document.createElement("script") en lien avec 'strict-dynamic'


d) Une particularité des navigateurs:

le code html suivant:

<pre>
&lt;diva&gt;
&lt;div>hello&lt;/div>
</pre>


Sera "traduit" comme :

<pre>&lt;diva&gt;
  &lt;div>hello&lt;/div>
&lt;/diva&gt;</pre>

Oui..le navigateur génère la balise de fermeture de l'élément "diva" en englobant l'élément "div" contenant le texte "hello".

f) les deux sections à étudier:
<pre>
 &lt;div id="html" class="text">
 &lt;h1 class="light">
 ...</pre>
 
 Et 
 
<pre>
e = `)]}'` + new URL(location.href).searchParams.get("xss");
c = document.getElementById("body").lastElementChild;
if (c.id === "intigriti") {
    l = c.lastElementChild;
    i = l.innerHTML.trim();
    f = i.substr(i.length - 4);
    e = f + e;
}
let s = document.createElement("script");
s.type = "text/javascript";
s.appendChild(document.createTextNode(e));
document.body.appendChild(s);</pre>
Armé avec ces connaissances, trouvez la formule "magique" pour déjouer les protections CSP

