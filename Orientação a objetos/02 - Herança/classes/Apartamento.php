<?php

require_once('classes\Imovel.php');

class Apartamento extends Imovel{
    
    private $bloco;
    private $andar;
    private $apartamentoNmro;

    public function defineAndar($andar){
        
        $this->andar = $andar;
        return "Definindo o andar ".$andar;
        
    }


}
