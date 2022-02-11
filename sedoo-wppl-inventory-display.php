<?php 
    /** Displays template part fo the 'sedoo_inventory_application` post type.*/
    add_filter ( 'single_template', 'sedoo_application_inventory_single' );
    function sedoo_application_inventory_single($single_template) {
        global $post;

        if ($post->post_type == 'sedoo_inventory_app') {
            $single_template = plugin_dir_path( __FILE__ ) . 'single-inventory-template.php';
        }
        return $single_template;
    }
    /** Displays template part fo the 'sedoo_inventory_contact` post type. */

    add_filter ( 'single_template', 'sedoo_contact_inventory_single' );
    function sedoo_contact_inventory_single($single_template) {
        global $post;

        if ($post->post_type == 'sedoo_invent_contact') {
            $single_template = plugin_dir_path( __FILE__ ) . 'single-inventory-template.php';
        }
        return $single_template;
    }
   
    /** Displays template part for the 'archive sedoo_inventory_application` archive type.*/
    add_filter ( 'archive_template', 'sedoo_application_inventory_archive' );
    function sedoo_application_inventory_archive($inventory_taxo_template) {
        
        if(is_tax('sedoo_inventory_instance_app') || is_tax('sedoo_inventory_server_app') || is_tax('sedoo_inventory_structure_app') || is_tax('sedoo_inventory_type_site') || is_tax('sedoo_inventory_type_app')) {
            $inventory_taxo_template = plugin_dir_path( __FILE__ ) . 'taxonomy-inventory-template.php';
        }elseif ( is_post_type_archive ('sedoo_inventory_app') ) {
            $inventory_taxo_template = plugin_dir_path( __FILE__ ) . 'archive-inventory-app-template.php';
        }elseif ( is_post_type_archive ('sedoo_invent_contact') ) {
            $inventory_taxo_template = plugin_dir_path( __FILE__ ) . 'archive-inventory-contact-template.php';
        }
        return $inventory_taxo_template;
    }

?>