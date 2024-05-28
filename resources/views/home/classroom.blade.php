@extends('layouts.app')

@section('content')


<div class="pagetitle">
    <h1>Aula</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Aula</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">

    <div class="card shadow mb-4">
        <div class="card-body">
            <h3 class="card-title">Código: {{ $classroom->code }}</h3>
            <div class="row">
                <p>Capacidad: {{ $classroom->capacity }}</p>
                <p>Localización: {{ $classroom->location }}</p>
            </div>             
        </div>
    </div>

</section>

@endsection