async function AgendamentoUsuario () {
    let tipoAtendimentoInput = document.querySelector("select#serviceType").value;
    let dataAgendadaInput = document.querySelector("input#appointmentDate").value;
    let horaAtendimentoInput = document.querySelector("select#appointmentTime").value;
    let unidadeInput = document.querySelector("select#healthUnit").value;

    let dataHoraInput = dataAgendadaInput + " " + horaAtendimentoInput;

    const dadosAgendamento = {
        cpf: appState.dadosUser.cpf,
        paciente: appState.dadosUser.nome,
        tipoConsulta: tipoAtendimentoInput,
        dataHora: dataHoraInput,
        unidade: unidadeInput
    }

    try {
        const resposta = await fetch ("http://localhost/agendamento-sigf/criar-agendamento", {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify(dadosAgendamento)
        });

        const resultado = await resposta.json()
        if (resultado.status == "201") {
            alert(resultado.mensagem);
            showPage("userHome");
        } else {
            alert(resultado.mensagem);
        }
    } catch (error) {
        alert("houve um erro em nosso servidor... ");        
    }
}
const btnAgendarConsulta = document.querySelector("button#btnAgendarConsulta");
btnAgendarConsulta.addEventListener("click", AgendamentoUsuario);