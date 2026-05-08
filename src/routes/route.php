<?php
require_once __DIR__ . "./../controllers/controllerLoginCadastro.php";
require_once __DIR__ ."./../controllers/controllerUsuario.php";

function route($method, $uri) {
    //Caminho de arquivos do banco de dados:
    $caminhoDadosUsuario = __DIR__ . DIRECTORY_SEPARATOR . './../banco-de-dados/dados-usuarios.json';
    $listaUsuarios = json_decode(file_get_contents($caminhoDadosUsuario), true); 
    $caminhoDadosConsulta = __DIR__ . DIRECTORY_SEPARATOR . './../banco-de-dados/dados-consultas.json';
    $listaConsultas = json_decode(file_get_contents($caminhoDadosConsulta), true);


    if ($uri == "/api" && $method == "GET") {
        return json_encode([
            "status" => "200",
            "mensagem" => "Servidor API rodando!"
        ]);
    }
    //ROTAS DE CADASTRO E LOGIN
    if ($uri == "/cadastro" && $method == "POST") {
        $novoInput = json_decode(file_get_contents("php://input"), true);
        return controllerLoginCadastro::Cadastro($novoInput, $listaUsuarios, $caminhoDadosUsuario);
    } 
    if ($uri == "/login" && $method == "POST") {
        $novoInput = json_decode(file_get_contents("php://input"), true);
        return controllerLoginCadastro::Login($novoInput, $listaUsuarios);
    }  
    //ROTAS FUNCIONALIDADE USUARIOS
    if ($uri == "/criar-agendamento" && $method == "POST") {
        $novoInput = json_decode(file_get_contents("php://input"), true);
        return ControllerUsuario::MarcarConsulta($novoInput, $listaConsultas, $caminhoDadosConsulta);
    }

    // Rota não encontrada
    http_response_code(404);
    return json_encode([
        "status" => "404",
        "mensagem"=> "não foi possivel encontrar a rota..."
    ]);
}