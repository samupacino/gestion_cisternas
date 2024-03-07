
<?php
include RUTA_APP.'/vistas/inc/inc_cisterna/header.php';
?>

<div id="registro_contenedor" class="font-monospace">
    <div id="registro">
        <h2>Registro de placas de cisternas</h2>
        <a href="index.php?cisterna&registro" class="btn btn-secondary">IR A REGISTRO</a>
    </div>
</div>

<div id="container_inicio">
        <div><a href="index.php" class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)">
                            RETURN TO MAIN</a>
        </div>
    <div id="container_inicio_tabla">
        <table id="tabla_inicio" class="table table-hover">
            <thead>
                <th>PLACA</th>
                <th>NOMBRE</th>
                <th>LARGO</th>
                <th>ANCHO</th>
                <th>ALTO</th>
                <th>EDITAR</th>
                <th>ELIMINAR</th>
            </thead>
            <tbody id="tabla_cisterna">
        
            </tbody>
        </table>
    </div>
</div>
<?php
include RUTA_APP .'/vistas/inc/inc_cisterna/footer.php';
?>
<script> 
//alert("La resolución de tu pantalla es: " + screen.width + " x " + screen.height) 
</script>
<script>
    window.addEventListener('load',function(){

        if(document.getElementById('tabla_cisterna') !== null ){
            listar_placas();
        }
            
    });
    

    window.onbeforeunload = function(e) {
        console.log("SAMUEL DESDE INICIO JAVAS");
    };
</script>
