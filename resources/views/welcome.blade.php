<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <!-- SweetAlert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      
        <!-- Styles -->      

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .nonBlock{
                display: none;
            }
            .success{
                background-color: #8CCFEA ;
            }
            .bad{
                background-color: #FFD8D2  ;
            }
            .border{
                border-radius: 20px;
                box-shadow: 24px 17px 14px -1px rgba(196,196,196,0.75);
                -webkit-box-shadow: 24px 17px 14px -1px rgba(196,196,196,0.75);
                -moz-box-shadow: 24px 17px 14px -1px rgba(196,196,196,0.75);
            }
        </style>
    </head>
    <body class="antialiased">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Api Example</a>
            </div>
        </nav>

        <div class="container ">
            <form  id="buscador">
            @csrf
                <div class="mt-5 row">
                    <label class="col-sm-2 col-form-label">Seleccione un ID</label>
                    <div class="col-sm-10">
                        <input type="number" id="id" class="form-control " >
                    </div>
                </div>
            

                <div class=" row justify-content-center mt-3">
                    <div class="col-4 " >
                        <button class="btn btn-success btn-block col-md-12 " type="submit" >Buscar</button>
                    </div>                
                </div>
                <div class=" row justify-content-center mt-3">
                    <div class="col-4 " >
                        <button class="btn btn-primary btn-block col-md-12 " type="button" id="buttonCrear">Crear</button>
                    </div>                
                </div>
            </form>
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card nonBlock mt-5 border" id="showResponse">
                        <div class="card-body">                   
                            <div class=" row justify-content-center">
                                <label class="col-sm-4 col-form-label">Id</label>
                                <div class="col-sm-8">
                                    <input type="text" id="idUser" class="form-control " readonly>
                                </div>
                            </div>
                            <div class="mt-3 row justify-content-center">
                                <label class="col-sm-4 col-form-label">Titulo</label>
                                <div class="col-sm-8">
                                    <input type="text" id="titulo" class="form-control validadorTitulo " readonly >
                                </div>
                            </div>
                            <div class="mt-3 row justify-content-center">
                                <label class="col-sm-4 col-form-label">Estado</label>
                                <div class="col-sm-8">
                                    <select class="form-control selectpicker validadorEstado" id="estado"  disabled>
                                        <option value="true">Activo</option>
                                        <option value="false">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4 justify-content-center">
                                <div class="col-4 " >
                                    <button class="btn btn-primary btn-block col-md-12 " type="button" id="btnEdit">Actualizar</button>
                                    <button class="btn btn-warning btn-block col-md-12 nonBlock " type="button" id="btnActualizar">Enviar</button>

                                </div>
                                <div class="col-4 " >
                                    <button class="btn btn-danger btn-block col-md-12 " type="button" id="btnDelete">Eliminar</button>
                                </div>  
                            </div>
                            
                        </div>
                    </div>

                    <div class="card nonBlock mt-5 border" id="created">
                    <form  id="new">
                        @csrf
                        <div class="card-body">                   
                            <div class=" row justify-content-center">
                                <label class="col-sm-4 col-form-label">User Id</label>
                                <div class="col-sm-8">
                                    <input type="number" min='0' id="idUserNew" class="form-control "  >
                                </div>
                            </div>
                            <div class="mt-3 row justify-content-center">
                                <label class="col-sm-4 col-form-label">Titulo</label>
                                <div class="col-sm-8">
                                    <input type="text" id="tituloNew" class="form-control  "  >
                                </div>
                            </div>
                            <div class="mt-3 row justify-content-center">
                                <label class="col-sm-4 col-form-label">Estado</label>
                                <div class="col-sm-8">
                                    <select class="form-control selectpicker validadorEstado" id="estadoNew"  >
                                        <option value="">Select</option>
                                        <option value="true">Activo</option>
                                        <option value="false">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4 justify-content-center">
                                <div class="col-4 " >
                                    <button class="btn btn-success btn-block col-md-12 " type="submit" >Crear</button>

                                </div>
                               
                            </div>
                            
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>



<script>

