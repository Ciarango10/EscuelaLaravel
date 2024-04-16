@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Matrícula de Estudiantes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a href="{{ route('Registration.index') }}">Matrícula</a></li>
                <li class="breadcrumb-item active">Nuevo Estudiante</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Nuevo Estudiante</h5>

                <form class="row g-3" action="{{ route('Registration.store')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input name="full_name" id="full_name" class="form-control" placeholder="Nombres Completos">
                            <label for="full_name">Nombres Completos</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email_address" type="email" id="email_address" class="form-control" placeholder="Email"  aria-describedby="emailHelp">
                            <label for="email_address">Email</label>
                            <div id="emailHelp" class="form-text">No compartiremos tu email con nadie más.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Fecha de Nacimiento">
                            <label for="birth_date">Fecha de Nacimiento</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="gender" id="gender" class="form-control" placeholder="Género">
                            <label for="gender">Género</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="home_address" id="home_address" class="form-control" placeholder="Dirección de Casa">
                            <label for="home_address">Dirección de Casa</label>
                        </div>
                        <div class="form-floating">
                            <input name="phone_number" id="phone_number" class="form-control" placeholder="Número de Teléfono">
                            <label for="phone_number">Número de Teléfono</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('Registration.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>
        </div>
        
    </section>

@endsection
