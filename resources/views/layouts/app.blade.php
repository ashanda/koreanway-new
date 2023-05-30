<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, shrink-to-fit=9">
	<meta name="description" content="Online Learning Platforms ">
	<meta name="author" content="Online Learning Platforms ">
	<title>Login | Online Learning Platforms</title>

	<!-- Favicon Icon -->
	<link rel="icon" type="image/png" href="images/fav.png">

	@include('globle.header')

<body>

	@include('globle.navigation')
	<div class="body_content">
		<div class="container-fluid">

			@if (Auth::guard('admin')->check())
			<div class="row flex-nowrap">
				<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-main-col">

					@include('globle.sidebar')
				</div>
				<div class="col">
					<div class="py-3">
						@include('sweetalert::alert')
						@yield('content')
					</div>
				</div>
			</div>
			@elseif(Auth::guard('teacher')->check())
			<div class="row flex-nowrap">
				<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-main-col">

					@include('globle.sidebar')
				</div>
				<div class="col">
					<div class="py-3">
						@include('sweetalert::alert')
						@yield('content')
					</div>
				</div>
			</div>

			@elseif (Auth::guard('student')->check())

			<div class="row flex-nowrap">
				<div class="col">
					<div class="py-3">
						@include('sweetalert::alert')
						@yield('content')
					</div>
				</div>
			</div>
			@endif

		</div>
	</div>

	@include('globle.footer')
</body>

</html>