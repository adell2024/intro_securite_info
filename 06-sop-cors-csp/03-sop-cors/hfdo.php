<?php
// Définir l'origine autorisée
$allowedOrigin = "http://192.168.180.136:5000";

if (isset($_SERVER["HTTP_ORIGIN"]) && $_SERVER["HTTP_ORIGIN"] === $allowedOrigin) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
} else {
    header("Access-Control-Allow-Origin: $allowedOrigin");
}

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 60");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Header-Custom-TizenCORS");

if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    exit(0); // Répondre immédiatement pour les requêtes OPTIONS
}

header('Content-Type: application/json');
$doctor = array(
    'id' => 1,
    'name' => "Folamour",
    'email' => "fou@fou.fou",
    'specialist' => "cardio",
    'created' => date_create()->format('Y-m-d H:i:s')
);
echo json_encode($doctor);
