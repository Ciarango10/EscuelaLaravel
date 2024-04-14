<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset("theme/vendor/libs/jquery/jquery.js") }}"></script>
<script src="{{ asset("theme/vendor/libs/popper/popper.js") }}"></script>
<script src="{{ asset("theme/vendor/js/bootstrap.js") }}"></script>
<script src="{{ asset("theme/vendor/libs/perfect-scrollbar/perfect-scrollbar.js") }}"></script>

<script src="{{ asset("theme/vendor/js/menu.js") }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset("theme/vendor/libs/apex-charts/apexcharts.js") }}"></script>

<!-- Main JS -->
<script src="{{ asset("js/main.js") }}"></script>

<!-- Page JS -->
<script src="{{ asset("js/dashboards-analytics.js") }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Template Main JS File -->
<script src="{{ asset('theme/js/main.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
        });
    </script>
@endif

<!-- Código de SweetAlert2 para mostrar mensajes de sesión flash -->
@if (session()->has('message'))
    <script>
        const message = @json(session('message'));
        Swal.fire({
            icon: message.type,
            title: message.content
        });
    </script>
@endif