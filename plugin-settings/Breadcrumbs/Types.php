<?php
	
namespace PluginSettings\Breadcrumbs;

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

	public function posts()
	{
		return Builder::parent('home')
				->push('Posts', '/posts');
	}

	public function categories()
	{
		return Builder::parent('home')
				->push('Categories', '/categories');
	}

	public function category($category)
	{
		return Builder::parent('categories')
				->push($category->title, $category->getUrl());
	}

	public function tags()
	{
		return Builder::parent('home')
				->push('Tags', '/tags');
	}

	public function tag($tag)
	{
		return Builder::parent('tags')
				->push($tag->title, $tag->getUrl());
	}

	public function post($post, $category)
	{
		return Builder::parent('category', $category)
				->push($post->title, $post->getUrl());
	}

}
