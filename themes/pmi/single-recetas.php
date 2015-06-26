<?php
	get_header();
	the_post();

	  ///////////////////////
	 // Recipe's metadata //
	///////////////////////
	$portion                  = get_post_meta( $post->ID, '_recipe_portions_meta', TRUE );
	$cook_time                = get_post_meta( $post->ID, '_cook_time_meta', TRUE );
	$instructions             = get_post_meta( $post->ID, '_instructions_meta', TRUE );
	$recipe_ingredients       = get_post_meta( $post->ID, '_recipe_ingredients_meta', TRUE );
	
	$calories                 = get_post_meta( $post->ID, '_calories_meta', TRUE );
	$fat                      = get_post_meta( $post->ID, '_fat_meta', TRUE );
	$cholesterol              = get_post_meta( $post->ID, '_cholesterol_meta', TRUE );
	$protein                  = get_post_meta( $post->ID, '_protein_meta', TRUE );	
	/////////////////////////
	// Percentage values  //
	///////////////////////
	$saturated_fat            = get_post_meta( $post->ID, '_saturated_fat_meta', TRUE );
	$saturated_fat_percentage = get_post_meta( $post->ID, '_saturated_fat_percentage_meta', TRUE );
	$trans_fat                = get_post_meta( $post->ID, '_trans_fat_meta', TRUE );
	$trans_fat_percentage     = get_post_meta( $post->ID, '_trans_fat_percentage_meta', TRUE );
	$sodium                   = get_post_meta( $post->ID, '_sodium_meta', TRUE );
	$sodium_percentage        = get_post_meta( $post->ID, '_sodium_percentage_meta', TRUE );
	$carbohydrates            = get_post_meta( $post->ID, '_carbohydrates_meta', TRUE );
	$carbohydrates_percentage = get_post_meta( $post->ID, '_carbohydrates_percentage_meta', TRUE );
	$sugar_percentage         = get_post_meta( $post->ID, '_sugar_percentage_meta', TRUE );
	$sugar                    = get_post_meta( $post->ID, '_sugar_meta', TRUE );
	$iron                     = get_post_meta( $post->ID, '_iron_meta', TRUE );
	$fiber                    = get_post_meta( $post->ID, '_fiber_meta', TRUE );
	$calcium                  = get_post_meta( $post->ID, '_calcium_meta', TRUE );
	$img_url                  = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

?>
	<!-- BANNER -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-6 ]">
					<h2>
						<?php the_title() ?>
					</h2>
					<h3>
						<?php the_content() ?>
					</h3>
					<!-- <p>
						<?php echo $text_banner ?>
					</p> -->
					<div class="[ span xmall-12 medium-4 ] [ padding ]">
						<div class="[ bg-light ] [ relative ]">
							<img src="<?php echo $img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
						</div>
						<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
					</div>
				</div>
			</div>
		</div>
	</section><!-- BANNER -->

	

<?php 
	get_footer();
?>