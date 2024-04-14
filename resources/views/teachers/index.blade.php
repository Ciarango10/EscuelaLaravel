@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-7">
            <h1>Profesores</h1>
        </div>
        <div class="col-md-5">
            <a href="{{ route('teachers.create') }}" class="btn btn-primary col-md-4 text-white">Nuevo Profesor<i class="fa fa-save"></i></a>
        </div>
    </div>

    <table class="table table-bordered mt-3">
        <thead>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo Electronico</th>
                <th>Fecha de Nacimiento</th>
                <th></th>

        </thead>

        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->first_name }}</td>
                    <td>{{ $teacher->last_name }}</td>
                    <td>{{ $teacher->direction }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->birthdate }}</td>
                    <td>
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-warning">Editar</a>
                    </td>

                <td>
                    <form action="{{ route('teachers.delete', $teacher->id) }}"style="display:contents" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btnDelete">Eliminar</button>
                </td>    
                </form>
                </tr>
            @endforeach
        </tbody>
        
    </table>

@endsection

<script type="module">
    $(document).ready(function () {
        $('.btnDelete').click(function(event){
            event.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
                title: "¿Desea eliminar el registro?",
                text: "No podrá revertirlo",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si"
            }).then((result) => {
                
                if(result.isConfirmed){
                    form.submit();
                }
            });     
        });
    });

</script>