<?php

$servername = "mysql:host=localhost;dbname=tienda";
$usuario = "root";
$password = "";
try{
// crear conexion
$pdo=new PDO($servername,$usuario,$password);
echo 'Conectado a Base de Datos Tienda  ';

}catch(PDOException $e){
    print "Error conexion" . $e->getMessage(). "<br/>";
    die();
}
?>