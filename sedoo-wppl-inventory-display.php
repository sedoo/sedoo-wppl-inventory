<?php 
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

?>