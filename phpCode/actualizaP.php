<?php
    !isset($_POST)? die('Acceso denegado'):'';
    require 'conexion.class.php';
    $conexion = new Conexion();
    if (isset($_POST['actualizarProd'])) {
        
    $clve_Productos=$_POST['clve_Productos'];
    $nombreProd=$_POST['nombreProdUp'];
    $idCat=$_POST['idCategoriasUp'];
    $precio=$_POST['precioUp'];

    $sqlUPProd="UPDATE `productos` SET
     `nombreProd`='$nombreProd',`idCategorias`=$idCat,`precio`=$precio
      WHERE `clve_Productos`=$clve_Productos";
    #echo $query ; 
    echo $clve_Productos;
    echo $nombreProd;
    $result = $conexion->query($sqlUPProd);
    $conexion->affected_rows < 0 ? print 'No se pudo registrar la Categoria':
        header('Location: ../index.php');
    }
    #header('Location: ../index.php');

?>