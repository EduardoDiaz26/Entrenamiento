'use strict'

var contenido = document.querySelector('.list-group')
window.onload = function mostrar(){
  
    fetch('http://localhost/master-php/Entrenamiento/audit.php')
    .then(res => res.json())
    .then(datos=>{
        tabla(datos)
        console.log(datos)  
    })
}

function tabla(datos){
     
    for(let actividades of datos){
        console.log(actividades)  
        contenido.innerHTML += `
        <li class="list-group-item">El usuario ${actividades.usuario} ${actividades.accion}.' ('.${actividades.usuario_id}.
        ${actividades.nombres} ${actividades.apellidos} ${actividades.años}
        ${actividades.cargo} ${actividades.creado} ${actividades.modificado}.') Fecha:'.${actividades.fecha}
         </li>

        `      
    }
}