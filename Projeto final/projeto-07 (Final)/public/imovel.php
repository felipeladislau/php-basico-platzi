<?php

require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\Imovel;
use classes\Tipos;
use classes\CidadesEstados;


$imoveis = new Imovel;
$cidadeEstado = new CidadesEstados;
$tipos = new Tipos;

$meusimoveis = $imoveis->consultaImovel('', $_GET['id']);

if( $meusimoveis->rowCount() < 1 ){
  header('Location: index.php');
}

foreach ($meusimoveis as $key) {
  $imovel[] = $key;
}
//print_r($imovel);

$tipo = $tipos->consultaTipo($imovel[0]['tipo_id'], '');
$estado = $cidadeEstado->consultaEstadoPorId($imovel[0]['estado_id']);
$cidade = $cidadeEstado->consultaCidadePorId($imovel[0]['cidade_id']);

$endereco = $imovel[0]['endereco'].", ".utf8_encode($cidade->fetchColumn(1))." - ".utf8_encode($estado->fetchColumn(2));


?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">
<head>
	<!-- Basic need -->
	<title>Minha imobiliária | Platzi PHP Básico</title>
	<meta charset="UTF-8">
	<meta name="description" content="Curso de PHP Básico Platzi">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="">
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>
	<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

	<!-- Mobile specific meta -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="format-detection" content="telephone-no">

	<!-- External Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Raleway:400,700,800|Roboto:400,500,700" rel="stylesheet"> 

	<!-- CSS files -->
	<link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
<div id="page-loader">
    <div class="page-loader__logo">
        <img src="images/logo_dark.png" alt="ReaLand Logo">
    </div><!-- .page-loader__logo -->
    
    <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
    </div><!-- .sk-folding-cube -->
</div><!-- .page-loader -->
<header class="header header--blue">
  <div class="container">
    <div class="header__main">
      <div class="header__logo">
        <a href="index.php">
          <h1 class="screen-reader-text"></h1>
          <img src="images/logo.png" alt="">
        </a>
      </div><!-- .header__logo -->

      <div class="nav-mobile">
        <a href="#" class="nav-toggle">
          <span></span>
        </a><!-- .nav-toggle -->
      </div><!-- .nav-mobile -->

      <div class="header__menu header__menu--v6">
		<ul class="header__nav">
			<li class="header__nav-item">
				<a href="index.php" class="header__nav-link">Home</a>
			<li class="header__nav-item">
				<a href="#" class="header__nav-link">Menu 1</a>
			</li>
			<li class="header__nav-item">
				<a href="#" class="header__nav-link">Menu 2</a>
			</li>
			<li class="header__nav-item">
				<a href="#" class="header__nav-link">Menu 3</a>
			</li>
			<li class="header__nav-item"><a href="https://platzi.com" class="header__nav-link">Site</a></li>
		</ul><!-- .header__nav -->

      </div><!-- .header__menu -->

    </div><!-- .header__main -->
  </div><!-- .container -->
</header><!-- .header -->


