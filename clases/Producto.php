<?php

class Producto{
	private $nidproducto;
	private $snombre;
	private $ntotalusd;
	private $nano;
        private $nidusuario;
	private $querysel;
	function __construct($nid=NULL,$snom=NULL,$ntot=NULL,$nano=NULL,$nidusuario=NULL){
		$this->nidproducto=$nid;
		$this->snombre=$snom;
		$this->ntotalusd=$ntot;
		$this->nano=$nano;
                $this->nidusuario=$nidusuario;
		
	}
	
	function IdProducto(){
		return $this->nidproducto;
	}
	
	function Nombre(){
		return $this->snombre;
	}
	
	function TotalUSD(){
		return $this->ntotalusd;
	}
	function Ano(){
		return $this->nano;
	}
	
	
	function Selecciona(){
		
		if (!$this->querysel){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		
			$sqlsel="select idproducto,nombre,totalusd,ano from productos order by nombre";
		
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
	
	function Elimina($id){
	
		$db=dbconnect();
		
			/*Definici�n del query que permitira eliminar un registro*/
			$sqldel="delete from productos where idproducto=:id";
	
			/*Preparaci�n SQL*/
			$querydel=$db->prepare($sqldel);
			
			$querydel->bindParam(':id',$id);
			
			$valaux=$querydel->execute();
                        
                        $oTransac=new Transaccion($this->nidusuario,"Eliminado desde la clase","Producto","D");
                        
                        $oTransac->Ingreso();
                        
		return $valaux;
	}
        
        function Agregar($id){
	
		$db=dbconnect();
		
			/*Definici�n del query que permitira eliminar un registro*/
			$sqladd="INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO)VALUES (:nom,:ntotusd,:anio)";
                        
			/*Preparaci�n SQL*/
			$queryadd=$db->prepare($sqladd);
			
                        /*Asignación de parametros utilizando bindparam*/
			$queryadd->bindParam(':nom', $this->snombre);
                        $queryadd->bindParam(':ntotusd', $this->ntotalusd);
                        $queryadd->bindParam(':anio',  $this->nano);
			
			$valaux=$queryadd->execute();
                        
                        $oTransac=new Transaccion($this->nidusuario,"Agrega desde la clase","Producto","D");
                        
                        $oTransac->Ingreso();
                        
		return $valaux;
	}	
}
?>