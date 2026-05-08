<?php
class Consulta {
    public string $cpf;
    public string $paciente;
    public string $tipoConsulta;
    public string $dataHora;
    public string $unidade; 
    public $status;

    public function __construct (string $cpf, string $pac, string $tipoConsulta, string $dtH, string $uni, $status = "Agendado"  ) {
        $this->cpf = $cpf;
        $this->paciente = $pac;
        $this-> tipoConsulta = $tipoConsulta;
        $this->dataHora = $dtH ?? null;
        $this-> unidade = $uni;
        $this->status = $status;
    }   

}

