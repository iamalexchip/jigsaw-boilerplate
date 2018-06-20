@if($page->production)
	<!-- CHANGE THIS TO USE CDN -->

	<!-- Bootstrap core JavaScript -->
	<script src="{{ $page->asset('vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ $page->asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@else
	<!-- Bootstrap core JavaScript -->
	<script src="{{ $page->asset('vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ $page->asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endif