<?php get_header(); ?>

<main class="main">
    <header class="header">
        <video class="header__video" autoplay muted loop src="<?= the_field('video_sensibilisation'); ?>"></video>
        <h1 class="header__title"><span class="header__title--span"><?php the_title() ?></span> </h1>
    </header>

    <?php
    $paramOjectifs = array(
        'post_type' => 'objectifs',
        'order' => 'asc',
        'orderby' => 'date',
        'showposts' => 1,
    );

    $the_queryObjectifs = new WP_Query($paramOjectifs);
    while ($the_queryObjectifs->have_posts()): $the_queryObjectifs->the_post();


    /* Enlève les balises <p> généré par ACF */
    $paraobj_1 = strip_tags(get_field('paragraphe_1'), '<strong>');
    $paraobj_2 = strip_tags(get_field('paragraphe_2'), '<strong>');
    $paraobj_3 = strip_tags(get_field('paragraphe_3'), '<strong>');
    $paraobj_4 = strip_tags(get_field('paragraphe_4'), '<strong>');

    ?>

    <section class="objectifs">
        <h2 class="objectifs__title"><?php the_title(); ?></h2>
        <img src="<?= get_stylesheet_directory_uri(); ?>/img/line_mobile_sensibiliser.svg" alt="line_mobile" class="objectifs__underline">

        <div class="objectifs__img" style="background-image:url('<?php the_field('image_bandeau') ?>');"></div>

        <div class="objectifs__descriptionContainer">

            <p class="objectifs__description">
                <?= $paraobj_1 ?>
            </p>
            <p class="objectifs__description">
                <?= $paraobj_2 ?>
            </p>
            <p class="objectifs__description">
                <?= $paraobj_3 ?>
            </p>
            <p class="objectifs__description">
                <?= $paraobj_4 ?>
            </p>
        </div>
    </section>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

    <section class="items__container">

        <?php
        $paramAteliers = array(
            'post_type' => 'ateliers',
            'order' => 'asc',
            'orderby' => 'date',
        );

        $the_queryAteliers = new WP_Query($paramAteliers);
        while ($the_queryAteliers->have_posts()): $the_queryAteliers->the_post();

        /* Enlève les balises <p> généré par ACF */
        $paragraphe_1 = strip_tags(get_field('paragraphe_1'), '<strong>');
        $paragraphe_2 = strip_tags(get_field('paragraphe_2'), '<strong>');
        $paragraphe_3 = strip_tags(get_field('paragraphe_3'), '<strong>');

        ?>
        <article class="item">
            <div class="item__img" style="background-image: url('<?php the_field('image-entreprise-ecole'); ?>');">
                <h2 class="item__title"><?php the_title(); ?></h2>
            </div>
            <h3 class="item__subtitle"><?php the_field('sous-titre_1') ?></h3>
            <img src="<?= get_stylesheet_directory_uri(); ?>/img/sensibiliser_entreprise.svg" alt="Soulignement du titre" class="item__underline">
            <p class="item__text"><?= $paragraphe_1; ?>
            </p>
            <h4 class="item__text_title"><?php the_field('sous-titre_2'); ?></h4>
            <p class="item__text"><?= $paragraphe_2; ?>
            </p>
            <p class="item__text"><?= $paragraphe_3; ?>
            </p>
            <a href="/contact/" class="item__button">ME CONTACTER</a>
        </article>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

    </section>

    <?php
            $paramEvents = array(
                'post_type' => 'evenements',
                'order' => 'asc',
                'orderby' => 'date',
            );

            $the_queryEvents = new WP_Query($paramEvents); ?>

    <?php if($the_queryEvents->have_posts()) : ?>

    <section id="events" class="sensi_events">
        <h2 class="sensi_events__title">TOUS LES ÉVÈNEMENTS</h2>
        <img src="<?= get_stylesheet_directory_uri(); ?>/img/sensibiliser_events.svg" alt="Soulignement du titre" class="sensi_events__underline">
        <div class="sensi_events__container">

            <?php while ($the_queryEvents->have_posts()): $the_queryEvents->the_post(); ?>

            <article class="card_event">
                <div class="card_event__container card_event__container--<?php the_field('couleurs'); ?>">
                    <h3 class="card_event__title "><?php the_title() ?></h3>
                    <h4 class="card_event__info "><?php the_field('date') ?></h4>
                    <h5 class="card_event__info"><?php the_field('lieu') ?></h5>
                    <a href="<?php the_permalink(); ?>" class="card_event__button card_event__button--<?php the_field('couleurs'); ?>">En savoir plus</a>
                </div>
                <img class="card_event__img" src="<?php the_field('image'); ?>" alt="<?php the_title(); ?>">
            </article>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>

    <?php else : ?>

    <h2 class="sensi_events__title">TOUS LES ÉVÈNEMENTS</h2>
    <img src="<?= get_stylesheet_directory_uri(); ?>/img/sensibiliser_events.svg" alt="Soulignement du titre" class="sensi_events__underline">

    <p class="item__text" style="text-align: center; padding-bottom: 1rem;">Aucun évènement à venir</p>

    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>
