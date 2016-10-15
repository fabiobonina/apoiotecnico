<?php

require_once 'Crud.php';

class Oats extends Crud{
	
	protected $table = 'tb_oat';
	private $nickUser;
	private $cliente;
	private $localidade;
	private $servico;
	private $sistema;
	private $dataOat;
	private $filial;
	private $os;
	private $dataOS;
	private $dataFech;
	private $dataTerm;
	private $status;
	private $ativo;

	public function setUser($nickUser){
		$nickUser = iconv('UTF-8', 'ASCII//TRANSLIT', $nickUser);
		$this->nickUser = strtoupper ($nickUser);
	}
	public function getUser(){
		return $this->nickUser;
	}
	public function setCliente($cliente){
		$cliente = iconv('UTF-8', 'ASCII//TRANSLIT', $cliente);
		$this->cliente = strtoupper ($cliente);
	}
	public function setLocalidade($localidade){
		$localidade = iconv('UTF-8', 'ASCII//TRANSLIT', $localidade);
		$this->localidade = strtoupper ($localidade);
	}
	public function setServico($servico){
		$servico = iconv('UTF-8', 'ASCII//TRANSLIT', $servico);
		$this->servico = strtoupper ($servico);
	}
	public function setSistema($sistema){
		$idCliente = iconv('UTF-8', 'ASCII//TRANSLIT', $sistema);
		$this->sistema = strtoupper ($sistema);
	}
	public function setDataOat($dataOat){
		$this->dataOat = $dataOat;
	}
	public function setFilial($filial){
		$this->filial = $filial;
	}
	public function setOs($os){
		$this->os = $os;
	}
	public function setDataOs($dataOs){
		$this->dataOs = $dataOs;
	}
	public function setDataFech($dataFech){
		$this->dataFech = $dataFech;
	}
	public function setDataTerm($dataTerm){
		$this->dataTerm = $dataTerm;
	}
	public function setStatus($status){
		$this->status = $status;
	}
	public function setAtivo($ativo){
		$this->ativo = $ativo;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nickuser, tb_clientes_id, tb_localidades_id, tb_servicos_id, tb_sistema_id, data_sol, filial, os, data_os, data_fech, data_term, status, ativo) ";
		$sql .= "VALUES (:nickuser, :tb_clientes_id, :tb_localidades_id, :tb_servicos_id, :tb_sistema_id, :data_sol, :filial, :os, :data_os, :data_fech, :data_term, :status, :ativo)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nickuser',$this->nickUser);
		$stmt->bindParam(':tb_clientes_id',$this->cliente);
		$stmt->bindParam(':tb_localidades_id',$this->localidade);
		$stmt->bindParam(':tb_servicos_id',$this->servico);
		$stmt->bindParam(':tb_sistema_id',$this->sistema);
		$stmt->bindParam(':data_sol',$this->dataOat);
		$stmt->bindParam(':filial',$this->filial);
		$stmt->bindParam(':os',$this->os);
		$stmt->bindParam(':data_os',$this->dataOs);
		$stmt->bindParam(':data_fech',$this->dataFech);
		$stmt->bindParam(':data_term',$this->dataTerm);
		$stmt->bindParam(':status',$this->status);
		$stmt->bindParam(':ativo',$this->ativo);

		return $stmt->execute(); 

	}

	public function update($id){
		$sql  = "UPDATE $this->table SET nickuser = :nickuser, tb_clientes_id = :tb_clientes_id, tb_localidades_id = :tb_localidades_id, tb_servicos_id = :tb_servicos_id, tb_sistema_id = :tb_sistema_id, data_sol = :data_sol, filial = :filial, os = :os, data_os = :data_os, data_fech = :data_fech, data_term = :data_term, status = :status, ativo = :ativo WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nickuser',$this->nickUser);
		$stmt->bindParam(':tb_clientes_id',$this->cliente);
		$stmt->bindParam(':tb_localidades_id',$this->localidade);
		$stmt->bindParam(':tb_servicos_id',$this->servico);
		$stmt->bindParam(':tb_sistema_id',$this->sistema);
		$stmt->bindParam(':data_sol',$this->dataOat);
		$stmt->bindParam(':filial',$this->filial);
		$stmt->bindParam(':os',$this->os);
		$stmt->bindParam(':data_os',$this->dataOs);
		$stmt->bindParam(':data_fech',$this->dataFech);
		$stmt->bindParam(':data_term',$this->dataTerm);
		$stmt->bindParam(':status',$this->status);
		$stmt->bindParam(':ativo',$this->ativo);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();	
	}
	public function findOat($status){
		$sql  = "SELECT * FROM $this->table WHERE BINARY status=:status ";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':status', $status, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}