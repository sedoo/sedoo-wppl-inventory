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
 */

 // VARIABLES GLOBALES POUR CPT NAMES ET CUSTOM TAXONOMY
 global $cpt_names_application;
 global $cpt_names_contact;
 global $cpt_names_structure;

 global $taxo_names_instance;
 global $taxo_names_structure;
 global $taxo_names_server;
 global $taxo_names_type_dapp;


 $taxo_names_instance = 'sedoo_inventory_instance_app';
 $taxo_names_structure = 'sedoo_inventory_structure_app';
 $taxo_names_server = 'sedoo_inventory_server_app';
 $taxo_names_type_dapp = 'sedoo_inventory_type_app';
 $cpt_names_application = 'sedoo_inventory_app';
 $cpt_names_contact = 'sedoo_invent_contact';
 $cpt_names_structure = 'sedoo_invent_struct';

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
include 'post-types/sedoo-wppl-inventory-structure.php';
// TAXONOMIES
include 'taxonomies/sedoo-wppl-inventory-structure.php';
include 'taxonomies/sedoo-wppl-inventory-server.php';
include 'taxonomies/sedoo-wppl-inventory-instance-wp.php';
include 'taxonomies/sedoo-wppl-inventory-type-de-site.php';

// AUTRE
include 'sedoo-wppl-inventory-display.php';
include 'inc/sedoo-wppl-inventory-acf-fields.php';
include 'inc/sedoo-wppl-inventory-acf.php';
//include 'inc/sedoo-wppl-inventory-functions.php';

// LOAD LANGUAGES FILES
function sedoo_inventory_load_language() {
    load_plugin_textdomain( 'sedoo-wppl-inventory', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'sedoo_inventory_load_language' );