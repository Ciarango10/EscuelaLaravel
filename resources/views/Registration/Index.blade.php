@extends('layouts.app')

@section('content')

    <div class="pagetitle">
        <h1>Entidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Matrículas</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard"> 
        <div class="card">
            <div class="card-header py-3">
                <div class="row">
                    <h3 class="m-0 font-weight-bold text-primary col-md-11">Matrículas</h3>
                    <div class="col-md-1">
                        <a href="{{ route('registration.create') }}" class="btn btn-primary"><i class="fa fa-add"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th> Nombre Completo </th>
                            <th> Correo Electrónico </th>
                            <th> Fecha de Nacimiento </th>
                            <th> Género </th>
                            <th> Dirección </th>
                            <th> Dirección de Casa </th>
                            <th> Número de Teléfono </th>
                            <th> Acciones </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $registration)

                            <tr>
                                <td> {{ $registration->full_name }} </td>
                                <td> {{ $registration->email_address }} </td>
                                <td> {{ $registration->birth_date }} </td>
                                <td> {{ $registration->gender }} </td>
                                <td> {{ $registration->address }} </td>
                                <td> {{ $registration->home_address }} </td>
                                <td> {{ $registration->phone_number }} </td>
                                <td>
                                    <a href="{{ route('registration.edit', $registration->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil"></i></a>

                                    <form action="{{ route('registration.delete', $registration->id) }}" style="display:contents" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm btnDelete"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

<script type="module">

    $(document).ready(function () {

        $('.btnDelete').click(function (event) {

            event.preventDefault();

            Swal.fire({
                title: "¿Desea eliminar la matrícula?",
                text: "No podrá revertirlo",
                icon: "question",
                showCancelButton: true,
            }).then((result) => {

                if (result.isConfirmed) {

                    const form = $(this).closest('form');

                    form.submit();
                }

            });

        });

    });
</script>
