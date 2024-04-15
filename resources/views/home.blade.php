@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

  <style>
    /* body{
      text-align:center;
    } */

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

<div class="justify-content-center" >

<div class="col-12">                                       
  <div class="row justify-content-center">
    <div class="col-md-5">
        <div class="row">
            <div class="col-md-12">
                <label style="text-align: center; display: block;">PABELLON<strong style="color:red">*</strong> </label>                                    
                <x-adminlte-select type="text" name="pabellon" id="pabellon" required  autocomplete="off" placeholder="Ingresar pabellon" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-id-card text-dark"></i>
                        </div>
                    </x-slot>
                    <option value="">--seleccione--</option>
                </x-adminlte-select>  
            </div>
        </div>
    </div>
  </div>
</div>

        
<div class="col-12" style="text-align:center;">                                       
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-12">
          <div class="encabezado-columnas"></div>
          <div class="margin-bottom: 5px" id="contenedor-vista">
            <div class="encabezado-filas"></div>
            <div class="tabla-hexagonos"></div>
          </div>
      </div>
    </div>
  </div>
</div>

<br>

<div class="col-md-12" style="text-align:center;">
  <div class="row">
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <h4>
            <span style="color: green">■</span> DISPONIBLE
          </h4>
        </div>
        <div class="col-md-12">
          <h4>
            <span style="color: yellow">■</span> PENDIENTE
          </h4>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <h4>
            <span style="color: red">■</span> COMPRADO
          </h4>
        </div>
        <div class="col-md-12">
          <h4>
            <span style="color: black">■</span> SEPULTADO
          </h4>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <h4>
            <span style="color: purple">■</span> TRASLADADO INTERNO
          </h4>
        </div>
        <div class="col-md-12">
          <h4>
            <span style="color: blue">■</span> TRASLADADO EXTERNO
          </h4>
        </div>
      </div>
    </div>
  </div>
</div>

  <div id="reportContainer" style="height: 100px"></div>

