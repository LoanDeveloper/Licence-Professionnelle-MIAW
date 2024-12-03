<?php get_header() ?>

<main class="main">

    <?php
    $paramMarine = array(
        'post_type' => 'description_marine',
        'order' => 'asc',
        'orderby' => 'date'
    );

    $the_queryMarine = new WP_Query($paramMarine);
    while ($the_queryMarine->have_posts()): $the_queryMarine->the_post();

        /* Enlève les balises <p> généré par ACF */
        $paragraphe_1 = strip_tags(get_field('paragraphe_1'), '<strong>');
        $paragraphe_2 = strip_tags(get_field('paragraphe_2'), '<strong>');

    ?>

    <header class="header" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')">
        <img src="<?= $logo ?>" alt="creagum_logo" class="header__img">
        <h1 class="header__title">CREAGUM</h1>
    </header>

    <section class="a_propos">

        <section class="a_propos__imgs">
            <img src="<?php the_field('photo_profil_marine_mobile') ?>" alt="marine_apropos" class="a_propos__img a_propos__imgmobile">
            <img src="<?php the_field('photo_de_profil_marine_desktop') ?>" alt="marine_apropos" class="a_propos__img a_propos__imgdesktop">
        </section>

        <section class="a_propos__titles">
            <h2 class="a_propos__title"><?php the_title(); ?></h2>
            <img src="<?= get_stylesheet_directory_uri() ?>/img/line_mobile.svg" alt="line" class="a_propos__line a_propos__linemobile">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/line_desktop.svg" alt="line" class="a_propos__line a_propos__linedesktop" >
        </section>

        <section class="a_propos__descriptions">
            <p class="a_propos__description">
                <?= $paragraphe_1 ?>
            </p>
            <p class="a_propos__description">
                <?= $paragraphe_2 ?>
            </p>

            <a href="/contact/" class="a_propos__link"><p class="a_propos__contact">Me contacter pour en savoir plus</p></a>
        </section>

    </section>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

    <section class="slider">
        <img src="<?= get_stylesheet_directory_uri(); ?>/img/slider-arrow.svg" data-slider="section" data-direction='left' alt="flèche de gauche" id="sliderArrow" class="slider__arrow slider__arrow--left">
        <img src="<?= get_stylesheet_directory_uri(); ?>/img/slider-arrow.svg" data-slider="section" data-direction="right" alt="flèche de droite" id="sliderArrow" class="slider__arrow slider__arrow--right">
        <div class="slider__container">
        <?php
        $paramSlider = array(
            'post_type' => 'slider',
            'order' => 'asc',
            'orderby' => 'date',
        );

        $the_querySlider = new WP_Query($paramSlider);
        while ($the_querySlider->have_posts()): $the_querySlider->the_post();
        ?>

            <section class="slider__item sensibilisation" style="background-image: url('<?php the_field('image') ?>');">
                <h3 class="slider__title"><?php the_title(); ?></h3>
                <a href="/<?php the_title(); ?>" class="slider__button"><?php the_field('bouton') ?></a>
            </section>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        </div>

    </section>

    <?php
                $paramEvents = array(
                    'post_type' => 'evenements',
                    'order' => 'asc',
                    'orderby' => 'date',
                    'showposts' => 3,
                );

                $the_queryEvents = new WP_Query($paramEvents); ?>

    <?php if ($the_queryEvents->have_posts()) : ?>

    <section class="events" style="background: url('<?= get_stylesheet_directory_uri() ?>/img/background_events_desktop.png'); background-size: cover; ">
        <h2 class="events__title">PROCHAINS EVENEMENTS</h2>

        <section class="recoltes">
            <section class="recoltes__items">

                <?php
                while ($the_queryEvents->have_posts()): $the_queryEvents->the_post();

                /* Enlève les balises <p> généré par ACF */
                $paragraphe_1 = strip_tags(get_field('paragraphe_1'), '<strong>');
                $paragraphe_2 = strip_tags(get_field('paragraphe_2'), '<strong>');
                $description = strip_tags(get_field('description_courte'));

                ?>
                <a class="recolte recolte--<?php the_field('couleurs') ?>" href="<?php the_permalink(); ?>">
                    <img src="<?php the_field('image') ?>" alt="plage" class="recolte__img">
                    <section class="recolte__titles">
                        <h3 class="recolte__title"><?php the_title(); ?></h3>
                        <p class="recolte__date"><?php the_field('date') ?></p>
                        <p class="recolte__lieu"><?php the_field('lieu') ?></p>
                    </section>
                    <p class="recolte__description"><?= $description ?></p>
                </a>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            </section>

            <a href="/sensibilisation/#events" class="recolte__link"><p class="recolte__button">voir tous les évènements</p></a>
        </section>

    </section>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>

    <section class="confiance">
        <h2 class="confiance__title">Ils font confiance à Creagum</h2>
        <div class="confiance__container">
            <section class="confiance__slider">


                <?php
                $paramPartenaires = array(
                    'post_type' => 'partenaires',
                    'order' => 'asc',
                    'orderby' => 'date',
                );

                $the_queryPartenaires = new WP_Query($paramPartenaires);
                while ($the_queryPartenaires->have_posts()): $the_queryPartenaires->the_post();
                ?>

                    <img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>" class="confiance__img">

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php
                $paramPartenaires = array(
                    'post_type' => 'partenaires',
                    'order' => 'asc',
                    'orderby' => 'date',
                );

                $the_queryPartenaires = new WP_Query($paramPartenaires);
                while ($the_queryPartenaires->have_posts()): $the_queryPartenaires->the_post();
                    ?>

                    <img src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>" class="confiance__img">

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            </section>
        </div>

        <?php
                $paramLivreOr = array(
                    'post_type' => 'livre_or',
                    'order' => 'asc',
                    'orderby' => 'date',
                );

                $the_queryLivreOr = new WP_Query($paramLivreOr); ?>

        <?php if ($the_queryLivreOr->have_posts()) : ?>

        <img src="<?= get_stylesheet_directory_uri() ?>/img/vertical_line.svg" alt="vertical_line" class="livre__line">
        <h2 class="livre__title">LIVRE D'OR</h2>
        <div class="livre__slider">
            <div class="livre__container">

                <?php while ($the_queryLivreOr->have_posts()): $the_queryLivreOr->the_post();

                    /* Enlève les balises <p> généré par ACF */
                $description = strip_tags(get_field('description'), '<strong>');
                ?>

                    <div class="livre__item">
                        <h4 class="livre__name"><?php the_field('nom_complet') ?></h4>
                        <p class="livre__description"><?= $description ?></p>
                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            </div>
        </div>
        <img src="<?= get_stylesheet_directory_uri() ?>/img/vertical_line2.svg" alt="vertical_line2" class="livre__line">
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

    </section>
</main>


<?php get_footer() ?>
