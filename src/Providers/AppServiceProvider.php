<?php
namespace App\Providers;

use function apply_filters;
use function do_action;

class AppServiceProvider
{
	protected $providers;
	
	public function __construct()
	{
		$providers = include get_stylesheet_directory() . '/src/config/app.php';
		$this->providers = $providers['providers'];
		$this->boot();
	}
	
	public function boot(): void
	{
		foreach ($this->providers as $provider) {
			new $provider();
		}
		
		do_action('hylk/providers/registered');
	}
	
	public function register(): void
	{
		$this->addThemeSupports();
	}
	
	protected function addThemeSupports(): void
	{
		$features = apply_filters('hylk/features/register', [
			'custom-logo',
		]);
		
		foreach ($features as $feature) {
			add_theme_support($feature);
		}
		
		do_action('hylk/features/registered');
	}
}
