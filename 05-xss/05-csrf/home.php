<?php
require_once('common.php');

if (isset($_POST['submit'])) {
    // bouton submit pressé, je traite le formulaire
    $login = (isset($_POST['login'])) ? $_POST['login'] : '';
    $pass  = (isset($_POST['pass']))  ? $_POST['pass']  : '';
    if (($login == "Mat") && ($pass == "Tux")) {
        $_SESSION['login'] = "Mat";
        $_SESSION['password'] = "Tux";
        $_SESSION['logged_in'] = true;

        echo '<br>';
        echo '<a href="change_email.php" title="Section membre">Change my email address </a>';
    } else {
        // une erreur de saisie ...?
        echo '<p style="color:#FF0000; font-weight:bold;">Erreur de connexion.</p>';
    }
}; // fin if (isset($_POST['submit']))
if (!isset($_POST['submit'])) {
    // Bouton submit non pressé j'affiche le formulaire
    echo '
		<form id="conn" method="post" action="">
			<p><label for="login">Login </label><input type="text" id="login" name="login" /></p>
			<p><label for="pass">Mot de Passe </label><input type="password" id="pass" name="pass" /></p>
			<p><input type="submit" id="submit" name="submit" value="Connexion" /></p>
		</form>';
}; // fin if (!isset($_POST['submit'])))
