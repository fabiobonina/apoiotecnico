<?php
ob_start();
session_start();
// login
if(!isset($_SESSION['loginUser']) && (!isset($_SESSION['loginSenha']))){
	header("Location: ../login.php?acao=negado");exit;
}

if($_SESSION['loginNivel'] < 2){
	echo '<div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <strong>Acesso não pernitido!</strong> Seu nivel não tem permição.
         </div>';
	header("Location: ../index.php?acao=negado");exit;
}

	include("includes/logout.php");

	$usuarioLogado = $_SESSION['loginUser'];
	$senhaLogado = $_SESSION['loginSenha'];
	$nomeLogado = $_SESSION['loginNome'];
	$nivelLogado = $_SESSION['loginNivel'];

?>

<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<title>SKYHUB System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<script src="js/jquery-1.7.2.min.js"></script>     
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>