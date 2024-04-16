@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Asignaturas</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard"> 
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <h3 class="m-0 font-weight-bold text-primary col-md-11">Asignaturas</h3>
                    <div class="col-md-1">
                        <a href="{{ route('subjects.create') }}" class="btn btn-primary"><i class="fa fa-add"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Nombre </th>
                            <th> Grado </th>
                            <th> Horario </th>
                            <th> Profesor </th>
                            <th> Aula </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)

                            <tr>
                                <td> {{ $subject->name }} </td>
                                <td> {{ $subject->grade_level }} </td>
                                <td> {{ $subject->schedule }} </td>
                                @foreach ($teachers as $teacher)
                                    @if($teacher->id == $subject->teacher_id) 
                                        <td>{{ $teacher->first_name }}</td>
                                    @endif
                                @endforeach
                                @foreach ($classrooms as $classroom)
                                    @if($classroom->id == $subject->classroom_id) 
                                        <td>{{ $classroom->code }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></a>

                                    <form action="{{ route('subjects.delete', $subject->id) }}" style="display:contents" method="POST">
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
                title: "¿Desea eliminar la asignatura?",
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