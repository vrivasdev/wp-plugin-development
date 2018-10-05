<?php 
/**
* @package AlecaddPlugin
*/
namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{
	public function checkboxSanitize( $input )
	{
		// return filter_var($input, FILTER_SANITIZE_INT);
		return ( isset($input) ? true : false );
	}

	public function adminSectionManager()
	{
		echo 'Activate the Sections and Features of this Plugin by activating the checkbox from the following list.';
	}

	public function checkboxField( $args )
	{		
		$name     = $args['label_for'];
		$classes  = $args['class'];
		$checkbox = get_option( $name ); // if checkbox exist in DB
		
		echo '<div class="'.$classes.'"><input type="checkbox" id="' . $name . '" name="' . $name . '" value="1" class="' . $classes . '" ' . ($checkbox ? 'checked' : '') . ' ><label for="'.$name.'"><div></div></label></div>';
	}
}