<?php
use Timber\Timber;

include_once get_stylesheet_directory() . '/vendor/autoload.php';

Timber::$locations = [
    get_stylesheet_directory() . '/templates/',
];
