<?php
session_start(); ?>
<!DOCTYPE html>

<head>
    <title>BOOOOOOO!</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="Content-Security-Policy" content="default-src 'none' ; script-src 'self' 'nonce-uG2bsk6JIH923nsvp01n24KE'  ; style-src 'self' ;" />
</head>

<body id="body">

    <form id=" register_form" method="POST" action="welcome.php">
        <h1>Register</h1>
        <input type="text" id="user_name" name="user_name" />
        <input type="password" id="password" name="password" onkeyup="check()" />
        <input type="submit" value="Register" />
    </form>

    <h2> load remote script status</h2>
    <p type="text" id="box" name="box" />
</body>

</html>|

<script nonce='uG2bsk6JIH923nsvp01n24KE' src='script.js'>
</script>

<script nonce="uG2bsk6JIH923nsvp01n24KE">
    alert('Hello from Netsparker');
</script>