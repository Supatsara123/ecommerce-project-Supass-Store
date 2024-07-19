<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Supass Store</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Vite Scripts -->
    @vite('resources/css/app.css')

    {{-- Css Style --}}
    <link href="{{ asset('css/customer.css') }}" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
</head>

<body>
    <div id="user">
        {{-- navbar --}}
        @include('layouts.partials.navbar')

        {{-- content --}}
        <main class="py-5 mt-5 bg-light">
            @yield('content')
        </main>

        {{-- footer --}}
        @include('layouts.partials.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script>

    {{-- JS custom --}}
    <script src="{{ asset('customer/js/custom.js') }}"></script>

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('status'))
        <script>
            window.location.reload();
            Swal.fire({
                title: "{{ session('status') }}",
                position: "center",
                icon: "success",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            window.location.reload();
            Swal.fire({
                title: "{{ session('error') }}",
                position: "center",
                icon: "error",
                button: "Ok",
            });
        </script>
    @endif

    @yield('scripts')
</body>

</html>
