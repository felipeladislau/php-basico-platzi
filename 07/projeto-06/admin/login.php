<?php

require '../vendor/autoload.php';
require '../classes/settings.config.php';

use classes\User;
use classes\DBConnection;

session_start();

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Sistema de Imobiliária Platzi - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />

    <!-- font-awesome icons CSS-->
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <!-- //font-awesome icons CSS-->

    <!-- side nav css file -->
    <link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
    <!-- side nav css file -->
    
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>

    <!--webfonts-->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <!--//webfonts-->
    
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->

</head> 
<body class="cbp-spmenu-push">
    <div class="main-content">

		<div id="page-wrapper" style="margin: 0em;">
			<div class="main-page login-page ">
				<h2 class="title1">Acesso administrativo - Gestão de imóveis</h2>
				<div class="widget-shadow">
					<div class="login-body">
						<form method="post" action="">
							<input type="email" class="user" name="username" placeholder="Digite seu e-mail" required="">
							<input type="password" name="password" class="lock" placeholder="Senha" required="">
							
							<input type="submit" name="loginForm" value="Login">

						</form>
					</div>
				</div>
			</div>
		</div>


		<!--footer-->
	<div class="footer">
		   <p>&copy; Sistema de controle de imóveis Platzi | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>		</div>
        <!--//footer-->
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
	<!-- //Bootstrap Core JavaScript -->
   
</body>
</html>


<?php

if(isset($_POST['loginForm'])){

    //$email = 'felipe.s.ladislau@gmail.com'; 
    //$password = '123456'; 
    
    $email = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    
    $user = new classes\User;
	
    $user->dbConnect($CREDENCIAIS['STRING'], $CREDENCIAIS['USER'], $CREDENCIAIS['PASS']);

    if( $user->login( $email, $password) ) {
    
        //echo "Login efetuado com sucesso!";
        header("Location: index.php");
    
    } else {
    
        echo "<script type='text/javascript'> 
                alert('Ops, erro ao realizar login. Tente novamente!');
                window.location.href = 'login.php';
                </script>";
        //header('Location: login.html');
        //$user->printMsg();
        die;
    
    }

}

?>