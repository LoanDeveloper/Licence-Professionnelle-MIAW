<?php


/* STYLE RESET THEME PARENT */
/*
wp_dequeue_style( 'storefront-style' );
wp_dequeue_style( 'storefront-woocommerce-style' );*/

add_action( 'wp_enqueue_scripts', function() {

    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );

}, 999 );




// MENUS

add_action('init', 'ajouter_menus');
function ajouter_menus() {

    /* Menus */

    register_nav_menus( array(
        'main_menu' => 'Menu principal CreaGum',
        'menu_cartaccount' => 'Menu Compte Panier'
    ) );

}





// CSS ET JS

function wpdocs_creagum_scripts() {

    // CSS
    wp_enqueue_style( 'creagum_css', get_stylesheet_directory_uri() . '/css/styles.css' );


    // JS

    wp_enqueue_script( 'creagum_js', get_stylesheet_directory_uri() . '/scripts/slider.js',
        array(), '1.0.0', true );

    /*wp_enqueue_script( 'creagum_js', get_stylesheet_directory_uri() . '/scripts/script.js',
        array(), '1.0.0', true );*/
}

add_action( 'wp_enqueue_scripts', 'wpdocs_creagum_scripts' );





// ACF

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}


// Image à la une

add_theme_support( 'post-thumbnails' );



// CUSTOM POST TYPE


