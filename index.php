<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Content-Type: application/json");

echo json_encode([
    "status"=> "200",
    "mensagem"=> "Servidor de Api funcionando"
]);

//

