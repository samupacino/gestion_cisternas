
<?php
    include RUTA_APP.'/vistas/inc/inc_tracto/header.php';
    include RUTA_APP.'/vistas/inc/inc_tracto/mensaje_error.php';
?>
<div>
    <button id="test">PRUEBA</button>
</div>

<table class="was-validated">
<form action="" class="was-validated">

        <input type="text" class="form-control" id="validationTextarea" placeholder="Required example textarea" required></input>
  </form>  
</table>



<div id="pagina_registro_container" class="font-monospace border border-4 bg-info-subtle">
        <div>
            <p class="fs-4">REGISTRO DE PLACA TRACTO</p>
        </div>
        <div>
            <table id="formulario_registro" class="table table-hover">
                <form action= "" method= "POST" id="formulario_placas" name="form_registro"  class="was-validated">
                    
                    <tr>
                        <td><label for="placa">PLACA</label></td>
                        <td>
                            <input type="text" id="placa validationTextarea" name="placa"  class="text" >
                        </td>
                    </tr>
                    <tr>
                        <td><label for="largo">LARGO</label></td>
                        <td>
                            <input type="text" id="largo" name="largo" value="12" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="ancho">ANCHO</label></td>
                        <td>
                            <input type="text" id="ancho" name="ancho" value="13" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="alto">ALTO</label></td>
                        <td>
                            <input type="text" id="alto" name="alto" value="14" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="config_veh">CONFIG</label></td>
                        <td>
                            <input type="text" id="nombre" name="config_veh" value="T3S3" class="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan = 2>
                            <input type="submit" id="enviar" value="GUARDAR" class="btn btn-primary">
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
    include RUTA_APP.'/vistas/inc/inc_tracto/footer.php';
?>

<script>
    var formulario_registro = document.getElementById('formulario_placas');

    formulario_registro.addEventListener('submit',function(evento){
        evento.preventDefault();
        var datos_tracto = document.getElementsByClassName('text');

        if(validar_campos()){
            registro_placa_tracto();
            clear_form();
        }
       
    });

    var test = document.getElementById('test');
    test.addEventListener('click',function(){
        //clear_form();
        console.log(validar_campos());
    });

    function clear_form(){

        var clear_inputs = document.getElementsByClassName('text');

        for(var i = 0 ; i < clear_inputs.length ; i++){
            clear_inputs[i].value = "";
        } 
    }

    function validar_campos(){
        let validar = true;

        var cadena_texto = document.getElementsByClassName('text');

        for(var i = 0 ; i < cadena_texto.length ; i++){

            if(cadena_texto[i].value.trim().length <= 0 && !cadena_texto[i].value.trim()){
                validar = false;
            }

        }    
        return validar;
    }

    
</script>
