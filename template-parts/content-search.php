<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package onlinemag
 */

?>
<div class="wrapper page-inner-title">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12 col-sm-12 col-xs-12">
				<header class="entry-header">
					<div class="inner-banner-overlay">
						<?php 
						/**
						 * onlinemag_action_after_title hook
						 * @since onlinemag 1.0.0
						 *
						 * @hooked null
						 */
						do_action( 'onlinemag_action_after_title' );
						?>
						<h1 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'onlinemag' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</div>
				</header><!-- .entry-header -->
	        </div>
	    </div>
	</div>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="wrapper-grid">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php onlinemag_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php onlinemag_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->
