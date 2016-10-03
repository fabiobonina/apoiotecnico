<?php
	function __autoload($class_name){
		require_once 'admin/classes/' . $class_name . '.php';
	}

    //include("includes/header_cadastro.php");
?>

		<?php
	
		$usuario = new Usuarios();

		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$email = $_POST['email'];
			$nickuser=$_POST["nickuser"];
			$senha=$_POST["senha"];
			$nivel_usuario = "0";
			$ativo = "0";
			$datacadastro = date("Y-m-d H:i:s");
			$datalogin = date("Y-m-d H:i:s");

			$usuario->setNome($nome);
			$usuario->setEmail($email);
			$usuario->setNickuser($nickuser);
			$usuario->setSenha($senha);
			$usuario->setDataCadastro($datacadastro);
			$usuario->setDatalogin($datalogin);
			$usuario->setNivel($nivel_usuario);
			$usuario->setAtivo($ativo);
			# Insert
			if($usuario->insert()){
				echo "Inserido com sucesso!";
			}

		endif;

		?>

<div class="account-container">
	<div class="content clearfix">
        	<form class="form-horizontal" method="post" action="" >

			<h1>Faça seu Cadastro</h1>		
			<div class="login-fields">
				<p>Entre com seus dados:</p>
				
			<div class="field">
    			<label for="inputNome">Nome</label>
      			<input type="text" name="nome" id="inputNome" placeholder="Nome" class="login username-field">
    		</div>

  			<div class="field">
    			<label for="inputEmail">Email</label>
      			<input type="text" name="email" id="inputEmail" placeholder="Email" class="login email-field">
  			</div>
  			<div class="field">
    			<label for="inputEmailR">Confirmar Email</label>
      			<input type="text" name="emailR" id="inputEmailR" placeholder="Confirmar Email" class="login email-field">
  			</div>
  			<div class="field">
    			<label for="username">Usuário</label>
      			<input type="text" name="nickuser" id="inputUser" placeholder="Usuário" class="login username-field">
  			</div>

  			 <div class="field">
    			<label for="inputPassword">Senha</label>
      			<input type="password" name="senha" id="inputPassword" placeholder="Senha" class="login password-field">
  			</div>
  			<div class="field">
    			<label for="inputPasswordR">Confirmar Senha</label>
      			<input type="password" name="senhaR" id="inputPasswordR" placeholder="Confirmar Senha" class="login password-field">
  			</div>

			</div> <!-- /login-fields -->
			
			<div class="login-actions">			
				<input type="submit" name="cadastrar" value="Cadastrar" class="button btn btn-success btn-large">
			</div> <!-- .actions -->

		</form>
        	</div> <!-- /content -->
	
</div> <!-- /account-container -->