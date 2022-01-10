<?php
    
    function sedoo_inventory_structure_init() {
    
        register_taxonomy('structure','sedoo_inventory_app', array(
            'label' => 'Structures',
            'labels' => array(
            'name' => 'structures',
            'singular_name' => 'Structure',
            'all_items' => 'Toutes les Structures',
            'edit_item' => 'Éditer la Structure',
            'view_item' => 'Voir la Structure',
            'update_item' => 'Mettre à jour la Structure',
            'add_new_item' => 'Ajouter une Structure',
            'new_item_name' => 'Nouvelle Structure',
            'search_items' => 'Rechercher parmi les Structures',
            'popular_items' => 'Structures les plus utilisées'
            ),
            'hierarchical' => true,
            'show_in_rest' => true,
            )
        );
        register_taxonomy_for_object_type( 'structure', 'sedoo_inventory_app' );
    }
    add_action( 'init', 'sedoo_inventory_structure_init' );
?>