<?php
// Configurer les en-têtes CORS
header('Access-Control-Allow-Origin: http://a.exemple.local');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true');

// Gérer les requêtes OPTIONS (pré-vérification CORS)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// Lire les données JSON envoyées
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Vérifier si le cookie est présent
$cookie = isset($_COOKIE['user_token']) ? $_COOKIE['user_token'] : 'Aucun cookie reçu';

// Répondre avec les données reçues et le cookie
header('Content-Type: application/json');
echo json_encode([
    'received' => $data,
    'cookie_received' => $cookie
]);
?>
