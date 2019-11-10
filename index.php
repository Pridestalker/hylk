<?php

use Timber\Timber;

$context = Timber::get_context();

$context['post'] = new \Timber\Post();

return Timber::render(
    [
        'views/page.html.twig',
    ],
    $context
);
