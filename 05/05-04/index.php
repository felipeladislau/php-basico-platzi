<?php

// Arquivo de conexão com o DB
include("requires/conectar.php");
$pdo = conectar();

// Vamos selecionar o ID da categoria com a URL e verificar se existe.
$busca_categoria = $pdo->prepare("SELECT * FROM `categorias` ");
$busca_categoria->execute();
$busca_categoria_data = $busca_categoria->fetchAll();

?>



<!doctype html>
<html lang="pt-br">

<head>
  <title>Criação de moldura | PHP Básico Platzi</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />

  <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png"/>

</head>

<body>
  <nav class="navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg" color-on-scroll="100">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="#"> </a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">

          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('assets/img/bg3.jpg'); height: 15%;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand text-center">
            <h1>Criação de fotos para perfil</h1>
            <h3 class="title text-center"></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised" style="min-height: 700px;">
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Selecione a categoria da moldura</h2>

        <div class="container">
          <?php
              foreach ($busca_categoria_data as $data) {
                  echo "<h2><a href='upload.php?ref=".$data['url']."' > ".$data['nome']." </a></h2>";
              }
          ?>
        </div>

      </div>
    </div>
  </div>


  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li>
            <a href="https://platzi.com/">
              Curso PHP Básico - Platzi
            </a>
          </li>
        </ul>
      </nav>
      <div class="copyright float-right">
        &copy;
        <script>
          document.write(new Date().getFullYear())
        </script>, todos os direitos reservados.
      </div>
    </div>
  </footer>
</body>

</html>