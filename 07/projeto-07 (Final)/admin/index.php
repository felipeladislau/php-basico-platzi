<?php

require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\User;
use classes\DBConnection;
use classes\Imovel;
use classes\Tipos;

session_start();


if( !isset($_SESSION['user']['logged']) ){
    //echo "Não estamos logados...";
    header("Location: login.php");
}else{
    //echo "Usuário esta logado!";


	$imoveisObj = new Imovel;

	$todosImoveis = $imoveisObj->todos();
	$valor = 0;
	foreach ($todosImoveis as $key) {
		$imoveis[] = $key;
		$valor += $key['valor'];
	}

	$totalImoveis = $todosImoveis->rowCount();
	$valoTotal = $valor;
	$valorMedio = $valor / $totalImoveis;
	//print_r($imoveis);


	$imoveis = new Imovel;

	$meusimoveis = $imoveis->todos();

	require('templates/head.htm');

	require('templates/menu.htm');

?>


<!-- header-starts -->
<div class="sticky-header header-section ">
	<div class="header-left">
		<!--toggle button start-->
		<button id="showLeftPush"><i class="fa fa-bars"></i></button>
		<!--toggle button end-->
		<div class="profile_details_left"><!--notifications of menu start -->
			<div class="clearfix"> </div>
		</div>
		<!--notification menu end -->
		<div class="clearfix"> </div>
	</div>
	<div class="header-right">
			
		<div class="profile_details">		
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<div class="profile_img">	
							
							<div class="user-name">
								<p><?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']; ?></p>
								<span>

									<?php
										//$_SESSION['user']['user_role'];
										
										$database = new DBConnection($localhost);
										$sqlSelect = "SELECT role FROM roles WHERE id = 1";
										$rows = $database->getQuery($sqlSelect);
										
										foreach($rows as $row){
											echo $row["role"];
										}
									?>

								</span>
							</div>
							<i class="fa fa-angle-down lnr"></i>
							<i class="fa fa-angle-up lnr"></i>
							<div class="clearfix"></div>	
						</div>	
					</a>
					<ul class="dropdown-menu drp-mnu">
						<li> <a href="mudar-senha.php"><i class="fa fa-cog"></i> Mudar senha</a> </li> 
						<li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="clearfix"> </div>				
	</div>
	<div class="clearfix"> </div>	
</div>
<!-- //header-ends -->



<!-- main content start-->
<div id="page-wrapper">
	<div class="main-page">
		<div class="col_3">
			<div class="col-md-4 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-building icon-rounded"></i>
					<div class="stats">
						<h5><strong><?php echo $totalImoveis; ?></strong></h5>
						<span>Imóveis disponíveis</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-dollar user1 icon-rounded"></i>
					<div class="stats">
						<h5><strong>R$<?php echo number_format($valorMedio, 2, ',', '.'); ?></strong></h5>
						<span>Valor médio</span>
					</div>
				</div>
			</div>
			<div class="col-md-4 widget widget">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-money user2 icon-rounded"></i>
					<div class="stats">
						<h5><strong>R$<?php echo number_format($valoTotal, 2, ',', '.'); ?></strong></h5>
						<span>Valor total</span>
					</div>
				</div>
			</div>


			<div class="clearfix"> </div>
		</div>



	
		<div class="row-one widgettable">
			<div class="clearfix"> </div>
		</div>
					


		<!-- for amcharts js -->
		<script src="js/amcharts.js"></script>
		<script src="js/serial.js"></script>
		<script src="js/export.min.js"></script>
		<link rel="stylesheet" href="css/export.css" type="text/css" media="all" />
		<script src="js/light.js"></script>
		<!-- for amcharts js -->

		<script  src="js/index1.js"></script>

		<div class="charts">		
			<div class="mid-content-top charts-grids">
				<div class="middle-content">
						<h4 class="title">Imóveis recentes</h4>
					<!-- start content_slider -->
					<div id="owl-demo" class="owl-carousel text-center">

						<?php

							foreach ($meusimoveis as $imovel ) {
								//print_r($imovel);
								echo '<div class="item">
										<a target="_blank" href="../public/imovel.php?id='.$imovel["imovel_id"].'">
											<img class="lazyOwl img-responsive" data-src="../public/images/imoveis/'.$imovel["foto_1"].'" alt="name">
										</a>
									</div>';
							}
						?>
	
		
						
					</div>
				</div>
					<!--//sreen-gallery-cursual---->
			</div>
		</div>

	</div>
</div>

<?php
	require('templates/footer.htm');
}