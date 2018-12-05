<?php

require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\User;
use classes\DBConnection;
use classes\Imovel;

session_start();


if( !isset($_SESSION['user']['logged']) ){
    //echo "Não estamos logados...";
    header("Location: login.php");
}else{
    //echo "Usuário esta logado!";

    if( isset( $_GET['id'] ) ){

		$imovelObj = new Imovel;
		if( $imovelObj->deletaImovel($_GET['id']) ){
			echo "<script type='text/javascript'>
                    alert('Tipo deletado com sucesso!');
                    window.location.href = 'tipos-consulta.php';
				</script>";
		}else{
			echo "<script type='text/javascript'>
					alert('Erro ao deletar tipo de imóvel!');
                    window.location.href = 'tipos-consulta.php';
				</script>";
		}

    }
    

}