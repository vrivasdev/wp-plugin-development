<?php 

/**
* @package AlecaddPlugin
*/

class AlecadddPluginActivate 
{
	public static function activate() {				
		flush_rewrite_rules(); // Rewrite rules
	}
}