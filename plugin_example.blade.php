--------------------
routes.php
--------------------
@php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Categories > {Title}
Breadcrumbs::for('category', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about'));
});

function home() {
	return ['Home', '/'];
	/*
	return 'Home';
	*/
}

function categories() {
	return Breadcrumb::parent($this->home())
			->push(['Categories', '/categories']);
			/*
			->push('Categories');
			*/		
}

/*
	<a href="/">Home</a>
	<a href="$link">$text</a>
*/

function category($params) {
	return	Breadcrumb::parent($this->categories)
			->push([ $params[0], $params[1] ]);
}

/*
	<a href="/">Home</a>
	<a href="/categories">Categories</a>
	<a href="$link">$text</a>
*/

@endphp
--------------------
config.php
--------------------
@php

'breadcrumb' => function ($page, $type) {
	switch ($type) {
		case 'home':

			return Plugin\Breadcrumbs\Render::for('home');

			break;
		
		default:

			return Plugin\Breadcrumb::render($type, $page->title);
			
			break;
	}
}

@endphp
--------------------
page.blade.php
--------------------

{{ $page->breadcrumb('home') }}

{{ $page->breadcrumb('category') }}
