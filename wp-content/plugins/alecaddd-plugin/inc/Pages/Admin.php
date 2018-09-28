<?php 

namespace Inc\Pages;

/**
* @package AlecaddPlugin
*/

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;


class Admin extends BaseController
{
	public $settings;
	public $pages = [];

	public function __construct() 
	{
		$this->settings = new SettingsApi();
		$this->pages = [
			[
				'page_title' => 'Alecaddd Plugin', 
				'menu_title' => 'Alecaddd', 
				'capability' => 'manage_options', 
				'menu_slug'  => 'alecaddd-plugin',
				'callback'   => function() { echo '<h1>Alecaddd Plugin</h1>';},
				'icon_url'   => 'dashicons-store',
				'position'   => 110
			]
		];
	}

	public function register() 
	{		
		$this->settings->addPages( $this->pages )->register();
	}
}
