<?php
//session name
session_name('sessionCookie');
session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'domain' => '.asterix',  'httponly' => true, 'samesite' => 'strict']);
session_save_path($_SERVER['DOCUMENT_ROOT'] . '/sessions');
session_start();

//session stuff
$_SESSION['logged_in'] = 'worked';
$_SESSION['count'] = 1;
//cookie stuff
setcookie('myCookie', 'worked', ['expires' => 0, 'path' => '/', 'domain' => 'asterix',  'httponly' => true, 'samesite' => 'lax']);

//redirect to the other page
header("Location: /somepage.php");
exit();
