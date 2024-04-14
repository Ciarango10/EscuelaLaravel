@extends('layouts.app')

@section('content')

    <h1>Home</h1>
    <a class="btn btn-primary" href="{{ route('students.index') }}">Estudiantes</a>

@endsection