<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style customizer-hide" dir="ltr"
	data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Admin Panel</title>
	<meta name="description" content="" />
	@yield('csscontent')
	<link rel="icon" type="image/x-icon" href="{{ Illuminate\Support\Facades\URL::asset('theme/assets/img/favicon/favicon.ico')}}" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/fonts/boxicons.css')}}" />
	<link rel="stylesheet" href="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/css/core.css')}}"class="template-customizer-core-css" />
	<link rel="stylesheet" href="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="{{ Illuminate\Support\Facades\URL::asset('theme/assets/css/demo.css')}}" />
	<link rel="stylesheet" href="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
	<link rel="stylesheet" href="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/css/pages/page-auth.css')}}" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
	{{-- <link rel="stylesheet" herf="{{ \URL::asset('assests/css/dropzone.css') }}"> --}}
</head>

<body>
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			@include('admin.dashboard.sidebar')
			<div class="layout-page">
				@include('admin.dashboard.navbar')
				@yield('content')
			</div>
		</div>
	</div>
	<script src="https://kit.fontawesome.com/f2b10319dd.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/libs/popper/popper.js')}}"></script>
	<script src="{{ \URL::asset('assests/js/dropzone.js') }}"></script>
	<script src="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/js/bootstrap.js')}}"></script>
	<script src="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
	<script src="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/js/helpers.js')}}"></script>
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<script src="{{ Illuminate\Support\Facades\URL::asset('theme/assets/js/config.js')}}"></script>
	<script src="{{ Illuminate\Support\Facades\URL::asset('theme/assets/vendor/js/menu.js')}}"></script>
	<script src="{{ Illuminate\Support\Facades\URL::asset('theme/assets/js/main.js')}}"></script>
	@yield('jscontent')
</body>
<script>
	function userlogout(){
    $("#userlogoutform").submit();
  }
</script>

</html>