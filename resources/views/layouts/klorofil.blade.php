<!doctype html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    {{-- DataTable --}}
    <script src="{{ asset('template/assets/vendor/jquery/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/newDataTable/media/css/jquery.dataTables.css') }}">
    <script src="{{ asset('/newDataTable/media/js/jquery.dataTables.js') }}"></script>
    {{-- END DataTables --}}

    {{-- include font awesome --}}
    <link rel="stylesheet" href="{{ asset('/libraries/fontawesome/css/all.min.css') }}">

    {{-- include datepicker gijgo --}}
    <link rel="stylesheet" href="{{ asset('/libraries/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    {{-- toast css --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- VENDOR CSS -->
    <link rel="stylesheet" href=" {{ asset('/template/assets/vendor/bootstrap/css/bootstrap.css') }}">
    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  --}}
    {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}

	<link rel="stylesheet" href=" {{ asset('/template/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href=" {{ asset('/template/assets/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href=" {{ asset('/template/assets/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href=" {{ asset('/template/assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	{{-- <link rel="stylesheet" href=" {{ asset('/template/assets/css/demo.css') }}"> --}}
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href=" {{ asset('/template/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href=" {{ asset('/template/assets/img/favicon.png') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/css/jam.css') }}"> --}}
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('layouts/include/_navbar')
        <!-- END NAVBAR -->

		<!-- LEFT SIDEBAR -->
		@include('layouts/include/_sidebar')
        <!-- END LEFT SIDEBAR -->

        <!-- MAIN -->
		<div class="main">
            <!-- MAIN CONTENT -->
            @yield('content')
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
        <div class="clearfix"></div>
        {{-- FOOTER --}}
		<footer>
			@include('layouts/include/_footer')
		</footer>
        {{-- END FOOTER --}}
    </div>
    <!-- END WRAPPER -->

	<!-- Javascript -->
	<script src="{{ asset('template/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
	<script src="{{ asset('template/assets/vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('template/assets/scripts/klorofil-common.js') }}"></script>
    {{-- include myScript  --}}
    <script src="{{ asset('/js/myScript.js') }}"></script>
     {{-- set chart gender --}}
     @yield('chart')
    {{-- include script sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('konfirmDelete')
    {{-- include libarary moment js  --}}
    <script src="{{ asset('/libraries/moment/moment.min.js') }}"></script>
    {{-- set toast alert  --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('sukses'))
            toastr.success("{{ Session::get('sukses') }}", "Sukses")
        @endif

        @if(Session::has('fail'))
            toastr.error("{{ Session::get('fail') }}", "Error")
        @endif
        @if(Session::has('errorMsg'))
            toastr.error("{{ Session::get('errorMsg') }}", "Error")
        @endif
    </script>
    {{-- end toast alert --}}
 </body>
</html>
{{-- set modal form input Pegawai  --}}
@yield('modal')