<div class="modal fade" id="modal-lg" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">INFORMACION DE  </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="editForm" action="{{ route('actualizarTumba', ['tumba' => ':id']) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <label>TITULAR</label>
                  <x-adminlte-input type="text" value="" name="titularAdd" id="titularAdd" autocomplete="off" placeholder="Ingrese nombre" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                          <i class="fas fa-user-tie"></i>
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
                  <x-adminlte-input type="text" value="" name="dniAdd" id="dniAdd" autocomplete="off" placeholder="Ingrese DNI" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                          <i class="far fa-id-card"></i>
                        </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                <label>CELULAR<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" value="" name="celularAdd" id="celularAdd" autocomplete="off" placeholder="Ingrese número" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                          <i class="fas fa-mobile"></i>
                        </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="row">
                <div class="col-md-12">
                <label>LETRA<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" required value="" name="letraAdd" id="letraAdd" disabled="disabled" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-table"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-2">
              <div class="row">
                <div class="col-md-12">
                <label>NUMERO<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" required value="" name="numeroAdd" id="numeroAdd" disabled="disabled" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-table"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                <label>CODIGO ANTERIOR<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" required value="" name="codigoAdd" id="codigoAdd" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-info"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="row">
                <div class="col-md-12">
                <label>ESTADO<strong style="color:red">*</strong></label>
                  <x-adminlte-select type="text" required value="" name="estadoAdd" id="estadoAdd" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-exclamation-circle"></i>
                      </div>
                    </x-slot>
                    <option value="0">DISPONIBLE</option>
                    <option value="1">PENDIENTE</option>
                    <option value="2">COMPRADO</option>
                    <option value="3">SEPULTADO</option>
                    <option value="4">TRASLADO INTERNO</option>
                    <option value="5">TRASLADO EXTERNO</option>
                  </x-adminlte-select>
                </div>
              </div>
            </div>

            <div class="col-md-4 traslado">
              <div class="row">
                <div class="col-md-12">
                <label>TIPO TRASLADO<strong style="color:red">*</strong></label>
                  <x-adminlte-select type="text" value="" name="tipoTrasladoAdd" id="tipoTrasladoAdd" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-exchange-alt"></i>
                      </div>
                    </x-slot>
                    <option>--Seleccione--</option>
                    <option value="1">ENTRADA</option>
                    <option value="2">SALIDA</option>
                  </x-adminlte-select>
                </div>
              </div>
            </div>

            <div class="col-md-12 traslado">
              <div class="row">
                <div class="col-md-12">
                <label>CEMENTERIO<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" name="cementerioAdd" id="cementerioAdd" autocomplete="off" placeholder="Ingrese al difunto" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-place-of-worship"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>

            <div class="col-md-12 difunto">
              <div class="row">
                <div class="col-md-12">
                <label>NOMBRE DEL/LA DIFUNTO(A)<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" name="difuntoAdd" id="difuntoAdd" autocomplete="off" placeholder="Ingrese al difunto" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-user text-dark"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>
            <div class="col-md-4 difunto">
              <div class="row">
                <div class="col-md-12">
                <label>FECHA FALLECIMIENTO<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="date" name="fechaFaAdd" id="fechaFaAdd" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>
            <div class="col-md-4 difunto">
              <div class="row">
                <div class="col-md-12">
                <label>FECHA ENTIERRO<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="date" name="fechaEntAdd" id="fechaEntAdd" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                          <i class="fas fa-calendar"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>
            <div class="col-md-4 difunto">
              <div class="row">
                <div class="col-md-12">
                <label>HORA ENTIERRO<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="time" name="horaEntAdd" id="horaEntAdd" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-clock"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <label>SERVICIOS FUNERARIOS<strong style="color:red">*</strong> </label>                                    
                  <x-adminlte-select type="text" name="obrasAdd" id="obrasAdd" required  autocomplete="off" placeholder="Ingresar pabellon" label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-clone"></i>
                      </div>
                    </x-slot>
                    <option value="">--seleccione--</option>
                  </x-adminlte-select>  
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                <label>COSTO<strong style="color:red">*</strong></label>
                  <x-adminlte-input type="text" name="costoAdd" id="costoAdd" disabled label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-coins"></i>
                      </div>
                    </x-slot>
                  </x-adminlte-input>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <label>ESTADO PAGO<strong style="color:red">*</strong> </label>                                    
                  <x-adminlte-select type="text" name="pagoAdd" id="pagoAdd" required label-class="text-lightblue">
                    <x-slot name="prependSlot">
                      <div class="input-group-text">
                        <i class="fas fa-exclamation-circle"></i>
                      </div>
                    </x-slot>
                    <option value="">--seleccione--</option>
                  </x-adminlte-select>  
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
<script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/jquery/dist/jquery.min.js"></script>
<script src="https://microsoft.github.io/PowerBI-JavaScript/demo/node_modules/powerbi-client/dist/powerbi.min.js"></script>

<!-- <script>
    // Cargar el informe utilizando el token de incrustación
    var embedConfiguration = {
        type: 'report',

        embedUrl: 'https://app.powerbi.com/reportEmbed?reportId=a392c5c2-5640-45d3-b4ff-28ae2b55e210&autoAuth=true&ctid=285d8c81-f797-4666-b282-521c46e63644'
    };

    var reportContainer = $('#reportContainer')[0];
    var report = powerbi.embed(reportContainer, embedConfiguration);
</script> -->

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
                /* var imagenTumba1 = '{{ asset("vendor/adminlte/dist/img/tumbaGreen.png") }}';
                var imagenTumba2 = '{{ asset("vendor/adminlte/dist/img/tumbaRed.png") }}';
                var imagenTumba3 = '{{ asset("vendor/adminlte/dist/img/tumbaOrange.png") }}';
                var imagenTumba4 = '{{ asset("vendor/adminlte/dist/img/tumbaYellow.png") }}';
                var imagenTumba5 = '{{ asset("vendor/adminlte/dist/img/tumbaBlue.png") }}'; */

                var imagenTumba0 = '{{ asset("vendor/adminlte/dist/img/tumbaVerde.png") }}';
                var imagenTumba1 = '{{ asset("vendor/adminlte/dist/img/tumbaAmarillo.png") }}';
                var imagenTumba2 = '{{ asset("vendor/adminlte/dist/img/tumbaRojo.png") }}';
                var imagenTumba3 = '{{ asset("vendor/adminlte/dist/img/tumbaBlack.png") }}';
                var imagenTumba4 = '{{ asset("vendor/adminlte/dist/img/tumbaMorado.png") }}';
                var imagenTumba5 = '{{ asset("vendor/adminlte/dist/img/tumbaAzul.png") }}';

                //multiplicacion por pabellon
                /* console.log(datosTumbas.length); */
                  // Itera sobre las tumbas y crea hexágonos con la información de la tabla "tumba"
                for (var i = 0; i < datosTumbas.length; i++) {
                    var idTumba = 'tumba-' + datosTumbas[i].letra + '-' + datosTumbas[i].numero;

                    if(datosTumbas[i].estado == 0){
                      var imagenTumba = imagenTumba0;
                      var hexagonHtml = '<a type="button" class="btn-datos-0" id="'+idTumba+'" data-id="'+datosTumbas[i].id+'" data-toggle="modal" data-target="#modal-lg"><img src="'+imagenTumba+'" alt="Hexagono"></a>';
                    }else if(datosTumbas[i].estado == 1){
                      var imagenTumba = imagenTumba1;
                      var hexagonHtml = '<a type="button" class="btn-datos-1" id="'+idTumba+'" data-id="'+datosTumbas[i].id+'" data-toggle="modal" data-target="#modal-lg"><img src="'+imagenTumba+'" alt="Hexagono"></a>';
                    }else if(datosTumbas[i].estado == 2){
                      var imagenTumba = imagenTumba2;
                      var hexagonHtml = '<a type="button" class="btn-datos-2" id="'+idTumba+'" data-id="'+datosTumbas[i].id+'" data-toggle="modal" data-target="#modal-lg"><img src="'+imagenTumba+'" alt="Hexagono"></a>';
                    }else if(datosTumbas[i].estado == 3){
                      var imagenTumba = imagenTumba3;
                      var hexagonHtml = '<a type="button" class="btn-datos-3" id="'+idTumba+'" data-id="'+datosTumbas[i].id+'" data-toggle="modal" data-target="#modal-lg"><img src="'+imagenTumba+'" alt="Hexagono"></a>';
                    }else if(datosTumbas[i].estado == 4){
                      var imagenTumba = imagenTumba4;
                      var hexagonHtml = '<a type="button" class="btn-datos-4" id="'+idTumba+'" data-id="'+datosTumbas[i].id+'" data-toggle="modal" data-target="#modal-lg"><img src="'+imagenTumba+'" alt="Hexagono"></a>';
                    }else if(datosTumbas[i].estado == 5){
                      var imagenTumba = imagenTumba5;
                      var hexagonHtml = '<a type="button" class="btn-datos-5" id="'+idTumba+'" data-id="'+datosTumbas[i].id+'" data-toggle="modal" data-target="#modal-lg"><img src="'+imagenTumba+'" alt="Hexagono"></a>';
                    }
                    
                    contenedorTabla.append(hexagonHtml);
                }
                mostrarDatos(datosTumbas);
                /* console.log(datosTumbas); */
              },
              error: function(error) {
                  console.error('Error al obtener tumbas desde la tabla:', error);
              }
            });

              function mostrarDatos(datosTumbas) {
                console.log(datosTumbas);
                var contenedorTabla = $('.tabla-hexagonos');
                contenedorTabla.on('click', '.btn-datos-0', function() {
                var id = $(this).data('id');

                // Encuentra la información de la tumba correspondiente en datosTumbas
                /* var tumbaSeleccionada = datosTumbas.find(tumba => tumba.id === id);
                console.log(tumbaSeleccionada); */
                var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
                  console.log(id);
                  $.ajax({
                    url: 'buscarDatosTumba/'+id,  // Reemplaza con la ruta correcta
                    method: 'GET',
                    success: function(infoTumba) {


                      /* $('.difunto').hide(); */
                      var url1 = "{{ route('actualizarTumba', ['tumba' => ':id']) }}"; // Obtener la URL base del formulario
                      var nuevaUrl = url1.replace(':id', id);
                      console.log(infoTumba);
                      var letraTumba = letras[infoTumba[0].letra - 1];
                      $('.difunto').hide();
                      $('.traslado').hide();
                      // Llenar el modal con los datos de la tumba seleccionada
                      $('#modal-lg #titularAdd').val(infoTumba[0].titular);
                      $('#modal-lg #dniAdd').val(infoTumba[0].dni);
                      $('#modal-lg #celularAdd').val(infoTumba[0].celular);
                      $('#modal-lg #estadoAdd').val(infoTumba[0].estado);
                      $('#modal-lg #numeroAdd').val(infoTumba[0].numero);
                      $('#modal-lg #letraAdd').val(letraTumba);

                      $('#modal-lg #codigoAdd').val(infoTumba[0].oldCodigo);
                      $('#modal-lg #tipoTrasladoAdd').val(infoTumba[0].tipoTrasladoAdd);
                      $('#modal-lg #cementerioAdd').val(infoTumba[0].cementerioAdd);


                      $('#modal-lg #difuntoAdd').val(infoTumba[0].nombre_difunto);
                      $('#modal-lg #fechaEntAdd').val(infoTumba[0].fecha_entierro);
                      $('#modal-lg #fechaFaAdd').val(infoTumba[0].fecha_fallecimiento);

                      $('#modal-lg #obrasAdd').val(infoTumba[0].obrasAdicionales_id);
                      $('#modal-lg #pagoAdd').val(infoTumba[0].estadoPago_id);
                      $('#modal-lg #costoAdd').val(infoTumba[0].montoTumba);


                      console.log(infoTumba[0].letra);
                      // Configurar la acción del formulario con la ruta correcta
                      $('#editForm').attr('method', 'POST');
                      $('#editForm').attr('action', nuevaUrl);
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
    var contenedorTabla = $('.tabla-hexagonos');
    contenedorTabla.on('click', '.btn-datos-1', function() {
    
    var id = $(this).data('id');
    var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
      console.log(id);
      $.ajax({
        url: 'buscarDatosTumba1/'+id,  // Reemplaza con la ruta correcta
        method: 'GET',
        success: function(detTumba) {
          /* $('.difunto').hide(); */
          var url1 = "{{ route('actualizarTumba', ['tumba' => ':id']) }}"; // Obtener la URL base del formulario
          var nuevaUrl = url1.replace(':id', id);
          console.log(detTumba);
          $('.difunto').hide();
          $('.traslado').hide();
          var letraTumba = letras[detTumba.letra - 1];
          // Llenar el modal con los datos de la tumba seleccionada
          $('#modal-lg #titularAdd').val(detTumba.titular);
          $('#modal-lg #dniAdd').val(detTumba.dni);
          $('#modal-lg #celularAdd').val(detTumba.celular);
          $('#modal-lg #estadoAdd').val(detTumba.estado);
          $('#modal-lg #numeroAdd').val(detTumba.numero);
          $('#modal-lg #letraAdd').val(letraTumba);
          $('#modal-lg #codigoAdd').val(detTumba.oldCodigo);

          $('#modal-lg #difuntoAdd').val(detTumba.nombre_difunto);
          $('#modal-lg #fechaEntAdd').val(detTumba.fecha_entierro);
          $('#modal-lg #fechaFaAdd').val(detTumba.fecha_fallecimiento);
          $('#modal-lg #horaEntAdd').val(detTumba.hora_entierro);

          $('#modal-lg #obrasAdd').val(detTumba.obrasAdicionales_id);
          $('#modal-lg #pagoAdd').val(detTumba.estadoPago_id);

          if (detTumba.obrasAdicionales_id == 1) {
            $('#costoAdd').val('0.00');
          }else if(detTumba.obrasAdicionales_id == 2){
            $('#costoAdd').val('70.00');
          }else if(detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 4 || detTumba.obrasAdicionales_id == 5){
            $('#costoAdd').val('50.00');
          }

          // Configurar la acción del formulario con la ruta correcta
          $('#editForm').attr('method', 'POST');
          $('#editForm').attr('action', nuevaUrl);
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
  });
</script>

<!-- PROGRAMADO -->
<script>
  $(document).ready(function() {
    var contenedorTabla = $('.tabla-hexagonos');
    contenedorTabla.on('click', '.btn-datos-2', function() {
    
    var id = $(this).data('id');
    var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
      console.log(id);
      $.ajax({
        url: 'buscarDatosTumba3/'+id,  // Reemplaza con la ruta correcta
        method: 'GET',
        success: function(detTumba) {
          /* $('.difunto').hide(); */
          var url1 = "{{ route('actualizarTumba', ['tumba' => ':id']) }}"; // Obtener la URL base del formulario
          var nuevaUrl = url1.replace(':id', id);
          console.log(detTumba);
          $('.difunto').hide();
          $('.traslado').hide();
          var letraTumba = letras[detTumba.letra - 1];
          // Llenar el modal con los datos de la tumba seleccionada
          $('#modal-lg #titularAdd').val(detTumba.titular);
          $('#modal-lg #dniAdd').val(detTumba.dni);
          $('#modal-lg #celularAdd').val(detTumba.celular);
          $('#modal-lg #estadoAdd').val(detTumba.estado);
          $('#modal-lg #numeroAdd').val(detTumba.numero);
          $('#modal-lg #letraAdd').val(letraTumba);
          $('#modal-lg #codigoAdd').val(detTumba.oldCodigo);

          $('#modal-lg #difuntoAdd').val(detTumba.nombre_difunto);
          $('#modal-lg #fechaEntAdd').val(detTumba.fecha_entierro);
          $('#modal-lg #fechaFaAdd').val(detTumba.fecha_fallecimiento);
          $('#modal-lg #horaEntAdd').val(detTumba.hora_entierro);

          $('#modal-lg #obrasAdd').val(detTumba.obrasAdicionales_id);
          $('#modal-lg #pagoAdd').val(detTumba.estadoPago_id);

          if (detTumba.obrasAdicionales_id == 1) {
            $('#costoAdd').val('0.00');
          }else if(detTumba.obrasAdicionales_id == 2){
            $('#costoAdd').val('70.00');
          }else if(detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 4 || detTumba.obrasAdicionales_id == 5){
            $('#costoAdd').val('50.00');
          }

          // Configurar la acción del formulario con la ruta correcta
          $('#editForm').attr('method', 'POST');
          $('#editForm').attr('action', nuevaUrl);
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
  });
</script>

<!-- SEPULTADO -->
<script>
  $(document).ready(function() {
    var contenedorTabla = $('.tabla-hexagonos');
    contenedorTabla.on('click', '.btn-datos-3', function() {
    
    var id = $(this).data('id');
    var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
      console.log(id);
      $.ajax({
        url: 'buscarDatosTumba3/'+id,  // Reemplaza con la ruta correcta
        method: 'GET',
        success: function(detTumba) {
          /* $('.difunto').hide(); */
          var url1 = "{{ route('actualizarTumba', ['tumba' => ':id']) }}"; // Obtener la URL base del formulario
          var nuevaUrl = url1.replace(':id', id);
          console.log(detTumba);
          $('.difunto').show();
          var letraTumba = letras[detTumba.letra - 1];
          // Llenar el modal con los datos de la tumba seleccionada
          $('#modal-lg #titularAdd').val(detTumba.titular);
          $('#modal-lg #dniAdd').val(detTumba.dni);
          $('#modal-lg #celularAdd').val(detTumba.celular);
          $('#modal-lg #estadoAdd').val(detTumba.estado);
          $('#modal-lg #numeroAdd').val(detTumba.numero);
          $('#modal-lg #letraAdd').val(letraTumba);
          $('#modal-lg #codigoAdd').val(detTumba.oldCodigo);

          $('#modal-lg #difuntoAdd').val(detTumba.nombre_difunto);
          $('#modal-lg #fechaEntAdd').val(detTumba.fecha_entierro);
          $('#modal-lg #fechaFaAdd').val(detTumba.fecha_fallecimiento);
          $('#modal-lg #horaEntAdd').val(detTumba.hora_entierro);

          $('#modal-lg #obrasAdd').val(detTumba.obrasAdicionales_id);
          $('#modal-lg #pagoAdd').val(detTumba.estadoPago_id);

          if (detTumba.obrasAdicionales_id == 1) {
            $('#costoAdd').val('0.00');
          }else if(detTumba.obrasAdicionales_id == 2){
            $('#costoAdd').val('70.00');
          }else if(detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 4 || detTumba.obrasAdicionales_id == 5){
            $('#costoAdd').val('50.00');
          }

          // Configurar la acción del formulario con la ruta correcta
          $('#editForm').attr('method', 'POST');
          $('#editForm').attr('action', nuevaUrl);
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
  });
</script>

<!-- TRASLADO INTERNO -->
<script>
  $(document).ready(function() {
    var contenedorTabla = $('.tabla-hexagonos');
    contenedorTabla.on('click', '.btn-datos-4', function() {
    
    var id = $(this).data('id');
    var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
      console.log(id);
      $.ajax({
        url: 'buscarDatosTumba3/'+id,  // Reemplaza con la ruta correcta
        method: 'GET',
        success: function(detTumba) {
          /* $('.difunto').hide(); */
          var url1 = "{{ route('actualizarTumba', ['tumba' => ':id']) }}"; // Obtener la URL base del formulario
          var nuevaUrl = url1.replace(':id', id);
          console.log(detTumba);
          $('.difunto').show();
          var letraTumba = letras[detTumba.letra - 1];
          // Llenar el modal con los datos de la tumba seleccionada
          $('#modal-lg #titularAdd').val(detTumba.titular);
          $('#modal-lg #dniAdd').val(detTumba.dni);
          $('#modal-lg #celularAdd').val(detTumba.celular);
          $('#modal-lg #estadoAdd').val(detTumba.estado);
          $('#modal-lg #numeroAdd').val(detTumba.numero);
          $('#modal-lg #letraAdd').val(letraTumba);

          $('#modal-lg #difuntoAdd').val(detTumba.nombre_difunto);
          $('#modal-lg #fechaEntAdd').val(detTumba.fecha_entierro);
          $('#modal-lg #fechaFaAdd').val(detTumba.fecha_fallecimiento);
          $('#modal-lg #horaEntAdd').val(detTumba.hora_entierro);

          $('#modal-lg #obrasAdd').val(detTumba.obrasAdicionales_id);
          $('#modal-lg #pagoAdd').val(detTumba.estadoPago_id);

          if (detTumba.obrasAdicionales_id == 1) {
            $('#costoAdd').val('0.00');
          }else if(detTumba.obrasAdicionales_id == 2){
            $('#costoAdd').val('70.00');
          }else if(detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 4 || detTumba.obrasAdicionales_id == 5){
            $('#costoAdd').val('50.00');
          }

          // Configurar la acción del formulario con la ruta correcta
          $('#editForm').attr('method', 'POST');
          $('#editForm').attr('action', nuevaUrl);
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
  });
</script>

<!-- TRASLADO EXTERNO -->
<script>
  $(document).ready(function() {
    var contenedorTabla = $('.tabla-hexagonos');
    contenedorTabla.on('click', '.btn-datos-5', function() {
    
    var id = $(this).data('id');
    var letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
      console.log(id);
      $.ajax({
        url: 'buscarDatosTumba3/'+id,  // Reemplaza con la ruta correcta
        method: 'GET',
        success: function(detTumba) {
          /* $('.difunto').hide(); */
          var url1 = "{{ route('actualizarTumba', ['tumba' => ':id']) }}"; // Obtener la URL base del formulario
          var nuevaUrl = url1.replace(':id', id);
          console.log(detTumba);
          $('.difunto').show();
          var letraTumba = letras[detTumba.letra - 1];
          // Llenar el modal con los datos de la tumba seleccionada
          $('#modal-lg #titularAdd').val(detTumba.titular);
          $('#modal-lg #dniAdd').val(detTumba.dni);
          $('#modal-lg #celularAdd').val(detTumba.celular);
          $('#modal-lg #estadoAdd').val(detTumba.estado);
          $('#modal-lg #numeroAdd').val(detTumba.numero);
          $('#modal-lg #letraAdd').val(letraTumba);

          $('#modal-lg #difuntoAdd').val(detTumba.nombre_difunto);
          $('#modal-lg #fechaEntAdd').val(detTumba.fecha_entierro);
          $('#modal-lg #fechaFaAdd').val(detTumba.fecha_fallecimiento);
          $('#modal-lg #horaEntAdd').val(detTumba.hora_entierro);

          $('#modal-lg #obrasAdd').val(detTumba.obrasAdicionales_id);
          $('#modal-lg #pagoAdd').val(detTumba.estadoPago_id);

          if (detTumba.obrasAdicionales_id == 1) {
            $('#costoAdd').val('0.00');
          }else if(detTumba.obrasAdicionales_id == 2){
            $('#costoAdd').val('70.00');
          }else if(detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 3 || detTumba.obrasAdicionales_id == 4 || detTumba.obrasAdicionales_id == 5){
            $('#costoAdd').val('50.00');
          }

          // Configurar la acción del formulario con la ruta correcta
          $('#editForm').attr('method', 'POST');
          $('#editForm').attr('action', nuevaUrl);
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

$("#estadoAdd").on('change', function() {
  var estado = $(this).val();
  if (estado == 0){
    $('.traslado').hide();
    $('.difunto').hide();
    $('#difuntoAdd').val("-");
    $('#fechaEntAdd').val("-");
    $('#fechafaAdd').val("-");
    $('#horaEntAdd').val("-");
    $('#tipoTrasladoAdd').val("-");
    $('#cementerioAdd').val("-");
  }else if(estado == 3){
    $('.traslado').hide();
    $('.difunto').show();
    $('#difuntoAdd').val("");
    $('#fechaEntAdd').val("");
    $('#tipoTrasladoAdd').val("-");
    $('#cementerioAdd').val("-");
  }else if(estado == 4){
    $('.difunto').show();
    $('.traslado').show();
    $('#difuntoAdd').val("");
    $('#fechaEntAdd').val("");
    $('#horaEntAdd').val("");
    $('#fechaFaAdd').val("");
  }else if(estado == 5){
    $('.difunto').show();
    $('#difuntoAdd').val("");
    $('#fechaEntAdd').val("");
    $('#horaEntAdd').val("");
    $('#fechaFaAdd').val("");
    $('.traslado').show();
  }else{
    $('.traslado').hide();
    $('.difunto').hide();
    $('#difuntoAdd').val("-");
    $('#fechaEntAdd').val("-");
    $('#fechafaAdd').val("-"); 
    $('#horaEntAdd').val("-");
    $('#tipoTrasladoAdd').val("0");
    $('#cementerioAdd').val("-");
  }
});

$.ajax({
  url: 'selectObrasAdd', // Nombre de tu script PHP que obtiene los registros
  type: 'GET',
  dataType: 'json', // Esperamos recibir datos en formato JSON
  success: function(data) {
      // Llenar el select con los registros obtenidos
      var obras = $('#obrasAdd');
      $.each(data, function(index, record) {
          obras.append('<option value="' + record.id + '">' + record.descripcion + '</option>');
      });

      $('#obrasAdd').on('change', function() {
        var id = $(this).val();
        if(id == ""){
          $('#costoAdd').val(data[0].monto);
        }else if(id == 1){
          $('#costoAdd').val(data[0].monto);
        }else if(id == 2){
          $('#costoAdd').val(data[1].monto);
        }else if(id == 3){
          $('#costoAdd').val(data[2].monto);
        }else if(id == 4){
          $('#costoAdd').val(data[3].monto);
        }else if(id == 5){
          $('#costoAdd').val(data[4].monto);
        }else if(id == 6){
          $('#costoAdd').val(data[5].monto);
        }
        obtenerCosto(id);
      });
  },
  error: function(error) {
      console.log('Error al obtener datos: ' + error);
  }
});

$.ajax({
  url: 'selectpagoAdd', // Nombre de tu script PHP que obtiene los registros
  type: 'GET',
  dataType: 'json', // Esperamos recibir datos en formato JSON
  success: function(data) {
      // Llenar el select con los registros obtenidos
      var obras = $('#pagoAdd');
      $.each(data, function(index, record) {
          obras.append('<option value="' + record.id + '">' + record.descripcion + '</option>');
      });
      
  },
  error: function(error) {
      console.log('Error al obtener datos: ' + error);
  }
});
</script>

@stop