
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
		
		if($acao=='welcome'){include("pages/inicio.php");}	
		
		// OS solicitar
		if($acao=='os-solicitar'){include("pages/os-solicitar.php");}	
		
		// OS Abrir
		if($acao=='os-ordemservico'){include("pages/os-ordemservico.php");}
		
		// OS Fechar
		if($acao=='os-finalizar'){include("pages/os-finalizar.php");}
		
		// OS baixar
		if($acao=='os-baixar'){include("pages/os-baixar.php");}
		
		// OS Concluidas
		if($acao=='os-concluidas'){include("pages/os-concluidas.php");}
		
	}else{
		include("pages/inicio.php");
	}
?>


<?php include("includes/footer2.php");?>
</body>
</html>