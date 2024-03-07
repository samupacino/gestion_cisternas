/*    ---LISTAR----      */

function listar_placas(){
    var xhr = new XMLHttpRequest();

    var table_body = document.getElementById('tabla_cisterna');
    var elementos_filas = document.createDocumentFragment();

    xhr.addEventListener("readystatechange",function(dato){
        if(dato.target.readyState !== 4 ){
            return;
        }
        if(dato.target.status >= 200 && dato.target.status < 300){
            
            var response_JSON = JSON.parse(dato.target.responseText);
            console.log(dato.target.responseText);
            //response_JSON.length > 0
            if(response_JSON.length > 0){
                clear_table();
                for(var iterator of response_JSON){
                    
                    var fila = document.createElement('tr');
                    
                    var columna_id = document.createElement('td');

                    var columna_placa = document.createElement('td');
                    var columna_nombre = document.createElement('td');
                    var columna_largo = document.createElement('td');
                    var columna_ancho = document.createElement('td');
                    var columna_alto = document.createElement('td');
                    var columna_editar = document.createElement('td');
                    var columna_eliminar = document.createElement('td');

                    var button_editar = document.createElement('a');
                    var button_eliminar = document.createElement('button');


                    columna_id.textContent = iterator['id'];
                    columna_placa.textContent = iterator['placa_cisterna'];
                    columna_nombre.textContent = iterator['nombre_cisterna'];
                    columna_largo.textContent = iterator['largo_cisterna'];
                    columna_ancho.textContent = iterator['ancho_cisterna'];
                    columna_alto.textContent = iterator['alto_cisterna'];
                    columna_alto.textContent = iterator['alto_cisterna'];

                    columna_editar.appendChild(button_editar);
                    columna_eliminar.appendChild(button_eliminar);
/*
<div>
    <a href="index.php?editar">IR A EDITAR</a>
</div>
*/
                    button_editar.setAttribute('class','btn btn-primary');
                    button_editar.setAttribute('id','editar');
                    button_editar.setAttribute('href','index.php?cisterna&editar='+iterator['id']);
                   
                    button_editar.textContent = "EDITAR";
                    //evento_editar(button_editar);

                    button_eliminar.setAttribute('class','btn btn-danger');
                    button_eliminar.setAttribute('id','eliminar');
                    button_eliminar.setAttribute('value',iterator['id']);
                    button_eliminar.textContent = "ELIMINAR";
                    evento_eliminar(button_eliminar);


                    fila.appendChild(columna_placa);
                    fila.appendChild(columna_nombre);
                    fila.appendChild(columna_largo);
                    fila.appendChild(columna_ancho);
                    fila.appendChild(columna_alto);
                    fila.appendChild(columna_editar);   
                    fila.appendChild(columna_eliminar);

                    
                    elementos_filas.appendChild(fila);
                }
                table_body.appendChild(elementos_filas);
              
            }else{
                clear_table();
                alert('TABLA VACIA');
                
            }
            
        }else{
            alert(dato.target.status +": "+ dato.target.responseText);
        }

    });
    xhr.open("GET","index.php?cisterna&listar");
    xhr.send();
}
function clear_table(){
    var getCountRow = document.querySelectorAll('#tabla_cisterna tr');
    var filas = document.querySelector('#tabla_cisterna');

    for(var i = 0 ; i < getCountRow.length ; i++){
        filas.deleteRow(0);
    }
}
function evento_editar(button_editar){
    button_editar.addEventListener('click',function(dato){
        //dato.preventDefault();
        //console.log(dato.target);
    })
}
function evento_eliminar(button_eliminar){
    button_eliminar.addEventListener('click',function(dato){
    
        var ajax_eliminar = new XMLHttpRequest();

        ajax_eliminar.addEventListener("readystatechange",function(ajax){
          
            if(ajax.target.readyState !== 4){
                return;
            }
            if(ajax.target.status >= 200 && ajax.target.status < 300){
                listar_placas();
            }
            
        });

        ajax_eliminar.open('GET','index.php?cisterna&eliminar='+dato.target.value,true);
        ajax_eliminar.send();
    })
}


/*    ---REGISTRO----      */

function registro_placas(){

    var http_request = new XMLHttpRequest();
    var formulario = new FormData(document.getElementById("formulario_placas"));

    
    http_request.addEventListener("readystatechange",function(datos){
        if(datos.target.readyState !== 4) {
            return;
        }
        if(datos.target.status >= 200 && datos.target.status < 300){
            modal_mensaje(datos.target.responseText);
        }else{
            modal_mensaje(datos.target.responseText);
        }
    });
    http_request.open("POST","index.php?cisterna&registro&guardar",true);
    http_request.send(formulario);

}

/*    ---EDITAR----      */

function guardar_editar(action_url){
    var ajax = new XMLHttpRequest();
    var formulario_editar = new FormData(document.getElementById("form_editar"));
  
    console.log(action_url);

    ajax.addEventListener("readystatechange",function(evento){

        if(evento.target.readyState !== 4){
            return;
        }
        if(evento.target.status >=200 && evento.target.status < 300){
            var mensaje = ajax.responseText;
            modal_mensaje(mensaje);
        }


    });
    ajax.open("POST",action_url,true);
    ajax.send(formulario_editar);

}

function modal_mensaje(mensaje){
    const myModal = new bootstrap.Modal('#modal_registro_editar', {
            keyboard: true,
    })
    myModal.show();

    var modal_mensaje = document.getElementById('modal_mensaje');
    modal_mensaje.textContent = mensaje;
}
function test_ruta(){
    var prueba = document.getElementById("s");
    prueba.addEventListener('click',function(){
        alert("ummkl");
    });
}