<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#5E92FF">
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo.png') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'IYCF') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('main/css/sb-admin-2.min.css')}}" rel="stylesheet">

        <!-- Custom fonts for this template-->
        <link href="{{asset('main/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

        {{-- Toastr Alert Notification css --}}
        <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand shadow-sm">
            <a class="navbar-brand text-dark" href="{{route('index')}}">IYCF UPDATING SYSTEM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('transmit')}}">Transmit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('add')}}">Add</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-md-0" method="post" action="{{ action('MainController@search') }}" role="search">
                    @csrf
                    <input class="form-control" type="number" step="any" name="key" placeholder="Filter by Eacode..." autofocus autocomplete="true" required>
                </form>
            </div>
        </nav>
        <div class="container-fluid mt-4">
            <div class="container" {{ Route::is('index') ? '' : 'hidden' }}>
                <img src="{{asset('img/undraw_startup_life_2du2.svg')}}" style="width:100%;">
                <p><small>Illustration by :<a style="text-decoration:none; color:#5E92FF;" href="https://undraw.co/"> undraw</a></small></p>
            </div>
            @yield('content')
        </div>

        <!--Footer -->
        @include('inc.footer')

        <!--Global Modal -->
        @include('inc.modal')
        
        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('main/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('main/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('main/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <script src="{{asset('main/vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('main/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('main/js/table/datatables.js') }}"></script>

        {{-- Loading spinner show --}}
        <script type="text/javascript" src="{{ asset('js/loading.js') }}"></script>

        {{-- Open as window script --}}
        <script type="text/javascript" src="{{ asset('js/openwindow.js') }}"></script>

        {{-- Toastr alert session condition --}}
        <script type="text/javascript" src="{{ asset('js/toastr.min.js') }}"></script>
        @include('error.messages')
    </body>
</html>
