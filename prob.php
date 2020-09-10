<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container my-5 tex-center">
        <button class="btn btn-danger w-100" >Obtener</button>
        <div class="mt-5" >
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Año</th>
                  </tr>
                </thead>
                <tbody id="contenido">
                    
                  
                </tbody>
              </table>
        </div>
    </div>

    <script>
        
        window.onload =function traer(){
            fetch('http://localhost/master-php/Entrenamiento/probando')
            .then(res => res.json())
            .then(datos=>{
                tabla(datos)
                console.log(datos)  
            })
        }

        function tabla(datos){
           
            contenido.innerHTML = ''
            for(let valor of datos){
                //console.log(valor.nombre)  
                contenido.innerHTML += `
                <tr>
                    <th scope="row">${ valor.id }</th>
                    <td>${ valor.usuario_id }</td>
                    <td>${ valor.nombres }</td>
                    <td>${ valor.apellidos}</td>
                    <td>${ valor.años}</td>
                  </tr>

                `
            }
        }
    </script>
  </body>
</html>