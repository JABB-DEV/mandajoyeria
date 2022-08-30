<div class="modal-body container">
    {{-- NAME INPUT --}}
    <div class="form-group">
        <label for="name">Nombre de la categoría:</label>
        <input type="text" wire:model.defer='name' class="form-control" autofocus>
        @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    {{-- EMAIL INPUT --}}
    <div class="form-group">
        <label for="description">Descripción:</label>
        <textarea wire:model.defer='description' rows="5" style="overflow-y: scroll;resize:vertical;"
            class="form-control"></textarea>
        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="modal-footer d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" wire:click.prevent='update' class="btn btn-primary">Guardar</button>
    </div>
</div>