add_action( 'init', 'create_post_type' );
function create_post_type() {


    // DESCRIPTION MARINE ACCUEIL

    register_post_type( 'description_marine',
        array(
            'label' => 'Accueil - A propos',
            'public' => true,
            'supports' => array('title', 'thumbnail', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Description', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Description', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Accueil - Description', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter une description', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter une description', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter une nouvelle description', 'textdomain' ),
                'search_items'          => __( 'Rechercher une description', 'textdomain' ),
                'edit_item'             => __( 'Modifier description', 'textdomain' ),
                'view_item'             => __( 'Voir description', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-admin-users',
        )
    );



    // SLIDER

    register_post_type( 'slider',
        array(
            'label' => 'Accueil - Slider',
            'public' => true,
            'supports' => array('title', 'editor', 'excerpt'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Slider', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Slider', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Accueil - Slider', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter une slide', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter une slide', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter une nouvelle slide', 'textdomain' ),
                'search_items'          => __( 'Rechercher une slide', 'textdomain' ),
                'edit_item'             => __( 'Modifier une slide', 'textdomain' ),
                'view_item'             => __( 'Voir une slide', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-admin-page'
        )
    );

    // EVENTS

    register_post_type( 'evenements',
        array(
            'label' => "Accueil - Évènements",
            'public' => true,
            'supports' => array('title', 'excerpt', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Évènements', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Évènement', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Accueil - Évènements', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter un évènement', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter un évènement', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter un nouvel évènement', 'textdomain' ),
                'search_items'          => __( 'Rechercher un évènement', 'textdomain' ),
                'edit_item'             => __( 'Modifier un évènement', 'textdomain' ),
                'view_item'             => __( 'Voir évènement', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-calendar-alt'
        )
    );


    // PARTENAIRES

    register_post_type( 'partenaires',
        array(
            'label' => 'Accueil - Partenaires',
            'public' => true,
            'supports' => array('title', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Partenaires', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Partenaire', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Accueil - Partenaires', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter un partenaire', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter un partenaire', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter un nouveau partenaire', 'textdomain' ),
                'search_items'          => __( 'Rechercher un partenaire', 'textdomain' ),
                'edit_item'             => __( 'Modifier un partenaire', 'textdomain' ),
                'view_item'             => __( 'Voir partenaire', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-businessman'
        )
    );

    // LIVRE D'OR

    register_post_type( 'livre_or',
        array(
            'label' => "Accueil - Livre d'or",
            'public' => true,
            'supports' => array('title', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Avis', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Avis', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Accueil - Livre Avis', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter un avis', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter un avis', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter un nouvel avis', 'textdomain' ),
                'search_items'          => __( 'Rechercher un avis', 'textdomain' ),
                'edit_item'             => __( 'Modifier un avis', 'textdomain' ),
                'view_item'             => __( 'Voir avis', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-admin-comments'
        )
    );

    // RESEAUX SOCIAUX

    register_post_type( 'reseaux_sociaux',
        array(
            'label' => "Footer - Réseaux Sociaux",
            'public' => true,
            'supports' => array('title', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Résaux sociaux', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Réseau social', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Footer - Réseaux Sociaux', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter un réseau social', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter un réseau social', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter un nouveau réseau social', 'textdomain' ),
                'search_items'          => __( 'Rechercher un réseau social', 'textdomain' ),
                'edit_item'             => __( 'Modifier un réseau social', 'textdomain' ),
                'view_item'             => __( 'Voir réseau social', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-share'
        )
    );

    // SENSIBILISATION OBJECTIFS

    register_post_type( 'objectifs',
        array(
            'label' => "Sensibilisation - Objectifs",
            'public' => true,
            'supports' => array('title', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Objectifs', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Objectif', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Sensibilisation - Objectifs', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter un objectif', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter un objectif', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter un nouvel objectif', 'textdomain' ),
                'search_items'          => __( 'Rechercher un objectif', 'textdomain' ),
                'edit_item'             => __( 'Modifier un objectif', 'textdomain' ),
                'view_item'             => __( 'Voir objectif', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-star-filled'
        )
    );

    // SENSIBILISATION ENTREPRISE/ECOLE

    register_post_type( 'ateliers',
        array(
            'label' => "Sensibilisation - Ateliers",
            'public' => true,
            'supports' => array('title', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Ateliers', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Atelier', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Sensibilisation - Ateliers', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter un atelier', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter un atelier', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter un nouvel atelier', 'textdomain' ),
                'search_items'          => __( 'Rechercher un atelier', 'textdomain' ),
                'edit_item'             => __( 'Modifier un atelier', 'textdomain' ),
                'view_item'             => __( 'Voir atelier', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-welcome-learn-more'
        )
    );

    // Recyclage

    register_post_type( 'recyclage',
        array(
            'label' => "Collecte - Recyclage",
            'public' => true,
            'supports' => array('title', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Recyclage', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Recyclage', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Collecte - Recyclage', 'Admin Menu text', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-admin-site'
        )
    );

    // MAP

    register_post_type( 'map',
        array(
            'label' => "Collecte - Carte",
            'public' => true,
            'supports' => array('title', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Marqueurs', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Marqueur', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Collecte - Carte', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter un marqueur', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter un marqueur', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter un nouveau marqueur', 'textdomain' ),
                'search_items'          => __( 'Rechercher un marqueur', 'textdomain' ),
                'edit_item'             => __( 'Modifier un marqueur', 'textdomain' ),
                'view_item'             => __( 'Voir marqueur', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-location-alt'
        )
    );

    // Contact

    register_post_type( 'contact',
        array(
            'label' => "Footer - Contact",
            'public' => true,
            'supports' => array('title', 'editor'),
            'show_in_rest' => true,
            'labels' => array(
                'name'                  => _x( 'Contacts', 'Post type general name', 'textdomain' ),
                'singular_name'         => _x( 'Contact', 'Post type singular name', 'textdomain' ),
                'menu_name'             => _x( 'Footer - Contact', 'Admin Menu text', 'textdomain' ),
                'name_admin_bar'        => _x( 'Ajouter un contact', 'Add New on Toolbar', 'textdomain' ),
                'add_new'               => __( 'Ajouter un contact', 'textdomain' ),
                'add_new_item'          => __( 'Ajouter un nouveau contact', 'textdomain' ),
                'search_items'          => __( 'Rechercher un contact', 'textdomain' ),
                'edit_item'             => __( 'Modifier un contact', 'textdomain' ),
                'view_item'             => __( 'Voir contact', 'textdomain' ),
                'set_featured_image'    => _x( 'Modifier image de fond', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'remove_featured_image' => _x( 'Supprimer image de fond', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
                'use_featured_image'    => _x( 'Utiliser comme image de fond', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            ),
            'menu_icon' => 'dashicons-phone'
        )
    );
}

// Création de la table creagum_events dans la base de données
/*function create_custom_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'creagum_events';

    // Requête de création de la table avec les colonnes appropriées
    $sql = "CREATE TABLE if not exists $table_name (
      id INT NOT NULL AUTO_INCREMENT,
      nom VARCHAR(50) NOT NULL,
      prenom VARCHAR(50) NOT NULL,
      mail VARCHAR(50),
      idEvent INT(5) NOT NULL,
      PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

    // Inclure le fichier nécessaire pour la fonction dbDelta
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    // Exécuter la requête de création de table avec dbDelta
    dbDelta($sql);
}

// Appeler la fonction de création de table
add_action('switch_theme' , 'create_custom_table');*/