<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package onlinemag
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single');

			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="post-navi" aria-hidden="true">' . __( 'NEXT POST', 'onlinemag' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'onlinemag' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="post-navi" aria-hidden="true">' . __( 'PREVIOUS POST', 'onlinemag' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'onlinemag' ) . '</span> ' .
					'<span class="post-title">%title</span>',

			) );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<?php 
		function sudip_get_share_count($network,$url){
		$count = 0;
		switch($network){
			case 'facebook':
				$response = wp_remote_get('https://api.facebook.com/method/links.getStats?urls=' . $url . '&format=json');
				if( isset($response) && !isset($response->errors) ){
					$response_data = json_decode($response['body'],true);
					$count = isset( $response_data[0]['total_count'] ) ? intval( $response_data[0]['total_count'] ) : 0;
				}
			break;

			case 'twitter':
				/* No share count for twitter */
				$count = 0;
			break;

			case 'linkedin':
				$response = wp_remote_get('http://www.linkedin.com/countserv/count/share?url='.$url.'&format=json');
				if( isset($response) && !isset($response->errors) ){
					$response_data = json_decode($response['body']);
					$count = isset($response_data->count)?$response_data->count:0;
				}
			break;

			case 'gplus':
				$args = array(
				    'method'    => 'POST',
				    'body'      => '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"'.rawurldecode($url).'","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]',
				    'headers' => array('Content-Type' => 'application/json')
				);
				$response = wp_remote_request('https://clients6.google.com/rpc', $args );
				if( isset($response) && !isset($response->errors) ){
					$response_data = json_decode($response['body'],true);
					$count = isset( $response_data[0]['result']['metadata']['globalCounts']['count'] ) ? intval( $response_data[0]['result']['metadata']['globalCounts']['count'] ) : 0;
					
				}
			break;

			case 'digg':
				/* No share count for digg */
				$count = 0;
			break;

			case 'pinterest':
				$response = wp_remote_get('http://widgets.pinterest.com/v1/urls/count.json?source=6&url='.$url);
				if( isset($response) && !isset($response->errors) ){
					$json_string 	= $response['body'];
					$json_string	= preg_replace( '/^receiveCount\((.*)\)$/', "\\1", $json_string );
					$response_data  = json_decode( $json_string );
					$count = isset($response_data->count)?$response_data->count:0;
				}	
			break;

			default:
				$count = 0;
		}

		return $count;
	}
		?>
		<ul>
			
			<li>
				<a class="wpas-social wpas-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink();?>">
					<span class="sharetitle">SHARE</span>
				</a>
				<div class="tooltip">
			 		<span class="count"><?php echo sudip_get_share_count( 'facebok', get_permalink() );?></span>
			 	</div>
			 </li>

			<li>
				<a class="wpas-social wpas-twitter" href="https://twitter.com/home?status=<?php echo get_permalink();?>">
					<span class="sharetitle">TWEET</span>
				</a>
				<div class="tooltip"></div>
			</li>

			<li><a class="wpas-social wpas-google-plus" href="https://plus.google.com/share?url=<?php echo get_permalink();?>" alt="social button">
				<span class="sharetitle">SHARE</span></a> <div class="tooltip">
				<span class="sharetitle">SHARE</span> 
				<span class="count">0</span></div>
			</li>

			<li><a class="wpas-social wpas-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink();?>&title=<?php the_title();?>" alt="social button">
				<span class="sharetitle">SHARE</span></a>
				<div class="tooltip"> <span class="count">0</span></div>
			</li>

			<li><a class="wpas-social wpas-digg" href="https://digg.com/submit?url=<?php echo get_permalink();?>&title=<?php the_title();?>" alt="social button"> <span class="sharetitle">SHARE</span></a>
				<div class="tooltip"></div>
			</li>

			<li><a class="wpas-social wpas-pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink();?>&media=&description=" alt="social button"><span class="sharetitle">SHARE</span></a>
				<div class="tooltip"> <span class="count">0</span></div>
			</li>

		</ul>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
