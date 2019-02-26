<?php

namespace classes;

require('vendor/autoload.php');

class Casa extends Imovel{

    public function __constructor($nome, $endereco, $valor){
        $this->cadastraImovel($nome, $endereco, $valor);
    }

    public function alugaImovel($pessoa, $valor){
        $this->morador = $pessoa;
        $this->valor = $valor;
        return "Imóvel " . $this->nome . " alugado para " . $pessoa . " por " . $this->valor;
    }
    
    public function vendeImovel($pessoa, $valor){
        $this->morador = $pessoa;
        $this->valor = $valor;
        return "Imóvel {$this->nome} vendido para {$pessoa} por {$this->valor}";
    }
    
    public function cadastraImovel($nome, $endereco, $valor = 0){
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->valor = $valor;
    }


}