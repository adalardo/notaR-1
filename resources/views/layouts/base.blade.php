<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('includes.head')
</head>
<body>
<div class="container">

	<header class="row">
		@include('includes.header')
	</header>

	<!-- sidebar content -->
	<div id="sidebar" class="col-md-4">
		@include('includes.sidebar')
	</div>

	<!-- main content -->
	<div id="content" class="col-md-8">
		@yield('content')
	</div>

	<footer class="row">
		@include('includes.footer')
	</footer>

</div>
</body>
</html>
