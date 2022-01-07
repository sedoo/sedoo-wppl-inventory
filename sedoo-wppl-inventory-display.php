<?php 
    /**
     * Displays template part fo the 'sedoo_inventory_application` post type.
     * 
     */

    add_filter ( 'single_template', 'sedoo_application_inventory_single' );
    function sedoo_application_inventory_single($single_template) {
        global $post;
        
        if ($post->post_type == 'sedoo_inventory_app') {
            $single_template = plugin_dir_path( __FILE__ ) . 'single-inventory-application.php';
        }
        return $single_template;
    }
    /**
     * Displays template part fo the 'sedoo_inventory_contact` post type.
     * 
     */

    add_filter ( 'single_template', 'sedoo_contact_inventory_single' );
    function sedoo_contact_inventory_single($single_template) {
        global $post;
        
        if ($post->post_type == 'sedoo_inventory_contact') {
            $single_template = plugin_dir_path( __FILE__ ) . 'single-inventory-contact.php';
        }
        return $single_template;
    }

?>