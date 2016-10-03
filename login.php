<?php
ob_start();
session_start();
if(isset($_SESSION['usuarioTeste']) && (isset($_SESSION['senhaTeste']))){
	header("Location: index.php");exit;
}

?>
<!DOCTYPE html>
<html lang="br">
  
<head>
    <meta charset="utf-8">
    <title>SkyHub - Apoio Tecnico</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="admin/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="admin/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="admin/css/style.css" rel="stylesheet" type="text/css">
<link href="admin/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	        
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.php">
				SkyHub - Login	
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
						<li class=""><a href="login.php?acao=novo-usuario">Cadastrar</a></li>
						

					<li class="">						
						<a href="index.php" class="">
							<i class="icon-chevron-left"></i>
							Acessar o site
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<?php
	if(isset($_GET['acao'])){
		$acao = $_GET['acao'];	
		//Novo usuario
		if($acao=='novo-usuario'){include("pages/login/novo-usuario.php");}	
		
		//Login
	}else{
		include("pages/login/logar.php");
	}
?>

<script src="admin/js/jquery-1.7.2.min.js"></script>
<script src="admin/js/bootstrap.js"></script>

<script src="admin/js/signin.js"></script>

</body>

</html>