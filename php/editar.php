<?php
echo 'editar.php?Descropcio=x';

$Idproducto = $_GET['Idproducto'];
$Fecha= $_GET['Fecha'];
$Descripcion= $_GET['Descripcion'];
$Cantidad= $_GET['Cantidad'];
$Valor_Unitario= $_GET['Valor_Unitario'];
$Valor_Total= $_GET['Valor_Total'];

echo $Idproducto;
echo '<br>';
echo $Descripcion;

include_once 'conexion2.php';

$sql_editar = 'UPDATE tienda SET Fecha=?,
 Descripcion=?,Cantidad=?,
 Valor_unitario=?,Valor_total=?
 WHERE Idproducto=?';
 $sentencia_editar = $pdo->prepare($sql_editar);
 
 $sentencia_editar->execute(array(
  $Fecha,$Descripcion,$Cantidad,
  $Valor_Unitario,$Valor_total,$Idproducto
 )); 

 header('location:index.php');
?>