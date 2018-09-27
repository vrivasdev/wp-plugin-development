<?php 

/**
* @package AlecaddPlugin
*/
namespace Inc\Base;

use \Inc\Base\BaseController;

class SettingsLinks extends BaseController
{
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