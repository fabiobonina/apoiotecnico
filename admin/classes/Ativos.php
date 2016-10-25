<?php
require_once 'Crud.php';

class Ativos extends Crud{
	
	protected $table = 'tb_ativo';
	private $cliente;
	private $localida;
	private $plaqueta;

	public function setPlaqueta($plaqueta){
		$this->plaqueta = strtoupper ($plaqueta);
	}
	public function setDescricao($descricao){
		$descricao = iconv('UTF-8', 'ASCII//TRANSLIT', $descricao);
		$this->descricao = strtoupper ($descricao);
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
		$stmt->bindParam(':id',$this->plaqueta);
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