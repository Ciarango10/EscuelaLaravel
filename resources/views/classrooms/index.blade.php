@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Aulas</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard"> 
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <h3 class="m-0 font-weight-bold text-primary col-md-11">Aulas</h3>
                    <div class="col-md-1">
                        <a href="{{ route('classrooms.create') }}" class="btn btn-primary"><i class="fa fa-add"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Código </th>
                            <th> Capacidad </th>
                            <th> Localización </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classrooms as $classroom)

                            <tr>
                                <td> {{ $classroom->code }} </td>
                                <td> {{ $classroom->capacity }} </td>
                                <td> {{ $classroom->location }} </td>
                                <td>
                                    <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></a>

                                    <form action="{{ route('classrooms.delete', $classroom->id) }}" style="display:contents" method="POST">
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

        $('.btnDelete').click(function (event) {

            event.preventDefault();

            Swal.fire({
                title: "¿Desea eliminar el aula?",
                text: "No podrá revertirlo",
                icon: "question",
                showCancelButton: true,
            }).then((result) => {

                if (result.isConfirmed) {

                    const form = $(this).closest('form');

                    form.submit();
                }

            });

        });

    });
</script>