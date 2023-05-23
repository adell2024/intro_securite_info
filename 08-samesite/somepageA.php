<?php

//session name
session_name('sessionCookie');
session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'domain' => '.asterix', 'httponly' => true, 'samesite' => 'lax']);
session_save_path($_SERVER['DOCUMENT_ROOT'] . '/sessions');
session_start();
if ($_COOKIE['myCookie'] == 'worked') {
    $_SESSION['count'] = $_SESSION['count'] + 1;
};




echo '<pre>' . print_r($_SESSION, 1) . '</pre>';

echo '<pre>' . print_r($_COOKIE, 1) . '</pre>';
