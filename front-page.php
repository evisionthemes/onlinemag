<?php
/**
 * The template for displaying home page.
 * @package onlinemag
 */

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    }
else{
	if (
		($onlinemag_customizer_all_values['onlinemag-feature-slider-enable'] != 1 ) &&
		($onlinemag_customizer_all_values['onlinemag-blog-enable'] != 1 ) 
		) {
		if ( current_user_can( 'edit_theme_options' ) ) { ?>
			<section class="wrapper display-info">
				<div class="container">
				<?php echo sprintf(
					__( 'All Section are based on page and post. Atleast enable slider or blog Sections from customizer example for </br> slider: Home/Front Main Slider -> Setting Options -> Enable. likewise to other sections </br> %s, add widget as well on <b>Home/Front Page Widget</b>', 'onlinemag' ),
					'<a class="button" href="' . esc_url( admin_url( 'customize.php' ) ) . '">' . __( 'click here', 'onlinemag' ) . '</a>'
					); ?>
				</div>
			</section>
		<?php }	
	}
	else{
	/**
	 * onlinemag_action_front_page hook
	 * @since onlinemag 1.0.0
	 *
	 * @hooked onlinemag_action_front_page -  10
	 * @sub_hooked onlinemag_action_front_page -  30
	 */
	do_action( 'onlinemag_action_front_page' );	
	}
	}
get_footer();