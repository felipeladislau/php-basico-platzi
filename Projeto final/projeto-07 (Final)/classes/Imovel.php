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
            $sqlSelect = "SELECT * FROM `imoveis` WHERE `imovel_id` LIKE {$id} ORDER BY `imovel_id` DESC LIMIT 1";
        }elseif(!empty($titulo)){
            $sqlSelect = "SELECT * FROM `imoveis` WHERE `titulo` LIKE '%{$titulo}%' ORDER BY `imovel_id` DESC LIMIT 1";
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


    public function uploadFoto($imovelId, $fotoId, $foto){

        $db = new DBConnection($GLOBALS['localhost']);

        // Lista de tipos de arquivos permitidos
        $tiposPermitidos= array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
        // Tamanho máximo (em bytes)
        $tamanhoPermitido = 50000000; // 20000 Kb
        // O nome original do arquivo no computador do usuário
        $arqName = $foto['name'];
        // O tipo mime do arquivo. Um exemplo pode ser "image/gif"
        $arqType = $foto['type'];
        // O tamanho, em bytes, do arquivo
        $arqSize = $foto['size'];
        // O nome temporário do arquivo, como foi guardado no servidor
        $arqTemp = $foto['tmp_name'];
        // O código de erro associado a este upload de arquivo
        $arqError = $foto['error'];

        if ($arqError == 0) {
            // Verifica o tipo de arquivo enviado
            if (array_search($arqType, $tiposPermitidos) === false) {
                return 'O tipo de arquivo enviado é inválido!';
                // Verifica o tamanho do arquivo enviado
            } else if ($arqSize > $tamanhoPermitido) {
                return 'O tamanho do arquivo enviado é maior que o limite!'. $arqSize. ' - ' .$tamanhoPermitido;
                // Não houveram erros, move o arquivo
            } else {
                $pasta = '../public/images/imoveis/';
                // Pega a extensão do arquivo enviado
                $extensao = @strtolower(end(explode('.', $arqName)));
                // Define o novo nome do arquivo usando um UNIX TIMESTAMP
                $nome = time() . '.' . $extensao;
                // Escapa os caracteres protegidos do MySQL (para o nome do usuário)
                $upload = move_uploaded_file($arqTemp, $pasta . $nome);
                // Verifica se o arquivo foi movido com sucesso
                if ($upload == true) {
                    // Cria uma query MySQL
                    $sqlInsert = "UPDATE `imoveis` SET `foto_".$fotoId."`='{$nome}' WHERE `imovel_id` = $imovelId";
                    if($count = $db->runQuery($sqlInsert)){
                        return true;
                    }else{
                        return 'Erro ao inserir dados no DB!';
                    }
                }
            }
        } else {
            return 'Ocorreu algum erro com o upload, por favor tente novamente!';
        }
    }

    
}