$(function(){

    $('#buscador').submit( function(e){
        e.preventDefault();
        document.querySelector('#created').classList.add("nonBlock");

        let valor = $('#id').val();   
        let _token = $('input[name = _token]').val(); 


        
        if ( valor == ''){
            Swal.fire(
            'Opps!',
            'Ingrese un ID por favor.',
            'error'
            );
            return;
        }

        $.ajax({
                
            url: "{{ route('BuscarId') }}",
            type: "POST",
            data : {
                id: valor,                   
                _token: _token
            },

            success:function(response){
                if(response.status){
                    Swal.fire(
                        'Good!',
                        'Usuario encontrado',
                        'success'
                        );  
                    
                    restoreEstados();
 
                    document.querySelector('#showResponse').classList.remove("nonBlock");
                    document.querySelector('#idUser').value = response.data.id;
                    document.querySelector('#titulo').value = response.data.title;
                    document.querySelector('#id').value = '';

                    if(response.data.completed){
                        document.querySelector('#estado').value = "true";
                        document.querySelector('#showResponse').classList.remove("bad");
                        document.querySelector('#showResponse').classList.add("success");
                    }else{
                        document.querySelector('#estado').value = "false";
                        document.querySelector('#showResponse').classList.remove("success");
                        document.querySelector('#showResponse').classList.add("bad");
                    }

                    return;

                }else{
                    Swal.fire(
                        'Opps!',
                        'Este usuario no existe, reintente por favor.',
                        'error'
                        );

                    document.querySelector('#id').value = '';
                    document.querySelector('#showResponse').classList.add("nonBlock");

                    return;

                }
            }
        })
    });




    $('#new').submit( function(e){
        e.preventDefault();

        let id = $('#idUserNew').val(); 
        let titulo =  $('#tituloNew').val();
        let estado =  $('#estadoNew').val();
        let _token = $('input[name = _token]').val(); 

        
        if ( id == '' || titulo == '' || estado == ''){
            Swal.fire(
            'Opps!',
            'Todos los campos son obligatorios',
            'error'
            );
            return;
        }

        $.ajax({
                
            url: "{{ route('CrearId') }}",
            type: "POST",
            data : {
                id: id,   
                titulo: titulo,
                estado: estado,                
                _token: _token
            },

            success:function(response){
                if(response.status){

                    document.querySelector('#created').classList.add("nonBlock");
                    document.querySelector('#idUserNew').value= '';
                    document.querySelector('#tituloNew').value= '';
                    document.querySelector('#estadoNew').value= '';

                    Swal.fire(
                        'Good!',
                        'Usuario creado, su nuevo id es ' + response.data.id,
                        'success'
                        );  
                    return;

                }else{
                    Swal.fire(
                        'Opps!',
                        'Este usuario no existe, reintente por favor.',
                        'error'
                        );                    
                    return;

                }
            }
        })
    });


    $(document).on('click', '#btnEdit', function(){
        document.querySelector('#btnEdit').classList.add("nonBlock");
        document.querySelector('#btnActualizar').classList.remove("nonBlock");
        $('#titulo').prop('readonly', false) ;
        $('#estado').prop('disabled', false) ;

        Swal.fire(
            '',
            'Ya puede Modificar los campos',
            'success'
        );
        return;

    });


    $(document).on('click', '#buttonCrear', function(){
        document.querySelector('#showResponse').classList.add("nonBlock");
        document.querySelector('#created').classList.remove("nonBlock");
        
        return;

    });

    


    $(document).on('click', '#btnActualizar', function(){    
        let idUser = document.querySelector('#idUser').value;
        let titulo = document.querySelector('#titulo').value;
        let estado = document.querySelector('#estado').value;
        let _token = $('input[name = _token]').val(); 



        if(titulo == '' || estado == ''){
            Swal.fire(
            'Opps!',
            'Falta completar los campos',
            'error'
            );
            return;
        }

        


        $.ajax({
                
                url: "{{ route('updateId') }}",
                type: "POST",
                data : {
                    id: idUser,
                    titulo: titulo, 
                    estado: estado,                  
                    _token: _token
                },
    
                success:function(response){
                    if(response.status){

                        console.log(response);
                        Swal.fire(
                            'Good!',
                            'Usuario actualizado',
                            'success'
                            );  
                        document.querySelector('#titulo').value = response.data.title;
                        document.querySelector('#estado').value = response.data.completed;
                        
                        restoreEstados();
                        return;
    
                    }else{
                        Swal.fire(
                            'Opps!',
                            'Este usuario no existe, reintente por favor.',
                            'error'
                            );                        
    
                        return;
    
                    }
                }
            })
        

    });




    $(document).on('click', '#btnDelete', function(){  

        let idUser = document.querySelector('#idUser').value;
       
        let _token = $('input[name = _token]').val(); 


        if(titulo == '' || estado == ''){
            Swal.fire(
            'Opps!',
            'Falta completar los campos',
            'error'
            );
            return;
        }
        $.ajax({
                
            url: "{{ route('deleteId') }}",
            type: "POST",
            data : {
                id: idUser,                                
                _token: _token
            },

            success:function(response){
                if(response.status){
                    console.log(response);
                    Swal.fire(
                        'Good!',
                        'Usuario eliminado, simulación terminada',
                        'success'
                        );  
                    document.querySelector('#showResponse').classList.add("nonBlock");                   
                    return;

                }else{
                    Swal.fire(
                        'Opps!',
                        'No se pudo eliminar el ususario, reintente por favor.',
                        'error'
                        );                        

                    return;

                }
            }
        })
    });
});

    
function restoreEstados() {
    $('#titulo').prop('readonly', true) ;
    $('#estado').prop('disabled', true) ;
    document.querySelector('#btnEdit').classList.remove("nonBlock");
    document.querySelector('#btnActualizar').classList.add("nonBlock");
}



</script>