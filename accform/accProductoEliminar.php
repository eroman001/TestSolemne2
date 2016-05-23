<?php
include("../librerias.php");
$oPro=new Producto();
foreach ($_POST as $id){
	$oPro->Eliminar($id);	
};
?>

<script>
	document.location.href="<?=PATHURL?>exportaciones_del.php";
</script>