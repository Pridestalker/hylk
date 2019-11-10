<?php
define('HYLK_FILE', __FILE__);
use Timber\Timber;

include_once get_stylesheet_directory() . '/vendor/autoload.php';

Timber::$locations = [
    get_stylesheet_directory() . '/templates/',
];
