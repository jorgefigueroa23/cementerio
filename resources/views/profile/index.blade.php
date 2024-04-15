@extends('adminlte::page')

@section('title', 'PERFIL USUARIO')

@section('content_header')

@stop
@section('content')
 <br>
<x-adminlte-card title="PERFIL" theme="dark" icon="fas fa-id-card">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title pb-2">Datos Personales : <span class="text-danger">*</span></h3>
                        </div>                        
                        <form action="{{ url('updatepass') }}" id="" method="POST" autocomplete="off">
                            @csrf
                            <div class="card-body"> 
                                <div class="row">                                                                      
                                  <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- With prepend slot --}}                                    
                                            <x-adminlte-input name="name" label="Nombres y Apellidos" placeholder="" value="{{ $user->name }}" label-class="text-dark" disabled>
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
                                            {{-- With prepend slot --}}                                    
                                            <x-adminlte-input name="username" label="Usuario" placeholder="" value="{{ $user->username }}" label-class="text-dark" disabled>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-id-card text-dark"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>  
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- With prepend slot --}}                                    
                                            <x-adminlte-input type="password" name="old_password" label="Contraseña Actual" placeholder="Contraseña Actual" label-class="text-dark">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lock text-dark"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>                                           
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- With prepend slot --}}                                    
                                            <x-adminlte-input type="password" name="new_password" label="Nueva Contraseña" placeholder="Contraseña Nueva" label-class="text-dark">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lock text-dark"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>  
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- With prepend slot --}}                                    
                                            <x-adminlte-input type="password" name="new_password_confirmation" label="Confirmar Nueva Contraseña" placeholder="Confirmar Contraseña Nueva" label-class="text-dark">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lock text-dark"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>  
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                        <div class="row text-right">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-primary btn-update">
                                                        <i class="fas fa-user-edit"></i>
                                                        Actualizar 
                                                    </button>
                                                    <a href="{{ route('profile')}}" id="btnTrim" class="btn btn-primary">
                                                        <i class="fas fa-eraser"></i>
                                                        Limpiar
                                                    </a>                                                                         
                                                </div>                                       
                                        </div>
                                 </div>
                                </div>                                   
                                
                            </div>   
                        </form>
                        <!-- /.form -->
                    </div>
                <!-- /.card -->            
                </div>
                <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->        
    </section> 
</x-adminlte-card>




@stop
@section('footer')
@stop


@section('js')

@if(session('password') == 'ok')
    <script>
        Swal.fire(
        'Exito!',
        'Se actualizo la contraseña',
        'success'
        )
    </script>
@endif

@if(session('password') == 'incorrect')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Ups...',
            text: 'Contraseña incorrecta',
        })
    </script>
@endif

@if(session('password') == 'fail')
    <script>
        Swal.fire({
            icon: 'error',
            title:'Ups...',
            text: 'No se pudo actualizar la contraseña',
        })
    </script>
@endif

@if(session('password') == 'empty')
    <script>
        Swal.fire(
            'Campo faltante!',
            'No procedio la solicitud',
            'warning'
        )
    </script>
@endif

@if(session('password') == 'nomatch')
    <script>
        Swal.fire(
            'Contraseña incorrecta!',
            'No coinciden las contraseñas',
            'warning'
        )
    </script>
@endif

@stop