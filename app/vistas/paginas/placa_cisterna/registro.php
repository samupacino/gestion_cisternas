
<?php
include RUTA_APP.'/vistas/inc/inc_cisterna/header.php';
include RUTA_APP.'/vistas/inc/inc_cisterna/modal_mensaje.php';
?>

    <div id="pagina_registro_container" class="font-monospace border border-4 bg-info-subtle">
        <div>
            <p class="fs-4">REGISTRO DE PLACA CISTERNA</p>
        </div>
        <div>
            <table id="formulario_registro" class="table table-hover">
                <form action= "" method= "POST" id="formulario_placas" name="form_registro">
                    <tr>
                        <td><label for="placa">PLACA</label></td>
                        <td>
                            <input type="text" id="placa" name="placa" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nombre">NOMBRE</label></td>
                        <td>
                            <input type="text" id="nombre" name="nombre" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="largo">LARGO</label></td>
                        <td>
                            <input type="text" name="largo" id="largo" value="12" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="ancho">ANCHO</label></td>
                        <td>
                            <input type="text" id="ancho" name="ancho" value="1989" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="alto">ALTO</label></td>
                        <td>
                            <input type="text" id="alto" name="alto" value="12" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan = 2>
                            <input type="submit" id="enviar" value="GUARDAR" class="btn btn-primary">
                        </td>
                    </tr>
                    <tr>
                        <td colspan = 2>
                            <a href="index.php?cisterna" class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)">
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

        var button_guardar = document.getElementById("formulario_placas");
        button_guardar.addEventListener("submit",function(dato){

            dato.preventDefault();

            var validar = true;

            var formulario = document.getElementsByClassName("text");

            if(validar_casillas(formulario)){

                registro_placas();
                limpiar_casillas(formulario);

            }else{

                modal_mensaje("COMPLETE LAS CASILLAS");

            }

        });

    });

    function limpiar_casillas(formulario){
        for(var i = 0 ; i < formulario.length ; i++){
            formulario[i].value = "";
        }
    }
    function validar_casillas(formulario){
        var validar = true;
        for(var i = 0 ; i < formulario.length ; i++){
            if(formulario[i].value.length <= 0){
                validar = false;
            }
        }
        return validar;
    }
</script>