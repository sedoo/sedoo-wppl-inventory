<?php 


/**
 * Registers the `sedoo_inventory_application` post type.
 */


function sedoo_wppl_inventory_application_init() {
    register_post_type('application', array(
    'label' => 'Applications',
    'labels' => array(
      'name' => 'Applications',
      'singular_name' => 'Application',
      'all_items' => 'Toutes les applications',
      'add_new_item' => 'Ajouter une application',
      'edit_item' => 'Éditer l\'application',
      'new_item' => 'Nouvelle application',
      'view_item' => 'Voir l\'application',
      'search_items' => 'Rechercher parmi les applications',
      'not_found' => 'Pas d\'application trouvé',
      'not_found_in_trash'=> 'Pas d\'application dans la corbeille'
      ),
    'public' => true,
    'capability_type' => 'post',
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'menu_icon' => 'dashicons-welcome-view-site',
    ),
    'has_archive' => true
  ) );
}
add_action( 'init', 'sedoo_wppl_inventory_application_init' );

/**
 * Sets the post updated messages for the `sedoo_inventory_application` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `sedoo_inventory_application` post type.
 */

function sedoo_application_inventory_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['sedoo_inventory_application'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'application updated. <a target="_blank" href="%s">View application</a>', 'sedoo-wppl-inventory' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'sedoo-wppl-inventory' ),
		3  => __( 'Custom field deleted.', 'sedoo-wppl-inventory' ),
		4  => __( 'application updated.', 'sedoo-wppl-inventory' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'application restored to revision from %s', 'sedoo-wppl-inventory' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'application published. <a href="%s">View application</a>', 'sedoo-wppl-inventory' ), esc_url( $permalink ) ),
		7  => __( 'application saved.', 'sedoo-wppl-inventory' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'application submitted. <a target="_blank" href="%s">Preview application</a>', 'sedoo-wppl-inventory' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'application scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview application</a>', 'sedoo-wppl-inventory' ),
		date_i18n( __( 'M j, Y @ G:i', 'sedoo-wppl-inventory' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'application draft updated. <a target="_blank" href="%s">Preview application</a>', 'sedoo-wppl-inventory' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'sedoo_application_inventory_updated_messages' );


/**
 * Displays template part fo the 'sedoo_inventory_application` post type.
 * 
 */

add_filter ( 'single_template', 'sedoo_application_inventory_single' );
function sedoo_application_inventory_single($single_template) {
    global $post;
    
    if ($post->post_type == 'application') {
        $single_template = plugin_dir_path( __FILE__ ) . 'single-application.php';
    }
    return $single_template;
}