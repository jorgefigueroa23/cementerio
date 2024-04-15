@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')
<br>
<x-adminlte-card title="SERVICIOS QUE BRINDA EL CEMENTERIO MUNICIPAL" class="m-2" theme="dark" icon="fas fa-id-card">
    <div class="col-12">                                         
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <br>
                                <table id="tabla_servicios" class="table table-hover align-middle dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-addServicio"><i class="fas fa-plus-square"></i></a>
                                    <thead class="text-center px-4 py-4 text-nowrap bg-gray">
                                        <tr >
                                            <th>ID</th>
                                            <th>DESCRIPCION</th>
                                            <th>MONTO</th>
                                            <th>RESOLUCION</th>
                                            <!-- <th>ESTADO</th> -->
                                            <th>EDITAR</th>
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-adminlte-card>

<div class="modal fade" id="modal-addServicio">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">AGREGAR NUEVO SERVICIO</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('guardarObrasAdd') }}" method="post">
                    @csrf
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>DESCRIPCION SERVICIO</label>
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
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>MONTO</label>                                       
                                    <x-adminlte-input type="text" required name="columnasCreate" id="columnasCreate" autocomplete="off" placeholder="Ingrese monto" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>RESOLUCIÓN</label>                                       
                                    <x-adminlte-input type="text" required name="filasCreate" id="filasCreate" autocomplete="off" placeholder="Ingrese resolución" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-id-card text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarCambios">Registrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-servicio">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR SERVICIO</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="{{ route('guardarObrasAdd') }}" method="post">
                    @csrf
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>DESCRIPCION SERVICIO</label>
                                    <x-adminlte-input type="text" required name="descripcionEdit" id="descripcionEdit" autocomplete="off" placeholder="Ingrese nombre" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>  
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>MONTO</label>                                       
                                    <x-adminlte-input type="text" required name="montoEdit" id="montoEdit" autocomplete="off" placeholder="Ingrese monto" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-user text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>RESOLUCIÓN</label>                                       
                                    <x-adminlte-input type="text" required name="resolucionEdit" id="resolucionEdit" autocomplete="off" placeholder="Ingrese resolución" label-class="text-lightblue">
                                        <x-slot name="prependSlot">
                                            <div class="input-group-text">
                                                <i class="fas fa-id-card text-dark"></i>
                                            </div>
                                        </x-slot>
                                    </x-adminlte-input>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarCambios">Registrar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
@stop

@section('js')

<script>
$(document).ready(function() {
    $('#tabla_servicios').DataTable({
        "dom": 'Bfrtip',
        "paging": true,
        "lengthChange": true,
        "searching": true,      
        "ordering": true,
        "order": [[0, "asc"]],
        "info": true,
        "autoWidth": true,
        "responsive": true,
        "paging": true,
        "language": {"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
        "emptyTable": "No hay datos disponibles para mostrar",
        "info": "Mostrando START a END de TOTAL entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
        "infoFiltered": "(filtrado de MAX entradas totales)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar MENU entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron registros coincidentes",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    },
    "with-buttons": true,
    "buttons":
        [ { "extend": "excel", "text": '<i class="fas fa-file-excel"></i>', "titleAttr": "Exportar Excel", "className": "btn-success mt-1" }/* , { "extend": "", "text": '<i class="far fa-plus-square"></i> Agregar', "titleAttr": "Agregar", "className": "btn-info m-1" } */ ],
        
        "ajax": {
            "url": "{{ url('/selectObrasAdd')}}",
            "type": "get",
            "dataSrc": ""
        },
        "columns": [
            /* { "data": 'id'}, */
            { "data": 'id'},
            { "data": 'descripcion'},
            { "data": 'monto'},
            { "data": 'resolucion'},
            { "data": null,
                "render": function(data, type, row) {
                    // Botón de Modificar
                    var btnModificar = '<a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-servicio" data-placement="top" data-id="'+row.id+'" title="Modificar registro"><span class="fas fa-edit"></span></a>';
                    return btnModificar;
                }
            },
            { "data": null,
                "render": function(data, type, row) {
                        // Botón de Anular
                    /* return  '<a href="' + row.id + '" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Anular registro"><span class="fas fa-ban"></span></a>'; */
                    var btnAnular = '<a href="{{ route("eliminarObrasAdd", ["id" => ":id"]) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Anular registro"><span class="fas fa-ban"></span></a>';
                    return btnAnular.replace(":id", row.id);
                }
            },
        ]
    });
});


$('.formDelete').submit(function(e){
    e.preventDefault();
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success m-2',
            cancelButton: 'btn btn-danger m-2'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: '¿Estás seguro?',
        text: 'Se eliminará definitivamente',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'No, cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            this.submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'El usuario sigue activo',
                'error'
            );
        }
    });
});
</script>

@if(session('user') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Usuario creado correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'update')
    <script>
        Swal.fire(
        'Actualizado!',
        'El usuario se actualizo correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'error')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Oops...',
            text: 'Fallo el proceso',
        })  
    </script>
@endif

@if(session('user') == 'delete')
    <script>
        Swal.fire(
        'Eliminado!',
        'El usuario se elimino correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'empty')
    <script>
        Swal.fire({
            icon: 'warning',
            title:'Oops...',
            text: 'Ingrese datos solicitados',
        })
    </script>
@endif

@if(session('user') == 'reset')
    <script>
        Swal.fire(
        'Restablecido!',
        'La contraseña se restablecio correctamente.',
        'success'
        )
    </script>
@endif
@stop