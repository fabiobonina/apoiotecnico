
<?php
	function __autoload($class_name){
		require_once 'admin/classes/' . $class_name . '.php';
	}
?>

<?php 
	include("includes/header_cadastro.php");
	include("conexao/conexao.php");

	$mysqli = new mysqli("localhost","root","","riskzone");

	if(isset($_POST['confirmar'])){

		// 1 - Registrando dos dados
		if(!isset($_SESSION))
			session_start();

		foreach ($_POST as $chave => $valor) {
			$_SESSION[$chave] = $mysqli-real_escape_string($valor);

		// 2 Validação dos Dados
			if(strlen($_SESSION['nome']) == 0)
				$erro[] = "Preecha o nome.";

			if(substr_count($_SESSION['email'], '@') != 1 || substr_count($_SESSION['email'], '.') 
				< 1 || substr_count($_SESSION['email'], '.') > 2)
				$erro[] = "Preecha o email corretamente.";

			if(substr_count($_SESSION['email'], $_SESSION['rmail']) != 0)
				$erro[] = "E-mails não coincidem.";

			if(strlen($_SESSION['nickuser']) == 0)
				$erro[] = "Preecha o nome de usuário.";

			if(strlen($_SESSION['senha']) <4 ||strlen($_SESSION['senha']) > 16)
				$erro[] = "Preecha a senha corretamente.";

			if(strcmp($_SESSION['senha'], $_SESSION['rsenha']) != 0)
				$erro[] = "Senhas não coincidem.";

			if(strlen($_SESSION['sexo']) == 0)
				$erro[] = "Preecha o sexo.";

			if(strlen($_SESSION['raca']) == 0)
				$erro[] = "Preecha a etnia..";

			if(strlen($_SESSION['nivel_usuario']) == 0)
				$erro[] = "Preecha o nível de acesso.";

		// 3 Inserção no Banco de Dados
			if(count($erro) == 0){
				$sql_code  = "INSERT INTO usuarios(
					nome, 
					email,
					nickuser, 
					senha, 
					sexo, 
					raca, 
					nivel_usuario, 
					data_cadastro)
					VALUES(
					'$_SESSION[nome]',
					'$_SESSION[email]',
					'$_SESSION[nickuser]',
					'$_SESSION[senha]',
					'$_SESSION[sexo]',
					'$_SESSION[raca]',
					'$_SESSION[nivel_usuario]',
					'$_SESSION[data_cadastro]'
					)";
				$confirma = $mysqli->query($sql_code) or die ($mysqli->error);

				if($confirma){
					unset($_SESSION[nome],
					$_SESSION[email],
					$_SESSION[nickuser],
					$_SESSION[senha],
					$_SESSION[sexo],
					$_SESSION[raca],
					$_SESSION[nivel_usuario],
					$_SESSION[data_cadastro]);
					echo "<script> location.href='home.php?p=listarUsuario'; </script>";
				}else
					$erro[] = $confirma;

				}
		}
	}	

?>
 <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
  </script>
</head>
<body>

<?php include("includes/topo_cadastro.php"); ?>

<a href="home.php?listarUsuario">Voltar</a>
	<form action="repositorio/usuario_insert.php" METHOD="POST">
	
    <label for="nome">Nome: </label>
    <input required type="text" name="nome" required /><br>

    <label for="email">E-mail:</label>
    <input required type="email" name="email" /><br>

    <label for="remail">Confirmar E-mail:</label>
    <input required type="email" name="remail" /><br>

    <label for="nickuser">Usuário:</label>
    <input required type="text" name="nickuser" /><br>

    <label for="senha">Confirmar Senha:</label>
    <input required type="password" name="senha" /><br>

    <label for="rsenha">Senha:</label>
    <input required type="password" name="rsenha" /><br>

    <label for="sexo">Sexo:</label>
    <select name="sexo" />
    	<option>Selecione</option>
    	<option value="1" >Masculino</option>
    	<option value="2" >Feminino</option>
    </select><br>

    <label for="raca">Etnia:</label>
    <select name="raca" />
    	<option>Selecione</option>
    	<option value="1">Branco</option>
    	<option value="2">Negro</option>
    	<option value="3">Pardo</option>
    	<option value="4">Mulato</option>
    	<option value="5">Caboclo</option>
    	<option value="6">Cafuzo</option>
    </select><br>

    <label for="nascimento">Data de Nascimento:</label>
    <input required type="date" name="nascimento" /><br>

    <input type="submit" value="Cadastrar">
</form>
<?php include("includes/footer.php"); ?>
</body>
</html>