<?php get_header(); ?>
  
<?php while(have_posts()): the_post(); ?>
  <div class="w3-container" style="margin-top:75px">
    <h1 class="w3-xxxlarge w3-text-red"><b><?php the_title(); ?></b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <?php the_content(); ?>
  </div>
<?php endwhile; ?>


  <div class="w3-container">
  <h2 class="w3-text-red">Nos 3 dernières actualités</h1>
  </div>
  <div class="w3-row-padding">


    <?php 
    $param = array(
      'post_type' => 'post',
      'order' => 'desc',
      'orderby' => 'date',
      'posts_per_page' => 3
    );
    $the_query = new WP_Query($param);
    
    while($the_query->have_posts(  )): $the_query->the_post(); 
    ?>
    <div class="w3-col m4 w3-margin-bottom">
      <div class="w3-light-grey">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail( ); ?>
        </a>
        <div class="w3-container">
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p class="w3-opacity"><?php the_category(' - '); ?></p>
          <p><small><i>Le <?php the_time('j F Y'); ?></i></small></p>
          <p><?php the_excerpt(); ?></p>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    
    
  </div>


</div>



<?php get_footer(); ?>