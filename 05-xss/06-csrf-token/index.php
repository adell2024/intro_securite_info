<?php
//On démarre les sessions
session_start();
//On génére un jeton totalement unique (c'est capital :D)
$token = uniqid(rand(), true);
//Et on le stocke
$_SESSION['token'] = $token;
//On enregistre aussi le timestamp correspondant au moment de la création du token
$_SESSION['token_time'] = time();

//Maintenant, on affiche notre page normalement, le champ caché token en plus
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> formulaire anti CSRF</title>
</head>

<body>
    <form id="form" name="form" method="post" action="process.php">
        <p>Pseudo :
            <label>
                <input type="text" name="pseudo" id="pseudo" />
            </label>
        </p>
        <p>E-mail :
            <label>
                <input type="text" name="email" id="email" />
            </label>
        </p>
        <p>Nom :
            <label>
                <input type="text" name="nom" id="nom" />
            </label>
            <input type="hidden" name="token" id="token" value="<?php
                                                                //Le champ caché a pour valeur le jeton
                                                                echo $token;
                                                                ?>" />
        </p>
        <p>
            <label>
                <input type="submit" name="Envoyer" id="Envoyer" value="Envoyer" />
            </label>
        </p>
    </form>
</body>

</html>