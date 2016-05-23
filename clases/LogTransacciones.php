<?php

class LogTransacciones{
	private $idacceso;
	private $snomtabla;
	private $accion;
	private $descripcion;

	function __construct($idacc=NULL,$snom=NULL,$accion=NULL,$descri=NULL){
		$this->idacceso=$idacc;
		$this->snomtabla=$snom;
		$this->accion=$accion;
		$this->descripcion=$descri;
		
	}
	
	function IdAcceso(){
		return $this->idacceso;
	}
	
	function Nombre(){
		return $this->snomtabla;
	}
	
	function Accion(){
		return $this->accion;
	}
	function Descripcion(){
		return $this->descripcion;
	}
	
        function insert(){
		
		if (!$this->querysel){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		
			$sqladd="select idacceso from productos order by nombre";
		
			/*Preparaci�n SQL*/
			$this->querysel=$db->prepare($sqlsel);
		
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['idproducto'], $registro['nombre'], $registro['totalusd'], $registro['ano']);			
		}
		else {
			return false;
			
		}
	}
        
}
?>