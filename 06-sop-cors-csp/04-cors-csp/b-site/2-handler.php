<?php
// (A) GET REQUEST ORIGIN
if (array_key_exists("HTTP_ORIGIN", $_SERVER)) {
    $origin = $_SERVER["HTTP_ORIGIN"];
} else if (array_key_exists("HTTP_REFERER", $_SERVER)) {
    $origin = $_SERVER["HTTP_REFERER"];
} else {
    $origin = $_SERVER["REMOTE_ADDR"];
}

// (B) CHECK ALLOWED DOMAINS
if (!in_array(
    parse_url($origin, PHP_URL_HOST),
    ["site-a.com", "site-b.com"]
)) {
    http_response_code(403);
    exit("$origin not allowed");
}

// (C) PROCEED
header("Access-Control-Allow-Origin: $origin");
header("Access-Control-Allow-Credentials: true");
setcookie("It-lax", "Works", [
    "expires" => time() + 3600,
    "path" => "/",
    "domain" => ".site-b.com",
    "secure" => true,
    "samesite" => "lax"
]);
setcookie("It-none", "Works", [
    "expires" => time() + 3600,
    "path" => "/",
    "domain" => ".site-b.com",
    "secure" => true,
    "samesite" => "none"
]);

setcookie("It-stric", "Works", [
    "expires" => time() + 3600,
    "path" => "/",
    "domain" => ".site-b.com",
    "secure" => true,
    "samesite" => "strict"
]);

echo "OK " . $_SERVER["HTTP_ORIGIN"] . "," . $_SERVER["HTTP_REFERER"] . "," . $_SERVER["REMOTE_ADDR"];
