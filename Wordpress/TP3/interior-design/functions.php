<?php

function appel_css(){
  wp_enqueue_style( 'interior', get_template_directory_uri() . '/css/interior.css' );
}

function appel_js(){
  wp_enqueue_script( 'global', get_template_directory_uri() . '/js/global.js', array(), '1.0.0', true );
}


function ajouter_menu() {
  register_nav_menu('main_menu', 'Menu principal');
}

add_theme_support( 'post-thumbnails' );

add_action('init', 'ajouter_menu');
add_action('init', 'appel_css');
add_action('init', 'appel_js');