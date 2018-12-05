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
		<div class="forms">
			<h2 class="title1">Cadastro de tipos</h2>


			<div class="row">
				<div class="form-three widget-shadow">
					<form class="form-horizontal" action="" method="POST" >

						<div class="form-group">
							<label class="col-sm-2 control-label">Título do imóvel</label>
							<div class="col-sm-8">
								<input required="required" type="text" class="form-control1" id="titulo" name="titulo" placeholder="">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Vai ser exibido no site!</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Descrição</label>
							<div class="col-sm-8"><textarea required="required" name="descricao" id="descricao" cols="50" rows="4" class="form-control1"></textarea></div>
						</div>


						<button type="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> CADASTRAR</button>


					</form>
				</div>
			</div>


		</div>
	</div>
</div>

<?php

	require('templates/footer.htm');


	if( isset( $_POST['titulo'] ) ){

		$tiposObj = new Tipos;
		if( $tiposObj->insereTipo($_POST['titulo'], $_POST['descricao']) ){
			echo "<script type='text/javascript'>
					alert('Tipo de imóvel cadastrado com sucesso!');
				</script>";
		}else{
			echo "<script type='text/javascript'>
					alert('Erro ao cadastrar tipo de imóvel!');
				</script>";
		}

	}



}

?>