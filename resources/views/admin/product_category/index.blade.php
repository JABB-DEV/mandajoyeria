@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
<div class="d-flex justify-content-start">
    <h1>Categorías</h1>
    <a onclick="openModal()" class="btn btn-link rounded-circle text-success">
        <i class="fas fa-plus-circle"></i>
    </a>
</div>
@stop

@section('content')
@livewire('product-category-component')
@stop

@section('js')
<script type="text/javascript">
    const openModal = () =>{
        Livewire.emit('newCategory');
    }
    $('#categoryModal').on('hidden.bs.modal',  () => Livewire.emit('resetFields') )

    Livewire.on('triggerCloseModal', () => $('#categoryModal').modal('hide'))

    Livewire.on('triggerOpenModal', () => $('#categoryModal').modal('show') );

    window.addEventListener('swal',(e) => Swal.fire(e.detail) );

    Livewire.on('triggerDelete', (category)=>{
        Swal.fire({
            title: '¿Estás seguro?',
            html: `¿Estás seguro de que quiers eliminar este registro?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--danger)',
            cancelButtonColor: 'var(--primary)',
            confirmButtonText: 'Borrar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then(result => result?.value ? Livewire.emit('destroy', category) : '')
    })
</script>
@endsection