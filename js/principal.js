'use strict'

var contenido = document.querySelector('.row')
window.onload = function mostrar(){
  
    fetch('http://localhost/master-php/Entrenamiento/principal')
    .then(res => res.json())
    .then(datos=>{
        tabla(datos)
        console.log(datos)  
    })
}

function tabla(datos){
     
    for(let valor of datos){
        console.log(valor)  
        contenido.innerHTML += `
        <tr>
        <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/04/26/12/25/male-1354358_960_720.png" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">${ valor.nombres }</a>
            </h4>
            <h5>${ valor.cargo }</h5>
            <p class="card-text">Ingreso a la empresa en el año ${ valor.años }</p>
          </div>
          
        </div>
      </div>

      
      

        `

        
    }
}