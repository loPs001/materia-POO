<?php 
require_once __DIR__ ."/models/Usuario.php";
require_once __DIR__ ."/controllers/controller-paciente.php";

//Diretorio e formatação para Array:
$caminho = __DIR__ . DIRECTORY_SEPARATOR . "./dados.json";
$dados = json_decode(file_get_contents($caminho), true); 

while (True) {
    print ("==================================================\n");  
    print("Seja bem vindo à aba de agendamento de pascientes!");
    print("\n1.Cadastrar \n2.Exibir todos os pacientes \n3.Sair \n");
    $inputP = readline("Qual será a sua ação?: ");
    print ("==================================================\n");  
    switch (strtolower($inputP)) {
        case "1":       
            ControllerPaciente::Cadastro($dados, $caminho);
            break;
        case "2":
            ControllerPaciente::ExibirTodosPacientes($dados);
            break;
        case "3":
            return true;
        default: print("Houve um problema!\n");
    }
}

//

