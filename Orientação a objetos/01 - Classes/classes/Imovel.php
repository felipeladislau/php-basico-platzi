<?php


class Imovel {

    private $morador;

    public function alugaImovel($pessoa){
        if(1==1){
            $this->morador = $pessoa;
            return "Imóvel alugado para " . $pessoa . " com sucesso!";
        }else{
            // return "Falha ao alugar o imovel.";
            return false;
        }
    }

}