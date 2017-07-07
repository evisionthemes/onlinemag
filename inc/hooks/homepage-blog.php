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
                <div class="category-grid">
                    <div class="col-md-4">
                        <div class="card ">
                        <h3>Travell</h3>
                          <img class="card-img-top" src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/feature-post.jpg" alt="Card image cap">
                          <div class="card-block">
                            <h4 class="card-title"><a href="#">News with description</a></h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>                            
                          </div>
                           <div class="card-block">
                            <h4 class="card-title"><a href="#">News title only</a></h4>                                                     
                          </div>
                           <div class="card-block">
                            <h4 class="card-title"><a href="#">News title only</a></h4>                                                     
                          </div>
                           <div class="card-block">
                            <h4 class="card-title"><a href="#">News title only</a></h4>                                                
                          </div>
                          <div class="category-link">
                          <a href="#" class="category-more">view more </a>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card ">
                        <h3>Photography</h3>
                          <img class="card-img-top" src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/feature-post.jpg" alt="Card image cap">
                          <div class="card-block">
                            <h4 class="card-title"><a href="#">News with description</a></h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>                            
                          </div>
                           <div class="card-block">
                            <h4 class="card-title"><a href="#">News title only</a></h4>                                                     
                          </div>
                           <div class="card-block">
                            <h4 class="card-title"><a href="#">News title only</a></h4>                                                   
                          </div>
                           <div class="card-block">
                            <h4 class="card-title"><a href="#">News title only</a></h4>                                                
                          </div>
                           <div class="category-link">
                          <a href="#" class="category-more">view more </a>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card ">
                            <h3>Sports</h3>
                              <img class="card-img-top" src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/images/feature-post.jpg" alt="Card image cap">
                              <div class="card-block">
                                <h4 class="card-title"><a href="#">News with description</a></h4>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>                            
                              </div>
                               <div class="card-block">
                                <h4 class="card-title"><a href="#">News title only</a></h4>                                                     
                              </div>
                               <div class="card-block">
                                <h4 class="card-title"><a href="#">News title only</a></h4>                                                   
                              </div>
                            <div class="card-block">
                            <h4 class="card-title"><a href="#">News title only</a></h4>                                                
                          </div>
                           <div class="category-link">
                          <a href="#" class="category-more">view more </a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'onlinemag_action_front_page', 'onlinemag_home_blog', 40 );