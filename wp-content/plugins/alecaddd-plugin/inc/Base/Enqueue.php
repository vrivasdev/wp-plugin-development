<?php 

namespace Inc\Base;

/**
* @package AlecaddPlugin
*/

class Enqueue
{
	public function register() 
	{
		add_action( 'admin_enqueue_scripts', [ $this, 'enqueue'] ); 
	}	

	static function enqueue() {
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle', PLUGIN_URL . '/assets/mystyle.css');
		wp_enqueue_script( 'mypluginscript', PLUGIN_URL . '/assets/myscript.js' );

	}
}