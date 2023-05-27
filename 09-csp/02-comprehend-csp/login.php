<?php
session_start(); ?>

<!-- <meta http-equiv="Content-Security-Policy" content="default-src 'none';" />  -->

<form id="register_form" method="POST" action="welcome.php">
    <h1>Register</h1>
    <input type="text" id="user_name" name="user_name" />
    <input type="password" id="password" name="password" onkeyup="check()" />
    <input type="submit" value="Register" />
</form>

<script>
    //document.getElementById("password").onkeyup = check;
    
    function check() {
        var password = document.getElementById("password").value;
        alert(password);
    }
</script>
