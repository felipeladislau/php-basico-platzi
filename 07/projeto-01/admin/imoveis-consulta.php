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



require('templates/head.php');

require('templates/menu.php');

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



<!-- Conteúdo principal-->
<div id="page-wrapper">
	<div class="main-page">
		<div class="tables">
			<h2 class="title1">Consulta de imóveis</h2>
			<div class="panel-body widget-shadow">
				<h4>Imóveis:</h4>
				<table class="table">
					<thead>
						<tr>
							<th>Deletar</th>
							<th>Título</th>
							<th>Descricao</th>
							<th>Tipo</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row"><a href=""><img src="images/delete.png" style="width:25px;"></a></th>
							<td>Imóvel XXXX</td>
							<td>Descrição, lorem ipsum, ipsum lorem, lorem ipsum, ipsum lorem....</td>
							<td>Casa terrea</td>
							<td>Aluga-se</td>
						</tr>
						<tr>
							<th scope="row"><a href=""><img src="images/delete.png" style="width:25px;"></a></th>
							<td>Imóvel XXXX</td>
							<td>Descrição, lorem ipsum, ipsum lorem, lorem ipsum, ipsum lorem....</td>
							<td>Casa terrea</td>
							<td>Aluga-se</td>
						</tr>
						<tr>
							<th scope="row"><a href=""><img src="images/delete.png" style="width:25px;"></a></th>
							<td>Imóvel XXXX</td>
							<td>Descrição, lorem ipsum, ipsum lorem, lorem ipsum, ipsum lorem....</td>
							<td>Casa terrea</td>
							<td>Aluga-se</td>
						</tr>
						<tr>
							<th scope="row"><a href=""><img src="images/delete.png" style="width:25px;"></a></th>
							<td>Imóvel XXXX</td>
							<td>Descrição, lorem ipsum, ipsum lorem, lorem ipsum, ipsum lorem....</td>
							<td>Casa terrea</td>
							<td>Aluga-se</td>
						</tr>
						<tr>
							<th scope="row"><a href=""><img src="images/delete.png" style="width:25px;"></a></th>
							<td>Imóvel XXXX</td>
							<td>Descrição, lorem ipsum, ipsum lorem, lorem ipsum, ipsum lorem....</td>
							<td>Casa terrea</td>
							<td>Aluga-se</td>
						</tr>
						<tr>
							<th scope="row"><a href=""><img src="images/delete.png" style="width:25px;"></a></th>
							<td>Imóvel XXXX</td>
							<td>Descrição, lorem ipsum, ipsum lorem, lorem ipsum, ipsum lorem....</td>
							<td>Casa terrea</td>
							<td>Aluga-se</td>
						</tr>
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>

<?php

require('templates/footer.php');

} 

?>