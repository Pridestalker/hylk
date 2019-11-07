<?php
namespace App;

use App\Providers\AppServiceProvider;

\do_action('hylk/init/pre');

new AppServiceProvider();

\do_action('hylk/init/post');
