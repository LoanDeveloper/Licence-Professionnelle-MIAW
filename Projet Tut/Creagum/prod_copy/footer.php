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

<footer class="footer">
    <section class="footer__logos">
        <img src="<?= $logo ?>" alt="creagum_logo" class="footer__logo">
        <h2 class="footer__title">CREAGUM</h2>
    </section>


    <?php
    $paramContact = array(
        'post_type' => 'contact',
        'order' => 'asc',
        'orderby' => 'date',
        'showposts' => 1,
    );

    $the_queryContact = new WP_Query($paramContact);
    while ($the_queryContact->have_posts()): $the_queryContact->the_post();

    ?>

    <div class="footer__marine">
        <h3 class="footer__subtitle">Marine Guilbaud :</h3>
        <section class="footer__tels">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/logo_telephone.svg" alt="logo_telephone" class="footer__tel">
            <a class="footer__num" href="tel:+33<?php the_field('numero_de_telephone'); ?>">0<?php the_field('numero_de_telephone'); ?></a>
        </section>
        <section class="footer__mails">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/logo_mail.svg" alt="logo_mail" class="footer__enveloppe">
            <a href="/contact/" class="footer__mail">Contactez moi par mail !</a>
        </section>
    </div>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

    <div class="footer__connect">
        <h3 class="footer__subtitle">Restons Connectés !</h3>
        <section class="footer__links">

            <?php
            $paramReseaux = array(
                'post_type' => 'reseaux_sociaux',
                'order' => 'asc',
                'orderby' => 'date',
            );

            $the_queryReseaux = new WP_Query($paramReseaux);
            while ($the_queryReseaux->have_posts()): $the_queryReseaux->the_post();

            ?>

            <a href="<?php the_field('lien'); ?>" target="_blank" class="footer__link"><img src="<?php the_field('logo') ?>" alt="facebook"></a>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

           <!-- <a href="https://www.instagram.com/creagum/" class="footer__link"><img src="<?php /*= get_stylesheet_directory_uri() */?>/img/instagram.svg" alt="instagram"></a>
            <a href="https://fr.linkedin.com/company/creagum" class="footer__link"><img src="<?php /*= get_stylesheet_directory_uri() */?>/img/linkedin.svg" alt="linkedin"></a>
            <a href="https://www.youtube.com/" class="footer__link"><img src="<?php /*= get_stylesheet_directory_uri() */?>/img/youtube.svg" alt="youtube"></a>-->
        </section>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>