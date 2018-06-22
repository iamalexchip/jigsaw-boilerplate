<?php
	
namespace Plugin\Breadcrumbs;

use Jigsaw\Breadcrumbs\Builder;

class Types
{
	/*
    |--------------------------------------------------------------------------
    | Breadcrumb types
    |--------------------------------------------------------------------------
    |
    | This is where you make breadcrumb types
    | Documentation -> https://zerochip.github.com/jigsaw-breadcrumbs
    |
    */

	/**
	 * Breadcrumb template to be used
	 */
	public $template = 'bootstrap4';

	/**
	 * Set to true when using a custom template
	 */
	public $custom_template = false;

	/**
	 * Home page
	 *
	 * @return object \Jigsaw\Breadcrumbs\Builder
	 */
	public function home()
	{
		return Builder::make('Home', '/');
	}

	public function categories()
	{
		return Builder::parent('home')
				->push('Categories', '/categories');
	}

	public function category($page)
	{
		return Builder::parent('categories')
				->push($page->title, $page->getPath());
	}

	public function tags()
	{
		return Builder::parent('home')
				->push('Tags', '/tags');
	}

	public function tag($page)
	{
		return Builder::parent('tags')
				->push($page->title, $page->getPath());
	}

	public function post($page, $category)
	{
		return Builder::parent('category', $category)
				->push($page->title, $page->getPath());
	}

}
