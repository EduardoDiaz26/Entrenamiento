'use strict'

function abrir(id){

    let ID = id;
    let nombre = document.getElementById("nombre"+id).innerHTML;
    let apellido = document.getElementById("apellido"+id).innerHTML;
    let años = document.getElementById("años"+id).innerHTML;
    let cargo = document.getElementById("cargo"+id).innerHTML;
    let creacion = document.getElementById("creacion"+id).innerHTML;
    let modificado = document.getElementById("modificado"+id).innerHTML;
     console.log(creacion);
     document.getElementById("Cid").value = ID;
     document.getElementById("Cnombre").value = nombre;
     document.getElementById("Capellidos").value = apellido;
     document.getElementById("Caño").value = años;
     document.getElementById("Ccargo").value = cargo;
     document.getElementById("Cccreacion").value = creacion;
     document.getElementById("Cmmodificado").value = modificado;
    document.getElementById("Cbutton").innerHTML = "Editar";
     
}

function deletee(id){

    let ID = id;
    let nombre = document.getElementById("nombre"+id).innerHTML;
    let apellido = document.getElementById("apellido"+id).innerHTML;
    let años = document.getElementById("años"+id).innerHTML;
    let cargo = document.getElementById("cargo"+id).innerHTML;
    let creacion = document.getElementById("creacion"+id).innerHTML;
    let modificado = document.getElementById("modificado"+id).innerHTML;
console.log(modificado);
     document.getElementById("Dccreacion").value = creacion;
     document.getElementById("Dmmodificado").value = modificado;
     document.getElementById("Did").value = ID;
     document.getElementById("Dnombre").value = nombre;
     document.getElementById("Dapellido").value = apellido;
     document.getElementById("Daño").value = años;
     document.getElementById("Dcargo").value = cargo;
     
     
}