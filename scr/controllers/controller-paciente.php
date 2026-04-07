<?php
class ControllerPaciente {
    public static function Cadastro (&$listas, $caminhoFile) {
    //Questionario:
    $nome = readline("Digite o nome do pasciente: ");
    $idade = readline("Digite a idade dele: ");
    
    //Manipulação de dados?
    $novoUsuario = new Usuario($nome, $idade);
    $listas[] = (array) $novoUsuario; // cast array => (array), força um novo usuario que saira no formato Objeto para Array.
    //Envio de dados:
    file_put_contents($caminhoFile, json_encode($listas, JSON_PRETTY_PRINT));
    print("Usuario cadastrado com sucesso!");
}

    public static function ExibirTodosPacientes ($dados) {
        print ("Pacientes presentes:\n") ;
        foreach ($dados as $indice => $paciente) {
            // $posicao = $indice + 1;
            print "$indice" +1 . "º " . "Nome: " . $paciente["nome"] . " | " .  "Idade: " . $paciente["idade"] . "\n";
        }
    }

}