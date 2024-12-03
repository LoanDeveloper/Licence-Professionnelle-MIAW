<?php
add_action( 'wp_enqueue_scripts', 'interior_scripts' );
function interior_scripts() {
    wp_enqueue_style( 'interior-css', get_stylesheet_directory_uri(  ) . '/css/interior.css' );
    wp_enqueue_script( 'global-js', get_stylesheet_directory_uri() . '/js/global.js', null, null, true);
}


add_action('init', 'ajouter_menu');
function ajouter_menu() {
    register_nav_menu('main_menu', 'Menu principal');
}

add_theme_support( 'post-thumbnails' );