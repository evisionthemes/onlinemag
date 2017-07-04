<?php
if ( ! function_exists( 'onlinemag_home_blog' ) ) :
    /**
     * Blog Section
     *
     * @since onlinemag 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function onlinemag_home_blog() {
        global $onlinemag_customizer_all_values;
        
        $onlinemag_home_blog_category = esc_attr($onlinemag_customizer_all_values['onlinemag-blog-category']);
        $onlinemag_home_blog_number = absint($onlinemag_customizer_all_values['onlinemag-blog-number']);
        if( 1 != $onlinemag_customizer_all_values['onlinemag-blog-enable'] ){
            return null;
        }
        ?>

        <!-- carrousel slider section -->
        <section class="wrapper wrap-below-banner">
            <div class="container">
                <div class="row carousel-group">
                    <?php $onlinemag_blog_args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $onlinemag_home_blog_number,
                        'cat'           => $onlinemag_home_blog_category,
                        'ignore_sticky_posts' => 1,
                    );
                    $onlinemag_home_blog_post_query = new WP_Query($onlinemag_blog_args);
                    if ($onlinemag_home_blog_post_query->have_posts()) :
                        while ($onlinemag_home_blog_post_query->have_posts()) : $onlinemag_home_blog_post_query->the_post();
                            if(has_post_thumbnail()){
                                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'onlinemag-carsol-slider' );
                                $url = $thumb['0'];
                            }
                            else{
                                $url = get_template_directory_uri().'/assets/images/below-banner-post.jpg';
                            }
                            ?>
                            <div class="col-xs-12 col-sm-6 col-md-3">
                                <div class="thumb-post">
                                    <figure class="post-img">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo esc_url($url); ?>" alt="post">
                                    </a>
                                    </figure>
                                    <div class="overlay-post-content">
                                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title( ); ?> </a></h3>
                                        <div class="post-icons">
                                            <span>
                                                <?php 
                                                $author_name   = get_the_author();
                                                $author_url   = get_author_posts_url( get_the_author_meta( 'ID' ) );?>
                                                <a href="<?php echo esc_url($author_url); ?>" class="icon" title=""><i class="fa fa-user"></i><span><?php echo esc_html($author_name ); ?></span></a>
                                            </span>
                                            <span>
                                                <?php 
                                                $archive_year   = get_the_time('Y');
                                                ?>
                                                <a href="<?php echo esc_url(get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d') )); ?>" class="icon"><i class="fa fa-calendar"></i> <?php echo esc_html(get_the_date('M j, Y'));?></a>
                                            </span>
                                            <span>
                                                <a href="<?php the_permalink(); ?>" class="icon">
                                                    <i class="fa fa-comment"></i> 
                                                    <?php
                                                        $commentscount = get_comments_number();
                                                        if($commentscount == 1): $commenttext = ''; endif;
                                                        if($commentscount > 1 || $commentscount == 0): $commenttext = ''; endif;
                                                        echo (esc_html($commentscount).' '.(esc_html($commenttext)));
                                                    ?>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; 
                        wp_reset_postdata();
                    endif; ?>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'onlinemag_action_front_page', 'onlinemag_home_blog', 40 );