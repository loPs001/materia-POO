<?php
require_once __DIR__ . "/../models/Usuario.php";
class controllerLoginCadastro {
    public static function Cadastro (   
        //novoinput, lista de pessoas e caminho da pasta
        $novoInput, $listaUsuarios, $caminhoDadosUsuario
    ) {
        $decisao = false;
        foreach ($listaUsuarios as $usuarios ) {
            if ($usuarios["email"]  === $novoInput["email"] || $usuarios["cpf"] === $novoInput["cpf"] ) {
                $decisao = true;
                break;
            } 
        }

        if($decisao == true) {
            return json_encode([
                "status" => "409",
                "mensagem" => "usuario com dados cadastrados já existentes..."
            ]);        
        }
        $novoUsuario = new Usuario($novoInput["nome"], $novoInput["cpf"], $novoInput["email"], $novoInput["senha"]);//Manipulação de dados
        $listaUsuarios[] = (array) $novoUsuario; // cast array => (array), força um novo usuario que saira no formato Objeto para Array.
        file_put_contents($caminhoDadosUsuario, json_encode($listaUsuarios, JSON_PRETTY_PRINT)); //Envio de dados
        return json_encode([
            "status" => "201",
            "mensagem" => "usuario criado com sucesso!"
        ]);
    }

    public static function Login($novoInput, $listaUsuarios) {
        $decisao = true;
        foreach ($listaUsuarios as $usuario) {
            if ($novoInput["cpf"] === $usuario["cpf"] && $novoInput["senha"] === $usuario["senha"]) {
                $loginUser = $usuario;
                $decisao = false;
                break;    
            }
        }

        if ($decisao == true) {
            return json_encode([
                "status" => "404",
                "mensagem" => "usuario nao encontrado..."
            ]);
        }
        return json_encode([
            "status" => "200",
            "mensagem" => "usuario encontrado com sucesso!",
            "dadosUser" => $loginUser
        ]);
    }
}