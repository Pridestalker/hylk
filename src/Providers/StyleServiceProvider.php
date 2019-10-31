<?php
namespace App\Providers;

use DusanKasan\Knapsack\Collection;

/**
 * This class uses hooks and actions to (de|en)queue styles.
 *
 * Class StyleServiceProvider
 * @package App\Providers
 */
class StyleServiceProvider {
	protected static $dequeue_cache = [];
	
	protected static $enqueue_cache = [];
	
	/**
	 * Adds handles to the cache and registers them in wordpress
	 *
	 * @param string $handle
	 * @param bool   $src
	 * @param array  $deps
	 * @param bool   $ver
	 * @param string $media
	 *
	 * @return void
	 */
	public static function addStyle($handle, $src = false, $deps = [], $ver = false, $media = 'all') {
		if (isset(static::$enqueue_cache[$handle])) {
			return;
		}
		
		\wp_register_style($handle,$src, $deps, $ver, $media);
		static::$enqueue_cache[$handle] = $handle;
	}
	
	/**
	 * Enqueues all the cached style handles.
	 *
	 * @return void
	 */
	public static function enqueueStyles() {
		foreach(static::$enqueue_cache as $item) {
			wp_enqueue_style($item);
		}
	}
	
	public static function removeStyle($handle) {
		if(isset(static::$dequeue_cache[$handle])) {
			return;
		}
		
		\wp_deregister_style($handle);
		static::$dequeue_cache[$handle] = $handle;
	}
}
