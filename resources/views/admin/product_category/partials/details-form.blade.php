<div class="modal-body container">
    {{-- NAME INFO --}}
    <div class="form-group">
        <label>Nombre:</label> <span class="text-muted">{{$name}}</span>
    </div>
    {{-- DESCRIPTION INFO --}}
    <div class="form-group">
        <label>Descripción:</label> <span class="text-muted">{{$description}}</span>
    </div>
    {{-- CREATED AT INFO --}}
    <div class="form-group">
        <label>Fecha de creación:</label> <span class="text-muted">{{$created_at ? $created_at->diffForHumans() :
            ''}}</span>
    </div>
    {{-- UPDATED AT INFO --}}
    <div class="form-group">
        <label>Última modificación:</label> <span class="text-muted">{{$updated_at ? $updated_at->diffForHumans() :
            ''}}</span>
    </div>
</div>
<div class="modal-footer d-flex justify-content-center align-items-center">
    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
</div>