@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('grades.index') }}">Notas</a></li>
                <li class="breadcrumb-item active">Nueva Nota</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Nueva Nota</h5>

                <form class="row g-3" action="{{ route('grades.store')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input name="name" id="student_name" class="form-control" placeholder="Estudiante">
                            <label for="name">Estudiante</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="grade" id="grade" class="form-control" placeholder="Calificacion">
                            <label for="grade">Calificacion</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="subject_id">
                                <option selected value="0">Seleccione</option>
                                @foreach ($subjects as $subject)                 
                                    <option value="{{ $subject->id }}">{{ $subject->student_name }}</option>
                                @endforeach
                            </select>
                            <label for="subject_id">Asignatura</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('grades.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>
        
    </section>

@endsection