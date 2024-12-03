<?php get_header(); ?>
  
  <div class="w3-container" id="services" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b><?php the_archive_title(); ?></b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">

    <div class="w3-row-padding w3-grayscale">
      
      <?php while(have_posts(  )): the_post(); ?>
      <div class="w3-col m4 w3-margin-bottom">
        <div class="w3-light-grey">
            <a href="<?php the_permalink(  ); ?>">
                <?php if( has_post_thumbnail( )) : ?>
                    <?php the_post_thumbnail( ); ?>
                <?php else : ?>
                    IMAGE PAR DEFAUT
                <?php endif; ?>
            </a>
            <div class="w3-container">
                <h3><a href="<?php the_permalink(  ); ?>"><?php the_title(); ?></a></h3>
                <p class="w3-opacity">
                    <?php the_category(' - '); ?>
                </p>
                <p><?php the_excerpt(); ?></p>
            </div>
        </div>
      </div>
      <?php endwhile; ?>

  </div>
</div>


<?php get_footer( ); ?>