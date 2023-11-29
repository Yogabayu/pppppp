<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') &mdash; Portofolio</title>

    {{-- <link rel="icon" href="{{ asset('file/setting/' . $app->logo) }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('file/setting/' . $app->logo) }}" type="image/x-icon"> --}}

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('stisla/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
</head>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            @include('admin.layout.header')

            <!-- Sidebar -->
            @include('admin.layout.sidebar')

            <!-- Content -->
            @yield('main')

            <!-- Footer -->
            @include('admin.layout.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    @include('sweetalert::alert')
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="{{ asset('stisla/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('stisla/library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('stisla/library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('stisla/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('stisla/library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('stisla/library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('stisla/js/stisla.js') }}"></script>
    @stack('scripts')
    <!-- Template JS File -->
    <script src="{{ asset('stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('stisla/js/custom.js') }}"></script>
    <script>
        // Include this script in your Blade view or layout

        document.addEventListener('DOMContentLoaded', function() {
            // Check for success message in Laravel session
            let successMessage = "{{ session('success') }}";
            if (successMessage) {
                const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    icon: 'success',
                    title: successMessage
                })
            }

            // Check for error message in Laravel session
            let errorMessage = "{{ session('error') }}";
            if (errorMessage) {
                const Toast = Swal.mixin({ //when firing the toast, the first window closes automatically
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    icon: 'error',
                    title: errorMessage
                })
            }
        });
    </script>
    <script>
        setTimeout(function() {
            $('.swal2-popup').fadeOut();
        }, 3000);
    </script>
</body>

</html>
