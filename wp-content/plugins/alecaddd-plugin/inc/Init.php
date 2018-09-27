<?php

/**
* @package AlecaddPlugin
*/
namespace Inc;

final class Init // 'final': Class isn't extensible
{
	/**
	 * Store all the classes inside an array
	 * @return [type] [description]
	 */
	public static function get_services() 
	{
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
		];
	}

	/**
	 * Loop through the classes, initialize them, and call the register() method if it exists
	 * @return [type] [description]
	 */
	public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {

			$service = self::instantiate( $class );

			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}
	/**
	 * Initialize the class
	 * @param  [type] $class class from the services array
	 * @return [type] class intance  new intance of the class
	 */
	private static function instantiate( $class ) 
	{
		return new $class();
	}
}