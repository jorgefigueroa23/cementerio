@extends('adminlte::page')

@section('title', 'pabellon')

@section('content_header')
@stop

@section('content')
<br>
<x-adminlte-card title="PABELLONES" class="m-2" theme="dark" icon="fas fa-id-card">
    <div class="col-12">                                         
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <br>
                                <table id="tabla_pabellones" class="table table-hover align-middle dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                    <thead class="text-center px-4 py-4 text-nowrap bg-gray">
                                        <tr >
                                            <th style="width: 5%">ID</th>
                                            <th>NOMBRE</th>
                                            <th>FILAS</th>
                                            <th>COLUMNAS</th>
                                            <!-- <th>ESTADO</th> -->
                                            <th>EDITAR</th>
                                            <th>ELIMINAR</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach($pabellones as $pabellon)
                                        <tr>
                                            <td>{{ $pabellon->id }}</td>
                                            <td>{{ $pabellon->nombre }}</td>
                                            <td>{{ $pabellon->cant_filas }}</td>
                                            <td>{{ $pabellon->cant_columnas }}</td>
                                            <!-- <td>{{ $pabellon->estado }}</td> -->
                                            <td>
                                                <button type="button" class="btn btn-warning btn-modificar" data-toggle="modal" data-target="#modal-edit-user" data-nombre-pabellon="{{ $pabellon->nombre }}" data-id="{{ $pabellon->id }}"><span class="fas fa-edit"></span></button>
                                            </td>
                                            <td>
                                                <form class="formDelete" method="post" action="{{ route('eliminarPabellon', ['pabellon' => $pabellon->id]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" title="Desactivar" type="submit"><i class="fas fa-ban"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
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

<div class="modal fade" id="modal-edit-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Nombre del Pabellón</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="formEdit" action="{{ route('actualizarPabellon', ['pabellon' => ':id']) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="nombrePabellon">Nombre del Pabellón</label>
                        <input type="text" class="form-control" id="nombrePabellon" name="nombrePabellon">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardarCambios">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

@include('administracion.usuario.modalCreate')

@stop

@section('css')
@stop

@section('js')

<script>
$(document).ready(function() {
    $('#tabla_pabellones').DataTable({
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
        [ { "extend": "excel", "text": '<i class="fas fa-file-excel"></i>', "titleAttr": "Exportar Excel", "className": "btn-success mt-1" }],
        /* 
        "ajax": {
            "url": "{{ url('/selectPabellon')}}",
            "type": "get",
            "dataSrc": ""
        },
        "columns": [
            { "data": 'id'},
            { "data": 'nombre'},
            { "data": 'cant_filas'},
            { "data": 'cant_columnas'},
            { "data": null,
                "render": function(data, type, row) {
                    var btnModificar = '<button type="button" class="btn btn-warning btn-modificar" data-toggle="modal" data-target="#modal-edit" data-nombre-pabellon="' + row.nombre + '"><span class="fas fa-edit"></span></button>';
                    return btnModificar.replace(":id", row.id);
                }
            },
            { "data": null,
                "render": function(data, type, row) {
                    var btnAnular = '<form class="formDelete" id="formDelete" method="post" action="{{ route("eliminarPabellon", ["pabellon" => ":id"]) }}"> @csrf @method("delete") <button class="btn btn-danger" title="Desactivar" type="submit"><i class="fas fa-ban"></i></button> </form>';
                    return btnAnular.replace(":id", row.id);
                }
            },
        ]*/
    });
}); 

$('#modal-edit-user').on('show.bs.modal', function (event) {
    var boton = $(event.relatedTarget); // Botón que abre el modal
    var nombrePabellon = boton.data('nombre-pabellon');
    var  id = boton.data('id');
    $('#formEdit').attr('action', $('#formEdit').attr('action').replace(':id', id));
    $('#nombrePabellon').val(nombrePabellon); // Rellenar el campo del formulario en el modal con el nombre del pabellón
});

// Evento para guardar cambios
$('#guardarCambios').click(function() {
    $('#formEdit').submit();
    $('#modal-edit-user').modal('hide');
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
                'El pabellon sigue activo',
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
        'pabellon creado correctamente.',
        'success'
        )
    </script>
@endif

@if(session('user') == 'update')
    <script>
        Swal.fire(
        'Actualizado!',
        'El pabellon se actualizo correctamente.',
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
        'El pabellon se elimino correctamente.',
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