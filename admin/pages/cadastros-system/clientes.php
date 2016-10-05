<?php
	function __autoload($class_name){
		require_once '../../classes/' . $class_name . '.php';
	}

    //include("../includes/header_cadastro.php");
?>

<--DOCTYPE HTML>
<html land="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>PHP OO</title>
  <meta name="description" content="PHP OO" />
  <meta name="robots" content="index, follow" />
   <meta name="author" content="Andrew Esteves"/>
   <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" />
-->
  <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>

<body>

	<div class="container">

		<?php
	
		$cliente = new Clientes();

		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$nick=$_POST["nick"];
			$ativo = "0";

			$cliente->setNome($nome);
			$cliente->setNick($nick);
			$cliente->setAtivo($ativo);
			# Insert
			if($cliente->insert()){
				echo "Inserido com sucesso!";
			}

		endif;

		?>
		<header class="masthead">
			<h1 class="muted">PHP OO</h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="active"><a href="index.php">Página inicial</a></li>
							<li class="active"><a href="checkin.php">Check-In</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<?php 
		if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$nome  = $_POST['nome'];
			$nick=$_POST["nick"];
			$ativo = "0";

			$cliente->setNome($nome);
			$cliente->setNick($nick);
			$cliente->setAtivo($ativo);

			if($cliente->update($id)){
				echo "Atualizado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($cliente->delete($id)){
				echo "Deletado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $cliente->find($id);
		?>

		<form lass="form-horizontal" method="post" action="">
			<div class="control-group">
    			<label class="control-label" for="inputNome">Nome Completo</label>
      			<input type="text" name="nome" id="inputNome" value="<?php echo $resultado->nome; ?>" placeholder="Nome Completo:">
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputUser">Nome Fantasia</label>
      			<input type="text" name="nick" id="inputUser" value="<?php echo $resultado->nick; ?>" placeholder="Nome Fantasia:" />
  			</div>
    		<div class="control-group">
				<input type="hidden" name="id" value="<?php echo $resultado->id; ?>"><br />
				<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">
  			</div>
		</form>


		<?php }else{ ?>

		<form class="form-horizontal" method="post" action="">
			<div class="control-group">
    			<label class="control-label" for="inputNome">Nome Completo</label>
      			<input type="text" name="nome" id="inputNome" value="<?php echo $resultado->nome; ?>" placeholder="Nome Completo:">
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputUser">Nome Fantasia</label>
      			<input type="text" name="nick" id="inputUser" value="<?php echo $resultado->nick; ?>" placeholder="Nome Fantasia:" />
  			</div>
  			<div class="control-group">
      				<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">
  			</div>
		</form>

		<?php } ?>

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Nome:</th>
					<td>Nome Fantasia:</td>
					<th>Ações:</th>
				</tr>
			</thead>
			
			<?php foreach($cliente->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->nome; ?></td>
					<td><?php echo $value->nick; ?></td>
					<td>
						<?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
						<?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
					</td>
				</tr>
			</tbody>

			<?php endforeach; ?>

		</table>

	</div>

<script src="js/jQuery.js"></script>
<script src="js/bootstrap.js"></script>
<?php include("includes/footer.php"); ?>
</body>
</html>