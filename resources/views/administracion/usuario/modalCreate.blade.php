<div class="modal fade show" id="addUser" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">CREANDO USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ url('usuarios/crear') }}" method="POST" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- Nombre y Apellido --}}
                                        <label>NOMBRES Y APELLIDOS</label>
                                        <x-adminlte-input type="text" required name="nameCreate" id="nameCreate" placeholder="Ingrese nombre completo" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>  
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>NOMBRE DE USUARIO</label>                                       
                                        <x-adminlte-input type="text" required name="usernameCreate" id="usernameCreate" placeholder="Ingrese Nombre de usuario" label-class="text-lightblue">
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
                                        {{-- DNI --}}
                                        <label>DNI</label>                                       
                                        <x-adminlte-input type="text" required name="numdocCreate" id="numdocCreate" placeholder="Ingrese dni" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-card text-dark"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- Correo --}}
                                        <label>CORREO</label>                                       
                                        <x-adminlte-input type="text" required name="emailCreate" id="emailCreate" placeholder="Ingrese correo" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </x-slot>
                                        </x-adminlte-input>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- ROL --}}
                                        <label>ROL <strong style="color:red">*</strong></label>  
                                        <x-adminlte-select type="text" required name="rolCreate" id="rolCreate" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-user-tag"></i>
                                                </div>
                                            </x-slot>
                                            <option value="user">USUARIO</option>
                                            <option value="admin">ADMINISTRADOR</option>
                                        </x-adminlte-select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end"> <!-- justify-content-between -->
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button> -->
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>