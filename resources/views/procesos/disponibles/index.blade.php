@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
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
                                <table id="tabla_diponibles" class="table table-hover align-middle dataTable dtr-inline collapsed" aria-describedby="example1_info">
                                    <thead class="text-center px-4 py-4 text-nowrap bg-gray">
                                        <tr >
                                            <th>ID</th>
                                            <th>PABELLON</th>
                                            <!-- <th style="width: 10%">CONTADOR</th> -->
                                            <th>MONTO</th>
                                            <th>ESTADO</th>
                                            <th>LETRA</th>
                                            <th>NUMERO</th>
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
@stop

@section('css')
@stop

@section('js')

<script>

$(document).ready(function() {
    $('#tabla_diponibles').DataTable({
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
            "url": "{{ url('/procesos/datosIndex')}}",
            "type": "get",
            "dataSrc": ""
        },
        "columns": [
            { 
                "data": null,
                "render": function(data, type, row, meta) {
                    // La variable `meta` contiene información sobre la fila, incluido el índice de la fila (el contador)
                    return meta.row + 1;
                }
            },
            { "data": 'nombre'},
            /* { "data": 'contador'}, */
            { "data": 'montoTumba'},
            { "data": 'estado'},
            { 
                "data": 'letra',
                "render": function(data, type, row) {
                    // Obtener la letra correspondiente al número
                    var letra = String.fromCharCode(64 + parseInt(data));
                    return letra;
                }
            },
            { "data": 'numero'},
            /* { "data": null,
                "render": function(data, type, row) {
                    // Botón de Modificar
                    var btnModificar = '<a href="{{ route("editarPabellon", ["pabellon" => ":id"]) }}" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Modificar registro"><span class="fas fa-edit"></span></a>';
                    return btnModificar.replace(":id", row.id);
                }
            },
            { "data": null,
                "render": function(data, type, row) {
                    // Botón de Anular
                    var btnAnular = '<a href="{{ route("eliminarPabellon", ["pabellon" => ":id"]) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Anular registro"><span class="fas fa-ban"></span></a>';
                    return btnAnular.replace(":id", row.id);
                }
            }, */
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