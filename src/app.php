<?php
namespace App;

use App\Providers\AppServiceProvider;

add_actions('hylk/init/pre');

new AppServiceProvider();

add_actions('hylk/init/post');
