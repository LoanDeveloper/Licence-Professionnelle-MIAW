<?php

function appel_css() {
    wp_enqueue_style( 'exam1-style', get_stylesheet_directory_uri() . '/css/style.css' );


    wp_enqueue_script( 'exam1-jquery', get_stylesheet_directory_uri() . '/js/jquery/jquery-2.2.4.min.js', null, null, true);
    wp_enqueue_script( 'exam1-popper', get_stylesheet_directory_uri() . '/js/bootstrap/popper.min.js', null, null, true);
    wp_enqueue_script( 'exam1-bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap/bootstrap.min.js', null, null, true);
    wp_enqueue_script( 'exam1-plugin', get_stylesheet_directory_uri() . '/js/plugins/plugins.js', null, null, true);
    wp_enqueue_script( 'exam1-active', get_stylesheet_directory_uri() . '/js/active.js', null, null, true);

}
add_action('wp_enqueue_scripts','appel_css');



add_action('init', 'ajouter_menu');
function ajouter_menu() {
    register_nav_menu('main_menu', 'Menu principal');
}


add_theme_support('post-thumbnails');

add_action( 'init', 'cpt_albums' );
function cpt_albums() {
    register_post_type( 'album',
        array(
            'labels' => array(
                'name' => 'Albums',
                'singular_name' => 'Album'
                ),
            'public' => true,
            'supports' => array('title','thumbnail','editor'),
            //'menu_icon' => 'dashicons-format-status'
            )
        );
}


if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}

add_post_type_support( 'page', 'excerpt' );