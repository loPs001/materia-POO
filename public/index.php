<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json");

require_once __DIR__ . '/../src/routes/route.php';

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$uri = str_replace("/agendamento-sigf", "" , $uri);
$method = $_SERVER["REQUEST_METHOD"];

echo route($method, $uri);
