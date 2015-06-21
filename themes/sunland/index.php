
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
				$nutritions = get_post_meta( $post->ID, 'nutritions', TRUE );
				$nutritions_facts = get_post_meta( $post->ID, 'nutritions_facts', TRUE );
				
			?>
				<?php the_title() ?>
				<?php the_content()?>
				<!-- Get all nutrition percentage -->
				<?php 
				$c = 0;
			    if ( count( $nutritions ) > 0 ) {
			    	if (is_array($nutritions) ){
				        foreach( $nutritions as $nutrition ) {
				            if ( isset( $nutrition['name'] ) || isset( $nutrition['weight']) || isset( $nutrition['percentage'] ) ) {
				                echo "Song ".$c." ".  $nutrition['name']."   ". $nutrition['weight'] . " ". $nutrition['percentage'];
				                $c = $c +1;
				            }
				        }
				    }
			    }
			    ?>
			    </br></br></br>
				<!-- Get all nutrition facts -->
				<?php 
				$c = 0;
			    if ( count( $nutritions_facts ) > 0 ) {
			    	if (is_array($nutritions_facts) ){
				        foreach( $nutritions_facts as $nutritions_fact ) {
				            if ( isset( $nutritions_fact['name'] ) || isset( $nutritions_fact['weight']) ) {
				                echo "nutritions_facts ".$c." ".  $nutritions_fact['name']."   ". $nutritions_fact['weight'] ;
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


