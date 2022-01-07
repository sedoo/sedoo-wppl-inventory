<?php 


/**
 * Registers the `sedoo_inventory_contact` post type.
 */


function sedoo_wppl_inventory_contact_init() {
    register_post_type('sedoo_invent_contact', array(
    'label' => 'Contacts',
    'labels' => array(
      'name' => 'Contacts',
      'singular_name' => 'Contact',
      'all_items' => 'Tous les Contacts',
      'add_new_item' => 'Ajouter une Contact',
      'edit_item' => 'Éditer l\'Contact',
      'new_item' => 'Nouveau Contact',
      'view_item' => 'Voir le contact',
      'search_items' => 'Rechercher parmi les contacts',
      'not_found' => 'Pas de contact trouvé',
      'not_found_in_trash'=> 'Pas de contact dans la corbeille'
      ),
	  'public'                => true,
	  'hierarchical'          => false,
	  'show_ui'               => true,
	  'show_in_nav_menus'     => true,
	  'menu_position'         => 25,
	  'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
	  'has_archive'           => true,
	  'rewrite'               => array('slug' => 'contact','with_front' => true),
	  'query_var'             => true,
	  'menu_position'         => null,
	  'menu_icon'             => 'dashicons-admin-users',
	  'show_in_rest'          => true,
	  'rest_base'             => 'contact',
	  'rest_controller_class' => 'WP_REST_Posts_Controller',
  ) );	
}
add_action( 'init', 'sedoo_wppl_inventory_contact_init' );

/**
 * Sets the post updated messages for the `sedoo_inventory_contactlication` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedoo_inventory_contactlication` post type.
 */

function sedoo_contact_inventory_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['sedoo_inventory_contact'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Contact updated. <a target="_blank" href="%s">View Contact</a>', 'sedoo-wppl-inventory' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'sedoo-wppl-inventory' ),
		3  => __( 'Custom field deleted.', 'sedoo-wppl-inventory' ),
		4  => __( 'Contact updated.', 'sedoo-wppl-inventory' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Contact restored to revision from %s', 'sedoo-wppl-inventory' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Contact published. <a href="%s">View Contact</a>', 'sedoo-wppl-inventory' ), esc_url( $permalink ) ),
		7  => __( 'Contact saved.', 'sedoo-wppl-inventory' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Contact submitted. <a target="_blank" href="%s">Preview Contact</a>', 'sedoo-wppl-inventory' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Contact scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Contact</a>', 'sedoo-wppl-inventory' ),
		date_i18n( __( 'M j, Y @ G:i', 'sedoo-wppl-inventory' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Contact draft updated. <a target="_blank" href="%s">Preview Contact</a>', 'sedoo-wppl-inventory' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'sedoo_app_inventory_updated_messages' );

?>