<?php

namespace classes;

abstract class Imoveis {

    protected $titulo;
    protected $descricao;
    protected $tipo;
    protected $endereco;
    protected $estado;
    protected $cidade;
    protected $valor;
    protected $status;
    protected $observacoes;


    abstract public function insereImovel($titulo, $descricao, $tipo, $endereco, $estado, $cidade, $valor, $status, $observacoes='');
    abstract public function consultaImovel($titulo, $id);
    abstract public function todos();
    abstract public function deletaImovel($id);
    abstract public function uploadFoto($imovelId, $fotoId, $foto);

    
    
 

}