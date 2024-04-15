@extends('adminlte::page')

@section('title', 'Dashboard')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        #contenedor-vista {
            /* display: grid; */
            display: flex;
            grid-template-columns: auto repeat(var(--columnas), 5fr);
            width: fit-content;
            margin: auto;
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
            padding-left : 54px;
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

@section('content_header')
    <h1>REGISTRO DE PABELLON</h1>
@stop

@section('content')
<x-adminlte-card title="REGISTRO DE PABELLON" theme="dark" theme-mode="outline" class="elevation-3" body-class="bg-light" header-class="" footer-class="bg-light border-top rounded border-light" icon="fas fa-lg fa-building" collapsible maximizable>
    <form action="{{ route('storePabellon') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label>NOMBRE PABELLON</label>
                                <x-adminlte-input type="text" required name="nameCreate" id="nameCreate" autocomplete="off" placeholder="Ingrese nombre" label-class="text-lightblue">
                                    <x-slot name="prependSlot">
                                        <div class="input-group-text">
                                            <i class="fas fa-user text-dark"></i>
                                        </div>
                                    </x-slot>
                                </x-adminlte-input>  
                            </div>
                        </div>
                    </div>
                    <div  style="overflow-x: inherit">
                        <div class="encabezado-columnas"></div>
                        <div id="contenedor-vista">
                            <!-- <div class="numero">LADO B</div> -->
                            <div class="encabezado-filas"></div>
                            <div class="tabla-hexagonos"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</x-adminlte-card>
@stop

@section('css')
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#filasCreate, #columnasCreate').on('change', function() {
        var filas = parseInt($('#filasCreate').val());
        var columnas = parseInt($('#columnasCreate').val());

        if (!isNaN(filas) && !isNaN(columnas)) {
            actualizarTabla(filas, columnas);
        }
    });

    function actualizarTabla(filas, columnas) {
        document.documentElement.style.setProperty('--filas', filas);
        document.documentElement.style.setProperty('--columnas', columnas);

        mostrarHexagonos(filas, columnas);
    }

    function mostrarHexagonos(filas, columnas) {
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

        for (var i = 65; i < 65 + filas; i++) { 
            var letra = String.fromCharCode(i);
            
            for (var j = 1; j <= columnas; j++) {
                var idTumba = 'tumba-' + letra + '-' + j;
                var imagenTumba = '{{ asset("vendor/adminlte/dist/img/tumbaGreen.png") }}';
                var hexagonHtml = '<div id="' + idTumba + '"><img src="'+imagenTumba+'" alt="Hexagono"></div>';
                contenedorTabla.append(hexagonHtml);
            }
        }
    }
});
</script>

@stop