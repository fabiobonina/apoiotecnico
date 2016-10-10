<?php
require_once 'Crud.php';

class Localidades extends Crud{
	
	protected $table = 'tb_localidades';
	private $cliente;
	private $regional;
	private $nome;
	private $municipio;
	private $uf;
	private $latitude;
	private $longitude;
	private $ativo;

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setCliente($cliente){
		$this->cliente = $cliente;
	}
	public function setRegional($regional){
		$this->regional = $regional;
	}
	public function setMunicipio($municipio){
		$this->municipio = $municipio;
	}
	public function setUf($uf){
		$this->uf = $uf;
	}
	public function setLat($latitude){
		$this->latitude = $latitude;
	}
	public function setLong($longitude){
		$this->longitude = $longitude;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (cliente, regional, nome, municipio, uf, latitude, longitude, ativo) ";
		$sql .= "VALUES (:cliente, :regional, :nome, :municipio, :uf, :latitude, :longitude, :ativo)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':cliente',$this->cliente);
		$stmt->bindParam(':regional',$this->regional);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':municipio',$this->municipio);
		$stmt->bindParam(':uf',$this->uf);
		$stmt->bindParam(':latitude',$this->latitude);
		$stmt->bindParam(':longitude',$this->longitude);
		$stmt->bindParam(':ativo',$this->ativo);

		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET cliente = :cliente, regional = :regional, nome = :nome, municipio = :municipio, uf = :uf, 	latidude = :latidude, ativo = :ativo WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':cliente',$this->cliente);
		$stmt->bindParam(':regional',$this->regional);
		$stmt->bindParam(':nome',$this->nome);
		$stmt->bindParam(':municipio',$this->municipio);
		$stmt->bindParam(':uf',$this->uf);
		$stmt->bindParam(':latitude',$this->latitude);
		$stmt->bindParam(':longitude',$this->longitude);
		$stmt->bindParam(':ativo',$this->ativo);
		return $stmt->execute();
		
	}

	public function logar(){

		// SELECIONAR BANCO DE DADOS
		
		$sql = "SELECT * from $this->table WHERE BINARY nickuser=:nickuser AND BINARY senha=:senha ";

			$stmt = DB::prepare($sql);
			$stmt->bindParam(':nickuser', $this->nickuser);
			$stmt->bindParam(':senha', $this->senha);
			$stmt->execute();
			$contar = $stmt->rowCount();
			if($contar>0){
				//$usuario = $this->nickuser;
				//$senha	 = $this->senha;
				//$_SESSION['usuarioUser'] = $usuario;
				//$_SESSION['senhaUser'] = $senha;
				
				$loop = $stmt->fetchAll();
				foreach ($loop as $show){
					$loginId = $show->id;
					$loginNome = $show->nome;
					$loginEmail = $show->email;
					$loginUser = $show->nickuser;
					$loginSenha = $show->senha;
					$loginNivel = $show->nivel;
				}
				$_SESSION['loginId'] = $loginId;
				$_SESSION['loginNome'] = $loginNome;
				$_SESSION['loginEmail'] = $loginEmail;
				$_SESSION['loginUser'] = $loginUser;
				$_SESSION['loginSenha'] = $loginSenha;
				$_SESSION['loginNivel'] = $loginNivel;

				echo '<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Logado com Sucesso!</strong> Redirecionando para o sistema.
                </div>';
				
				header("Refresh: 6, index.php?acao=welcome");
			}else{
				echo '<div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>Erro ao logar!</strong> Os dados estão incorretos.
                </div>';
			}
		
	}


}