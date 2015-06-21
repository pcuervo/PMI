
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
		

		</br></br></br></br>
		

		<!-- FEATURE POSTS START -->
		<?php
		$feature_args = array(
			'post_type' 		=> 'feature',
			'posts_per_page' 	=> 3,
		);
		$query_features = new WP_Query( $feature_args );
			if ( $query_features->have_posts() ) : while ( $query_features->have_posts() ) : $query_features->the_post();
				$img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
			?>
				<?php the_title() ?>
				<img src="<?php echo $img_url[0] ?>" >
		<?php endwhile; endif; wp_reset_query(); ?>
		<!-- FEATURE POSTS End -->
		

		</br></br></br></br>
		

		<!-- PRODUCTS POSTS START -->
		<?php
		$product_args = array(
			'post_type' 		=> 'product',
			'posts_per_page' 	=> 3,
		); 
		$query_products = new WP_Query( $product_args );
			if ( $query_products->have_posts() ) : while ( $query_products->have_posts() ) : $query_products->the_post();
				$img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				$weight = get_post_meta( $post->ID, '_weight_meta', TRUE );
				$indications = get_post_meta( $post->ID, '_indications_meta', TRUE );
				$ingredients = get_post_meta( $post->ID, '_ingredients_meta', TRUE );
				$portions = get_post_meta( $post->ID, '_portions_meta', TRUE );
			?>
				<?php the_title() ?>
				<?php the_content()?>
				<?php echo $weight;?>
				<?php echo $indications;?>
				<?php echo $ingredients;?>
				<?php echo $portions;?>
				<img src="<?php echo $img_url[0] ?>" >
		<?php endwhile; endif; wp_reset_query(); ?>
		<!-- PRODUCTS POSTS End -->
	
			</br></br></br></br>
		

		<!-- RECIPE POSTS START -->
		<?php
		$recipe_args = array(
			'post_type' 		=> 'recipe',
			'posts_per_page' 	=> 3,
		); 
		$query_recipe = new WP_Query( $recipe_args );
			if ( $query_recipe->have_posts() ) : while ( $query_recipe->have_posts() ) : $query_recipe->the_post();
				$img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				$songs = get_post_meta( $post->ID, 'songs', TRUE );
				
			?>
				<?php the_title() ?>
				<?php the_content()?>
				<?php 
				$c = 0;
			    if ( count( $songs ) > 0 ) {
			    	if (is_array($songs) )
					{
			        foreach( $songs as $track ) {
			            if ( isset( $track['title'] ) || isset( $track['track'] ) ) {
			                printf( '<p>Song Title <input type="text" name="songs[%1$s][title]" value="%2$s" /> -- Track number : <input type="text" name="songs[%1$s][track]" value="%3$s" /><span class="remove">%4$s</span></p>', $c, $track['title'], $track['track'], __( 'Remove Track' ) );
			                echo "Song ".$c." ".  $track['title']."   ". $track['track'] . " ". $track['percentage'];
			                $c = $c +1;
			            }
			        }
			    }
			    }
			    ?>
				
				<img src="<?php echo $img_url[0] ?>" >
		<?php endwhile; endif; wp_reset_query(); ?>
		<!-- RECIPE	 POSTS End -->
	

<?php get_footer(); ?>


