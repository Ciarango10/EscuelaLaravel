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
                            <input type="number" name="grade" id="grade" class="form-control" placeholder="Calificación">
                            <label for="grade">Calificación</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="enrollment_id">
                                <option selected value="0">Seleccione</option>
                                @foreach ($enrollments as $enrollment)                 
                                    <option value="{{ $enrollment->subject_id }}">{{ $enrollment->subject_id }}</option>
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