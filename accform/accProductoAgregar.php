<?php
include("../librerias.php");
$oPro=new Producto();
foreach ($_POST as $id){
	$oPro->Agregar($id);	
};
?>

<script>
	document.location.href="<?=PATHURL?>exportaciones_add.php";
</script>