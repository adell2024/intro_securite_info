<?php
session_start();
//On va vérifier :
//Si le jeton est présent dans la session et dans le formulaire
if (isset($_SESSION['token']) && isset($_SESSION['token_time']) && isset($_POST['token'])) {
    //Si le jeton de la session correspond à celui du formulaire
    if ($_SESSION['token'] == $_POST['token']) {
        //On stocke le timestamp qu'il était il y a 15 minutes
        $timestamp_ancien = time() - (15 * 60);
        //Si le jeton n'est pas expiré
        if ($_SESSION['token_time'] >= $timestamp_ancien) {
            echo "bla bla...";
        }
    }
}
//SINON, ON RAJOUTE DES ELSE ET DES MESSAGES D'ERREUR
