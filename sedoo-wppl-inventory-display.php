<?php 
    /** Displays template part fo the 'sedoo_inventory_application` post type.*/
    add_filter ( 'single_template', 'sedoo_application_inventory_single' );
    function sedoo_application_inventory_single($single_template) {
        global $post;
        global $cpt_names_application;

        if ($post->post_type == $cpt_names_application) {
            $single_template = plugin_dir_path( __FILE__ ) . 'single-inventory-template.php';
        }
        return $single_template;
    }
    /** Displays template part fo the 'sedoo_inventory_contact` post type. */

    add_filter ( 'single_template', 'sedoo_contact_inventory_single' );
    function sedoo_contact_inventory_single($single_template) {
        global $post;
        global $cpt_names_contact;

        if ($post->post_type == $cpt_names_contact) {
            $single_template = plugin_dir_path( __FILE__ ) . 'single-inventory-template.php';
        }
        return $single_template;
    }
    /** Displays template part for the 'archive sedoo_inventory_application` archive type.*/
    add_filter ( 'archive_template', 'sedoo_application_inventory_archive' );
    function sedoo_application_inventory_archive($taxo_template) {
        global $taxo_names_instance;
        global $taxo_names_server;
        global $taxo_names_structure;
        global $taxo_names_type_de_site;
        if(is_tax($taxo_names_instance) || is_tax($taxo_names_server) || is_tax($taxo_names_structure) || is_tax($taxo_names_type_de_site)) {
            $taxo_template = plugin_dir_path( __FILE__ ) . 'taxonomie-inventory-template.php';
        }
        elseif ( is_post_type_archive ( 'sedoo_wppl_project' ) ) {
            $taxo_template = plugin_dir_path( __FILE__ ) . 'archive-inventory-template.php';
        }
        return $taxo_template;
    }

?>