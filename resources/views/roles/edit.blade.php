@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Editar Rol</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
                <li class="breadcrumb-item active">Editar Rol</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Rol</h5>

                <form id="frmEdit" class="row g-3" action="{{ route('roles.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="role_id" value="{{ $role->id }}" />
                    <input type="hidden" id="permissions" name="permissions" />
 
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="name" class="form-control" placeholder="Nombre..." value="{{ $role->name }}">
                            <label>Nombre</label>
                        </div>
                    </div>   
                </form>
            </div>

        </div>

        <div class="card shadow mb-4">
            <div class="card-body">
 
                <h3 class="card-title">Permisos</h3>
 
                <div class="row">
                    @foreach ($modules as $key => $module)
 
                        <div class="col-md-3 mt-3">
                            <h5>{{ $key }}</h5>
 
                            @foreach ($module as $permission)
 
                                <div class="form-check form-switch">
                                    <input class="form-check-input permission"
                                           type="checkbox"
                                           data-permission-id="{{ $permission->id }}"
                                           id="permission_{{ $permission->id }}"
                                           {{ $permission->selected ? "checked" : "" }}>
 
                                    <label class="form-check-label" for="permission_{{ $permission->id }}">{{ $permission->description }}</label>
                                </div>
 
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
 
        <div class="text-center">
            <button type="submit" class="btn btn-primary" form="frmEdit" id="btnSave">Guardar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
        </div>   

    </section>

@endsection

<script type="module">
 
    $(document).ready(function () {
 
        $("#btnSave").click(function (event) {
 
            const permissions = $('.permission:checked');
 
            let permissionIds = [];
 
            permissions.each(function () {
 
                const permissionId = $(this).data('permission-id');
                permissionIds.push(permissionId);
            });
 
            $('#permissions').val(JSON.stringify(permissionIds));
        });
 
    });
 
</script>