<?php


// Lemos o arquivo de conexão com o DB e criamos o objeto da nossa conexão.
include("config.php");
$pdo = conectar();

// Definimos o modo de erros da nossa conexão.
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Definimos uma instância global da nossa tabela, para o exercício.
$TABELA = "clientes";



// C R U D
// Create => Cria um novo registro, insere dados utilizando a palavra reservada INSERT do SQL.
// Read   => Lê dados do banco, pega informações utilizando a palavra reservada SELECT do SQL.
// Update => Atualiza dados existentes, sobrescrevendo informações com a palavra reservada UPDATE do SQL.
// Delete => Apaga informações existentes (Para sempre), utilizando a palavra reservada DELETE do SQL.

/*
*   No MySQL existem diversas operações que podem ser feitas, é possível realizar verificações e comparações nas operações,
*   é possível realizar JOINS, que são consultas e múltiplas tabelas, verificando dados no processo.
*   Ao final das consultas ainda podemos determinar parâmetros, como limite de registros e outros, pesquise mais sobre SQL e MySQL!
*/



/*********************** PROCURANDO DADOS EM UMA TABELA. ************************/

$id = 1;
try {
  $stmt = $pdo->prepare('SELECT * FROM '.$TABELA.' WHERE id = :id');
  $stmt->execute(array('id' => $id));
  
  $result = $stmt->fetchAll();
  
  if ( count($result) ) { 
    foreach($result as $row) {
      print_r($row);
    }   
  } else {
    echo "Nennhum resultado retornado.";
  }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


/*********************** INSERÇÃO DE DADOS EM UMA TABELA. ************************/


try {
     
    $stmt = $pdo->prepare('INSERT INTO '.$TABELA.' (`cliente_id`, `nome`, `email`, `telefone`, `endereco`, `estado_id`, `cidade_id`, `observacoes`) 
                                            VALUES (:cliente_id, :nome, :email, :telefone, :endereco, :estado_id, :cidade_id, :observacoes)');

    $stmt->bindParam(':calories', '2', PDO::PARAM_INT);
    $stmt->bindParam(':nome', 'Joaquim dos santos');
    $stmt->bindParam(':email', 'joaquim@platzi.com');
    $stmt->bindParam(':telefone', '00000000');
    $stmt->bindParam(':endereco', 'Sem endereço');
    $stmt->bindParam(':estado_id', '26');
    $stmt->bindParam(':cidade_id', '5481');
    $stmt->bindParam(':observacoes', 'N/A');
     
    echo $stmt->rowCount(); 
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }



/*********************** ATUALIZAR DADOS DE UMA TABELA. ************************/


$id = 2;
$nome = "Novo nome do João";
   
try {   
    $stmt = $pdo->prepare('UPDATE '.$TABELA.' SET nome = :nome WHERE id = :id');
    $stmt->execute(array(
        ':id'   => $id,
        ':nome' => $nome
    ));
     
    echo $stmt->rowCount(); 
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}



/*********************** SELECIONANDO OS DADOS DE UMA TABELA. ************************/


$consulta = $pdo->query("SELECT * FROM ".$TABELA);
 
  
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    echo "Nome: {$linha['nome']} - E-mail: {$linha['email']}<br />";
}



/*********************** APAGANDO OS DADOS DE UMA TABELA. ************************/



$id = 2; 
   
try {

    $stmt = $pdo->prepare('DELETE FROM '.$TABELA.' WHERE id = :id');
    $stmt->bindParam(':id', $id); 
    $stmt->execute();
     
    echo $stmt->rowCount(); 

} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}



?>