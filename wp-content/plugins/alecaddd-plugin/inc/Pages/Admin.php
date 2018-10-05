<?php 
/**
* @package AlecaddPlugin
*/
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;
/**
 * 
 */
class Admin extends BaseController
{
	public $settings;
	public $callbacks;
	public $callbacks_mngr;
	public $pages    = [];
	public $subpages = [];

	public function register() 
	{		
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();

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
				'option_group' => 'alecaddd_plugin_settings',
				'option_name'  => 'cpt_manager',
				'callback'     => [ $this->callbacks_mngr, 'checkboxSanitize' ]
			],
			[
				'option_group' => 'alecaddd_plugin_settings',
				'option_name'  => 'taxonomy_manager',
				'callback'     => [ $this->callbacks_mngr, 'checkboxSanitize' ]
			],
			[
				'option_group' => 'alecaddd_plugin_settings',
				'option_name'  => 'media_widget',
				'callback'     => [ $this->callbacks_mngr, 'checkboxSanitize' ]
			],
			[
				'option_group' => 'alecaddd_plugin_settings',
				'option_name'  => 'gallery_manager',
				'callback'     => [ $this->callbacks_mngr, 'checkboxSanitize' ]
			],
			[
				'option_group' => 'alecaddd_plugin_settings',
				'option_name'  => 'testimonial_manager',
				'callback'     => [ $this->callbacks_mngr, 'checkboxSanitize' ]
			],
			[
				'option_group' => 'alecaddd_plugin_settings',
				'option_name'  => 'templates_manager',
				'callback'     => [ $this->callbacks_mngr, 'checkboxSanitize' ]
			],
			[
				'option_group' => 'alecaddd_plugin_settings',
				'option_name'  => 'login_manager',
				'callback'     => [ $this->callbacks_mngr, 'checkboxSanitize' ]
			],
			[
				'option_group' => 'alecaddd_plugin_settings',
				'option_name'  => 'membership_manager',
				'callback'     => [ $this->callbacks_mngr, 'checkboxSanitize' ]
			],
			[
				'option_group' => 'alecaddd_plugin_settings',
				'option_name'  => 'chat_manager',
				'callback'     => [ $this->callbacks_mngr, 'checkboxSanitize' ]
			]
		] );
	}

	public function setSections()
	{	
		$this->settings->setSections( [
			[
				'id'       => 'alecaddd_admin_index',
				'title'    => 'Settings',
				'callback' => [ $this->callbacks_mngr, 'adminSectionManager' ],
				'page'     => 'alecaddd-plugin'
			]
		] );
	}

	public function setFields()
	{	
		$this->settings->setFields( [
			[
				'id'       => 'cpt_manager',
				'title'    => 'Activate CPT Manager',
				'callback' => [ $this->callbacks_mngr, 'checkboxField' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'cpt_manager',
					'class'     => 'ui-toggle'
				]
			],
			[
				'id'       => 'taxonomy_manager',
				'title'    => 'Activate Taxonomy Manager',
				'callback' => [ $this->callbacks_mngr, 'checkboxField' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'taxonomy_manager',
					'class'     => 'ui-toggle'
				]
			],
			[
				'id'       => 'media_widget',
				'title'    => 'Activate Media Widget',
				'callback' => [ $this->callbacks_mngr, 'checkboxField' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'media_widget',
					'class'     => 'ui-toggle'
				]
			],
			[
				'id'       => 'gallery_manager',
				'title'    => 'Activate Gallery Manager',
				'callback' => [ $this->callbacks_mngr, 'checkboxField' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'gallery_manager',
					'class'     => 'ui-toggle'
				]
			],
			[
				'id'       => 'testimonial_manager',
				'title'    => 'Activate Testimonial Manager',
				'callback' => [ $this->callbacks_mngr, 'checkboxField' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'testimonial_manager',
					'class'     => 'ui-toggle'
				]
			],
			[
				'id'       => 'templates_manager',
				'title'    => 'Activate Templates Manager',
				'callback' => [ $this->callbacks_mngr, 'checkboxField' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'templates_manager',
					'class'     => 'ui-toggle'
				]
			],
			[
				'id'       => 'login_manager',
				'title'    => 'Activate Ajax Login/Signup',
				'callback' => [ $this->callbacks_mngr, 'checkboxField' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'login_manager',
					'class'     => 'ui-toggle'
				]
			],
			[
				'id'       => 'membership_manager',
				'title'    => 'Activate Membership Manager',
				'callback' => [ $this->callbacks_mngr, 'checkboxField' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'membership_manager',
					'class'     => 'ui-toggle'
				]
			],
			[
				'id'       => 'chat_manager',
				'title'    => 'Activate Chat Manager',
				'callback' => [ $this->callbacks_mngr, 'checkboxField' ],
				'page'     => 'alecaddd-plugin',
				'section'  => 'alecaddd_admin_index',
				'args' => [
					'label_for' => 'chat_manager',
					'class'     => 'ui-toggle'
				]
			]
		] );
	}
}
