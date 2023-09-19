<?php
include RUTA_APP.'/vistas/inc/inc_cisterna/header.php';
include RUTA_APP.'/vistas/inc/inc_cisterna/modal_mensaje.php';
?>
<div id=container_editar class="font-monospace border border-4 bg-info-subtle">
    <div>
        <p class="fs-4">EDITAR PLACA</p>
    </div>
    <div>
        <table id="tabla_editar" class="table table-hover">

                <form action="index.php?editar=<?php echo $resultado_placa[0]['id']; ?>&guardar" method="POST" id="form_editar">
                    <tr>
                        <td><label for="placa">PLACA</label></td>
                        <td><input type="text" id="placa" name="placa" value="<?php echo $resultado_placa[0]['placa_cisterna']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="nombre">NOMBRE</label></td>
                        <td><input type="text" id="nombre" name="nombre" value="<?php echo $resultado_placa[0]['nombre_cisterna']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="largo">LARGO</label></td>
                        <td><input type="text" id="largo" name="largo" value="<?php echo $resultado_placa[0]['largo_cisterna']; ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="ancho">ANCHO</label></td>
                        <td><input type="text" id="ancho" name="ancho" value="<?php echo $resultado_placa[0]['ancho_cisterna']; ?>"></td>   
                    </tr>
                    <tr>
                        <td><label for="alto">ALTO</label></td>
                        <td><input type="text" id="alto" name="alto" value="<?php echo $resultado_placa[0]['alto_cisterna']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan = 2>
                            <input type="submit" id="button_editar" value="ENVIAR">
                        </td>
                    </tr>  
                    <tr>
                        <td colspan = 2>
                            <a href="index.php" class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)">
                            RETURN TO MAIN</a>
                        </td>
                    </tr>          
                </form>
        </table>
    </div>
</div>
<?php
include RUTA_APP.'/vistas/inc/inc_cisterna/footer.php';
?> 

<script>
    window.addEventListener('load',function(dato){

        var submit_editar = document.getElementById("form_editar");
        submit_editar.addEventListener('submit',function(evento){
            evento.preventDefault();
            //console.log(evento.target.getAttribute('action'));
            guardar_editar(evento.target.getAttribute('action'));
        });
    });
</script>