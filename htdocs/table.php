<?php 
    require_once "phpCode/conexion.class.php";
    $db = new Conexion();
    $sqlTabProd="SELECT P.clve_Productos, P.nombreProd,P.idCategorias, C.nombreCat, P.precio FROM productos P, categorias C where P.idCategorias=C.idCategorias";
    $consulta=mysqli_query($db,$sqlTabProd);
   
?>
<div style="text-align:center;">
    <table class="table table-hover table-condensed" id="iddatable" >
        <thead style="background-color:#28B463 ; color:white; font-weight:bold;  text-align: center;">
            <tr>
                <td>Nombre</td>
                <td>Categoria</td>
                <td>Precio</td>
                <td>Editar</td>
                <td>Eliminar</td>

            </tr>
        </thead>
        <tfoot style="background-color:#28B463 ; color:white; font-weight:bold;  text-align: center;"> 
            <tr>
                <td>Nombre</td>
                <td>Categoria</td>
                <td>Precio</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $datos="";
                while ($mostrar=mysqli_fetch_row($consulta) ) {
                    # code...
                    $datos= $mostrar[0]."||".$mostrar[1]."||".$mostrar[2]."||".$mostrar[3]."||".$mostrar[4];
                
            ?>
            <tr>
                <td><?php echo$mostrar[1]?></td>
                <td><?php echo$mostrar[3]?></td>
                <td><?php echo$mostrar[4]?></td>
                <td style="text-align:center;">
                    <button  class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalEditar"
                    onclick="
                        agregaFrmActualizar('<?php echo $datos ?>')">
                        <span class='fas fa-pen-fancy'> </span>
                    </button>
                </td>
                <td style="text-align:center;">
                    <button class="btn btn-danger btn-sm" onclick="eliminarOpc('<?php echo $mostrar[0]?>')">
                        <span class='fas fa-trash-alt'style='color:black'> </span>
                    </button></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#iddatable').DataTable();
} );
</script>
<script type="text/javascript">
	function agregaFrmActualizar(datos){
		d=datos.split('||');
		$('#clve_Productos').val(d[0]);
		$('#nombreProdUp').val(d[1]);
		$('#idCategoriasUp').val(d[2]);
		$('#precioUp').val(d[4]);		
	}
    function eliminarOpc(id) {
	
	alertify.confirm('Eliminar producto', 'Esta seguro que desea eliminar producto?',
 		function(){ eliminarProd(id)}
                , function(){ alertify.error('Cancel')});
	} 

</script>
