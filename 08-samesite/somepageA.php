<?php

//session name
session_name('sessionCookie');
session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'domain' => '.asterix', 'httponly' => true, 'samesite' => 'lax']);
//session_save_path($_SERVER['DOCUMENT_ROOT'] . '/sessions');
session_start();
if ($_COOKIE['myLaxCookie'] == 'lax_worked') {
    $_SESSION['lax_count'] = $_SESSION['lax_count'] + 1;
};


if ($_COOKIE['myStrictCookie'] == 'strict_worked') {
    $_SESSION['strict_count'] = $_SESSION['strict_count'] + 1;
};

if ($_COOKIE['myNoneCookie'] == 'none_worked') {
    $_SESSION['none_count'] = $_SESSION['none_count'] + 1;
};

echo '<pre>' . print_r($_SESSION, 1) . '</pre>';

echo '<pre>' . print_r($_COOKIE, 1) . '</pre>';
