<?php get_header();
$favs=array(0);
if (isset($_COOKIE['fav'])) :
    $favs = explode(';',$_COOKIE['fav']);
endif; ?>
<h1>Gestion des livres favoris</h1>
<?php
$args = array ( 'post__in'=> $favs, 'post_type' => 'livres' );
$the_query = new WP_Query( $args );
if($the_query->have_posts()) :?>
    <h2>Livres favoris</h2>
    <ul>
    <?php while ( $the_query->have_posts() ) :
        $the_query->the_post(); ?>
        <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
    </ul>
<?php else: ?>
    <h2>Aucun livre n'est favori</h2>
<?php
endif;
wp_reset_postdata();
get_footer();
?>