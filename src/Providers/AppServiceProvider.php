<?php
namespace App\Providers;

use Puc_v4_Factory;
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
		$this->register();
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
		$this->checkForUpdates();
	}
	
	protected function addThemeSupports(): void
	{
		$features = apply_filters('hylk/features/register', [
			'custom-logo',
            'html5',
            'dark-editor-style',
            'post-thumbnails',
		]);
		
		foreach ($features as $feature) {
			add_theme_support($feature);
		}
		
		do_action('hylk/features/registered');
	}
    
    private function checkForUpdates()
    {
        Puc_v4_Factory::buildUpdateChecker(
            'https://github.com/Pridestalker/hylk/',
            HYLK_FILE,
            'hylk'
        );
    }
}
