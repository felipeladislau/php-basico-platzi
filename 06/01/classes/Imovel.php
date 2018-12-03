<?php


class Imovel {

    private $nome;
    private $endereco;
    private $morador;
    private $valor;

    public function alugaImovel($pessoa){
        if(1==1){
            return "Imóvel alugado para " . $pessoa . " com sucesso!";
        }else{
            // return "Falha ao alugar o imovel.";
            return false;
        }
    }

}