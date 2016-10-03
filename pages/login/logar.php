<?php
include("admin/conexao/conecta.php");
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

	if(isset($_POST['logar'])){
		// RECUPERAR DADOS FORM
		$usuario = trim(strip_tags($_POST['usuario']));
		$senha	 = trim(strip_tags($_POST['senha']));
		
		// SELECIONAR BANCO DE DADOS
		
		$select = "SELECT * from login WHERE BINARY usuario=:usuario AND BINARY senha=:senha ";
		
		try{
			$result = $conexao->prepare($select);
			$result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
			$result->bindParam(':senha', $senha, PDO::PARAM_STR);
			$result->execute();
			$contar = $result->rowCount();
			if($contar>0){
				$usuario = $_POST['usuario'];
				$senha	 = $_POST['senha'];
				$_SESSION['usuarioTeste'] = $usuario;
				$_SESSION['senhaTeste'] = $senha;
				
				echo '<div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Logado com Sucesso!</strong> Redirecionando para o sistema.
                </div>';
				
				header("Refresh: 3, ../index.php?acao=welcome");
			}else{
				echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro ao logar!</strong> Os dados estão incorretos.
                </div>';
			}
			
		}catch(PDOException $e){
			echo $e;
		}
		
		
		
	}// se clicar no botão entrar no sistema
	
?>

<div class="account-container">
	<div class="content clearfix">
		
		<form action="#" method="post" enctype="multipart/form-data">
		
			<h1>Faça seu Login</h1>		
			
			<div class="login-fields">
				
				<p>Entre com seus dados:</p>
				
				<div class="field">
					<label for="username">Usuário</label>
					<input type="text" id="username" name="usuario" value="" placeholder="Usuário" class="login username-field" />
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