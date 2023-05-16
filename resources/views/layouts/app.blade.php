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
            @include('globle.navigation')
            @include('globle.sidebar')
                @yield('content')

            @include('globle.footer')

</body>

</html>