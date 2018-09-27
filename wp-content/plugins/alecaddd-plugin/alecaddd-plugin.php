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

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * The code that runs during plugin activation
 */
function activate_alecaddd_plugin() 
{
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_alecaddd_plugin' );

/**
 * The code that runs during plugin deactivation
 */
function deactivate_alecaddd_plugin() 
{
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_alecaddd_plugin' );

if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}