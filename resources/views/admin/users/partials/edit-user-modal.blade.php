<div>
    <div wire:ignore.self class="modal fade" id="editUserModal" tabindex="-1" role="dialog"
        aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel">Editar usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        {{-- NAME INPUT --}}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" wire:model.defer='name' value='{{$name}}' class="form-control">
                            @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        {{-- EMAIL INPUT --}}
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" wire:model.defer='email' value='{{$email}}' class="form-control">
                            @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        
                        {{-- CURRENT PASSWORD INPUT --}}
                        {{-- <div class="form-group">
                            <label for="password">Contraseña actual</label>
                            <div class="d-flex">
                                <input type="password" wire:model.defer='current_password' class="form-control">
                                <a class="btn btn-link text-secondary" id='show_hide_password' aria-hidden="true"><i
                                        class="fa fa-eye-slash"></i></a>
                            </div>
                            @error('current_password') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div> --}}

                        {{-- PASSWORD INPUT --}}
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <div class="d-flex">
                                <input type="password" wire:model.defer='password' class="form-control">
                                <a class="btn btn-link text-secondary" id='show_hide_password' aria-hidden="true"><i
                                        class="fa fa-eye-slash"></i></a>
                            </div>
                            @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>

                        {{-- CONFIRM PASSWORD INPUT --}}
                        <div class="form-group">
                            <label for="password_confirmation">Confirmar contraseña</label>
                            <div class="d-flex">
                                <input type="password" wire:model.defer='password_confirmation' class="form-control">
                                <a class="btn btn-link text-secondary" id='show_hide_password' aria-hidden="true"><i
                                        class="fa fa-eye-slash"></i></a>
                            </div>
                            @error('password_confirmation') <span class="text-danger error">{{ $message
                                }}</span>@enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click.prevent='update' class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

</div>