<?php get_header(); 
 while (have_posts()) :
  the_post();?>

<h2 class="w3-xxxlarge w3-text-red"><?php the_title()?></h2>
<hr style="width:50px;border:5px solid red" class="w3-round">
<p><?php the_content();?></p>

<?php endwhile;?>

<?php get_footer(); ?>