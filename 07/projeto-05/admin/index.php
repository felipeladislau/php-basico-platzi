<?php

require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\User;
use classes\DBConnection;

session_start();



if( !isset($_SESSION['user']['logged']) ){
    
    //echo "Não estamos logados...";
    header("Location: login.php");

}else{
    //echo "Usuário esta logado!";



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
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-building icon-rounded"></i>
					<div class="stats">
						<h5><strong>452</strong></h5>
						<span>Imóveis disponíveis</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-dollar user1 icon-rounded"></i>
					<div class="stats">
						<h5><strong>R$1.019</strong></h5>
						<span>Valor médio de locação</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-money user2 icon-rounded"></i>
					<div class="stats">
						<h5><strong>R$150.012</strong></h5>
						<span>Valor médio de venda</span>
					</div>
				</div>
			</div>
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-users dollar1 icon-rounded"></i>
					<div class="stats">
						<h5><strong>450</strong></h5>
						<span>Clientes cadastrados</span>
					</div>
				</div>
				</div>
			<div class="col-md-3 widget">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-briefcase dollar2 icon-rounded"></i>
					<div class="stats">
						<h5><strong>R$14,456</strong></h5>
						<span>Renda mensal - Locação</span>
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
						<h4 class="title">Notícias</h4>
					<!-- start content_slider -->
					<div id="owl-demo" class="owl-carousel text-center">
						<div class="item">
							<img class="lazyOwl img-responsive" data-src="images/slider1.jpg" alt="name">
						</div>
						<div class="item">
							<img class="lazyOwl img-responsive" data-src="images/slider2.jpg" alt="name">
						</div>
						<div class="item">
							<img class="lazyOwl img-responsive" data-src="images/slider3.jpg" alt="name">
						</div>
						<div class="item">
							<img class="lazyOwl img-responsive" data-src="images/slider4.jpg" alt="name">
						</div>
						<div class="item">
							<img class="lazyOwl img-responsive" data-src="images/slider5.jpg" alt="name">
						</div>
						<div class="item">
							<img class="lazyOwl img-responsive" data-src="images/slider6.jpg" alt="name">
						</div>
						<div class="item">
							<img class="lazyOwl img-responsive" data-src="images/slider7.jpg" alt="name">
						</div>
						
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