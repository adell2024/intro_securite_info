<?php
// Définir l'origine autorisée
$allowedOrigin = "http://192.168.209.129:5000";


// Définir les en-têtes CORS
header("Access-Control-Allow-Origin: $allowedOrigin");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 60");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Header-Custom-TizenCORS");
header("Content-Type: application/json");

// Gérer la requête OPTIONS
if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") {
    http_response_code(200);
    exit(0);
}

// Réponse pour la requête GET
$doctor = array(
    'id' => 1,
    'name' => "Folamour",
    'email' => "fou@fou.fou",
    'specialist' => "cardio",
    'created' => date_create()->format('Y-m-d H:i:s')
);
echo json_encode($doctor);
