<?php

require_once 'Crud.php';

class OrdensServicos extends Crud{
	
	protected $table = 'tb_ordemsservicos';
	private $codUser;
	private $filial;
	private $os;
	private $codCliente;
	private $codLocal;
	private $codSistema;
	private $codServico;
	private $dataSol;
	private $codUser;
	private $status;
	private $ativo;


	public function setCodUser($codUser){
		$this->codUser = $codUser;
	}

	public function getCodUser(){
		return $this->codUser;
	}

	public function setFilial($filial){
		$this->filial = $filial;
	}

	public function setOS($os){
		$this->os = $os;
	}

	public function setCodCliente($codCliente){
		$this->codCliente = $codCliente;
	}

	public function setCodLocal($codLocal){
		$this->codLocal = $codLocal;
	}

	public function setCodSistema($codSistema){
		$this->codSistema = $codSistema;
	}

	public function setDataSol($dataSol){
		$this->dataSol = $dataSol;
	}

	public function setDataOs($dataOs){
		$this->dataOs = $dataOs;
	}

	public function setDataFech($dataFech){
		$this->dataTerm = $dataTerm;
	}

	public function setDataTerm($dataTerm){
		$this->dataTerm = $dataTerm;
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