<section class="property">

  <div class="property__header">
    <div class="container">
      <div class="property__header-container">
        <ul class="property__main">
          <li class="property__title property__main-item">
            <div class="property__meta">
              <span class="property__offer"><?php echo $imovel[0]['status']; ?></span>
              <span class="property__type"><?php echo utf8_encode($tipo->fetchColumn(1)); ?></span>
            </div><!-- .property__meta -->
            <h2 class="property__name"><?php echo utf8_encode($imovel[0]['titulo']); ?></h2>
            <span class="property__address"><i class="ion-ios-location-outline property__address-icon"></i><?php echo utf8_encode($endereco); ?></span>
          </li>

          <li class="property__price property__main-item">
            <h4 class="property__price-primary">R$<?php echo $imovel[0]['valor']; ?></h4>
            <span class="property__price-secondary">Valor anúnciado</span>
          </li>
        </ul><!-- .property__main -->

        <ul class="property__list">
          <li class="property__item">
            <a href="#" class="property__link">
              <i class="fa fa-heart-o property__icon" aria-hidden="true"></i>  
              <span class="property__item-desc">Favorito</span>
            </a>
          </li>
 
          <li class="property__item">
            <a href="#" class="property__link">
              <i class="ion-android-share-alt property__icon"></i>
              <span class="property__item-desc">Compartilhar</span>
            </a>
          </li>
        </ul><!-- .property__list -->
      </div><!-- .property__header-container -->
    </div><!-- .container -->
  </div><!-- .property__header -->

  <div class="property__slider">
    <div class="container">
      <div class="property__slider-container property__slider-container--vertical">
        <ul class="property__slider-nav property__slider-nav--vertical">
          <li class="property__slider-item">
            <img src="images/imoveis/<?php echo $imovel[0]['foto_1']; ?>" alt="Foto 1">
          </li>

          <li class="property__slider-item">
            <img src="images/imoveis/<?php echo $imovel[0]['foto_2']; ?>" alt="Foto 2">
          </li>

          <li class="property__slider-item">
            <img src="images/imoveis/<?php echo $imovel[0]['foto_3']; ?>" alt="Foto 3">
          </li>

        </ul><!-- .property__slider-nav -->

        <div class="property__slider-main property__slider-main--vertical">
          <div class="property__slider-images">
            <div class="property__slider-image">
              <img src="images/imoveis/<?php echo $imovel[0]['foto_1']; ?>" alt="Foto 1">
            </div><!-- .property__slider-image -->

            <div class="property__slider-image">
              <img src="images/imoveis/<?php echo $imovel[0]['foto_2']; ?>" alt="Foto 2">
            </div><!-- .property__slider-image -->

            <div class="property__slider-image">
              <img src="images/imoveis/<?php echo $imovel[0]['foto_3']; ?>" alt="Foto 3">
            </div><!-- .property__slider-image -->

          </div><!-- .property__slider-images -->

          <ul class="image-navigation">
            <li class="image-navigation__prev">
              <span class="ion-ios-arrow-left"></span>
            </li>
            <li class="image-navigation__next">
              <span class="ion-ios-arrow-right"></span>
            </li>
          </ul>

          <span class="property__slider-info"><i class="ion-android-camera"></i><span class="sliderInfo"></span></span>
        </div><!-- .property__slider-main -->
      </div><!-- .property__slider-container -->
    </div><!-- .container -->
  </div><!-- .property__slider -->

  <div class="property__container">
    <div class="container">
      <div class="row">

        
        <main class="col-md-12">
          <div class="property__feature-container">

            <div class="property__feature">
              <h3 class="property__feature-title property__feature-title--b-spacing">Descrição do imóvel</h3>
              <p>
                <?php echo utf8_encode($imovel[0]['descricao']); ?>
              </p>
            </div><!-- .property__feature -->



            <div class="property__feature">
              <h3 class="property__feature-title property__feature-title--b-spacing">Agende uma visita</h3>
              <form class="property__form" method="POST" action="mail.php">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="property__form-wrapper">
                      <input type="text" name="date" class="property__form-field property__form-date" placeholder="Monday" data-format="d F, Y"  data-min-year="2017"  data-max-year="2020" data-translate-mode="true" data-modal="true" data-large-mode="true" required>
                      <span class="ion-android-calendar property__form-icon"></span>
                    </div><!-- .property__form-wrapper -->
                  </div><!-- col -->
                  <div class="col-sm-6">
                    <div class="property__form-wrapper">
                      <input type="text" name="time" class="property__form-field property__form-time" placeholder="07:30 AM" required>
                      <span class="ion-android-alarm-clock property__form-icon"></span>
                    </div><!-- .property__form-wrapper -->
                  </div><!-- col -->
                  <div class="col-sm-6">
                    <input type="text" name="name" class="property__form-field" placeholder="Seu nome" required>
                  </div><!-- col -->
                  <div class="col-sm-6">
                    <input type="text" name="contact" class="property__form-field" placeholder="Seu Telefone" required>
                  </div><!-- col -->
                  <div class="col-sm-12">
                    <textarea rows="4" name="message" class="property__form-field" placeholder="Mensagem" required></textarea>
                  </div><!-- col -->
                  <div class="col-sm-12">
                    <input name="submit" type="submit" class="property__form-submit" value="Enviar"></input>
                  </div><!-- .col -->
                </div><!-- .row -->
              </form>
			</div><!-- .property__feature -->
			

          </div><!-- .property__feature-container -->
        </main>
      </div><!-- .row -->
    </div><!-- .container -->
  </div><!-- .property__container -->

</section><!-- .property -->


