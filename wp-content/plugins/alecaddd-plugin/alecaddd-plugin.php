<?php 

/**
* @package AlecaddPlugin
*/

/*
Plugin Name: Alecadd Plugin
Plugin URI: http://alecadd.com/plugin
Description: This is my first attempt on writing a custom Plugin for this amazing tutorial series.
Version: 1.0.0
Author: Víctor Rivas
Author URI: http://alecaddd.com
License: GPLv2 or Later
Text Domain: alecaddd-plugin
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright (C) 2005-2018  Víctor Rivas
*/

/*	Note: Another two different ways to use the "ABSPATH" constant
	if ( !defined('ABSPATH') ) { // if something external try to enter "ABSPATH" is not going to be defined
		die;
	}

	if ( !function_exists( 'add_action' ) ) { // wp didn't start
		echo 'Hey, you can\'t access this file!';
		exit;
	}

*/

defined('ABSPATH') or die('Hey, you can\'t access this file!');

if ( !class_exists('AlecadddPlugin') ) {

	class AlecadddPlugin 
	{
		function register() {
			// add_action( 'admin_enqueue_scripts', [ $this, 'enqueue'] ); // Object initialization
			add_action( 'admin_enqueue_scripts', [ 'AlecadddPlugin', 'enqueue'] ); // Static method way
		}

		protected function create_post_type() {
			add_action( 'init', [ $this, 'custom_post_type' ] );
		}

		function activate() {
			
			//$this->custom_post_type(); // Create CPT
			require_once plugin_dir_path( __FILE__ ) . 'inc/alecaddd-plugin-activate.php';			
			AlecadddPluginActivate::activate();			
		}

		function deactivate() {
			// flush the rewrite rules
		}

		function custom_post_type() {
			register_post_type( 'book', ['public' => true, 'label' => 'Books'] );
		}

		static function enqueue() {
			// enqueue all our scripts
			wp_enqueue_style( 'mypluginstyle', plugins_url( '/assets/mystyle.css', __FILE__ ) );
			wp_enqueue_script( 'mypluginscript', plugins_url( '/assets/myscript.js', __FILE__ ) );
		}
	}

	$alecadddPlugin = new AlecadddPlugin();
	$alecadddPlugin->register();
	// AlecadddPlugin::register();
}

// activation
register_activation_hook( __FILE__, [ $alecadddPlugin, 'activate' ] );

// deactivation
require_once plugin_dir_path( __FILE__ ) . 'inc/alecaddd-plugin-deactivate.php';
register_deactivation_hook( __FILE__, [ 'AlecadddPluginDeactivate', 'deactivate' ] );

// uninstall
//register_uninstall_hook( __FILE__, [ $alecadddPlugin, 'uninstall' ] );