<?php
require_once __DIR__ . "/../abaUser.php";
require_once __DIR__ . "/../models/Usuario.php";
class ControllerLogin {
    public static function Cadastro (&$dados, $caminhoFile) {

        // foreach ($dados as $usuarios) {
        //     if ($email === $usuarios["email"]) {
        //         $decisao = true; 
        //     } 
        // }
        // if ($decisao !== false) {
        //     print ("=== [ERROR]EMAIL ou CPF já cadastrados! ===\n");
        // } else {
        //     //Manipulação de dados
        //     // $novoUsuario = new Usuario($nome, $cpf, $email, $senha);
        //     $dados[] = (array) $novoUsuario; // cast array => (array), força um novo usuario que saira no formato Objeto para Array.
        //     //Envio de dados:
        //     file_put_contents($caminhoFile, json_encode($dados, JSON_PRETTY_PRINT));
        //     print("Usuario cadastrado com sucesso!\n");
        //     }
    }

    public static function Login($dados) {
        // print("=== Area de Login ===\n");
        // $decisao = false;
        // $email = readline("Email: ");
        // $senha = readline("Senha: ");
        // foreach ($dados as $usuario) {
        //     if ($email === $usuario["email"] && $senha === $usuario["senha"]) {
        //         $loginUser = $usuario;
        //         $decisao = true;    
        //     }
        // }
        // if ($decisao != false) {
        //     abaUser($loginUser);
        // } else {
        //     print("=== [ERROR]Não foi possivel achar tal usuário...\n ===");
        // }
    }
}