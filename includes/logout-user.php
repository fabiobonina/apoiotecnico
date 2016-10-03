<?php
if(isset($_REQUEST['sair'])){	
	session_destroy();
	session_unset($_SESSION['usuarioSystem']);
	session_unset($_SESSION['senhaSystem']);
	header("Location: index.php");	
}
?>