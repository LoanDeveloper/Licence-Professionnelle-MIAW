<?php get_header(); 
 while (have_posts()) :
  the_post();?>
<h1 class="w3-xxxlarge w3-text-red">Blog</h1>
<hr style="width:50px;border:5px solid red" class="w3-round">

  <div class="w3-light-grey">
    <div class="attachment-post-thumbnail size-post-thumbnail wp-post-image"><?php the_post_thumbnail()?></div>

    <div class="w3-container">
      <h2><a href="<?php the_permalink()?>"><?php the_title()?></a></h2>
      <p><?php the_excerpt();?></p>
    </div>
  </div>


<?php endwhile;?>
<?php posts_nav_link(); ?>
<?php get_footer(); ?>