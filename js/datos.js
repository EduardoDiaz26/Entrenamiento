'use strict'
 var content = document.querySelector('#contenido')
window.onload =function traer(){
     
    fetch('http://localhost/master-php/Entrenamiento/probando')
    .then(res => res.json())
    .then(datos=>{
        tabla(datos)
       // console.log(datos)  
    })
}

function tabla(datos){
   
    
    for(let valor of datos){
        //console.log(valor.nombre)  
        content.innerHTML += `
        <tr>
            <td>${ valor.nombres }</td>
            <td>${ valor.apellidos}</td>
            <td>${ valor.años}</td>
            <td>${ valor.cargo }</td>
            <td>
            <a href="#"   class="fa fa-pencil-square-o" style="font-size:24px">  </a>
            <a href="#"  data-toggle="modal" data-target="#exampleModal" class="fa fa-trash-o" style="font-size:24px"></a>
            </td>
          </tr>

        `
    }
}

