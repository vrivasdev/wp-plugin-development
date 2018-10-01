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
	public $pages    = [];
	public $subpages = [];

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
		
		$this->subpages = [
			[
				'parent_slug' => 'alecaddd-plugin',
				'page_title'  => 'Custom Post Types',
				'menu_title'  => 'CPT', 
				'capability'  => 'manage_options', 
				'menu_slug'   => 'alecaddd_cpt',
				'callback'    => function() { echo '<h1>CPT Manager</h1>';}
			],
			[
				'parent_slug' => 'alecaddd-plugin',
				'page_title'  => 'Custom Taxonomies',
				'menu_title'  => 'Taxonomies', 
				'capability'  => 'manage_options', 
				'menu_slug'   => 'alecaddd-taxonomies',
				'callback'    => function() { echo '<h1>Taxonomies Manager</h1>';}
			],
			[
				'parent_slug' => 'alecaddd-plugin',
				'page_title'  => 'Custom Widgets',
				'menu_title'  => 'Widgets', 
				'capability'  => 'manage_options', 
				'menu_slug'   => 'alecaddd-widgets',
				'callback'    => function() { echo '<h1>Widget Manager</h1>';}
			]
		];
	}

	public function register() 
	{		
		$this->settings->addPages( $this->pages )
		               ->withSubPage( 'Dashboard' )
		               ->addSubPages( $this->subpages )
		               ->register();
	}
}
