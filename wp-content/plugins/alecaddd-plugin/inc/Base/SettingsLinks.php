<?php 

/**
* @package AlecaddPlugin
*/
namespace Inc\Base;

class SettingsLinks
{
	protected $plugin;

	public function __construct() 
	{
		$this->plugin = PLUGIN;
	}

	public function register() 
	{
		add_filter( "plugin_action_links_$this->plugin", [ $this, 'settings_link' ] ); // admin links filter
	}

	public function settings_link( $links ) 
	{
		array_push( $links, '<a href="admin.php?page=alecaddd-plugin">Settings</a>'); // append to links native array
		return $links;
	}
}