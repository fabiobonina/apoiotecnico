<?php
if(isset($_REQUEST['sair'])){	
	session_destroy();
	session_unset($_SESSION['usuarioTeste']);
	session_unset($_SESSION['senhaTeste']);	
	header("Location: index.php");	
}
?>