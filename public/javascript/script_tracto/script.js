function update_placa_tracto(formulario){
    var form_data = new FormData(document.getElementById('update_tracto'));

    var ajax_respuesta = new XMLHttpRequest();
    ajax_respuesta.addEventListener("readystatechange",function(e){

        if(e.target.readyState != 4){
            return;
        }
        if(e.target.status >=200 && e.target.status < 300){
            if(validar_json(e.target.responseText)){
                alert(JSON.parse(e.target.responseText));
            }else{
                alert(e.target.responseText);
            }
          
        }else if(e.target.status == 500){
           alert(e.target.responseText);
        }

    });  
    ajax_respuesta.open("POST",formulario.getAttribute("action"));
 
    ajax_respuesta.send(form_data);
}
function limpiar_filas(){
    var formulario = document.querySelector("#body_tabla_tracto");
    var filas = document.querySelectorAll("#body_tabla_tracto tr");    
    for(var i = 0 ; i < filas.length ; i++){
        formulario.deleteRow(0);
    }
}

function ajax_listar_tracto(){
    var ajax_listar = new XMLHttpRequest();

    ajax_listar.addEventListener("readystatechange",function(evento){
        if(evento.target.readyState !== 4){
            return;
        }
        if(evento.target.status >=200 && evento.target.status < 300){

            var json_respuesta = evento.target.responseText;

            if(validar_json(json_respuesta)){
                //console.log(JSON.parse(json_respuesta));
                create_filas_tracto(JSON.parse(json_respuesta));
            }else{
                alert(json_respuesta);
            }
            

        }else{
            alert(evento.target.responseText);
        }
    });
  
    ajax_listar.open('GET','index.php?tracto&listar');
    ajax_listar.send();
}
function create_filas_tracto(arreglo){

    var tabla_tracto = document.getElementById("body_tabla_tracto");    
    var elemento_tabla = document.createDocumentFragment();
    limpiar_filas();
    for(var elementos in arreglo){

        var fila_tabla = document.createElement('tr');

        var columna_placa = document.createElement('td');
        var columna_largo = document.createElement('td');
        var columna_ancho = document.createElement('td');
        var columna_alto = document.createElement('td');
        var columna_editar = document.createElement('td');
        var columna_eliminar = document.createElement('td');

        columna_placa.textContent = arreglo[elementos]['Tracto_placa'];
        columna_largo.textContent = arreglo[elementos]['Tracto_largo'];
        columna_ancho.textContent = arreglo[elementos]['Tracto_ancho'];
        columna_alto.textContent = arreglo[elementos]['Tracto_alto'];


        columna_editar.appendChild(create_button_editar(arreglo[elementos]['Tracto_id']));
        columna_eliminar.appendChild(create_button_eliminar(arreglo[elementos]['Tracto_id']));

        fila_tabla.appendChild(columna_placa);
        fila_tabla.appendChild(columna_largo);
        fila_tabla.appendChild(columna_ancho);
        fila_tabla.appendChild(columna_alto);
        
        fila_tabla.appendChild(columna_editar);
        fila_tabla.appendChild(columna_eliminar);


        elemento_tabla.appendChild(fila_tabla);
    }
    tabla_tracto.appendChild(elemento_tabla);
}

function create_button_editar(id){

    var button_editar = document.createElement('a');

    button_editar.textContent = "EDITAR";
    button_editar.setAttribute("href","index.php?tracto&editar="+id);
    button_editar.setAttribute("id","button_editar");
    button_editar.setAttribute("value","EDITAR");   
    button_editar.setAttribute("class","btn btn-primary");
    //console.log(button_editar);

    return button_editar;

}
function create_button_eliminar(id){
    var button_eliminar = document.createElement('button');
    button_eliminar.textContent = "ELIMINAR";

    button_eliminar.setAttribute("id","button_eliminar");
    button_eliminar.setAttribute("class","btn btn-danger");
    button_eliminar.setAttribute("value",id);
    create_evento_eliminar(button_eliminar);
    //console.log(button_eliminar);
    return button_eliminar; 
}

function create_evento_eliminar(button_eliminar){
    button_eliminar.addEventListener("click",function(evento){
        var ajax_eliminar = new XMLHttpRequest();
        ajax_eliminar.addEventListener('readystatechange',function(evento){
            if(evento.target.readyState != 4){
                return;
            }
            if(evento.target.status >= 200 && evento.target.status < 300){
                ajax_listar_tracto();
            }else{
                alert(evento.target.responseText)
            }
        });
        ajax_eliminar.open('GET','index.php?tracto&eliminar='+button_eliminar.getAttribute('value'));
        ajax_eliminar.send();
    });
}
function registro_placa_tracto(){
    
    var ajax_registro = new XMLHttpRequest();
    var datos_formulario = new FormData(document.getElementById('formulario_placas'));
    
    ajax_registro.addEventListener('readystatechange',function(evento){

        if(evento.target.readyState !== 4){
            return;
        }

        if(evento.target.status >= 200 && evento.target.status < 300){
            modal_mensaje(evento.target.responseText);
        }
        if(evento.target.status == 500){
            modal_mensaje(evento.target.responseText);
        }
    }); 
    //console.log(datos_formulario.get('placa'));

    ajax_registro.open('POST','index.php?tracto&registro&guardar',true);
    ajax_registro.send(datos_formulario);

}

function modal_mensaje(mensaje){
    const myModal = new bootstrap.Modal('#modal_registro_error', {
            keyboard: true,
    })
    myModal.show();

    var modal_mensaje = document.getElementById('modal_mensaje');
    modal_mensaje.textContent = mensaje;
}
function validar_json(response_text_json){
    var validar = false;

    try{
        JSON.parse(response_text_json);
        validar = true;

    }catch(e){
        validar = false;
    }
    return validar;
}
