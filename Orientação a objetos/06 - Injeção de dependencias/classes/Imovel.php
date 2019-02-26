<?php

namespace classes;

abstract class Imovel {

    protected $nome;
    protected $endereco;
    protected $morador;
    protected $valor;


    abstract public function alugaImovel($pessoa, $valor);
    
    abstract public function vendeImovel($pessoa, $valor);
    

}