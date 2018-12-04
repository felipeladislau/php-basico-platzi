<?php

require_once('classes\Imovel.php');

class Apartamento extends Imovel{
    
    private $bloco;
    private $andar;
    private $apartamentoNmro;


    public function __constructor($nome, $endereco, $valor){
        $this->cadastraImovel($nome, $endereco, $valor);
    }

    public function alugaImovel($pessoa, $valor){
        $this->morador = $pessoa;
        $this->valor = $valor;
        return "Imóvel " . $this->nome . " alugado para " . $pessoa . " por " . $this->valor;
    }
    
    public function vendeImovel($pessoa, $valor){
        $this->nome = $pessoa;
        $this->valor = $valor;
        return "Imóvel {$this->nome} vendido para {$pessoa} por {$this->valor}";
    }
    
    public function cadastraImovel($nome, $endereco, $valor = 0, $bloco, $andar, $apartamentoNmro){
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->bloco = $bloco;
        $this->andar = $andar;
        $this->apartamentoNmro = $apartamentoNmro;
    }

    public function defineAndar($andar){
        $this->andar = $andar;
        return "Definindo o andar ".$andar;
    }


}
