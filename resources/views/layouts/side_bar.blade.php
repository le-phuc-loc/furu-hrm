<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LHL') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{{ asset('js/main.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Fonts Awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Datatable-->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable({
                "lengthChange": false,
                "pageLength":5
            }
            );
        });
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        #map{
            /* width: 100%; */
            height: 200px;
        }
    </style>
</head>
<body>
    <div class="wrapper d-flex align-items-stretch">

        <nav id="sidebar">
            <div class="custom-menu">

                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                </button>
            </div>
            <div class="img bg-wrap text-center py-4" style="background-image: url({{ asset('images/bg_1.jpg') }});">
                <div class="user-logo">
                    <div class="img" style="background-image: url({{ asset('images/logo.jpg') }});"></div>
                    <h3>Catriona Henderson</h3>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="{{ route('home') }}"><span class="fa fa-home mr-3"></span> Home</a>
                </li>

                @yield('sidebar-menu')

                <li>
                    <a class="d-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

        </nav>

        <div id="content" class="p-4 p-md-5 pt-5">

            @yield('content')
        </div>
        <div id="map"></div>
    </div>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsMyaK7aIpFYjTIbPBafSnxxOg3SwSIIk&libraries=places&callback=initAutocomplete">
    </script>
    {{-- <script src="/vendor/jquery/jquery.min.js"></script> --}}
    {{-- <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script> --}}
     @yield('script')
</body>

</html>
