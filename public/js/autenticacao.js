// Função de Cadastramento:
async function CadastrarUsuario () {
    let nomeInput = document.querySelector("input#registerName").value;
    let cpfInput = document.querySelector("input#registerCpf").value;
    let emailInput = document.querySelector("input#registerEmail").value;
    let senhaInput = document.querySelector("input#registerPassword").value;

    const dadosCadastrados = {
        nome: nomeInput,
        cpf: cpfInput,
        email: emailInput,
        senha: senhaInput
    }
    
    try {
        const resposta = await fetch ("http://localhost/agendamento-sigf/cadastro", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(dadosCadastrados)
        });

        const resultado = await resposta.json();
        if (resultado.status === "201") {
            alert(resultado.mensagem); 
            showPage('home'); // Volta para a tela inicial
        } else {
            alert(resultado.mensagem); // Mostra o erro vindo do PHP
        }
    } catch (error) {
          alert( "houve um erro em nosso servidor... ");
                    
    }
}
let btnCadastro = document.querySelector("button#btnCadastrar");
btnCadastro.addEventListener("click", CadastrarUsuario);

//Função de Login: 
async function LoginDoUsuario () {
    let cpfInput = document.querySelector("input#loginCpf").value;
    let senhaInput = document.querySelector("input#loginPassword").value;
    
    const dadosLogin = {
        cpf: cpfInput,
        senha: senhaInput
    }
    try {
        const resposta = await fetch ("http://localhost/agendamento-sigf/login", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(dadosLogin)
        });

        const resultado = await resposta.json();
        if (resultado.status === "200") {
            appState.dadosUser = resultado.dadosUser;
            showPage('userHome'); 
        } else {
            alert(resultado.mensagem);
        }
    } catch (error) {
          alert( "houve um erro em nosso servidor... ");
                    
    }
}
let btnEntrar = document.querySelector("button#btnEntrar");
    btnEntrar.addEventListener("click", LoginDoUsuario);