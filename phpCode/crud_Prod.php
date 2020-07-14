<?php
    !isset($_POST)? die('Acceso denegado'):'';
    require 'conexion.class.php';
    require_once "../scripts/scripts.php";
    $db = new Conexion();
    

    if (isset($_POST['guardarProd'])) {
        # code...
        $nombreProd=$_POST['nombreProd'];
        $idCat=$_POST['idCategorias'];
        $precio=$_POST['precio'];
        $sqlCrProd="INSERT INTO `productos`(`nombreProd`, `idCategorias`, `precio`) 
            VALUES ('$nombreProd',$idCat,$precio)";
        #echo $query ;
        $result = $db->query($sqlCrProd);
        $db->affected_rows < 0 ? print 'No se pudo registrar la Categoria':header('Location: ../index.php');
        #header('Location: ../index.php');
    }
    
   


    

?>