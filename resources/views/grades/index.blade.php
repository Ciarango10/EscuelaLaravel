@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Notas</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard"> 
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <h3 class="m-0 font-weight-bold text-primary col-md-11">Notas</h3>
                    <div class="col-md-1">
                        <a href="{{ route('grades.create') }}" class="btn btn-primary"><i class="fa fa-add"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Estudiante </th>
                            <th> Asignatura </th>
                            <th> Año Académico </th>
                            <th> Calificación </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades as $grade)

                            <tr>
                                @foreach ($enrollments as $enrollment)
                                    @if($enrollment->id == $grade->enrollment_id) 
                                        @foreach($students as $student)
                                            @if($enrollment->student_id == $student->id)
                                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                            @endif
                                        @endforeach
                                        @foreach($subjects as $subject)
                                            @if($enrollment->subject_id == $subject->id)
                                                <td>{{ $subject->name }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $enrollment->academic_year }}</td>
                                    @endif
                                @endforeach
                                <td> {{ $grade->grade }} </td>
                                <td>
                                    <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></a>

                                    <form action="{{ route('grades.delete', $grade->id) }}" style="display:contents" method="POST">
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
                title: "¿Desea eliminar la nota?",
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