
<?php
    include RUTA_APP.'/vistas/inc/inc_tracto/header.php';
    include RUTA_APP.'/vistas/inc/inc_tracto/mensaje_error.php';
?>
<button id="test">SAMUEL</button>
<div id="pagina_registro_container" class="font-monospace border border-4 bg-info-subtle">
        <div>
            <p class="fs-4">EDITAR PLACA TRACTO</p>
        </div>
        <div>
            <table id="formulario_tracto" class="table table-hover">
                <form action= "index.php?tracto&editar=<?php echo $arreglo_tracto[0]['Tracto_id']?>&guardar" method= "POST" id="update_tracto" name="form_registro"  enctype="multipart/form-data" class="was-validated">
                    
                    <tr>
                        <td><label for="placa">PLACA</label></td>
                        <td>
                            <input type="text" id="placa" name="placa" value=<?php echo $arreglo_tracto[0]['Tracto_placa'];?> class="text" >
                        </td>
                    </tr>
                    <tr>
                        <td><label for="largo">LARGO</label></td>
                        <td>
                            <input type="text" id="largo" name="largo" value=<?php echo $arreglo_tracto[0]['Tracto_largo'];?> class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="ancho">ANCHO</label></td>
                        <td>
                            <input type="text" id="ancho" name="ancho" value=<?php echo $arreglo_tracto[0]['Tracto_ancho'];?> class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="alto">ALTO</label></td>
                        <td>
                            <input type="text" id="alto" name="alto" value=<?php echo $arreglo_tracto[0]['Tracto_alto'];?> class="text">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="config_veh">CONFIG</label></td>
                        <td>
                            <input type="text" id="config_veh" name="config_veh" value=<?php echo $arreglo_tracto[0]['Tracto_veh'];?> class="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan = 2>
                            <button type="submit" id="enviar" value="GUARDAR" class="btn btn-primary">GUARDAR</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = 2>
                            <a href="index.php?tracto" class="d-inline-flex focus-ring py-1 px-2 text-decoration-none border rounded-2" style="--bs-focus-ring-color: rgba(var(--bs-success-rgb), .25)">
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
   window.addEventListener('load',function(e){
        var formulario = document.getElementById("update_tracto");
        formulario.addEventListener("submit",function(e){
            e.preventDefault();
            if(validar_campos(formulario)){
                update_placa_tracto(formulario);
            }else{
                alert("Complete las casillas");
            }
        });
   });

   function validar_campos(formulario){
        var validar = true;
        for(var i = 0 ; i < formulario.elements.length ; i++){
            if(formulario.elements[i].tagName == "INPUT"){
                if(formulario.elements[i].value.trim().length <= 0){
                    validar = false;
                }
            }
        }
        return validar;
   }
</script>