<?php
include RUTA_APP.'/vistas/inc/inc_tracto/header.php';
include RUTA_APP.'/vistas/inc/inc_tracto/moda_mensaje_error.php';
?>
    <div id="registro_contenedor" class="font-monospace">
        <div id="registro">
            <h2>Registro de placas de tracto</h2>
            <a href="index.php?tracto&registro" class="btn btn-secondary">IR A REGISTRO</a>
        </div>
    </div>
    <div>
        <button id="prueba">TEST</button>
    </div>
    <div id="container_inicio">
        <div><a href="index.php" class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)">
            RETURN TO MAIN</a>
        </div>
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
            
                </tbody>
            </table>
        </div>
    </div>            

<?php
include RUTA_APP.'/vistas/inc/inc_tracto/footer.php';
?>

<script>

    window.addEventListener('load',function(){

        ajax_listar_tracto();

        /*
        if(document.getElementById('mensaje_error')){

            const myModal = new bootstrap.Modal('#modal_error_tracto', {
                keyboard: true,
            })
            myModal.show();

        }
      */
    });

</script>