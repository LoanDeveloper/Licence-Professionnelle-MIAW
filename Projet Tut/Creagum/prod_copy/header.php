<?php

$args = array(
    'post_type' => 'page',
    'post_status' => 'draft',
    'posts_per-page' => 1,
    'tax_query' => array(
        array(
            'taxonomy' => 'parametre',
            'field' => 'slug',
            'terms' => 'parametre',
        ),
    ),
);
$queryTax = new WP_Query( $args );

/*echo '<pre>' . var_dump($queryTax) . '</pre>';*/

global $logo;
global $logo_couleur;

if ($queryTax->have_posts()) {
    while ($queryTax->have_posts()) {
        $queryTax->the_post();
        $logo = get_field('logo', $post->ID);
        $logo_couleur = get_field('logo_couleur', $post->ID);
    }

    wp_reset_postdata();
}
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin="" defer></script>
    <script src="https://kit.fontawesome.com/dc2df416ed.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <?php wp_head(); ?>
    <title>CreaGum</title>
</head>


<header class="site-header" >

    <?php
    /**
     * Functions hooked into storefront_header action
     *
     * @hooked storefront_header_container                 - 0
     * @hooked storefront_skip_links                       - 5
     * @hooked storefront_social_icons                     - 10
     * @hooked storefront_site_branding                    - 20
     * @hooked storefront_secondary_navigation             - 30
     * @hooked storefront_product_search                   - 40
     * @hooked storefront_header_container_close           - 41
     * @hooked storefront_primary_navigation_wrapper       - 42
     * @hooked storefront_primary_navigation               - 50
     * @hooked storefront_header_cart                      - 60
     * @hooked storefront_primary_navigation_wrapper_close - 68
     */
    ?>

    <nav class="menu">
        <img src="<?= $logo ?>" alt="creagum_logo" class="menu__logo">
        <section class="menu__section">
            <input class="menu__input" type="checkbox" id="icone-burger-close" />
            <label class="menu__label" for="icone-burger-close"></label>
        <?php wp_nav_menu(
            array('theme_location' => 'main_menu',
                'menu_class' => 'menu__items',
                'container' => false
            )
        ); ?>
        <?php wp_nav_menu(
            array('theme_location' => 'menu_cartaccount',
                'menu_class' => 'menu__cartaccount',
                'container' => false
            )
        ); ?>
        </section>
    </nav>
</header>

