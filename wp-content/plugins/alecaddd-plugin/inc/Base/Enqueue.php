<?php 

namespace Inc\Base;

use \Inc\Base\BaseController;

/**
* @package AlecaddPlugin
*/

class Enqueue extends BaseController
{
	public function register() 
	{
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue'] ); 
	}	

	static function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle', $this->plugin_url . '/assets/mystyle.css');
		wp_enqueue_script( 'mypluginscript', $this->plugin_url . '/assets/myscript.js' );

	}
}