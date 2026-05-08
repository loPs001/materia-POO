<?php
require_once __DIR__ . "/../models/Consulta.php";

class ControllerUsuario {
    public static function MarcarConsulta (
        //1. Dados inserido pelo front
        //2. Caminho do arquivo + Dados em Array (Usuarios);
        //3. Caminho do arquivo + Dados em Array (Consultas);
        $novoInput, $listaConsultas, $caminhoDadosConsulta
     ) {
        $decisao = true;

        foreach( $listaConsultas as $consulta) {
            if ($consulta["cpf"] == $novoInput["cpf"] && $consulta["tipoConsulta"] == $novoInput["tipoConsulta"]) {
                //409 justifica um conflito de dados:
                $decisao = false;
                break;
            }
        }

        if ($decisao == false) {
            return json_encode([
                "status" => "409",
                "mensagem" => "consulta já marcada em nosso banco de dados..."
            ]);
        }
        $novaConsulta = new Consulta($novoInput["cpf"],$novoInput["paciente"], $novoInput["tipoConsulta"],$novoInput["dataHora"], $novoInput["unidade"]);
        $listaConsultas[] = (array) $novaConsulta;
        file_put_contents($caminhoDadosConsulta, json_encode($listaConsultas, JSON_PRETTY_PRINT));
        return json_encode([
            "status" => "201",
            "mensagem" => "consulta criada com sucesso!"
        ]);
    }
        // Fazer um leitura do arquivo json consulta para verificação de duplicidade de consulta: As condições para que haja a verificação serão cpf: (para identificação) e "tipo de consulta por nome". Caso exista aparecera uma mensagem de error. Se não, criação de consulta padrão.
}
