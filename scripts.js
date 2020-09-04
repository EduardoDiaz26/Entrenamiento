'use strict'

var editar = document.querySelector("editar");

function abrir(id){

    let ID = id;
    let nombre = document.getElementById("nombre"+id).innerHTML;
    let apellido = document.getElementById("apellido"+id).innerHTML;
    let años = document.getElementById("años"+id).innerHTML;
    let cargo = document.getElementById("cargo"+id).innerHTML;

     console.log(ID);
     document.getElementById("Cid").value = ID;
     document.getElementById("Cnombre").value = nombre;
     document.getElementById("Capellidos").value = apellido;
     document.getElementById("Caño").value = años;
     document.getElementById("Ccargo").value = cargo;
    document.getElementById("Cbutton").innerHTML = "Editar";
     
}