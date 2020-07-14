<?php 
    require_once "phpCode/conexion.class.php";
    $db = new Conexion();
    $sqlTabProd="SELECT nombreCat FROM categorias";
    $consulta=mysqli_query($db,$sqlTabProd);
?>
<div style="text-align:center;">
    <table class="table table-hover table-condensed" id="iddatable" >
        <thead style="background-color:#E74C3C ; color:white; font-weight:bold;  text-align: center;">
            <tr>
                <td>Nombre</td>

            </tr>
        </thead >
        <tfoot style="background-color:#E74C3C ; color:white; font-weight:bold; text-align: center;">
            <tr>
                <td>Nombre</td>
                
            </tr>
        </tfoot>
        <tbody>
            <?php
                while ($mostrar=mysqli_fetch_row($consulta) ) {
                    # code...
                
            ?>
            <tr>
                <td><?php echo$mostrar[0]?></td>
               
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