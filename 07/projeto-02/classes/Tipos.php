<?php

require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\DBConnection;



class Tipos {

    private $nome;
    private $descricao;

    private $db;

    public function insereTipo($nome, $descricao){

        $db = new DBConnection($GLOBALS['localhost']);

        try {
            $sqlInsert = "INSERT INTO tipos_imoveis(nome, descricao) VALUES ('{$nome}', '{$descricao}')";
            $count = $db->runQuery($sqlInsert);
            return $count;
        } catch (\Throwable $th) {
            return $th;
        }

    }

    public function consultaTipo($id, $nome){

        $db = new DBConnection($GLOBALS['localhost']);

        if(!empty( $id )){
            $sqlSelect = "SELECT * FROM `tipos_imoveis` WHERE `tipo_imovel_id` LIKE {$id}";
        }elseif(!empty($nome)){
            $sqlSelect = "SELECT * FROM `tipos_imoveis` WHERE `nome` LIKE '%{$nome}%'";
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

        $sqlSelect = "SELECT * FROM `tipos_imoveis`";

        if($dados = $db->getQuery($sqlSelect)){
            return $dados;
        }else{
            return false;
        }

    }

    public function deletaTipo($id){

        $db = new DBConnection($GLOBALS['localhost']);

        $sqlInsert = "DELETE FROM `tipos_imoveis` WHERE `tipo_imovel_id` LIKE {$id}";
        if($count = $db->runQuery($sqlInsert)){
            return $count;
        }else{
            return false;
        }

    }

    
    
}
