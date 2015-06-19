<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
    	<!-- INFO HOME PAGE START -->
		<?php
			$home_info_query = new WP_Query( 'pagename=info-home' );
			if ( $home_info_query->have_posts() ) : $home_info_query->the_post();
		?>
				<?php the_title()?>
				<?php the_content()?>
	    <?php
			endif;
			wp_reset_query();
		?>
    	<!-- INFO HOME PAGE END -->

		<!-- FEATURE POSTS START -->
		<?php
		$features_args = array(
			'post_type' 		=> 'feature',
			'posts_per_page' 	=> 3,
		);
		$query_events = new WP_Query( $features_args );
			if ( $query_events->have_posts() ) : while ( $query_events->have_posts() ) : $query_events->the_post();
				$img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
			?>
				<?php the_title() ?>
				<img src="<?php echo $img_url[0] ?>" >
		<?php endwhile; endif; wp_reset_query(); ?>
		<!-- FEATURE POSTS End -->



<?php get_footer(); ?>
