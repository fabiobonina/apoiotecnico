<?php

require_once 'Crud.php';

class OrdensServicos extends Crud{
	
	protected $table = 'tb_oat';
	private $nickUser;
	private $idCliente;
	private $idLocalidade;
	private $idServico;
	private $idSistema;
	private $dataSol;
	private $filial;
	private $os;
	private $dataOS;
	private $dataFech;
	private $dataTerm;
	private $status;
	private $ativo;

	public function setNickUser($nickUser){
		$this->nickUser = $nickUser;
	}
	public function getNickUser(){
		return $this->nickUser;
	}
	public function setCodCliente($idCliente){
		$this->idCliente = $idCliente;
	}
	public function setCodLocalidade($idLocalidade){
		$this->idLocalidade = $idLocalidade;
	}
	public function setCodServico($idServico){
		$this->idServico = $idServico;
	}
	public function setCodSistema($idSistema){
		$this->idSistema = $idSistema;
	}
	public function setDataSol($dataSol){
		$this->dataSol = $dataSol;
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
		$stmt->bindParam(':tb_clientes_id',$this->idCliente);
		$stmt->bindParam(':tb_localidades_id',$this->idLocalidade);
		$stmt->bindParam(':tb_servicos_id',$this->idServico);
		$stmt->bindParam(':tb_sistema_id',$this->idSistema);
		$stmt->bindParam(':data_sol',$this->dataSol);
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
		$stmt->bindParam(':tb_clientes_id',$this->idCliente);
		$stmt->bindParam(':tb_localidades_id',$this->idLocalidade);
		$stmt->bindParam(':tb_servicos_id',$this->idServico);
		$stmt->bindParam(':tb_sistema_id',$this->idSistema);
		$stmt->bindParam(':data_sol',$this->dataSol);
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

}