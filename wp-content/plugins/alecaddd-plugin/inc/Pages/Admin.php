<?php 
/**
* @package AlecaddPlugin
*/
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
/**
 * 
 */
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

		$this->setSettings();

		$this->setSections();

		$this->setFields();

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
				'callback'   => [ $this->callbacks, 'adminDashboard' ], // WP callback
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
				'callback'    => [ $this->callbacks, 'adminCPT' ] // WP callback
			],
			[
				'parent_slug' => 'alecaddd-plugin',
				'page_title'  => 'Custom Taxonomies',
				'menu_title'  => 'Taxonomies', 
				'capability'  => 'manage_options', 
				'menu_slug'   => 'alecaddd-taxonomies',
				'callback'    => [ $this->callbacks, 'adminTaxonomy' ] // WP callback
			],
			[
				'parent_slug' => 'alecaddd-plugin',
				'page_title'  => 'Custom Widgets',
				'menu_title'  => 'Widgets', 
				'capability'  => 'manage_options', 
				'menu_slug'   => 'alecaddd-widgets',
				'callback'    => [ $this->callbacks, 'adminWidget' ] // WP callback
			]
		];
	}

	public function setSettings()
	{		
		// Note: Add a new settings and field row to set a new text field
		$this->settings->setSettings( [
			[
				'option_group' => 'alecaddd_options_group',
				'option_name'  => 'text_example',
				'callback'     => [ $this->callbacks, 'alecadddOptionsGroup' ]// optional
			],
			[
				'option_group' => 'alecaddd_options_group',
				'option_name'  => 'first_name'
			]
		] );
	}

	public function setSections()
	{	
		$this->settings->setSections( [
			[
				'id'       => 'alecaddd_admin_index',
				'title'    => 'Settings',
				'callback' => [ $this->callbacks, 'alecadddAdminSection' ],
				'page'     => 'alecaddd-plugin'
			]
		] );
	}

	public function setFields()
	{	
		$this->settings->setFields( [
			[
				'id'       => 'text_example',
				'title'    => 'Text Example',
				'callback' => [ $this->callbacks, 'alecadddTextExample' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'text_example',
					'class'     => 'example-class'
				]
			],
			[
				'id'       => 'first_name',
				'title'    => 'First name',
				'callback' => [ $this->callbacks, 'alecadddFirstName' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'first_name',
					'class'     => 'example-class'
				]
			]
		] );
	}
}
