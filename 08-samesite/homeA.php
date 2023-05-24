<?php
//session name
session_name('sessionCookie');
session_set_cookie_params(['lifetime' => 0, 'path' => '/', 'domain' => '.asterix',  'httponly' => true, 'samesite' => 'lax']);
//session_save_path($_SERVER['DOCUMENT_ROOT'] . '/sessions');
session_start();

//session stuff
$_SESSION['logged_in'] = 'worked';
$_SESSION['lax_count'] = 0;
$_SESSION['strict_count'] = 0;
$_SESSION['none_count'] = 0;
//cookie stuff

setcookie('myStrictCookie', 'strict_worked', ['expires' => 0, 'path' => '/', 'domain' => 'asterix',  'httponly' => true, 'samesite' => 'strict']);
setcookie('myLaxCookie', 'lax_worked', ['expires' => 0, 'path' => '/', 'domain' => 'asterix',  'httponly' => true, 'samesite' => 'lax']);
setcookie('myNoneCookie', 'none_worked', ['expires' => 0, 'path' => '/', 'domain' => 'asterix',  'httponly' => true, 'samesite' => 'none']);

//redirect to the other page
header("Location: /somepageA.php");
exit();
