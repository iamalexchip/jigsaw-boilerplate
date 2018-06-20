@extends('_layouts.master')

@section('header')

<!-- Page Header -->
<header class="masthead" style="background-image: url({{ $page->asset('img/home-bg.jpg') }})">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 mx-auto">
        <div class="site-heading">
          <h1>{{ $page->siteName }}</h1>
          <span class="subheading">{{ $page->siteTagline }}</span>
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
            @foreach($posts->sortByDesc('published') as $post)
                @include('_partial.post', ['post' => $post])
            @endforeach
            @include('_partial.pager')
        </div>
    </div>
</div>

<hr>

@endsection
