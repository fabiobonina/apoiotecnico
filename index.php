
<?php include("includes/header-user.php");?>
</head>
<body>
<?php include("includes/topo-user.php");?>


<?php
	require_once("admin/conexao/conecta.php");
	require("admin/functions/limita-texto.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sistema de Postagem com PHP PDO</title>
<link rel="stylesheet" type="text/css" href="css/reset.css" media="all">
<link rel="stylesheet" type="text/css" href="css/estilo.css" media="all">
</head>

<body>
<?php
	if(isset($_GET['acao'])){
		$acao = $_GET['acao'];	
		
		if($acao=='welcome'){include("pages/oat/oat-inicio.php");}	
		
		// OAT solicitar
		if($acao=='oat-solicitar'){include("pages/oat/oat-solicitar.php");}	
		
		// OAT Abrir
		if($acao=='oat-ordemservico'){include("pages/oat/oat-ordemservico.php");}
		
		// OAT Fechar
		if($acao=='oat-finalizar'){include("pages/oat/oat-finalizar.php");}
		
		// OAT baixar
		if($acao=='oat-baixar'){include("pages/oat/oat-baixar.php");}
		
		// OAT Concluidas
		if($acao=='oat-concluidas'){include("pages/oat/oat-concluidas.php");}
		
	}else{
		include("pages/oat/oat-inicio.php");
	}
?>


<?php include("includes/footer-user.php");?>
</body>
</html>