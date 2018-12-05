<?php

namespace classes;

require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\DBConnection;
use classes\Imoveis;



class Imovel extends Imoveis {
    
    public function insereImovel($titulo, $descricao, $tipo, $endereco, $estado, $cidade, $valor, $status, $observacoes=''){

        $db = new DBConnection($GLOBALS['localhost']);

        try {
            $sqlInsert = "INSERT INTO `imoveis`(`titulo`, `descricao`, `tipo_id`, `endereco`, `estado_id`, `cidade_id`, `valor`, `status`, `observacoes`) 
                            VALUES ('{$titulo}', '{$descricao}', '{$tipo}', '{$endereco}', '{$estado}', '{$cidade}', '{$valor}', '{$status}', '{$observacoes}')";
            $count = $db->runQuery($sqlInsert);
            return $count;
        } catch (\Throwable $th) {
            return $th;
        }

    }


    public function consultaImovel($titulo, $id){

        $db = new DBConnection($GLOBALS['localhost']);

        if(!empty( $id )){
            $sqlSelect = "SELECT * FROM `imoveis` WHERE `imovel_id` LIKE {$id} LIMIT 1";
        }elseif(!empty($titulo)){
            $sqlSelect = "SELECT * FROM `imoveis` WHERE `titulo` LIKE '%{$titulo}%' LIMIT 1";
        }else{
            return false;
        }

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }


    public function todos(){

        $db = new DBConnection($GLOBALS['localhost']);

        $sqlSelect = "SELECT * FROM `imoveis`";

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }


    public function deletaImovel($id){

        $db = new DBConnection($GLOBALS['localhost']);

        $sqlInsert = "DELETE FROM `imoveis` WHERE `imovel_id` LIKE {$id}";
        if($count = $db->runQuery($sqlInsert)){
            return $count;
        }else{
            return false;
        }

    }

    public function insereFotos($id, $foto1, $foto2, $foto3){
        return false;
    }

    
}
