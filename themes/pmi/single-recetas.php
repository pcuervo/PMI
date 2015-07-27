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

			<article class="[ xmall-12 xmedium-10 ][ center ]">
				<h2 class="[ title ][ text-center ][ padding ][ margin-bottom ]">Recetas</h2>
				<div class="[ bg-image ][ margin-bottom ][ xmall-12 xmedium-10 ][ center ]" style="background-image: url('<?php echo $img_url[0] ?>')">
					<div class="[ diagonal-green-to-blue-gradient ][ padding--large ]">
						<span class="[ block ][ padding--large ]">&nbsp;</span><br />
						<span class="[ padding--large ][ shown--large ]">&nbsp;</span><br />
						<span class="[ padding--large ][ shown--large ]">&nbsp;</span><br />
					</div>
				</div>
				<h2 class="[ text-center ][ margin-bottom ][ secondary ]">
					<?php the_title() ?>
				</h2>
			</article>

			<div class="[ gradient-border ][ diagonal-green-to-blue-gradient ][ margin-bottom ][ xmall-12 medium-6 xmedium-4 ][ center ]">
				<span class="[ block ][ bg-light ][ padding--small ]">
					<div class="[ row ]">
						<div class="[ columna xmall-6 ][ text-center ]">
							<p class="[ primary ][ no-margin ]"><?php echo $portion ?></p>
							<img class="[ svg icon icon--small ][ secondary ][ inline-block align-middle ]" src="<?php echo THEMEPATH; ?>images/porciones.svg" alt="porciones">
						</div>
						<div class="[ columna xmall-6 ][ text-center ]">
							<p class="[ primary ][ no-margin ]"><?php echo $cook_time ?></p>
							<img class="[ svg icon icon--small ][ secondary ][ inline-block align-middle ]" src="<?php echo THEMEPATH; ?>images/clock.svg" alt="time">
						</div>
					</div><!-- row -->
				</span>
			</div>

			<div class="[ row ][ margin-bottom ]">

				<div class="[ columna xmall-12 medium-7 ]">
					<?php if( ! empty( $instructions ) ) : ?>
						<div class="[ columna xmall-12 medium-6 ]">
							<h3 class="[ margin-bottom ][ secondary ]">Instrucciones</h3>
							<ul>
							<?php foreach ( $instructions as $key => $instruction ) : ?>
								<li><?php echo $key + 1 . '. ' . $instruction ; ?></li>
							<?php endforeach ?>
							</ul>
						</div>
					<?php endif; ?>

				</div>

				<div class="[ columna xmall-12 medium-5 ]">

					<div class="[ ]">
						<?php if( ! empty( $ingredients )  ) : ?>
							<h3 class="[ margin-bottom ][ secondary ]">Ingredientes</h3>
							<ul>
							<?php foreach ( $ingredients as $ingredient ) echo "<li>$ingredient</li>" ?>
							</ul>
						<?php endif; ?>
						<?php if( ! empty( $calories ) || ! empty( $fat ) || ! empty( $cholesterol ) || ! empty( $protein )  ) : ?>
							<h3 class="[ margin-bottom ][ secondary ]">Información nutrimental</h3>

							<div class="[ gradient-border ][ diagonal-green-to-blue-gradient ][ margin-bottom ]">
								<span class="[ block ][ bg-light ][ padding--small ]">
									<div class="[ row ]">
										<?php if( ! empty( $calories ) ) { ?>
											<div class="[ columna xmall-6 ]">
												<p class="[ text-center ][ primary ][ no-margin ]"><?php echo $calories ?></p>
												<p class="[ small-text text-center ][ secondary ]">calorías</p>
												<!-- <i class="[ icon-portion ]"></i> -->
											</div>
										<?php } ?>
										<?php if( ! empty( $fat ) ) { ?>
											<div class="[ columna xmall-6 ]">
												<p class="[ text-center ][ primary ][ no-margin ]"><?php echo $fat ?></p>
												<p class="[ small-text text-center ][ secondary ]">grasa</p>
												<!-- <i class="[ icon-portion ]"></i> -->
											</div>
										<?php } ?>
										<div class="[ clear ][ margin-bottom--small ]"></div>
										<?php if( ! empty( $cholesterol ) ) { ?>
											<div class="[ columna xmall-6 ]">
												<p class="[ text-center ][ primary ][ no-margin ]"><?php echo $cholesterol ?></p>
												<p class="[ small-text text-center ][ secondary ]">colesterol</p>
												<!-- <i class="[ icon-portion ]"></i> -->
											</div>
										<?php } ?>
										<?php if( ! empty( $protein ) ) { ?>
											<div class="[ columna xmall-6 ]">
												<p class="[ text-center ][ primary ][ no-margin ]"><?php echo $protein ?></p>
												<p class="[ small-text text-center ][ secondary ]">proteína</p>
												<!-- <i class="[ icon-portion ]"></i> -->
											</div>
										<?php } ?>
									</div><!-- row -->
								</span>
							</div>
						<?php endif; ?>
						<?php if( ! empty( $saturated_fat ) || ! empty( $trans_fat ) || ! empty( $sodium ) || ! empty( $carbohydrates ) || ! empty( $sugar ) || ! empty( $iron ) || ! empty( $fiber ) || ! empty( $calcium ) ) : ?>
							<h3 class="[ margin-bottom ][ secondary ]">% valor por porción</h3>
							<?php
							if( ! empty( $saturated_fat ) ) echo "<div class='[ clearfix ]'><p class='[ pull-left ][ no-margin ]'>Grasa saturada <span class='[ primary ]'>$saturated_fat g</span></p> <p class='[ pull-right ]'>$saturated_fat_percentage%</p></div>";
							if( ! empty( $trans_fat ) ) echo "<div class='[ clearfix ]'><p class='[ pull-left ][ no-margin ]'>Grasa trans <span class='[ primary ]'>$trans_fat g</span></p> <p class='[ pull-right ]'>$trans_fat_percentage%</p></div>";
							if( ! empty( $sodium ) ) echo "<div class='[ clearfix ]'><p class='[ pull-left ][ no-margin ]'>Sodio <span class='[ primary ]'>$sodium mg</span></p> <p class='[ pull-right ]'>$sodium_percentage%</p></div>";
							if( ! empty( $carbohydrates ) ) echo "<div class='[ clearfix ]'><p class='[ pull-left ][ no-margin ]'>Carbohidratos <span class='[ primary ]'>$carbohydrates g</span></p> <p class='[ pull-right ]'>$carbohydrates_percentage% </p></div>";
							if( ! empty( $sugar ) ) echo "<div class='[ clearfix ]'><p class='[ pull-left ][ no-margin ]'>Azúcares <span class='[ primary ]'>$sugar g</span></p> <p class='[ pull-right ]'>$sugar_percentage%</p></div>";
							if( ! empty( $iron ) ) echo "<div class='[ clearfix ]'><p class='[ pull-left ][ no-margin ]'>Hierro</p> <p class='[ pull-right ]'>$iron%</p></div>";
							if( ! empty( $fiber ) ) echo "<div class='[ clearfix ]'><p class='[ pull-left ][ no-margin ]'>Fibra</p> <p class='[ pull-right ]'>$fiber%</p></div>";
							if( ! empty( $calcium ) ) echo "<div class='[ clearfix ]'><p class='[ pull-left ][ no-margin ]'>Calcio</p> <p class='[ pull-right ]'>$calcium%</p></div>";
							?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section><!-- RECIPE INFO -->

<?php
	get_footer();
?>