<section class="newsletter">
		<div class="container">
		  <div class="row">
			<div class="col-md-6 newsletter__content">
			  <img src="images/icon_mail.png" alt="Newsletter" class="newsletter__icon">
			  <div class="newsletter__text-content">
				<h2 class="newsletter__title">Newsletter</h2>
				<p class="newsletter__desc">Cadastre-se para receber novidades!</p>
			  </div>
			</div><!-- .col -->
	  
			<div class="col-md-6">
			  <form action="mail.php" class="newsletter__form">
				<input type="email" class="newsletter__field" placeholder="Digite seu e-mail">
				<button type="submit" class="newsletter__submit">Inscrever-se</button>
			  </form>
				  </div><!-- .col -->   
				  
	  
		  </div><!-- .row -->
		</div><!-- .container -->
</section><!-- .newsletter -->

<footer class="footer">
		<div class="footer__links">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-md-4 footer__links-single">
						<h3 class="footer__title">Entre em contato</h3>
						<ul class="footer__list">
							<li><span class="footer--highlighted">Endereço:</span> <a href="#">Av. Paulista, 1234, Sâo Paulo - SP</a></li>
							<li><span class="footer--highlighted">E-mail:</span> <a href="mailto:contato@platzi.com">contato@platzi.com</a></li>
							<li><span class="footer--highlighted">Telefone:</span> <a href="tel:+551111112222">(11)1111-2222</a></li>
							<li><span class="footer--highlighted">Fax:</span> <a href="#">(11)3333-4444</a></li>
						</ul><!-- .footer__list -->
					</div><!-- .col -->
					<div class="col-sm-4 col-md-2 footer__links-single">
						<h3 class="footer__title">Compra</h3>
						<ul class="footer__list">
							<li><a href="#">Casas a venda</a></li>
							<li><a href="#">Visitação</a></li>
							<li><a href="#">Novas</a></li>
							<li><a href="#">Ofertas</a></li>
						</ul><!-- .footer__list -->
					</div><!-- .col -->
					<div class="col-sm-4 col-md-2 footer__links-single">
						<h3 class="footer__title">Venda</h3>
						<ul class="footer__list">
							<li><a href="#">Venda seu imóvel</a></li>
							<li><a href="#">Soicite uma avaliação</a></li>
							<li><a href="#">Agenda uma visita</a></li>
							<li><a href="#">Guias</a></li>
						</ul><!-- .footer__list -->
					</div><!-- .col -->
					<div class="col-sm-4 col-md-2 footer__links-single">
						<h3 class="footer__title">A imobiliária</h3>
						<ul class="footer__list">
							<li><a href="#">Favoritos</a></li>
							<li><a href="#">Buscas</a></li>
							<li><a href="#">Perfil</a></li>
							<li><a href="#">Configurações</a></li>
						</ul><!-- .footer__list -->
					</div><!-- .col -->
					<div class="col-sm-4 col-md-2 footer__links-single">
						<h3 class="footer__title">Sobre nós</h3>
						<ul class="footer__list">
							<li><a href="#">A empresa</a></li>
							<li><a href="#">Equipe</a></li>
							<li><a href="#">Corretores</a></li>
							<li><a href="#">Contato</a></li>
						</ul><!-- .footer__list -->
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
	</div><!-- .footer__links -->

	<div class="footer__main">
		<div class="container">
			<div class="footer__logo">
				<h1 class="screen-reader-text">Platzi</h1>
				<img src="images/logo_dark.png" alt="ReaLand">
			</div><!-- .footer__logo -->
			<p class="footer__desc">Na nossa imobiliária você encontra as melhroes opções de imóveis do mercado.</p>
			<ul class="footer__social">
				<li><a href="https://www.facebook.com/platziteam/?brand_redir=199183900150149"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="https://twitter.com/platzi"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li><a href="https://www.instagram.com/platzi/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="https://www.youtube.com/channel/UC55-mxUj5Nj3niXFReG44OQ"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
			</ul><!-- .footer__social -->
		</div><!-- .container -->
	</div><!-- .footer__main -->

	<div class="footer__copyright">
		<div class="container">
			<div class="footer__copyright-inner">
				<p class="footer__copyright-desc">
					&copy; 2017 <span class="footer--highlighted">Platzi</span>. All Right Reserved.
				</p>
			</div><!-- .footer__copyright-inner -->
		</div><!-- .container -->
	</div><!-- .footer__copyright -->
</footer><!-- .footer -->
<a href="#" class="back-to-top"><span class="ion-ios-arrow-up"></span></a>
<div id="submit-property-wysiwyg-icons">
</div>

<!-- JS Files -->
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/plugins.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
<script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/infobox/src/infobox.js"></script>
<script src="js/custom.js"></script>
</body>
</html>