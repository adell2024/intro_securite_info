<?php
header("HTTP/1.1 301 Moved Permanently");
header("Location: http://192.168.180.136:3000/page2.php" . "?data=" .  $_GET['data']);
header("Connection: close");
