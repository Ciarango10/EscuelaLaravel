@extends('layouts.app')

@section('content')

<h1>Editar Profesor</h1>

    <form action="{{ route('teachers.update') }}"   method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="teacher_id" value="{{ $teachers->id }}">
        <div class="mb-3">
            <label class="form-label">Nombres</label>
            <input type="text" class="form-control" name="first_name" value="{{ $teacher->first_name }}" />
        </div>

        <div class="mb-3">
            <label class="form-label">apellidos</label>
            <input type="text" class="form-control" name="last_name"value="{{ $teacher->last_name }}" />
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
@endsection