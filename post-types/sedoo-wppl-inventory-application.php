<?php 


/**
 * Registers the `sedoo_inventory_application` post type.
 */

function sedoo_wppl_inventory_application_init() {
    register_post_type( 'sedoo_inventory_application', array(
        'labels'                => array(
            'name'                  => __( 'Applications', 'sedoo-wppl-inventory' ),
			'singular_name'         => __( 'Application', 'sedoo-wppl-inventory' ),
			'all_items'             => __( 'All Applications', 'sedoo-wppl-inventory' ),
			'archives'              => __( 'Application Archives', 'sedoo-wppl-inventory' ),
			'attributes'            => __( 'Application Attributes', 'sedoo-wppl-inventory' ),
			'insert_into_item'      => __( 'Insert into Application', 'sedoo-wppl-inventory' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Application', 'sedoo-wppl-inventory' ),
			'featured_image'        => _x( 'Featured Image', 'sedoo_inventory_application', 'sedoo-wppl-inventory' ),
			'set_featured_image'    => _x( 'Set featured image', 'sedoo_inventory_application', 'sedoo-wppl-inventory' ),
			'remove_featured_image' => _x( 'Remove featured image', 'sedoo_inventory_application', 'sedoo-wppl-inventory' ),
			'use_featured_image'    => _x( 'Use as featured image', 'sedoo_inventory_application', 'sedoo-wppl-inventory' ),
			'filter_items_list'     => __( 'Filter Applications list', 'sedoo-wppl-inventory' ),
			'items_list_navigation' => __( 'Applications list navigation', 'sedoo-wppl-inventory' ),
			'items_list'            => __( 'Applications list', 'sedoo-wppl-inventory' ),
			'new_item'              => __( 'New Application', 'sedoo-wppl-inventory' ),
			'add_new'               => __( 'Add New', 'sedoo-wppl-inventory' ),
			'add_new_item'          => __( 'Add New Application', 'sedoo-wppl-inventory' ),
			'edit_item'             => __( 'Edit Application', 'sedoo-wppl-inventory' ),
			'view_item'             => __( 'View Application', 'sedoo-wppl-inventory' ),
			'view_items'            => __( 'View Applications', 'sedoo-wppl-inventory' ),
			'search_items'          => __( 'Search Applications', 'sedoo-wppl-inventory' ),
			'not_found'             => __( 'No Applications found', 'sedoo-wppl-inventory' ),
			'not_found_in_trash'    => __( 'No Applications found in trash', 'sedoo-wppl-inventory' ),
			'parent_item_colon'     => __( 'Parent Application:', 'sedoo-wppl-inventory' ),
			'menu_name'             => __( 'Applications', 'sedoo-wppl-inventory' ),
        ),
        'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'menu_position'         => 30,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'has_archive'           => true,
		'rewrite'               => array('slug' => 'Application','with_front' => true),
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-awards',
		'show_in_rest'          => true,
		'rest_base'             => 'Applications',
		'rest_controller_class' => 'WP_REST_Posts_Controller',

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
    
    if ($post->post_type == 'sedoo_inventory_application') {
        $single_template = plugin_dir_path( __FILE__ ) . 'single-seddo-application-inventory';
    }
    return $single_template;
}