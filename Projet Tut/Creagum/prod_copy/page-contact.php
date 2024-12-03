<?php get_header() ?>

<main class="main">
    <h1 class="form__title">Un projet ? Envie de sensibiliser ? Contactez-moi !</h1>

    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();

        // Include the page content template.
        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

        // Contact Form 7
        echo do_shortcode('[contact-form-7 id="04124b9" title="Formulaire de contact"]');

        // End the loop.
    endwhile;
    ?>
</main>

<?php get_footer() ?>

