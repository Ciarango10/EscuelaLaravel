@extends('layouts.app')

@section('content')

<h1>Nuevo Profesor</h1>

    <form action="{{ route('teachers.store') }}"   method="POST">
    @csrf
        <div class="mb-3">
            <label class="form-label">Nombres</label>
            <input type="text" class="form-control" name="first_name" />
        </div>

        <div class="mb-3">
            <label class="form-label">apellidos</label>
            <input type="text" class="form-control" name="last_name" />
        </div>

        <div class="mb-3">
            <label class="form-label">direccion</label>
            <input type="text" class="form-control" name="address" />
        </div>

        <div class="mb-3">
            <label class="form-label">telefono</label>
            <input type="text" class="form-control" name="phone" />
        </div>

        <div class="mb-3">
            <label class="form-label">correo electronico</label>
            <input type="text" class="form-control" name="email" />
        </div>

        <div class="mb-3">
            <label class="form-label">fecha de nacimiento</label>
            <input type="text" class="form-control" name="birthdate" />
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    
    </form>




@endsection