@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('grades.index') }}">Notas</a></li>
                <li class="breadcrumb-item active">Editar Nota</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Nota</h5>

                <form class="row g-3" action="{{ route('grades.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="grade_id" value="{{ $grade->id }}">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input type="number" name="grade" id="grade" class="form-control" placeholder="Calificacion" value="{{ $grade->grade }}" >
                            <label for="grade">Grado</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="enrollment_id">
                                <option selected value="{{ $enrollmentSelected->id }}">{{ $enrollmentSelected->enrollment_id }}</option>
                                @foreach ($enrollments as $enrollment)  
                                    @if ($enrollmentSelected->id != $enrollment->id)              
                                        <option value="{{ $enrollment->id }}">{{ $enrollment->id }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="enrollment_id">Matricula</label>
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