<?php
require_once 'Crud.php';

class Servicos extends Crud{
	
	protected $table = 'tb_servicos';
	private $cod;
	private $descricao;
	private $ativo;

	public function setCod($cod){
		$this->cod = $cod;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (id, descricao, ativo) ";
		$sql .= "VALUES (:id, :descricao, :ativo)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':id',$this->cod);
		$stmt->bindParam(':descricao',$this->descricao);
		$stmt->bindParam(':ativo',$this->ativo);

		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET descricao = :descricao, ativo = :ativo WHERE id = :id ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':descricao', $this->descricao);
		$stmt->bindParam(':ativo',$this->ativo);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();
		
	}


}