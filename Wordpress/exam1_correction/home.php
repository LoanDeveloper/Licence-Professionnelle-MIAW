<?php get_header(); ?>


    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Quoi de neuf ?</p>
            <h2>Nouvelles</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <?php 
                    $i = 0;
                    while(have_posts()) : the_post(); 
                        $i++;
                        // if ($i % 3) {
                        //     $classe ='right';
                        // } else if($i % 2) {
                        //     $classe = '';
                        // } else {
                        //     $classe  = 'left'; 
                        // }
                    ?>
                    <div class="single-blog-post mb-100 wow fadeInUp <?= $classe; ?>" data-wow-delay="100ms">
                        <!-- Post Thumb -->
                        <div class="blog-post-thumb mt-30">
                            <a href="<?php the_permalink(); ?>"><img src="img/bg-img/blog1.jpg" alt=""></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <span><?php the_time('d'); ?></span>
                                <span><?php the_time('M Y'); ?></span>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                            <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex mb-30">
                                <p class="post-author">Par <?php the_author(); ?></p>
                                <p class="tags"><?php the_category(', '); ?></p>
                                <p class="tags">
                                    <a href="<?php the_permalink(); ?>#comment">
                                        <?= get_comments_number(); ?> 
                                        <?php 
                                        if (get_comments_number() > 1) {
                                            echo 'Commentaires';
                                        } else {
                                            echo 'Commentaire';
                                        }
                                        ?>
                                    </a>
                                </p>
                            </div>
                            <!-- Post Excerpt -->
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>


                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>