<div class="wrap">
	<h1> Alecaddd Plugin Required </h1>
	<?php settings_errors(); ?>	

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'alecaddd_options_group' );
			do_settings_sections( 'alecaddd-plugin' );
			submit_button();
		?>
	</form>
</div>
