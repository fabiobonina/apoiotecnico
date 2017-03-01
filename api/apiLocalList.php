<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');



  function __autoload($class_name){
		require_once '../admin/classes/' . $class_name . '.php';
	}

  $oats = new Oats();
  $usuarios = new Usuarios();
  $clientes = new Clientes();
  $localidades = new Localidades();
  $sistemas = new Sistemas();
  $servicos = new Servicos();
  $descricoes = new Descricoes();
  $ativos = new Ativos();
  $out = "[";

   foreach($localidades->findAll() as $key => $value){

      $localId = $value->id;
      $localCliente = $value->cliente;
      $localRegional = $value->regional;
      $localNome = $value->nome;
      $localMunicipio = $value->municipio;
      $localUf = $value->uf;
      $localLat = $value->latitude;
      $localLong = $value->longitude;
      $localAtivo = $value->ativo;

  		if ($out != "[") {
  			$out .= ",";
  		}
      $out .= '{"id": "'.$localId.'",';
  		$out .= '"cliente": "'.$localCliente.'",';
      $out .= '"regional": "'.$localRegional.'",';
  		$out .= '"name": "'.$localNome.'",';
  		$out .= '"municipio": "'.$localMunicipio.'",';
  		$out .= '"uf": "'.$localUf.'",';
  		$out .= '"latitude": "'.$localLat.'",';
  		$out .= '"longitude": "'.$localLong.'",';
      $out .= '"ativo": "'.$localAtivo.'"}';
  	 }endforeach;
		$out .= "]";

		echo $out;