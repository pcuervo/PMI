<?php
	get_header();
	the_post();

	// Recipe's metadata 
	$portion                  	= get_recipe_portion( $post->ID );
	$cook_time                	= get_post_meta( $post->ID, '_cook_time_meta', TRUE );
	$instructions             	= rwmb_meta( '_instrucciones_receta', '', $post->ID );
	$ingredients    			= rwmb_meta( '_ingredientes_receta', '', $post->ID );
	$calories                 	= get_post_meta( $post->ID, '_calories_meta', TRUE );
	$fat                      	= get_post_meta( $post->ID, '_fat_meta', TRUE );
	$cholesterol              	= get_post_meta( $post->ID, '_cholesterol_meta', TRUE );
	$protein					= get_post_meta( $post->ID, '_protein_meta', TRUE );
	// Percentage values  
	$saturated_fat            	= get_post_meta( $post->ID, '_saturated_fat_meta', TRUE );
	$saturated_fat_percentage 	= get_post_meta( $post->ID, '_saturated_fat_percentage_meta', TRUE );
	$trans_fat                	= get_post_meta( $post->ID, '_trans_fat_meta', TRUE );
	$trans_fat_percentage     	= get_post_meta( $post->ID, '_trans_fat_percentage_meta', TRUE );
	$sodium                   	= get_post_meta( $post->ID, '_sodium_meta', TRUE );
	$sodium_percentage        	= get_post_meta( $post->ID, '_sodium_percentage_meta', TRUE );
	$carbohydrates            	= get_post_meta( $post->ID, '_carbohydrates_meta', TRUE );
	$carbohydrates_percentage 	= get_post_meta( $post->ID, '_carbohydrates_percentage_meta', TRUE );
	$sugar_percentage         	= get_post_meta( $post->ID, '_sugar_percentage_meta', TRUE );
	$sugar                    	= get_post_meta( $post->ID, '_sugar_meta', TRUE );
	$iron                     	= get_post_meta( $post->ID, '_iron_meta', TRUE );
	$fiber                    	= get_post_meta( $post->ID, '_fiber_meta', TRUE );
	$calcium                  	= get_post_meta( $post->ID, '_calcium_meta', TRUE );
	$img_url                  	= wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );

?>
	<!-- RECIPE INFO -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 ]">
					<h2 class="[ title ][ text-center ][ padding ][ margin-bottom ]">Recetas</h2>
					<div class="[ bg-light ] [ relative ]">
						<img src="<?php echo $img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
					</div>
					<h3 class="[ text-center ][ padding ][ margin-bottom ]">
						<?php the_title() ?>
					</h3>
				</div>

				<div class="[ columna xmall-12 medium-8 ][ center ]">
					<div class="[ border ]">
						<div class="[ columna xmall-6 ][ text-center ]">
							<p><?php echo $portion ?></p>
							<i class="[ icon icon-portion ]"></i>
						</div>
						<div class="[ columna xmall-6 ][ text-center ]">
							<p><?php echo $cook_time ?></p>
							<i class="[ icon icon-cook-time ]"></i>
						</div>
					</div>
				</div>
				<div class="[ clear ]"></div>

				<div class="[ columna xmall-12 ][ center ]">
					<?php if( ! empty( $instructions ) ) : ?>
						<div class="[ columna xmall-12 medium-6 ]">
							<h4 class="[ padding ][ margin-bottom ]">Instrucciones</h4>
							<ul>
							<?php foreach ( $instructions as $key => $instruction ) : ?>
								<li><?php echo $key + 1 . '. ' . $instruction ; ?></li>
							<?php endforeach ?>
							</ul>
						</div>
					<?php endif; ?>

					<div class="[ columna xmall-12 medium-6 ]">
						<?php if( ! empty( $ingredients )  ) : ?>
							<h4 class="[ padding ][ margin-bottom ]">Ingredientes</h4>
							<ul>
							<?php foreach ( $ingredients as $ingredient ) echo "<li><?php echo $ingredient; ?></li>" ?>
							</ul>
						<?php endif; ?>
						<?php if( ! empty( $calories ) || ! empty( $fat ) || ! empty( $cholesterol ) || ! empty( $protein )  ) : ?>
							<h4 class="[ padding ][ margin-bottom ]">Información nutrimental</h4>
							<ul>
							<?php 
							if( ! empty( $calories ) ) echo "<li>$calories <span>calorías</span></li>";
							if( ! empty( $fat ) ) echo "<li>$fat <span>grasa</span></li>";
							if( ! empty( $cholesterol ) ) echo "<li>$cholesterol <span>colesterol</span></li>";
							if( ! empty( $protein ) ) echo "<li>$protein <span>proteína</span></li>";
							?>
							</ul>
						<?php endif; ?>
						<?php if( ! empty( $saturated_fat ) || ! empty( $trans_fat ) || ! empty( $sodium ) || ! empty( $carbohydrates ) || ! empty( $sugar ) || ! empty( $iron ) || ! empty( $fiber ) || ! empty( $calcium ) ) : ?>
							<h4 class="[ padding ][ margin-bottom ]">% valor por porción</h4>
							<ul>
								<?php
								if( ! empty( $saturated_fat ) ) echo "<li>Grasa saturada <span>$saturated_fat </span> - $saturated_fat_percentage%</li>"; 
								if( ! empty( $trans_fat ) ) echo "<li>Grasa trans <span>$trans_fat </span> - $trans_fat_percentage%</li>"; 
								if( ! empty( $sodium ) ) echo "<li>Sodio <span>$sodium </span> - $sodium_percentage%</li>"; 
								if( ! empty( $carbohydrates ) ) echo "<li>Carbohidratos <span>$carbohydrates </span> - $carbohydrates_percentage%</li>"; 
								if( ! empty( $sugar ) ) echo "<li>Azúcares <span>$sugar </span> - $sugar_percentage%</li>"; 
								if( ! empty( $iron ) ) echo "<li>Hierro <span>$iron </span></li>"; 
								if( ! empty( $fiber ) ) echo "<li>Fibra <span>$fiber </span></li>"; 
								if( ! empty( $calcium ) ) echo "<li>Calcio <span>$calcium </span></li>"; 
								?>
							</ul>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>
	</section><!-- RECIPE INFO -->

<?php 
	get_footer();
?>