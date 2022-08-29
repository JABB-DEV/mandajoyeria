<div>
    @include('admin.users.partials.create-user-modal')
    @include('admin.users.partials.edit-user-modal')
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
                        <th>CORREO ELECTRÓNICO</th>
                        <th width="15%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="text-center">
                            @if ($user->id !== Auth::user()->id)
                            <a wire:click='edit({{$user}})' class="btn btn-link btn-sm text-secondary"
                                title="Ver detalles"><i class="fas fa-address-card"></i></a>
                            <a wire:click='edit({{$user}})' class="btn btn-link btn-sm text-primary"
                                title="Editar usuario"><i class="fas fa-edit"></i></a>
                            <a wire:click.prevent="$emit('triggerDelete', {{$user}})" title="Eliminar usuario"
                                class="btn btn-link text-danger btn-sm"><i class="fas fa-trash"></i></a>
                            @else
                            <a href="{{route('admin')}}" class="btn btn-link btn-sm text-secondary"
                                title="Ir a mi perfil"><i class="fas fa-user-circle"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <div class="container d-flex justify-content-between align-items-center">
                                <span>{{$users->total()}} registros</span>
                                {{$users->onEachSide(1)->links()}}
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
