
function ajax_listar_tracto(){
    var ajax_listar = new XMLHttpRequest();

    ajax_listar.addEventListener("readystatechange",function(evento){
        if(evento.target.readyState !== 4){
            return;
        }
        if(evento.target.status >=200 && evento.target.status < 300){
            console.log(evento.target.responseText);
        }else{
            alert(evento.target.responseText);
        }
    });
  
    ajax_listar.open('GET','index.php?listas=SAMUEL');
    ajax_listar.send();
}

function create_filas_tracto(){

    var tabla_tracto = document.getElementById("body_tabla_tracto");
    
    var elemento_tabla = document.createDocumentFragment();

    var fila_tabla = document.createElement('tr');

    var columna_placa = document.createElement('td');
    var columna_largo = document.createElement('td');
    var columna_ancho = document.createElement('td');
    var columna_alto = document.createElement('td');
    var columna_editar = document.createElement('td');
    var columna_eliminar = document.createElement('td');

    columna_placa.textContent = "ANO-999";
    columna_largo.textContent = 12;
    columna_ancho.textContent = 13;
    columna_alto.textContent = 14;

    columna_editar.appendChild(create_button_editar());
    columna_editar.appendChild(create_button_eliminar());

    fila_tabla.appendChild(columna_placa);
    fila_tabla.appendChild(columna_largo);
    fila_tabla.appendChild(columna_ancho);
    fila_tabla.appendChild(columna_alto);
    
    fila_tabla.appendChild(columna_editar);
    fila_tabla.appendChild(columna_eliminar);


    elemento_tabla.appendChild(fila_tabla);
    tabla_tracto.appendChild(elemento_tabla);
   
}

function create_button_editar(){

    var button_editar = document.createElement("button");
    button_editar.textContent = "EDITAR";
    button_editar.setAttribute("id","button_editar");
    button_editar.setAttribute("value","EDITAR");   
    console.log(button_editar);

    return button_editar;

}
function create_button_eliminar(){

    var button_eliminar = document.createElement("a");
    button_eliminar.textContent = "ELIMINAR";

    button_eliminar.setAttribute("href","index.php?eliminar");
    button_eliminar.setAttribute("id","button_eliminar");

    create_evento_eliminar(button_eliminar);

    //console.log(button_eliminar);
    return button_eliminar;
    
}

function create_evento_eliminar(button_eliminar){

    button_eliminar.addEventListener("click",function(evento){
        console.log(button_eliminar.innerHTML);
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
        }else{
            modal_mensaje(evento.target.responseText);
        }
    }); 
    //console.log(datos_formulario.get('placa'));

    ajax_registro.open('POST','index.php?registro&guardar');
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
