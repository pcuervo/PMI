
<?php require_once('functions.php'); ?>

<?php get_header(); ?>

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
				<!-- <img src="<?php echo $img_url[0] ?>" > -->
		<?php endwhile; endif; wp_reset_query(); ?>
		<!-- FEATURE POSTS End -->

<?php get_footer(); ?>


