@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<!-- <style>
    .hexagon {
      position: relative;
      width: 100px; 
      height: 20px;
      margin: 35px 0px;
      background-color: #64C7CC;
    }
    .hexagon:before,
    .hexagon:after {
      content: "";
      position: absolute;
      width: 0;
      border-left: 70px solid transparent;
      border-right: 30px solid transparent;
    }
    .hexagon:before {
      bottom: 100%;
      border-bottom: 15px solid #64C7CC;
    }
    .hexagon:after {
      top: 100%;
      width: 0;
      border-top: 15px solid #64C7CC;
    }
  </style> -->

  <style>
        #contenedor-vista {
            /* display: grid; */
            display: flex;
            grid-template-columns: auto repeat(var(--columnas), 5fr);
            width: fit-content;
        }

        .tabla-hexagonos {
            display: grid;
            grid-template-columns: repeat(var(--columnas), 1fr);
            grid-template-rows: repeat(var(--filas), 1fr);
            grid-gap: 2px;
            /* margin-top: 20px; */
        }

        .encabezado-filas, .encabezado-columnas, .tabla-hexagonos {
            display: grid;
            grid-gap: 2px;
            transform: scale(1);

        }

        .numero {
            /* border: 1px solid #ccc; */
            text-align: center;
            padding: 5px; /* Ajusta según tus necesidades */
            transform: scale(1);
            width: 64px;
            display: flex;
            align-items: center;
            vertical-align: middle;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        .encabezado-filas {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 2px;
            transform: scale(1);
        }
        
        .encabezado-columnas {
            padding-left : 58px;
            margin : 5px;
            display: flex;
            flex-direction: row;
            transform: scale(1);
        }

        .encabezado-celda {
            background-color: #64C7CC;
            height: 12px;
            width: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }
    </style>
@stop

@section('content')
<body>

<div>

<div class="col-12">                                       
  <div class="row ">
    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                <label>PABELLON<strong style="color:red">*</strong> </label>                                    
                <x-adminlte-select type="text" name="pabellon" id="pabellon" required  placeholder="Ingresar pabellon" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-id-card text-dark"></i>
                        </div>
                    </x-slot>
                </x-adminlte-select>  
            </div>
        </div>
    </div>

    <!-- <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                {{-- DNI --}}
                <label>DNI<strong style="color:red">*</strong> </label>                                    
                <x-adminlte-select type="text" name="numdoc" id="numdoc" required  placeholder="Ingresar dni" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-id-card text-dark"></i>
                        </div>
                    </x-slot>
                </x-adminlte-select>  
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="row">
            <div class="col-md-12">
                {{-- DNI --}}
                <label>DNI<strong style="color:red">*</strong> </label>                                    
                <x-adminlte-select type="text" name="numdoc" id="numdoc" required  placeholder="Ingresar dni" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-id-card text-dark"></i>
                        </div>
                    </x-slot>
                </x-adminlte-select>  
            </div>
        </div>
      </div>
    </div> -->
  </div>
</div>
  <div class="encabezado-columnas"></div>
  <div id="contenedor-vista">
    <div class="encabezado-filas"></div>
    <div class="tabla-hexagonos"></div>
  </div>

<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">INFORMACION DE </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="editForm" url="" method="POST">
        @method('PUT')
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                  <label>Titular </label>
                  <x-adminlte-input type="text" value="" name="titularAdd" id="titularAdd" placeholder="Ingrese nombre" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                          <i class="fas fa-user text-dark"></i>
                        </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                <label>DNI<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" value="" name="dniAdd" id="dniAdd" placeholder="Ingrese nombre" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                          <i class="fas fa-user text-dark"></i>
                        </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                <label>Celular<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" value="" name="celularAdd" id="celularAdd" placeholder="Ingrese nombre" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                          <i class="fas fa-user text-dark"></i>
                        </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                <label>Letra <strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" required value="" name="letraAdd" id="letraAdd" placeholder="Ingrese dni" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                          <i class="fas fa-user text-dark"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                <label>Numero<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" required value="" name="numeroAdd" id="numeroAdd" placeholder="Ingrese dni" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                          <i class="fas fa-user text-dark"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                <label>Estado<strong style="color:red">*</strong></label>
                  <x-adminlte-select type="text" required value="" name="estadoAdd" id="estadoAdd" placeholder="Ingrese dni" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                          <i class="fas fa-user text-dark"></i>
                      </div>
                    </x-slot>
                    <option value="0">DISPONIBLE</option>
                    <option value="1">PENDIENTE</option>
                    <option value="2">PROGRAMADO</option>
                    <option value="3">ENTERRADO</option>
                    <option value="4">TRASLADO INTERNO</option>
                    <option value="5">TRASLADO EXTERNO</option>
                  </x-adminlte-select>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="row">
                <div class="col-md-12">
                <label>Difunto<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" required value="" name="difuntoAdd" id="difuntoAdd" placeholder="Ingrese al difunto" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                          <i class="fas fa-user text-dark"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                <label>Fecha Entierro<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="date" required value="" name="fechaEntAdd" id="fechaEntAdd" placeholder="Ingrese fecha de entierro" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                          <i class="fas fa-user text-dark"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

@stop

@section('css')

@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // Aquí podrías realizar una petición AJAX para obtener las filas y columnas desde la tabla "pabellon"
        $('#pabellon').on('change', function() {
          limpiarDivs();
          var pabellon = $(this).val()
            obtenerFilasyColumnas(pabellon);
        });

        function limpiarDivs() {
          // Limpiar el contenido de los divs
          $('.encabezado-columnas').empty();
          $('.encabezado-filas').empty();
          $('.tabla-hexagonos').empty();
        }

        function obtenerFilasyColumnas(pabellon) {
          $.ajax({
            url: 'obtenerFilasyColumnas/'+pabellon,  // Reemplaza con la ruta correcta
            method: 'GET',
            success: function(data) {
                var filas = data.cant_filas;  // Ajusta según la estructura de tu respuesta
                var columnas = data.cant_columnas; 
                var id = data.id;
                /* console.log(filas);
                console.log(columnas); */
                
                actualizarTabla(filas, columnas, pabellon);
            },
            error: function(error) {
                console.error('Error al obtener filas y columnas desde pabellon:', error);
            }
          });
        }

        function actualizarTabla(filas, columnas, pabellon) {
          document.documentElement.style.setProperty('--filas', filas);
          document.documentElement.style.setProperty('--columnas', columnas);
          mostrarHexagonos(filas, columnas, pabellon);
        }

        function mostrarHexagonos(filas, columnas, pabellon) {
            var contenedorFilas = $('.encabezado-filas');
            var contenedorColumnas = $('.encabezado-columnas');
            var contenedorTabla = $('.tabla-hexagonos');
            contenedorFilas.empty();
            contenedorColumnas.empty();
            contenedorTabla.empty();
            var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
            for (var i = 0; i < filas; i++) {
                var letra = letras[i];
                var filaHtml = '<div class="numero">' + letra + '</div>';
                contenedorFilas.append(filaHtml);
            }
            for (var j = 1; j <= columnas; j++) {
                var columnaHtml = '<div class="numero">' + j + '</div>';
                contenedorColumnas.append(columnaHtml);
            }
            contenedorTabla.css('--columnas', columnas);
            // Aquí podrías realizar una petición AJAX para obtener las tumbas desde la tabla "tumba"
            obtenerTumbas(pabellon);
            /* var datosTumbas = []; */
            
            function obtenerTumbas(pabellon) {
              $.ajax({
              url: 'obtenerTumbas/'+pabellon,  // Reemplaza con la ruta correcta
              method: 'GET',
              success: function(datosTumbas) {
                /* datosTumbas = tumbas; */
                contenedorTabla.empty();
                //multiplicacion por pabellon
                /* console.log(datosTumbas.length); */
                  // Itera sobre las tumbas y crea hexágonos con la información de la tabla "tumba"
                for (var i = 0; i < datosTumbas.length; i++) {
                    var idTumba = 'tumba-' + datosTumbas[i].letra + '-' + datosTumbas[i].numero;
                    var imagenTumba = '{{ asset("vendor/adminlte/dist/img/tumbaGreen.png") }}';
                    var hexagonHtml = '<a type="button" class="btn-datos" name"btn-datos" id="'+idTumba+'" data-id="'+datosTumbas[i].id+'" data-toggle="modal" data-target="#modal-lg"><img src="'+imagenTumba+'" alt="Hexagono"></a>';
                    contenedorTabla.append(hexagonHtml);
                }
                /* console.log(datosTumbas); */
                mostrarDatos(datosTumbas);
              },
              error: function(error) {
                  console.error('Error al obtener tumbas desde la tabla:', error);
              }
            });

              function mostrarDatos(datosTumbas) {
                console.log(datosTumbas);
                var contenedorTabla = $('.tabla-hexagonos');
                contenedorTabla.on('click', '.btn-datos', function() {
                var id = $(this).data('id');

                // Encuentra la información de la tumba correspondiente en datosTumbas
                /* var tumbaSeleccionada = datosTumbas.find(tumba => tumba.id === id);
                console.log(tumbaSeleccionada); */

                var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');

                /* // Llenar el modal con los datos de la tumba seleccionada
                $('#modal-lg #titularAdd').val(tumbaSeleccionada.titular);
                $('#modal-lg #dniAdd').val(tumbaSeleccionada.dni);
                $('#modal-lg #celularAdd').val(tumbaSeleccionada.celular);
                $('#modal-lg #ladoAdd').val(tumbaSeleccionada.lado);
                $('#modal-lg #numeroAdd').val(tumbaSeleccionada.numero);
                $('#modal-lg #letraAdd').val(letraTumba);
                console.log(tumbaSeleccionada.lado);
                // Configurar la acción del formulario con la ruta correcta
                $('#editForm').attr('action', '{{ url("ubicacion/update") }}/' + id);
                // Establecer el valor del campo oculto con el ID
                $('#modal-lg').val(id);
                  // Hacer la solicitud AJAX al servidor */

                  console.log(id);

                  $.ajax({
                    url: 'buscarDatosTumba/'+id,  // Reemplaza con la ruta correcta
                    method: 'GET',
                    success: function(infoTumba) {
                      /* console.log(infoTumba); */
                      var letraTumba = letras[infoTumba[0].letra - 1];
                      // Llenar el modal con los datos de la tumba seleccionada
                      $('#modal-lg #titularAdd').val(infoTumba[0].titular);
                      $('#modal-lg #dniAdd').val(infoTumba[0].dni);
                      $('#modal-lg #celularAdd').val(infoTumba[0].celular);
                      $('#modal-lg #ladoAdd').val(infoTumba[0].estado);
                      $('#modal-lg #numeroAdd').val(infoTumba[0].numero);
                      $('#modal-lg #letraAdd').val(letraTumba);

                      $('#modal-lg #difuntoAdd').val(infoTumba[0].difunto);
                      $('#modal-lg #fechaEntAdd').val(infoTumba[0].fecha);

                      console.log(infoTumba[0].letra);
                      // Configurar la acción del formulario con la ruta correcta
                      $('#editForm').attr('action', '{{ url("tumbas/actualizar/") }}/' + id);
                      // Establecer el valor del campo oculto con el ID
                      $('#modal-lg').val(id);
                        // Hacer la solicitud AJAX al servidor
                    },
                    error: function(error) {
                        console.error('Error al obtener tumbas desde la tabla:', error);
                    }
                  });
                cache.flush();
                });
              }
            }
          }
        });
</script>

<script>
  $(document).ready(function() {
    // Hacer la solicitud AJAX al servidor
    $.ajax({
        url: 'selectPabellon', // Nombre de tu script PHP que obtiene los registros
        type: 'GET',
        dataType: 'json', // Esperamos recibir datos en formato JSON
        success: function(data) {
            // Llenar el select con los registros obtenidos
            var pabellon = $('#pabellon');
            $.each(data, function(index, record) {
                pabellon.append('<option value="' + record.id + '">' + record.nombre + '</option>');
            });
        },
        error: function(error) {
            console.log('Error al obtener datos: ' + error);
        }
    });
});
</script>
@stop