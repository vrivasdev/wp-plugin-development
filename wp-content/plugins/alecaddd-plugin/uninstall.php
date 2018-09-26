<?php 

/**
* Trigger this file on Plugin uninstall
*
* @package AlecaddPlugin
*/

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear Database stored data

/*foreach( get_posts( [ 'post_type' => 'book', 'numberposts' => -1 ] ) as $book ) { // all posts
	wp_delete_post( $book->ID, true ); // true: deletes the post no matters it's in "trash"
}*/

// Second option. Warning: It's a bit dangerous
global $wpdb; // Acces the database via SQL

$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'book'" ); // delete PT
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" ); // Deletes all metadata not related with wp_posts
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" ); // delete taxonomies related to CPT