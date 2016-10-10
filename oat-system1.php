<?php
	function __autoload($class_name){
		require_once 'admin/classes/' . $class_name . '.php';
	}

?>
<?php include("admin/includes/header.php");?>
<?php include("admin/includes/menu.php");?>
<?php include("admin/includes/topo.php");?>
<div class="right_col" role="main">
<?php
	if(isset($_GET['acao'])){
		$acao = $_GET['acao'];	
		
		if($acao=='oat-clientes'){include("admin/pages/oat-system/clientes.php");}	
		// cadastro
		if($acao=='oat-locadades'){include("admin/pages/oat-system/locadades.php");}	
		// exibicao
		if($acao=='oat-tecnicos'){include("admin/pages/oat-system/tecnicos.php");}
		// edicao
		if($acao=='oat-sistemas'){include("admin/pages/oat-system/sistemas.php");}
        // edicao
		if($acao=='oat-serviços'){include("admin/pages/oat-system/serviços.php");}
        // edicao
		if($acao=='oat-despesas'){include("admin/pages/oat-system/despesas.php");}

	}
?>
</div>
<?php include("admin/includes/footer.php");?>
