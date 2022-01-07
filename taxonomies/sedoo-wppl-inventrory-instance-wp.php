<?php
    
    function sedoo_wppl_inventory_instance_init() {
    
        register_taxonomy('instance','sedoo_inventory_app', array(
            'label' => 'instances',
            'labels' => array(
            'name' => 'instances',
            'singular_name' => 'instance',
            'all_items' => 'Toutes les instances',
            'edit_item' => 'Éditer l\'instance',
            'view_item' => 'Voir l\'instance',
            'update_item' => 'Mettre à jour l\'instance',
            'add_new_item' => 'Ajouter une instance',
            'new_item_name' => 'Nouvelle instance',
            'search_items' => 'Rechercher parmi les instances',
            'popular_items' => 'Instances les plus utilisées'
            ),
            'hierarchical' => true
            )
        );
        register_taxonomy_for_object_type( 'instance', 'sedoo_inventory_app' );
    }
    add_action( 'init', 'sedoo_wppl_inventory_instance_init' );
?>