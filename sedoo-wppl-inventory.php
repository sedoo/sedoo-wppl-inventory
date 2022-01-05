<?php
/**
 * Plugin Name:     Sedoo Inventory
 * Plugin URI:      https://github.com/sedoo/sedoo-wppl-inventory
 * Description:     Infos détaillées sur l'ensemble des sites internet gérées par le SEDOO
 * Author:          Pierre VERT , Grégoire CASSAGNEAU - SEDOO DATA CENTER
 * Author URI:      https://www.sedoo.fr 
 * Text Domain:     sedoo-wppl-inventory
 * Domain Path:     /languages
 * Version:         0.1.0
 * GitHub Plugin URI: sedoo/sedoo-wppl-inventory
 * GitHub Branch:     master
 * @package         Sedoo_Wppl_Inventory
 */

// LOAD CSS & SCRIPTS 
function sedoo_wppl_inventory_scripts() {
    wp_register_style( 'prefix-style', plugins_url('css/sedoo_inventory.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}
 add_action('wp_enqueue_scripts','sedoo_wppl_inventory_scripts');

//  INCLUDE REGISTER POST TYPE AND TAXONOMIES FUNCTIONS
// CPT - POST TYPES
include 'post-types/sedoo-wppl-inventory-application.php';
include 'post-types/sedoo-wppl-inventory-contact.php';
// TAXONOMIES
include 'taxonomies/sedoo-wppl-inventrory-instance-wp.php';
include 'taxonomies/sedoo-wppl-inventrory-type-de-site.php';
include 'taxonomies/sedoo-wppl-inventrory-structure.php';
include 'taxonomies/sedoo-wppl-inventrory-server.php';