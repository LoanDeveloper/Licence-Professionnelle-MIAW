<?php
/*
Plugin Name: Livres favoris
Plugin URI: https://ntrugeon.lpmiaw.univ-lr.fr/
Description: Ceci permet de gérer un lien favori pour les articles ou les CPT
Author: N. Trugeon
Version: 1.0
Author URI: https://ntrugeon.lpmiaw.univ-lr.fr/
*/

// gestion de l'appel ajax
add_action( 'wp_ajax_toggle_favori', 'favori' );
add_action( 'wp_ajax_nopriv_toggle_favori', 'favori' );
function favori() {
    $livreId = intval($_POST['livreId']);
    $tabFav=array();
    if (isset($_COOKIE['fav'])) :
        $tabFav=explode(';',$_COOKIE['fav']);
    endif;
    $pos=array_search("$livreId",$tabFav);
    if ($pos===false) :
        $tabFav[]=$livreId;
    else :
        unset($tabFav[$pos]);
    endif;
    setcookie('fav',implode(';',$tabFav), time() + 3600, '/');
    if ($pos===false) :
        echo json_encode(array("fav"=> "on"));
    else:
        echo json_encode(array("fav"=> "off"));
    endif;
    wp_die();
}

// gestion des css et des js
add_action('wp_enqueue_scripts', 'favori_appel_js');
function favori_appel_js() {
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style('favori_plugin', plugin_dir_url( __FILE__ ) . '/css/favori.css');
    wp_enqueue_script('ajax', plugin_dir_url( __FILE__ ) . '/js/ajax.js', array(), '1.0.0', true);
    wp_add_inline_script( 'ajax', "const ajaxurl = '" . admin_url( 'admin-ajax.php' )."'", 'before' );
}

// ajout de l'icone après le titre du livre (rouge si favori, gris sinon)
add_filter( 'the_title', 'add_link_to_title' );
function add_link_to_title( $title) {
    if (is_singular('livres') && in_the_loop()) :
        $id=get_the_ID();
        $ajout = <<<EOT
<span id="fav" data-livre="{$id}" class="dashicons dashicons-heart favori-off"></span>
EOT;
        if(isset($_COOKIE['fav'])) :
            $favs=explode(';', $_COOKIE['fav']);
            if (in_array($id,$favs)) :
                $ajout = <<<EOT
<span id="fav" data-livre="{$id}" class="dashicons dashicons-heart favori-on"></span>
EOT;
            endif;
        endif;
        $title.=$ajout;
    endif;
    return $title;
}

// activation du plugin => on ajoute une page et on sauvegarde son id comme option
register_activation_hook(__FILE__, 'add_page_favori');
function add_page_favori() {
    $page_favori = array(
        'post_title' => 'Page favori',
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page'
    );
    $id_favori=wp_insert_post($page_favori);
    add_option('page_favori_id',$id_favori);
}

// désactivation du plugin => on supprime la page et l'option
register_deactivation_hook( __FILE__, 'remove_page_favori' );
function remove_page_favori() {
    wp_delete_post(get_option('page_favori_id'));
    delete_option('page_favori_id');
}

// ajout d'une page-slug.php dans le plugin pour prise en compte dans l'affichage de la page des favoris
add_filter( 'page_template', 'insert_page_favori',99 );
function insert_page_favori($template) {
    $favoriTemplate = plugin_dir_path(__FILE__).'/page-favori.php';
    if(get_the_ID()===intval(get_option('page_favori_id'))) :
        return $favoriTemplate;
    endif;
    return $template;
}
