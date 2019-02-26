<?php

require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\User;
use classes\DBConnection;
use classes\Tipos;
use classes\Imovel;
use classes\CidadesEstados;

session_start();


if( !isset($_SESSION['user']['logged']) ){
    //echo "Não estamos logados...";
    header("Location: login.php");
}else{
    //echo "Usuário esta logado!";


	$imoveisObj = new Imovel;
	$tiposObj = new Tipos;
	$cidadeEstadoObj = new CidadesEstados;

	$tipos = $tiposObj->todos();
	$cidades = $cidadeEstadoObj->todasCidades();
	$estados = $cidadeEstadoObj->todosEstados();
	

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
					<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

						<div class="form-group">
							<label class="col-sm-2 control-label">Título do imóvel</label>
							<div class="col-sm-8">
								<input name="titulo" required="required" type="text" class="form-control1" id="focusedinput" >
							</div>
							<div class="col-sm-2">
								<p class="help-block">Vai ser exibido no site!</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Descrição</label>
							<div class="col-sm-8">
								<textarea name="descricao" required="required" cols="50" rows="4" class="form-control1"></textarea></div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Foto 1</label>
							<div class="col-sm-8">
								<input name="foto1" required="required"  type="file" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Foto 2</label>
							<div class="col-sm-8">
								<input name="foto2" required="required"  type="file" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Foto 3</label>
							<div class="col-sm-8">
								<input name="foto3" required="required"  type="file" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>


						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Tipo do imóvel</label>
							<div class="col-sm-8"><select name="tipo" required="required" class="form-control1">
								<option value="">Selecione o tipo do imovel.</option>
								<?php
									// SELECT DE TIPOS.
									foreach ($tipos as $key) {
										echo "<option value='".$key['tipo_imovel_id']."'>".utf8_encode($key['nome'])."</option>";
									}
								?>
							</select></div>
						</div>


						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Status do imóvel</label>
							<div class="col-sm-8">
								<input name="status" required="required" type="text" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>


						<div class="form-group">
							<label class="col-sm-2 control-label">Endereço do imóvel</label>
							<div class="col-sm-8">
								<input name="endereco" required="required" type="text" class="form-control1" id="focusedinput" placeholder="">
							</div>
						</div>

						

						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Estado</label>
							<div class="col-sm-8"><select name="estado" required="required"  class="form-control1">
								<option value="">Selecione o estado do imovel.</option>
								<?php
									// SELECT DE TIPOS.
									foreach ($estados as $key) {
										echo "<option value='".$key['id']."'>".utf8_encode($key['nome'])."</option>";
									}
								?>	
								<option value="1">São Paulo.</option>
								<option>Amapá.</option>
							</select></div>
						</div>
	
	
						<div class="form-group">
							<label for="selector1" class="col-sm-2 control-label">Cidade</label>
							<div class="col-sm-8"><select name="cidade" required="required" class="form-control1">
								<option value="">Selecione a cidade do imovel.</option>
								<?php
									// SELECT DE TIPOS.
									foreach ($cidades as $key) {
										echo "<option value='".$key['id']."'>".utf8_encode($key['nome'])."</option>";
									}
								?>
								<option value="1">São Paulo.</option>
								<option>Macapá.</option>
							</select></div>
						</div>
		
			
						<div class="form-group">
							<label class="col-sm-2 control-label">Valor do imóvel</label>
							<div class="col-sm-8">
								<input name="valor" required="required" type="text" class="form-control1" id="focusedinput" placeholder="">
							</div>
							<div class="col-sm-2">
								<p class="help-block">Venda ou locação</p>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-2 control-label">Observações</label>
							<div class="col-sm-8"><textarea name="observacoes" required="required" cols="50" rows="4" class="form-control1"></textarea></div>
						</div>

						<button name="enviarForm" type="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-plus" aria-hidden="true"></i> CADASTRAR</button>


					</form>
				</div>
			</div>





		</div>
	</div>
</div>

<?php

require('templates/footer.htm');




if( isset( $_POST['titulo'] ) ){
	//Formulário enviado.


	$titulo = $_POST['titulo'];
	$descricao = $_POST['descricao'];
	$foto1 = $_FILES['foto1'];
	$foto2 = $_FILES['foto2'];
	$foto3 = $_FILES['foto3'];
	$tipo = $_POST['tipo'];
	$status = $_POST['status'];
	$endereco = $_POST['endereco'];
	$estado = $_POST['estado'];
	$cidade = $_POST['cidade'];
	$valor = $_POST['valor'];
	$observacoes = $_POST['observacoes'];

	//echo $imoveisObj->uploadFoto(4, 1, $foto1);

	$imoveisObj->insereImovel($titulo, $descricao, $tipo, $endereco, $estado, $cidade, $valor, $status, $observacoes='');
	
	$imovel_id = $imoveisObj->consultaImovel($titulo, '');
	$imovel_id = $imovel_id->fetchAll(\PDO::FETCH_ASSOC);

	$imoveisObj->uploadFoto($imovel_id[0]['imovel_id'], 1, $foto1);

	$imoveisObj->uploadFoto($imovel_id[0]['imovel_id'], 2, $foto2);

	$imoveisObj->uploadFoto($imovel_id[0]['imovel_id'], 3, $foto3);

	
	//echo $imoveisObj->uploadFoto(4, 1, $foto1);
	//echo $imoveisObj->uploadFoto(4, 1, $foto1);


}


} 

?>