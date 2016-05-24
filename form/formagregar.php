<?php
$oProducto=new Producto();
?>
<form method="post" action="accform/accProductoAgregar.php">
    ID Producto:<input type="text" name="nidproducto" id="nidproducto"><br>
    Nombre:<input type="text" name="snombre" id="snombre"><br>
    Total USD:<input type="text" name="ntotalusd" id="ntotalusd"><br>
    Año:<input type="date" name="nano" id="nano"><br>
    
    <input type="submit" value="Agregar">
</form>


