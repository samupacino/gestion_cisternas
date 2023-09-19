<?php
include RUTA_APP.'/vistas/inc/inc_tracto/header.php';
include RUTA_APP.'/vistas/inc/inc_tracto/moda_mensaje_error.php';
?>
    <div id="registro_contenedor" class="font-monospace">
        <div id="registro">
            <h2>Registro de placas de tracto</h2>
            <a href="index.php?registro" class="btn btn-secondary">IR A REGISTRO</a>
        </div>
    </div>

    <div id="container_inicio">
        <div id="container_inicio_tabla">
            <table class="table table-hover">
                <thead>
                    <th>PLACA</th>
                    <th>LARGO</th>
                    <th>ANCHO</th>
                    <th>ALTO</th>
                    <th>EDITAR</th>
                    <th>ELIMINAR</th>
                </thead>
                <tbody id="body_tabla_tracto">
                    <?php
                        foreach($lista_tracto as $filas){
                    ?>
                    <tr>
                        <td><?php echo $filas['Tracto_placa']; ?></td>
                        <td><?php echo $filas['Tracto_largo']; ?></td>
                        <td><?php echo $filas['Tracto_ancho']; ?></td>
                        <td><?php echo $filas['Tracto_alto']; ?></td>
                        <td><?php echo "<button id='button_editar' class='btn btn-primary'>EDITAR</button>"; ?></td>
                        <td><?php echo "<a id='button_eliminar' class='btn btn-danger'>ELIMINAR</a>"; ?></td>
                    </tr><?php } ?>
                </tbody>
            </table>
        </div>
    </div>            

<?php
include RUTA_APP.'/vistas/inc/inc_tracto/footer.php';
?>

<script>
    window.addEventListener('load',function(){

        if(document.getElementById('mensaje_error')){

            const myModal = new bootstrap.Modal('#modal_error_tracto', {
                keyboard: true,
            })
            myModal.show();

        }
      
    });


    function clear_table(){
        var row_table = document.querySelectorAll("#body_tabla_tracto tr");
        var body_table = document.getElementById("body_tabla_tracto");
        //console.log(row_table.length)
        body_table.deleteRow(0);
    }
</script>