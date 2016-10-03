<?php
	function __autoload($class_name){
		require_once 'admin/classes/' . $class_name . '.php';
	}

    include("includes/header_cadastro.php");
?>

<!--DOCTYPE HTML>
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
<!/head>
<body>

	<div class="container">

		<?php
	
		$usuario = new Usuarios();

		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$email = $_POST['email'];
			$nickuser=$_POST["nickuser"];
			$senha=$_POST["senha"];
			$sexo=$_POST["sexo"];
			$raca=$_POST["raca"];
			$nascimento=$_POST["nascimento"];
			$datacadastro = date("Y-m-d H:i:s");
			$datalogin = date("Y-m-d H:i:s");
			$nivel_usuario = "0";
			$ativado = "0";

			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setNickuser($nickuser);
			$usuario->setSenha($senha);
			$usuario->setSexo($sexo);
			$usuario->setRaca($raca);
			$usuario->setNascimento($nascimento);
			$usuario->setDataCadastro($datacadastro);
			$usuario->setDatalogin($datalogin);
			$usuario->setNivel($nivel_usuario);
			$usuario->setAtivodo($ativado);
			# Insert
			if($usuario->insert()){
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
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$nickuser=$_POST["nickuser"];
			$senha=$_POST["senha"];
			$sexo=$_POST["sexo"];
			$raca=$_POST["raca"];
			$nascimento=$_POST["nascimento"];

			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setNickuser($nickuser);
			$usuario->setSenha($senha);
			$usuario->setSexo($sexo);
			$usuario->setRaca($raca);
			$usuario->setNascimento($nascimento);

			if($usuario->update($id)){
				echo "Atualizado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($usuario->delete($id)){
				echo "Deletado com sucesso!";
			}

		endif;
		?>

		<?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $usuario->find($id);
		?>

		<form lass="form-horizontal" method="post" action="">
			<div class="control-group">
    			<label class="control-label" for="inputNome">Nome</label>
    			<div class="controls">
      				<input type="text" name="nome" id="inputNome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:">
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">Email</label>
    			<div class="controls">
      				<input type="text" name="email" id="inputEmail" value="<?php echo $resultado->email; ?>" placeholder="E-mail:" />
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputEmailR">Confirmar Email</label>
    			<div class="controls">
      				<input type="text" name="emailR" id="inputEmailR" placeholder="Email"/>
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputUser">Usuário</label>
    			<div class="controls">
      				<input type="text" name="nickuser" id="inputUser" value="<?php echo $resultado->nickuser; ?>" placeholder="Usuário:" />
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label"  for="inputPassword">Senha</label>
    			<div class="controls">
      				<input type="password" name="senha" id="inputPassword" value="<?php echo $resultado->senha; ?>" placeholder="Senha:" />
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label"  for="inputPasswordR">Confirmar Senha</label>
    			<div class="controls">
      				<input type="password" name="senhaR" id="inputPasswordR" placeholder="Senha"/>
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="sexo">Sexo</label>
    			<div class="controls">
    				<select name="sexo" />
    					<option><?php echo $resultado->sexo; ?></option>
    					<option value="Masculino" >Masculino</option>
    					<option value="Feminino" >Feminino</option>
    				</select><br>
    			</div>
  			</div>
  			<div class="control-group">
  				<label class="control-label for="raca">Etnia:</label>
  				<div class="controls">
   					<select name="raca" />
	    				<option><?php echo $resultado->raca; ?></option>
		    			<option value="Branco">Branco</option>
		    			<option value="Negro">Negro</option>
		    			<option value="Pardo">Pardo</option>
		    			<option value="Mulato">Mulato</option>
		    			<option value="Caboclo">Caboclo</option>
		    			<option value="Cafuzo">Cafuzo</option>
    				</select><br>
    			</div>
    		</div>
  			<div class="control-group">
    			<label class="control-label"  for="inputNascimento">Nascimento</label>
    			<div class="controls">
      				<input type="date" name="nascimento" id="inputNascimento" value="<?php echo date('Y-m-d',strtotime($resultado->data_nascimento)) ?>"  placeholder="Data Nascimento" />
    			</div>
  			</div>
    		<div class="control-group">
    			<div class="controls">
				<input type="hidden" name="id" value="<?php echo $resultado->id; ?>"><br />
				<input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">
    			</div>
  			</div>
		</form>


		<?php }else{ ?>

		<form class="form-horizontal" method="post" action="">
			<div class="control-group">
    			<label class="control-label" for="inputNome">Nome</label>
    			<div class="controls">
      				<input type="text" name="nome" id="inputNome" placeholder="Nome">
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">Email</label>
    			<div class="controls">
      				<input type="text" name="email" id="inputEmail" placeholder="Email">
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputEmailR">Confirmar Email</label>
    			<div class="controls">
      				<input type="text" name="emailR" id="inputEmailR" placeholder="Email">
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="inputUser">Usuário</label>
    			<div class="controls">
      				<input type="text" name="nickuser" id="inputUser" placeholder="Usuário">
    			</div>
  			</div>
  			 <div class="control-group">
    			<label class="control-label"  for="inputPassword">Senha</label>
    			<div class="controls">
      				<input type="password" name="senha" id="inputPassword" placeholder="Senha">
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label"  for="inputPasswordR">Confirmar Senha</label>
    			<div class="controls">
      				<input type="password" name="senhaR" id="inputPasswordR" placeholder="Senha">
    			</div>
  			</div>
  			<div class="control-group">
    			<label class="control-label" for="sexo">Sexo</label>
    			<div class="controls">
    				<select name="sexo" />
    					<option>Selecione</option>
    					<option value="Masculino" >Masculino</option>
    					<option value="Feminino" >Feminino</option>
    				</select><br>
    			</div>
  			</div>
  			<div class="control-group">
  				<label class="control-label" for="raca">Etnia:</label>
  				<div class="controls">
   					<select name="raca" />
	    				<option>Selecione</option>
		    			<option value="Branco">Branco</option>
		    			<option value="Negro">Negro</option>
		    			<option value="Pardo">Pardo</option>
		    			<option value="Mulato">Mulato</option>
		    			<option value="Caboclo">Caboclo</option>
		    			<option value="Cafuzo">Cafuzo</option>
    				</select><br>
    			</div>
    		</div>
    		<div class="control-group">
    			<label class="control-label"  for="inputNascimento">Nascimento</label>
    			<div class="controls">
      				<input type="date" name="nascimento" id="inputNascimento" placeholder="Data Nascimento"/>
    			</div>
  			</div>
  			<div class="control-group">
    			<div class="controls">
      				<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">
    			</div>
  			</div>
		</form>

		<?php } ?>

		<table class="table table-hover">
			
			<thead>
				<tr>
					<th>#</th>
					<th>Nome:</th>
					<th>E-mail:</th>
					<td>Usuário:</td>
					<td>Sexo:</td>
					<td>Raça:</td>
					<td>Data de Nascimento:</td>
					<th>Ações:</th>
				</tr>
			</thead>
			
			<?php foreach($usuario->findAll() as $key => $value): ?>

			<tbody>
				<tr>
					<td><?php echo $value->id; ?></td>
					<td><?php echo $value->nome; ?></td>
					<td><?php echo $value->email; ?></td>
					<td><?php echo $value->nickuser; ?></td>
					<td><?php echo $value->sexo; ?></td>
					<td><?php echo $value->raca; ?></td>
					<td><?php echo $value->data_nascimento; ?></td>
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