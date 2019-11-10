<?php

use Timber\Post;
use Timber\PostQuery;
use Timber\Timber;

$context = Timber::get_context();

$context['post'] = new Post();

$context['posts'] = new PostQuery(['post_type' => 'post', 'posts_per_page' => 3]);

return Timber::render(
    [
        'views/front-page.html.twig',
        'views/page.html.twig'
    ],
    $context
);
