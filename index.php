<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vista productos</title>
	<?php require_once "scripts/scripts.php"?>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			<div class="card">
			<div class="card-header">
			<h1 style="font-weight:bold;">Productos </h1>
			</div>
			<div class="card-body">
				<span class="btn btn-primary" data-toggle="modal" data-target="#ventanaAltaProd" >
					Agregar Producto
					<span class='fas fa-plus-circle' ></span>
				</span>
				<span class="btn btn-primary" data-toggle="modal" data-target="#ventanaCategorias" >Categorias</span>
				<hr>
				<div id="tablaDatatable"></div>
			</div>
			<div class="card-footer text muted">
				By Rosiles
			</div>
			</div>
			</div>
		</div>

	</div>
	<!-- Button trigger modal <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevaVentana">Launch demo modal</button>-->
<!-- Modal ventanaAltaProd  -->
<div class="modal fade" id="ventanaAltaProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ventanaAltaProd">Agregar Producto nuevo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <?php
				require 'phpCode/conexion.class.php';
				$db= new Conexion();
				$queryCat = "SELECT idCategorias, nombreCat FROM Categorias";
				$resCat=$db->query($queryCat);
				$optionCat='';
				
				while ($row = mysqli_fetch_array($resCat)) 
				{	# code...
					$optionCat.="<option value=\"$row[idCategorias]\" >$row[nombreCat]</option>";
					$idCat="$row[idCategorias]";
				}				
				?>
	  <form id="altaProd"action="phpCode/crud_Prod.php" method="post">
            <label> Nombre: </label><input type="text" class="form-control input-sm" id="nombreProd"  name="nombreProd"><br>
            <label> Categoria: </label><select class="form-control input-sm" id="idCategorias" name="idCategorias" >
				<option value="">Selecciona Categoria</option><?php 	echo $optionCat;	?></select><br>				
            <label>Precio: </label><input type="number" class="form-control input-sm" id="precio"  name="precio" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit"name="guardarProd" id="btnGuardar" class="btn btn-primary">Guardar</button></form>
      </div>
    </div>
  </div>
</div>
<!-- Modal ventanaCategorias  -->
<div class="modal fade" id="ventanaCategorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ventanaCategorias">Categorias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<form action="../phpCode/crud_Cat.php" method="post">
            <p>Nombre:</p><input type="text" name="nombre_Cat">
            <button type="submit" name="alta_Cat" class="btn btn-primary">Guardar</Button>
        </form>
            <hr>
				<div id="tablaDatatableCat"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
	  <form id="frmActualizarProd" action="phpCode/actualizaP.php" method="post">
			<input type="number" id="clve_Productos" name="clve_Productos" style="visibility:hidden" >
			<br>
			<label> Nombre: </label><input type="text" class="form-control input-sm" id="nombreProdUp"  name="nombreProdUp"><br>
			<label> Categoria: </label><select class="form-control input-sm" id="idCategoriasUp" name="idCategoriasUp" >
				<?php 	echo $optionCat;	?></select><br>	
            <label>Precio: </label><input type="number" class="form-control input-sm" id="precioUp"  name="precioUp">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" name="actualizarProd" id="actualizarProd"class="btn btn-warning"  " >Actualizar</button></form>
      </div>
    </div>
  </div>
</div>
<!-- Fin html -->
</body>
</html>



<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaDatatable').load('table.php');
		$('#tablaDatatableCat').load('tableCat.php');
		$('#btnActualizarProd').click(function(){
			actualizarP();
		});
    })

</script>

<script type="text/javascript">
	/**function actualizarP() {
		clve_Productos=$('#clve_Productos').val();
		nombreProdUp=$('#nombreProdUp').val();
		idCategoriasUp=$('#idCategoriasUp').val();
		precioUp=$('#precioUp').val();	

		cadena="clve_Producto"+clve_Productos+"&nombreProdUp"+nombreProdUp+
		"&idCategoriasUp"+idCategoriasUp+"&precioUp"+precioUp;
		
		$.ajax({
			type:"POST",
			url:"/phpCode/actualizaP.php",
			data:cadena,
			success:function(r)
			{
				if(r==1){
					$('#tablaDatatable').load('table.php');
					alertify.success("Producto modificado");
				}else{
					alertify.error("No se pudo editar el producto");
				}
				}
		});

		
		
	}**/
	
	function eliminarProd(id){
		cadena="id= " + id;
		$.ajax({
			type:"POST",
			url:"/phpCode/eliminaP.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tablaDatatable').load('table.php');
					alertify.success("Producto eliminado");
				}else{
					alertify.error("No se pudo eliminar el producto "+cadena);
				}
			}
			
		});
	} 
</script>
