@extends('_layouts.master')

@section('header')

<!-- Page Header -->
<header class="masthead" style="background-image: url({{ $page->headerImage() }})">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="post-heading">
					<h1>{{ $page->title }}</h1>
					<h2 class="subheading">{{ $page->summary }}</h2>
					<span class="meta">
						Posted in
						<a href="{{ $page->getCategory($categories)->getUrl() }}">
							{{ $page->getCategory($categories)->title }}
						</a>
						{{ $page->publishDate() }}
						@foreach($page->getTags($tags) as $tag)
						| <a href="{{ $tag->getUrl() }}">{{ $tag->title }}</a>
						@endforeach
					</span>
				</div>
			</div>
		</div>
	</div>
</header>

@endsection

@section('content')

<!-- Post Content -->
<article>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				{!! $page->breadcrumbs('post', $page->getCategory($categories)) !!}
				<hr>
				@yield('postContent')
			</div>
		</div>
	</div>
</article>

<hr>

@endsection