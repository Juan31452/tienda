<?php
include_once('conexion2.php');
//LEER DATOS
$sql = 'SELECT * FROM productos';
$gsent= $pdo->prepare($sql);
$gsent->execute();

$resultado = $gsent->fetchAll();
//var_dump($resultado);

//ADICIONAR DATOS
if ($_POST)
{
    $Fecha = $_POST['Fecha'];
    $Descripcion = $_POST['Descripcion'];
    $Cantidad =  $_POST['Cantidad'];
    $Valor_Unitario = $_POST['Valor_Unitario'];
    $Valor_Total = $_POST['Valor_Total'];

    $sql_agregar = 'INSERT INTO productos(Fecha,Descripcion,
    Cantidad,Valor_Unitario,Valor_Total)
    VALUES (?,?,?,?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    $sentencia_agregar->execute(array(
     $Fecha,$Descripcion,$Cantidad,
     $Valor_Unitario,$Valor_Total   
    ));
    
    header('location:index.php');

    
}
//EDITAR DATOS
if ($_GET)
{
  $Idproducto = $_GET['Idproducto'] ;
  $sql_unico = 'SELECT * FROM productos WHERE Idproducto=?';
  $gsent_unico= $pdo->prepare($sql_unico);
  $gsent_unico->execute(array(
   $Idproducto   
  ));
  $resultado_unico = $gsent_unico->fetch();
/*  var_dump($resultado_unico); */

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
   <div class="contenedor" >
    <div class="fila">
        <div class="columna">
           <table border=1>
               <head>
                <td>FECHA</td>
                <td>DESCRIPCION</td>
                <td>CANTIDAD</td>
                <td>VALOR UNITARIO</td>
                <td>VALOR TOTAL</td>
               </head>
               <body>                
                <?php foreach($resultado as $dato):?>
                <div class = "contenido">
                    <tr>
                      <td><?php echo $dato['Fecha']?></td>
                      <td><?php echo $dato['Descripcion']?></td>
                      <td><?php echo $dato['Cantidad']?></td>
                      <td><?php echo $dato['Valor_Unitario']?></td>
                      <td><?php echo $dato['Valor_Total']?></td>
                      <td><a href="index.php?Idproducto=<?php echo $dato['Idproducto']?>"> Editar </a></td>
                    </tr>   
                 </div>    
                 <?php endforeach?>
              </body>
	        </table>
         </div> 
      </div>

   </div>

   <div class="contenedor1" >
     <?php if (!$_GET): ?>
      <h2>AGREGAR DATOS</h2>  
      <form method="POST" >
         FECHA:</br> 
         <input type="text" class="formulario" name="Fecha"></br>
         DESCRIPCION:</br> 
         <input type="text" class="formulario" name="Descripcion"></br>
         CANTIDAD:</br> 
         <input type="text" class="formulario" name="Cantidad"></br>
         VALOR UNITARIO:</br> 
         <input type="text" class="formulario" name="Valor_Unitario"></br>
         VALOR TOTAL:</br> 
         <input type="text" class="formulario" name="Valor_Total"></br>
         <button>Agregar</button>
      </form>
      <?php endif ?>
      
      <?php if ($_GET): ?>
      <h2>EDITAR DATOS</h2>  
      <form method="GET" action="editar.php" >
         FECHA:</br> 
         <input type="text" class="formulario" name="Fecha"
         value="<?php echo $resultado_unico['Fecha'] ?>"></br>
         
         DESCRIPCION:</br> 
         <input type="text" class="formulario" name="Descripcion"
         value="<?php echo $resultado_unico['Descripcion'] ?>"></br>
         
         CANTIDAD:</br> 
         <input type="text" class="formulario" name="Cantidad"
         value="<?php echo $resultado_unico['Cantidad'] ?>"></br>
         
         VALOR UNITARIO:</br> 
         <input type="text" class="formulario" name="Valor_Unitario"
         value="<?php echo $resultado_unico['Valor_Unitario'] ?>"></br>
         
         VALOR TOTAL:</br> 
         <input type="text" class="formulario" name="Valor_Total"
         value="<?php echo $resultado_unico['Valor_Total'] ?>"></br>
         
         <input type="hidden" name="Idproducto"
         value="<?php echo $resultado_unico['Idproducto'] ?>">
         <button>Actualizar</button>
      </form>
      <?php endif ?>
      
   </div>


</body>
</html>