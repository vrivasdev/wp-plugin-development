<?php 

/**
* @package AlecaddPlugin
*/

class AlecadddPluginDeactivate 
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}