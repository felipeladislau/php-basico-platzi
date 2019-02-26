<?php

require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\User;
use classes\DBConnection;
use classes\Tipos;

session_start();


if( !isset($_SESSION['user']['logged']) ){
    //echo "Não estamos logados...";
    header("Location: login.php");
}else{
    //echo "Usuário esta logado!";

    if( isset( $_GET['id'] ) ){

		$tiposObj = new Tipos;
		if( $tiposObj->deletaTipo($_GET['id']) ){
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
