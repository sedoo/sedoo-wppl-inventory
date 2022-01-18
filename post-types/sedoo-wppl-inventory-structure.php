<?php 
//////////////////////
// Register contact post type
function sedoo_inventory_register_structure_cpt() {

	global $cpt_names_structure;

	$labels = array(
		'name'                  => _x( 'Structures', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Structure', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Structures', 'text_domain' ),
		'name_admin_bar'        => __( 'Structures', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Structures', 'text_domain' ),
		'description'           => __( 'Structures Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'rewrite'            	=> array( 'slug' => 'structures' ),
		'show_in_rest'			=> true,
		'menu_icon'             => 'dashicons-admin-home',
        'rest_base'             => 'structures',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true
	);
	register_post_type( $cpt_names_structure, $args );

}
add_action( 'init', 'sedoo_inventory_register_structure_cpt', 0 );
?>