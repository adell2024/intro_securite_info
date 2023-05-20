<?php
require_once('common.php');
if (!isLoggedIn()) {
    header('Location: /home.php');
}

if (isset($_REQUEST['newemail']) && !($_REQUEST['newemail'] === '')) {
    $newEmail = $_REQUEST['newemail'];
    $_SESSION['oldemail'] = $_SESSION['newemail'];
    $_SESSION['newemail'] = $newEmail;
};
echo 'My new email is:' .  $_SESSION['newemail'];
echo '<br>My old email is:' . $_SESSION['oldemail'];

?>

<form method="POST">
    <div class="form-group">
        <label for="newemail">To</label>
        <input class="form-control" type="text" name="newemail" id="email" />
    </div>
    <input type="submit" class="btn btn-default" value="Send" />
</form