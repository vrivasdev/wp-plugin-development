<?php 
/**
* @package AlecaddPlugin
*/
namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function adminCPT()
	{
		return require_once( "$this->plugin_path/templates/cpt.php" );
	}

	public function adminTaxonomy()
	{
		return require_once( "$this->plugin_path/templates/taxonomy.php" );
	}

	public function adminWidget()
	{
		return require_once( "$this->plugin_path/templates/widget.php" );
	}

	public function alecadddOptionsGroup( $input )
	{
		return $input;
	}

	public function alecadddAdminSection()
	{
		echo 'Check this section';
	}

	public function alecadddTextExample()
	{
		$value = esc_attr( get_option( 'text_example' ) );// it comes from the "setSettings" method
		echo '<input type="text" class="regular-text" name="text_example" value="'.$value.'" placeholder="Write something here">';
	}

	public function alecadddFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );// it comes from the "setSettings" method
		echo '<input type="text" class="regular-text" name="first_name" value="'.$value.'" placeholder="Write your firt name">';
	}
}