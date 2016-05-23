<?php
$oProducto=new Producto();
?>
<form method="post" action="accform/accProductoAgregar.php">
<?php
While($Registro=$oProducto->Selecciona()){

	?>
<input type="checkbox" name=agregar<?=$Registro->IdProducto()?> value="<?=$Registro->IdProducto()?>">
<?=$Registro->Nombre()?>/<?=$Registro->Ano()?>
<br>
<?php
}

?>
<input type="submit" value="Agregar">
</form>