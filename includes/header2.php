<?php
ob_start();
session_start();
// login
if(!isset($_SESSION['usuarioTeste']) && (!isset($_SESSION['senhaTeste']))){
	header("Location: admin/index.php");exit;
}

	include("admin/conexao/conecta.php");
	include("admin/includes/logout.php");
	
	$usuarioLogado = $_SESSION['usuarioTeste'];
	$senhaLogado = $_SESSION['senhaTeste'];
	
// seleciona a usuario logado
		$selecionaLogado = "SELECT * from login WHERE usuario=:usuarioLogado AND senha=:senhaLogado";
		try{
			$result = $conexao->prepare($selecionaLogado);	
			$result->bindParam('usuarioLogado',$usuarioLogado, PDO::PARAM_STR);		
			$result->bindParam('senhaLogado',$senhaLogado, PDO::PARAM_STR);		
			$result->execute();
			$contar = $result->rowCount();	
			
			if($contar =1){
				$loop = $result->fetchAll();
				foreach ($loop as $show){
					$nomeLogado = $show['nome'];
					$userLogado = $show['usuario'];
					$emailLogado = $show['email'];
					$senhaLogado = $show['senha'];
					$nivelLogado = $show['nivel'];
				}

				$_SESSION['nivelUse'] = $nivelLogado;
				
			}
			
			}catch (PDOWException $erro){ echo $erro;}
	
?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<title>SKYHUB System - Apoio Técnico</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="admin/css/bootstrap.min.css" rel="stylesheet">
<link href="admin/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="admin/css/font-awesome.css" rel="stylesheet">
<link href="admin/css/style.css" rel="stylesheet">
<link href="admin/css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script src="admin/js/jquery-1.7.2.min.js"></script>     
<script src="admin/js/jquery.maskedinput.js" type="text/javascript"></script>