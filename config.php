<?php

require __DIR__.'/vendor/autoload.php';

return [
    'baseUrl' => 'http://localhost:3000',
    'production' => false,
    'siteName' => 'Jigsaw boilerplate',
    'siteTagline' => 'A jigsaw boilerplate by Alex @zerochip',
    'asset' => function ($page, $path) {
        return $page->baseUrl.'/assets/'.$path;
    },
    'pageTitle' => function ($page) {
        if ($page->title) {
            return $page->title.' | '.$page->siteName;
        } else {
            return $page->siteName.' - '.$page->siteTagline;
        }
    },
    'breadcrumbs' => function ($page, $type, $param = null) {
        return Jigsaw\Breadcrumbs\Render::type($type, $page, $param);
    },
    'collections' => [
    	'posts' => [
    		'path' => 'blog/{-title}',
            'publishDate' => function ($post) {
                return date('j F, Y', $post->published);
            },
            'getCategory' => function ($post, $categories) {
                return $categories->where('slug', $post->category)->first();
            },
    		'tagSlugs' => function ($post) {
    			return explode(', ', $post->tags);
    		},
            'getTags' => function ($post, $tags) {
                return $tags->whereIn('slug', $post->tagSlugs());
            },
            'headerImage' => function ($page) {
                if ($page->image[0] == '/') {
                    return $page->asset('images'.$page->image);
                } else {
                    return $page->image;
                }
            }
    	],
        'categories' => [
            'path' => 'categories/{slug}',
            'getPosts' => function ($category, $posts) {
                return $posts->where('category', $category->slug);
            },
            'postCount' => function ($category, $posts) {
                return $category->getPosts($posts)->count();
            }
        ],
    	'tags' => [
    		'path' => 'tags/{slug}',
            'getPosts' => function ($tag, $posts) {
                return $posts->filter(function ($post) use ($tag) {
                            return in_array($tag->slug, $post->tagSlugs());
                        });
            },
            'postCount' => function ($tag, $posts) {
                return $tag->getPosts($posts)->count();
            }
    	]
    ],
];
