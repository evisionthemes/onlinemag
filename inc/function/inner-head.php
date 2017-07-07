<?php 
/**
* Returns Header Title section for inner page.
*
* @since onlinemag 1.0.0
*/
global $post;
if (!function_exists('onlinemag_single_page_title')) :
    function onlinemag_single_page_title() { ?>
		<?php 
		global $onlinemag_customizer_all_values;
		$onlinemag_banner_image = $onlinemag_customizer_all_values['onlinemag-default-banner-image'];
		$onlinemag_header_image = '';
		if (!empty($onlinemag_banner_image)) {
			$onlinemag_header_image = 'inner-banner-image';
		}
		else{
			$onlinemag_header_image = 'inner-banner-no-image';
		} ?>
			<div class="wrapper page-inner-title">
				<div class="container">
				    <div class="row">
				        <div class="col-md-12 col-sm-12 col-xs-12">
							<header class="entry-header <?php echo esc_attr($onlinemag_header_image); ?>" style="background-image: url('<?php echo esc_url($onlinemag_banner_image); ?>')">
								<div class="inner-banner-overlay">
									<?php if (is_singular()){ ?>
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
									<?php if (! is_page() ){?>
										<header class="entry-header">
											<div class="entry-meta entry-inner">
												<?php onlinemag_posted_on(); ?>
											</div><!-- .entry-meta -->
										</header><!-- .entry-header -->
									<?php } }
									elseif (is_404()) { ?>
										<h1 class="entry-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'onlinemag' ); ?></h1>
									<?php }
									elseif (is_archive()) {
										the_archive_title( '<h1 class="entry-title">', '</h1>' );
										the_archive_description( '<div class="taxonomy-description">', '</div>' );
									}
									elseif (is_search()) { ?>
										<h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'onlinemag' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
									<?php }
									else{ ?>
									<?php }
									?>
								</div>
							</header><!-- .entry-header -->
				        </div>
				    </div>
				</div>
			</div>

		<?php 
		/**
		 * onlinemag_action_after_title hook
		 * @since onlinemag 1.0.0
		 *
		 * @hooked null
		 */
		do_action( 'onlinemag_action_after_title' );
	}
endif;
add_action( 'onlinemag-page-inner-title', 'onlinemag_single_page_title', 15 );