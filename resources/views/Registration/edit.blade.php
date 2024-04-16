@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('registrations.index') }}">Matrículas</a></li>
                <li class="breadcrumb-item active">Editar Matrícula</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">

        <div class="card">

            <div class="card-body">

                <h5 class="card-title">Editar Matrícula</h5>

                <form class="row g-3" action="{{ route('registrations.update', $registration->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="registration_id" value="{{ $registration->id }}">
                    <div class="col-md-12">
                        <div class="form-floating mb-3">
                            <input name="full_name" id="full_name" class="form-control" placeholder="Nombres" value="{{ $registration->full_name }}">
                            <label for="full_name">Nombres</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email_address" type="email" id="email_address" class="form-control" placeholder="Email"  aria-describedby="emailHelp" value="{{ $registration->email_address }}">
                            <label for="email_address">Email</label>
                            <div id="emailHelp" class="form-text">No compartiremos tu email con nadie más.</div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" name="birth_date" id="birth_date" class="form-control" placeholder="Fecha de Nacimiento" value="{{ $registration->birth_date }}">
                            <label for="birth_date">Fecha de Nacimiento</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="gender" id="gender" class="form-control" placeholder="Género" value="{{ $registration->gender }}">
                            <label for="gender">Género</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="address" id="address" class="form-control" placeholder="Dirección" value="{{ $registration->address }}">
                            <label for="address">Dirección</label>
                        </div>
                        <div class="form-floating">
                            <input name="home_address" id="home_address" class="form-control" placeholder="Dirección de Casa" value="{{ $registration->home_address }}">
                            <label for="home_address">Dirección de Casa</label>
                        </div>
                        <div class="form-floating">
                            <input name="phone_number" id="phone_number" class="form-control" placeholder="Celular" value="{{ $registration->phone_number }}">
                            <label for="phone_number">Celular</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('registrations.index')}}" class="btn btn-secondary">Volver</a>
                    </div>
                </form>
            </div>

        </div>

    </section>

@endsection
