<?php 
/**
* @package AlecaddPlugin
*/
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
	public $settings;
	public $callbacks;
	public $pages    = [];
	public $subpages = [];

	public function register() 
	{		
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->settings->addPages( $this->pages )
		               ->withSubPage( 'Dashboard' )
		               ->addSubPages( $this->subpages )
		               ->register();
	}

	public function setPages()
	{
		$this->pages = [
			[
				'page_title' => 'Alecaddd Plugin',
				'menu_title' => 'Alecaddd', 
				'capability' => 'manage_options', 
				'menu_slug'  => 'alecaddd-plugin',
				'callback'   => [ $this->callbacks, 'adminDashboard' ], // It's an approach that wordpress require
				'icon_url'   => 'dashicons-store',
				'position'   => 110
			]
		];
	}

	public function setSubpages()
	{
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
}
