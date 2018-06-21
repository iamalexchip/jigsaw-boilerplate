@extends('_layouts.master')

@section('header')

<!-- Page Header -->
<header class="masthead" style="background-image: url({{ $page->asset('images/home-bg.jpg') }})">
  	<div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
          			<h1>Tags</h1>
				</div>
            </div>
        </div>
    </div>
</header>

@endsection

@section('content')

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
            {!! $page->breadcrumbs('tags') !!}
			<hr>
			@foreach($tags->sortBy('title') as $tag)
			<div class="post-preview">
				<a href="{{ $tag->getUrl() }}">
					<h2 class="post-title">
						{{ $tag->title }} ({{ $tag->postCount($posts) }})
					</h2>
				</a>
			</div>
			<hr>
			@endforeach
		</div>
	</div>
</div>

<hr>

@endsection
