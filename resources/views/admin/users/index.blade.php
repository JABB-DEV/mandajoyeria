@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<div class="d-flex justify-content-start">
    <h1>Usuarios</h1>
    <button type="button" class="btn btn-link rounded-circle text-success" data-toggle="modal"
        data-target="#createUserModal">
        <i class="fas fa-plus-circle"></i>
    </button>
</div>
@stop

@section('content')
    @livewire('user-component')
@stop

@section('js')
<script type="text/javascript">
    Livewire.on('userStore',()=>{
            $('#createUserModal').modal('hide');
        });
    Livewire.on('showEditForm',()=>{
            $('#editUserModal').modal('show');
        });
    Livewire.on('userUpdated',()=>{
            $('#editUserModal').modal('hide');
        });
    Livewire.on('showUserDetails',()=>{
            $('#detailUserModal').modal('show');
        });

    $('#detailUserModal').on('hidden.bs.modal',  () => Livewire.emit('resetFields') )
    $('#editUserModal').on('hidden.bs.modal',  () => Livewire.emit('resetFields') )
    $('#createUserModal').on('hidden.bs.modal',  () => Livewire.emit('resetFields') )
        
    document.querySelectorAll("#show_hide_password").forEach(element => {
        element.addEventListener('click', (event) => {
            event.preventDefault()
            let active = element.getAttribute('aria-hidden');
            let input = element.parentNode.firstElementChild;
            let icon = element.firstElementChild.classList

            if(active === 'true'){
                input.setAttribute('type', 'text');
                element.setAttribute('aria-hidden', false)
                icon.add('fa-eye')
                icon.remove('fa-eye-slash')
                return;
            }
                input.setAttribute('type', 'password');
                element.setAttribute('aria-hidden', true)
                icon.remove('fa-eye')
                icon.add('fa-eye-slash')
        })
    });
    window.addEventListener('swal',function(e){
        Swal.fire(e.detail);
    });

    Livewire.on('triggerDelete', (user)=>{
        Swal.fire({
            title: '¿Estás seguro?',
            html: `El usuario <i><b>${user.name}</b></i> será eliminado.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'var(--danger)',
            cancelButtonColor: 'var(--primary)',
            confirmButtonText: 'Borrar',
            cancelButtonText: 'Cancelar',
            reverseButtons: true
        }).then(result => result?.value ? Livewire.emit('destroy', user) : '')
    })
</script>
@endsection