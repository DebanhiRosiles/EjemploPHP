<?php 
!isset($_POST)? die('Acceso denegado'):'';
    require 'conexion.class.php';
    $conexion = new Conexion();
$clve_Productos=$_POST['id'];

$sql="DELETE FROM `productos` WHERE `clve_Productos`=$clve_Productos";
echo $resultado= mysqli_query($conexion,$sql);
?>