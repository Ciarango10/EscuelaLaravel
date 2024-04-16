@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('classrooms.index') }}">Aulas</a></li>
                <li class="breadcrumb-item active">Nueva Aula</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Nueva Aula</h5>

                <form class="row g-3" action="{{ route('classrooms.store')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input name="code" id="code" class="form-control" placeholder="Código">
                            <label for="code">Código</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="capacity" id="capacity" class="form-control" placeholder="Capacidad">
                            <label for="capacity">Capacidad</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="location" id="location" class="form-control" placeholder="Localización">
                            <label for="location">Localización</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('classrooms.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>
        
    </section>

@endsection