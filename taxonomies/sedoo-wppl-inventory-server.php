<?php
    
    function sedoo_wppl_inventory_server_init() {
    
        register_taxonomy('server','sedoo_inventory_app', array(
            'label' => 'servers',
            'labels' => array(
            'name' => 'servers',
            'singular_name' => 'Server',
            'all_items' => 'Tous les servers',
            'edit_item' => 'Éditer le servers',
            'view_item' => 'Voir le server',
            'update_item' => 'Mettre à jour le server',
            'add_new_item' => 'Ajouter un server',
            'new_item_name' => 'Nouveau server',
            'search_items' => 'Rechercher parmi les servers',
            'popular_items' => 'Servers les plus utilisées'
            ),
            'hierarchical' => true,
            'show_in_rest' => true,
            )
        );
        register_taxonomy_for_object_type( 'server', 'sedoo_inventory_app' );
    }
    add_action( 'init', 'sedoo_wppl_inventory_server_init' );
?>