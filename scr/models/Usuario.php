<?php
    class Usuario {

        public $nome;
        public $idade;
        public function __construct($nome, $idade, ) {
            $this->nome = $nome;
            $this->idade = $idade; 
        }
    }