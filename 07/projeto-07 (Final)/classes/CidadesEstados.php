<?php

namespace classes;


require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\DBConnection;



class CidadesEstados {


    private $db;
    
    private $cidadeNome;
    private $cidadeId;

    private $estadoNome;
    private $estadoId;
    private $estadoSigla;

    public function consultaEstadoPorNome($nome, $precisao){

        $db = new DBConnection($GLOBALS['localhost']);

        if($precisao != true){
            $sqlSelect = "SELECT `id`, `nome`, `sigla` FROM `estados` WHERE `nome` LIKE '%{$nome}%' LIMIT 1";
        }else{
            $sqlSelect = "SELECT `id`, `nome`, `sigla` FROM `estados` WHERE `nome` LIKE '{$nome}' LIMIT 1";
        }

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }

    
    public function consultaEstadoPorId($id){

        $db = new DBConnection($GLOBALS['localhost']);

        $sqlSelect = "SELECT `id`, `nome`, `sigla` FROM `estados` WHERE `id` = {$id} LIMIT 1";

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }
    
    public function consultaEstadoPorSigla($sigla){

        $db = new DBConnection($GLOBALS['localhost']);

        $sqlSelect = "SELECT `id`, `nome`, `sigla` FROM `estados` WHERE `sigla` = '{$sigla}' LIMIT 1";

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }

    public function consultaCidadePorId($id){

        $db = new DBConnection($GLOBALS['localhost']);

        $sqlSelect = "SELECT * FROM `cidades` WHERE `id` = {$id} LIMIT 1";

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }


    public function consultaCidadePorNome($nome, $precisao){

        $db = new DBConnection($GLOBALS['localhost']);

        if($precisao != true){
            $sqlSelect = "SELECT * FROM `cidades` WHERE `nome` LIKE '%{$nome}%' LIMIT 1";
        }else{
            $sqlSelect = "SELECT * FROM `cidades` WHERE `nome` LIKE '{$nome}' LIMIT 1";
        }

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }
    

    public function consultaCidadesEstado($estado){

        $db = new DBConnection($GLOBALS['localhost']);

        $sqlSelect = "SELECT * FROM `cidades` WHERE `estado_id` LIKE '%{$estado}%'";

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }


    public function todasCidades(){

        $db = new DBConnection($GLOBALS['localhost']);

        $sqlSelect = "SELECT * FROM `cidades`";

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }


    public function todosEstados(){

        $db = new DBConnection($GLOBALS['localhost']);

        $sqlSelect = "SELECT * FROM `estados`";

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }
    
}