<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    @include('admin.product_category.partials.modal')
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped" width="100%">
                <div class="container d-flex justify-content-between">
                    <div class="d-inline-flex justify-content-center align-items-center">
                        Mostrar <select wire:model="perPage" class="form-control mx-2" style="width: auto;">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        registros
                    </div>
                    <div class="d-inline-flex justify-content-center align-items-center">
                        <input class="form-control mx-sm-2" type="search" placeholder="Buscar..." wire:model='search_term' aria-label="Search">
                    </div>
                </div>
                <thead>
                    <tr>
                        <th>NO.</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCIÓN</th>
                        <th width="15%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td class="text-center">
                            <a  wire:click.prevent='show({{$category}})'
                                class="btn btn-link btn-sm text-secondary"
                                title="Ver detalles"><i class="fas fa-info-circle"></i></a>
                            <a class="btn btn-link btn-sm text-primary"
                                wire:click.prevent="edit({{$category}})"
                                title="Editar"><i class="fas fa-edit"></i></a>
                            <a title="Eliminar" wire:click.prevent="$emit('triggerDelete', {{$category}})"
                                class="btn btn-link text-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <div class="container d-flex justify-content-between align-items-center">
                                <span>{{$categories->total()}} registros</span>
                                {{$categories->onEachSide(1)->links()}}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="d-flex align-items-center justify-content-center">
            </div>
        </div>
    </div>
</div>
