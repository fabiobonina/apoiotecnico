<?php
	function __autoload($class_name){
		require_once 'admin/classes/' . $class_name . '.php';
	}

?>

		<?php
	
		$usuario = new Usuarios();

		if(isset($_POST['logar'])):

			$nickuser=$_POST["nickuser"];
			$senha=$_POST["senha"];
			//$datalogin = date("Y-m-d H:i:s");

			$usuario->setNickuser($nickuser);
			$usuario->setSenha($senha);
			//$usuario->setDatalogin($datalogin);

			# Insert
			if($usuario->logar()){
				echo "Logado com sucesso!";
			}

		endif;

		?>

<?php
if(isset($_GET['acao'])){
	
	if(!isset($_POST['logar'])){
	
		$acao = $_GET['acao'];
		if($acao=='negado'){
			echo '<div class="alert alert-danger">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  <strong>Erro ao acessar!</strong> Você precisa estar logado p/ acessar o Sistema.
					</div>';	
		}
	}
}
?>

<div class="account-container">
	<div class="content clearfix">
		
		<form action="#" method="post" enctype="multipart/form-data">
		
			<h1>Faça seu Login</h1>		
			
			<div class="login-fields">
				
				<p>Entre com seus dados:</p>
				
				<div class="field">
					<label for="username">Usuário</label>
					<input type="text" id="username" name="nickuser" value="" placeholder="Usuário" class="login username-field" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Senha:</label>
					<input type="password" id="password" name="senha" value="" placeholder="Senha" class="login password-field"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">			
				<input type="submit" name="logar" value="Logar" class="button btn btn-success btn-large">
			</div> <!-- .actions -->
				<li class="">
						<a href="lembrar.php" class="">Esqueceu sua senha?</a>
					</li>
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->