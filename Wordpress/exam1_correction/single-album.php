<?php get_header(); ?>


<?php while(have_posts()) : the_post(); ?>

    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php the_post_thumbnail_url(  ); ?>);">
        <div class="bradcumbContent">
            <h2><?php the_title(); ?></h2>
        </div>
    </section>
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                    <?php
                    comments_template();
                    comment_form();
                    ?>
                </div>
            </div>
        </div>
    </div>


<?php endwhile; ?>


<?php get_footer(); ?>