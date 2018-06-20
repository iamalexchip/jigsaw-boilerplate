<?php

require __DIR__.'/vendor/autoload.php';

return [
    'baseUrl' => 'http://localhost:3000',
    'production' => false,
    'siteName' => 'Jigsaw boilerplate',
    'siteTagline' => 'by Alex @zerochip',
    'url' => function ($page, $path) {
        if ($path[0] != '/') {
            $path = '/'.$path;
        }
        return $page->baseUrl.$path;
    },
    'asset' => function ($page, $path) {
        return $page->url('assets/'.$path);
    },
    'pageTitle' => function ($page) {
        if ($page->getFilename() == 'index') {
            return $page->siteName.' - '.$page->siteTagline;
        }
        if ($page->title) {
            return $page->title.' | '.$page->siteName;
        } else {
            return ucfirst($page->getFilename()).' | '.$page->siteName;
        }
    },
    'breadcrumbs' => function ($page, $type, $params = null) {
        return Jigsaw\Breadcrumbs\Render::for($type, $page, $params);
    },
    'collections' => [
    	'posts' => [
    		'path' => 'blog/{-title}',
            'publishDate' => function ($post) {
                return date('j F, Y', $post->published);
            },
    		'tagSlugs' => function ($post) {
    			return explode(', ', $post->tags);
    		},
            'getTags' => function($post, $tags) {
                return $tags->whereIn('slug', $post->tagSlugs());
            }
    	],
    	'tags' => [
    		'path' => 'tags/{slug}',
            'getPosts' => function($tag, $posts) {
                return $posts->filter( function($post) use ($tag) {
                            return in_array($tag->slug, $post->tagSlugs());
                        });
            },
            'postCount' => function($tag, $posts) {
                return $tag->getPosts($posts)->count();
            }
    	]
    ],
];
