<div>
    <div wire:ignore.self class="modal fade" id="detailUserModal" tabindex="-1" role="dialog"
        aria-labelledby="detailUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailUserModalLabel">Detalles de usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body container">
                    {{-- NAME INFO --}}
                    <div class="form-group">
                        <label>Nombre:</label> <span class="text-muted">{{$name}}</span>
                    </div>
                    {{-- EMAIL INFO --}}
                    <div class="form-group">
                        <label>Correo electrónico:</label> <span class="text-muted">{{$email}}</span>
                    </div>
                    {{-- CREATED AT INFO --}}
                    <div class="form-group">
                        <label>Fecha de creación:</label> <span class="text-muted">{{$created_at ? $created_at->diffForHumans() : ''}}</span>
                    </div>
                    {{-- UPDATED AT INFO --}}
                    <div class="form-group">
                        <label>Última modificación:</label> <span class="text-muted">{{$updated_at ? $updated_at->diffForHumans() : ''}}</span>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center align-items-center">
                    <button type="button" wire:click='cancel' class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

</div>