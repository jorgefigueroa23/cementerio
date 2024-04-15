<div class="modal fade show" name="editUser" id="editUser{{ $dataUser->id }}" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITANDO USUARIO</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('actualizarUsuario', $dataUser->id) }}" method="post" autocomplete="off">
            @method('put')    
            @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- Nombre y Apellido --}}
                                        <label>NOMBRES Y APELLIDOS <strong style="color:red">*</strong></label>
                                        <x-adminlte-input type="text" required value="{{ $dataUser->name }}" name="nameUpdate" id="nameUpdate" placeholder="Ingrese nombre" label-class="text-lightblue">
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
                                        {{-- USERNAME --}}
                                        <label>NOMBRE DE USUARIO <strong style="color:red">*</strong> </label>                                       
                                        <x-adminlte-input type="text" required value="{{ $dataUser->username }}" name="usernameUpdate" id="usernameUpdate" placeholder="Ingrese nombre de usuario" readonly="readonly" label-class="text-lightblue">
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
                                        {{-- Correo --}}
                                        <label>CORREO <strong style="color:red">*</strong> </label>                                       
                                        <x-adminlte-input type="text" required value="{{ $dataUser->email }}" name="emailUpdate" id="emailUpdate" placeholder="Ingrese Giro" label-class="text-lightblue">
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
                                        <label>DOC. NAC. IDENTIDAD <strong style="color:red">*</strong> </label>                                       
                                        <x-adminlte-input type="text" required value="{{ $dataUser->numdoc }}" name="numdocUpdate" id="numdocUpdate" placeholder="Ingrese dni" readonly="readonly" label-class="text-lightblue">
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
                                        {{-- ROL --}}
                                        <label>ROL <strong style="color:red">*</strong></label>  
                                        <x-adminlte-select type="text" required name="rolUpdate" id="rolUpdate" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-card text-dark"></i>
                                                </div>
                                            </x-slot>
                                            @if($dataUser->rol == 'stuser'|| $dataUser->rol == 'user')
                                                <option value="user" >Usuario</option>
                                                <option value="admin" >Admin</option>
                                            @else
                                                <option value="admin" >Admin</option>
                                                <option value="user" >Usuario</option>
                                            @endif
                                        </x-adminlte-select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{-- ESTADO --}}
                                        <label>ESTADO <strong style="color:red">*</strong></label>  
                                        <x-adminlte-select type="text" required name="estadoUpdate" id="estadoUpdate" label-class="text-lightblue">
                                            <x-slot name="prependSlot">
                                                <div class="input-group-text">
                                                    <i class="fas fa-id-card text-dark"></i>
                                                </div>
                                            </x-slot>
                                            @if($dataUser->estado == 1 )
                                                <option value="1">Habilitado</option>
                                                <option value="2">Deshabilitado</option>
                                            @else
                                                <option value="2">Deshabilitado</option>
                                                <option value="1">Habilitado</option>
                                            @endif
                                            </x-adminlte-select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" onclick="javascript:window.history.back();" >Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>