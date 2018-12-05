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
		<div class="forms">
			<h2 class="title1">Cadastro de imóveis</h2>


			<div class="row">
				<div class="form-three widget-shadow">
					<form class="form-horizontal">

						<div class="form-group">
							<label class="col-sm-2 control-label">Título do imóvel</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" placeholder="">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Vai ser exibido no site!</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Descrição</label>
							<div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Foto 1</label>
							<div class="col-sm-8">
								<input type="file" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Foto 2</label>
							<div class="col-sm-8">
								<input type="file" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Foto 3</label>
							<div class="col-sm-8">
								<input type="file" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>


						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Tipo do imóvel</label>
							<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
								<option>Selecione o tipo do imovel.</option>
								<option>Casa</option>
								<option>Apartamento</option>
							</select></div>
						</div>


						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Status do imóvel</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Endereço do imóvel</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>

						

						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Estado</label>
							<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
								<option>Selecione o estado do imovel.</option>
								<option>São Paulo.</option>
								<option>Amapá.</option>
							</select></div>
						</div>
	
	
						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Cidade</label>
							<div class="col-sm-8"><select name="selector1" id="selector1" class="form-control1">
								<option>Selecione a cidade do imovel.</option>
								<option>São Paulo.</option>
								<option>Macapá.</option>
							</select></div>
						</div>
		
			
						<div class="form-group">
							<label class="col-sm-2 control-label">Valor do imóvel</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" id="focusedinput" placeholder="">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Venda ou locação</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Observações</label>
							<div class="col-sm-8"><textarea name="txtarea1" id="txtarea1" cols="50" rows="4" class="form-control1"></textarea></div>
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

} 

?>