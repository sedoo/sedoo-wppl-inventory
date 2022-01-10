<?php
    
    function sedoo_type_de_site_init() {
    
        register_taxonomy('type_de_site','sedoo_inventory_app', array(
            'label' => 'Type de sites',
            'labels' => array(
            'name' => 'Type de site',
            'singular_name' => 'Types de site',
            'all_items' => 'Tous les types de site',
            'edit_item' => 'Éditer le type de site',
            'view_item' => 'Voir le type de site',
            'update_item' => 'Mettre à jour le type de site',
            'add_new_item' => 'Ajouter un type de site',
            'new_item_name' => 'Nouveau type de site',
            'search_items' => 'Rechercher parmi les types de site',
            'popular_items' => 'Types de site les plus utilisées'
            ),
            'hierarchical' => true,
            'show_in_rest' => true,
            )
        );
        register_taxonomy_for_object_type( 'type_de_site', 'sedoo_inventory_app' );
    }
    add_action( 'init', 'sedoo_type_de_site_init' );
?>