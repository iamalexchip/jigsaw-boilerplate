@if($page->production)
	<!-- CHANGE THIS TO USE CDN -->

	<!-- Bootstrap core CSS -->
	<link href="{{ $page->asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="{{ $page->asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
@else
	<!-- Bootstrap core CSS -->
	<link href="{{ $page->asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="{{ $page->asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
@endif