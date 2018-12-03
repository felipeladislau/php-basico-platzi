<?php

session_start(); //Do not remove this

// Pegamos os dados que chegam pelo POST, imagem e o resto lá....
$_SESSION['moldura'] = $_POST['moldura'];
$_SESSION['nome'] = $_POST['nome'];
$_SESSION['imagem'] = $_POST['imagem'];


// Convertemos a imagem BASE64 em arquivo temporário para gerar a foto lá...
$image_data = $_SESSION['imagem'];
$image_data = str_replace('data:image/png;base64,', '', $image_data);
$image_data = str_replace(' ', '+', $image_data);
$file_data = base64_decode($image_data);

// Nome da imagem baseado na hora
$nome_tratado =  str_replace(' ', '_', $_SESSION['nome']); 
$file_name = 'qualificacao_'.$nome_tratado.'_'.$_SESSION['moldura'].'_'.time().'.png';
//$file_name = time().'.png';

// Salva a imagem temporária na pasta de imagens, depois vamos deletar ela.
file_put_contents('imagens/'.$file_name, $file_data);

// Não lembro pq isso, mas deixa aqui vai.
$url_base = $_SERVER["PHP_SELF"];


// Classe para montar a imagem.
include('requires/m2brimagem.class.php');


$oImg = new m2brimagem( 'imagens/' . $file_name );
$oImg->marca("assets/img/molduras/".$_SESSION['moldura']);

$rgb = array(0,0,0);
$font = dirname(__FILE__) .  '/requires/fonte.ttf';

$oImg->legenda( $_SESSION['nome'], 20, 60, 498, $rgb, true, $font);

$valida = $oImg->valida();

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
        <a class="navbar-brand" href="index.php"></a>
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
            <h1>Tudo pronto!</h1>
            <h3 class="title text-center"></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised" style="min-height: 700px;>
    <div class="container">
      <div class="section text-center">
        <h2 class="title">Confira como ficou sua imagem!</h2>

        <div class="container">
          <?php
              if($valida == 'OK'){
                $oImg->grava('imagens/'.$file_name, 100);
                echo "<img src='imagens/".$file_name."' /><br><br>";

                // Botão para compartilhar no Facebook, WhatsApp e Download.
                echo "<a class='btn btn-primary' href='imagens/".$file_name."'>Abrir no navegador</a>&nbsp;&nbsp;";
                echo '<a class="btn btn-primary" href="imagens/'.$file_name.'" download="minhaImagemExecutive">Download</a><br>';
            
            }else{
                echo "<h1 style='font-color: red;'>Erro ao gravar sua imagem - ".$valida."</h1>";
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