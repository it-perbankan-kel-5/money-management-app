<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FlexiFund</title>

    <link rel="shortcut icon" href="{{ asset('assets/images/logo.svg') }}" />

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- endinject -->
</head>

<body>

    @if (!empty(session()->get('user_token')))
        <script>
            window.location.href = "{{ url('dashboard') }}";
        </script>
    @endif

    @yield('auth')

    <!-- inject:SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- End plugin js for SweetAlert -->

    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }} "></script>
    <script src="{{ asset('assets/vendors/jquery.avgrund/jquery.avgrund.min.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }} "></script>
    <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }} "></script>
    <script src="{{ asset('assets/js/dataTables.select.min.js') }} "></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    {{-- <script src="{{ asset("assets/js/off-canvas.js>") }}"></script> --}}
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page-->
    {{-- <script src="{{ asset("assets/js/dashboard.js") }} "></script> --}}
    {{-- <script src="{{ asset("assets/js/Chart.roundedBarCharts.js") }} "></script> --}}
    <script src="{{ asset('assets/js/avgrund.js') }}"></script>
    <!-- End custom js for this page-->

    @if (Session::has('success'))
        <script>
            Swal.fire(
                'Success!!',
                '{{ Session::get('success') }}',
                'success'
            );
        </script>
    @endif

    @if ($errors->any())
        <script>
            @foreach ($errors->all() as $item)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $item }}'
                });
            @endforeach
        </script>
    @endif

    @if (session('error'))
        <script>
            @foreach ($errors->all() as $item)
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $item }}'
                });
            @endforeach
        </script>
    @endif

</body>

</html>