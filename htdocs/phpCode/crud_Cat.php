<?php

!isset($_POST)? die('Acceso denegado'):'';
require 'conexion.class.php';
$db = new Conexion();
#Alta Cat
if (isset($_POST['alta_Cat'])) {
    # code...
    $nombre=$_POST['nombre_Cat'];
    $query= "INSERT INTO `categorias`( `nombreCat`) 
    VALUES ('$nombre')";
    #echo $query ;
    $result = $db->query($query);
    $db->affected_rows < 0 ? print 'No se pudo registrar la Categoria':header('Location: ../index.php');

}

?>