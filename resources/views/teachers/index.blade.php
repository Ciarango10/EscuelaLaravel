@extends('layouts.head')

@section('content')

<a href="{{ route('teachers.create') }}" class="btn btn-primary">Nuevo Profesor</a>
<h1>Profesores</h1>
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
        @foreach ($teachers as teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->first_name }}</td>
                <td>{{ $teacher->last_name }}</td>
                <td>{{ $teacher->direction }}</td>
                <td>{{ $teacher->phone }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->birthdate }}</td>
            </tr>
        @endforeach
    </tbody>

</table>