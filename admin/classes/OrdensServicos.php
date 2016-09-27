<?php

require_once 'Crud.php';

class OrdensServicos extends Crud{
	
	protected $table = 'tb_ordemsservicos';
	private $filial;
	private $os;
	private $codCliente;
	private $codLocal;
	private $codSistema;
	private $codServico;
	private $data;
	private $codUser;
	private $status;
	private $ativo;



	public function setFilial($filial){
		$this->filial = $filial;
	}

	public function getFilial(){
		return $this->filial;
	}

	public function setOS($os){
		$this->os = $os;
	}

	public function setCodCliente($codCliente){
		$this->codCliente = $codCliente;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}

	public function setSexo($sexo){
		$this->sexo = $sexo;
	}

	public function setRaca($raca){
		$this->raca = $raca;
	}

	public function setNascimento($nascimento){
		$this->nascimento = $nascimento;
	}

	public function setDataCadastro($datacadastro){
		$this->datacadastro = $datacadastro;
	}

	public function setDatalogin($datalogin){
		$this->datalogin = $datalogin;
	}

	public function setNivel($nivel_usuario){
		$this->nivel_usuario = $nivel_usuario;
	}

	public function setAtivodo($ativado){
		$this->ativado = $ativado;
	}



	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, email, nickuser, senha, sexo, raca, data_nascimento, data_cadastro, data_ultimo_login, nivel_usuario, ativado) ";
		$sql .= "VALUES (:nome, :email, :nickuser, :senha, :sexo, :raca, :data_nascimento, :data_cadastro, :data_ultimo_login, :nivel_usuario, :ativado)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':email',$this->email);
		$stmt->bindParam(':nickuser',$this->nickuser);
		$stmt->bindParam(':senha',$this->senha);
		$stmt->bindParam(':sexo',$this->sexo);
		$stmt->bindParam(':raca',$this->raca);
		$stmt->bindParam(':data_nascimento',$this->nascimento);
		$stmt->bindParam(':data_cadastro',$this->datacadastro);
		$stmt->bindParam(':data_ultimo_login',$this->datalogin);
		$stmt->bindParam(':nivel_usuario',$this->nivel_usuario);
		$stmt->bindParam(':ativado',$this->ativado);

		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, email = :email, nickuser = :nickuser, senha = :senha, sexo = :sexo, raca = :raca WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':nickuser',$this->nickuser);
		$stmt->bindParam(':senha',$this->senha);
		$stmt->bindParam(':sexo',$this->sexo);
		$stmt->bindParam(':raca',$this->raca);
		$stmt->bindParam(':data_nascimento',$this->nascimento);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		
	}

}