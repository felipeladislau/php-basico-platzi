<?php


function conectar(){

	// faz conexao com o servidor MySQL 
	$local_serve = "localhost"; 	 // local do servidor
	$usuario_serve = "root";		 // nome do usuario
	$senha_serve = "";			 	 // senha
	$banco_de_dados = "platzi_imobiliaria"; 	 // nome do banco de dados
	
	
    try{
		$pdo = new PDO("mysql:host=$local_serve;dbname=$banco_de_dados", $usuario_serve, $senha_serve);
		$pdo->exec("SET CHARACTER SET utf8");
	}catch(PDOException $e){
		echo $e->getMessage();
	}

	return $pdo;

}