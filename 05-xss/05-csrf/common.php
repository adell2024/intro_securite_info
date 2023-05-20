<?php
session_start();
function isLoggedIn()
{
    if ($_SESSION['logged_in'] === true) {
        return true;
    }

    return false;
}
