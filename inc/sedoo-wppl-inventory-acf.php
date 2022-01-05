<?php

/**
 * Options du plugin
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Inventory Settings',
		'menu_title'	=> 'Inventory Settings',
		'menu_slug' 	=> 'inventory-settings',
		'capability'	=> 'activate_plugins',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Inventory Custom Posts Type',
		'menu_title'	=> 'Custom Posts Type ',
		'parent_slug'	=> 'inventory-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Inventory Custom Taxonomies',
		'menu_title'	=> 'Custom Taxonomies ',
		'parent_slug'	=> 'inventory-settings',
    ));	
}
