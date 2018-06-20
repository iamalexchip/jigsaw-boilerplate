<div class="post-preview">
	<a href="{{ $post->getUrl() }}">
	 	<h2 class="post-title">{{ $post->title }}</h2>
	  	<h3 class="post-subtitle">{{ $post->summary }}</h3>
	</a>
	<p class="post-meta">
		Posted {{ $post->publishDate() }}
		@foreach($post->getTags($tags) as $tag)
		|
		<a href="{{ $tag->getUrl() }}">
			{{ $tag->title }} ({{ $tag->postCount($posts) }})
		</a>
		@endforeach
	</p>
</div>
@if($loop->last)
<hr>
@endif