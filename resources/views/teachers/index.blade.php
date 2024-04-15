@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Profesores</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard"> 
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <h3 class="m-0 font-weight-bold text-primary col-md-11">Profesores</h3>
                    <div class="col-md-1">
                        <a href="{{ route('teachers.create') }}" class="btn btn-primary"><i class="fa fa-add"></i></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th> Nombres </th>
                            <th> Apellidos </th>
                            <th> Email </th>
                            <th> Fecha de Nacimiento </th>
                            <th> Dirección </th>
                            <th> Celular </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                        
                            <tr>
                                <td>{{ $teacher->first_name }}</td>
                                <td>{{ $teacher->last_name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->birthdate }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>{{ $teacher->phone }}</td>                             
                                <td>
                                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></a>

                                    <form action="{{ route('teachers.delete', $teacher->id) }}" style="display:contents" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btnDelete"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>   

@endsection

<script type="module">
    $(document).ready(function () {
        $('.btnDelete').click(function(event){
            event.preventDefault();
            const form = $(this).closest('form');
            Swal.fire({
                title: "¿Desea eliminar el profesor?",
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