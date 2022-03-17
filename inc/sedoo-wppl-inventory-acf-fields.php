<?php 

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_61d5a0a55a9ae',
        'title' => 'CPT Fields Application',
        'fields' => array(
            array(
                'key' => 'field_62013589ba78f',
                'label' => 'Informations',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_61d5a0c1d6be9',
                'label' => 'URL de l\'Application ou du Site',
                'name' => 'sedoo_inventory_url_app',
                'type' => 'url',
                'instructions' => 'Saisissez l\'url complète de l\'application ou du site internet',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'https://',
                'placeholder' => 'www.google.fr',
            ),
            array(
                'key' => 'field_61d5a0f9d6bea',
                'label' => 'URL du backoffice de l\'application ou du site',
                'name' => 'sedoo_inventory_url_backoff',
                'type' => 'url',
                'instructions' => 'Saisissez l\'URL du backoffice pour accéder à cette application',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'https://',
                'placeholder' => 'www.google.fr/backoffice',
            ),
            array(
                'key' => 'field_620265ab9a2d4',
                'label' => 'Proxy',
                'name' => 'app_proxy',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'www4' => 'www4',
                    'www5' => 'www5',
                    'www6' => 'www6',
                    'www7' => 'www7',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_61d5a15a66b15',
                'label' => 'Contact',
                'name' => 'sedoo_inventory_bidirectionnal_relation',
                'type' => 'relationship',
                'instructions' => 'Saisissez le contact en charge de la gestion du site ou de l\'application',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'sedoo_invent_contact',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                    1 => 'post_type',
                    2 => 'taxonomy',
                ),
                'elements' => array(
                    0 => 'featured_image',
                ),
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
            array(
                'key' => 'field_61d5a2ce66b17',
                'label' => 'Date de Création du Site ou de l\'Application',
                'name' => 'sedoo_inventory_date_app',
                'type' => 'date_picker',
                'instructions' => 'Saisissez la date de naissance du site ou de l\'application',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y',
                'return_format' => 'd/m/Y',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_620134b9f80d1',
                'label' => 'URL image d\'entete du site',
                'name' => 'app_feature_image_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_62013a4094833',
                'label' => 'Connectivité',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_61d5a1ac66b16',
                'label' => 'Connexion au LDAP',
                'name' => 'sedoo_inventory_ldap_connect',
                'type' => 'true_false',
                'instructions' => 'Le site ou l\'application est-il connecté au LDAP',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => 'Connecté ou LDAP',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_61d5a36066b18',
                'label' => 'Type de mot de passe',
                'name' => 'sedoo_inventory_password_app',
                'type' => 'text',
                'instructions' => 'Indiquez la méthode de mot de passe utilisée pour accéder à l\'espace d\'administration du site ou de l\'application',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_620135a9ba790',
                'label' => 'Backup',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_6201360cf80c9',
                'label' => 'repertoires sources app	(path)',
                'name' => 'app_backup_sources_path',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_620136b3f80ca',
                'label' => 'repertoires data	(path)',
                'name' => 'app_backup_data_path',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_620136c1f80cb',
                'label' => 'repertoire local backup',
                'name' => 'app_backup_repertoire_local',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_620136d5f80cc',
                'label' => 'script de backup (path)',
                'name' => 'app_backup_script',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_620137cdf80cd',
                'label' => 'Serveur de destination :',
                'name' => 'app_backup_destination',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'iris' => 'iris',
                    'twodoo' => 'twodoo',
                    'infraDSI' => 'infraDSI',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_6201389ef80ce',
                'label' => 'Fréquence',
                'name' => 'app_backup_frequence',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'tous les jours' => 'tous les jours',
                    'toutes les semaines' => 'toutes les semaines',
                    'tous les mois' => 'tous les mois',
                    'tous les 3 mois' => 'tous les 3 mois',
                    'tous les 6 mois' => 'tous les 6 mois',
                    'tous les ans' => 'tous les ans',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_62013933f80cf',
                'label' => 'Volume estimé',
                'name' => 'app_backup_volume',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_62013950f80d0',
                'label' => 'Documentation',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_62013966f80d1',
                'label' => 'URL de la documentation',
                'name' => 'app_doc_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'https://labo.obs-mip.fr/doc/',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_620139bef80d2',
                'label' => 'Fichier de doc',
                'name' => 'app_doc_fichier',
                'type' => 'url',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'sedoo_inventory_app',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
    
    acf_add_local_field_group(array(
        'key' => 'group_61d721429210e',
        'title' => 'CPT Fields Contacts',
        'fields' => array(
            array(
                'key' => 'field_61d72153b3be6',
                'label' => 'Nom',
                'name' => 'inventory_contact_name',
                'type' => 'text',
                'instructions' => 'Saisissez le nom du contact',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'FLANTIER',
                'prepend' => '',
                'append' => '',
                'maxlength' => 40,
            ),
            array(
                'key' => 'field_61d72199b3be7',
                'label' => 'Prénom',
                'name' => 'inventory_contact_first_name',
                'type' => 'text',
                'instructions' => 'Saisissez le prénom du contact',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'Noël',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_61d721d4b3be8',
                'label' => 'mail',
                'name' => 'inventory_contact_mail',
                'type' => 'email',
                'instructions' => 'Saisissez le mail du contact',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => 'flantier117@gmail.com',
                'prepend' => '',
                'append' => '',
            ),
            array(
                'key' => 'field_61d7224bb3be9',
                'label' => 'Téléphone',
                'name' => 'inventory_contact_phone',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '+33 (0)6 00 00 00 00',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_61d72296b3bea',
                'label' => 'Application',
                'name' => 'sedoo_inventory_bidirectionnal_relation',
                'type' => 'relationship',
                'instructions' => 'Saisissez la structure du contact',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'sedoo_inventory_app',
                ),
                'taxonomy' => '',
                'filters' => array(
                    0 => 'search',
                    1 => 'post_type',
                    2 => 'taxonomy',
                ),
                'elements' => '',
                'min' => '',
                'max' => '',
                'return_format' => 'object',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'sedoo_invent_contact',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
    
    endif;		
?>