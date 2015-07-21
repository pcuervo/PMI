<?php
	get_header();
	the_post();

	// Product's metadata
	$text_banner      = get_post_meta( $post->ID, '_text_banner_meta', TRUE );
	$net_content      = get_post_meta( $post->ID, '_net_content_meta', TRUE );
	$product_portions = get_post_meta( $post->ID, '_product_portions_meta', TRUE );
	$indications      = rwmb_meta( '_indicaciones', '', $post->ID );
	$ingredients      = rwmb_meta( '_ingredientes', '', $post->ID );
	$img_url          = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
	// Recommended recipe
	$recommended_recipe = get_recommended_recipe( $post->post_title );
	// Similar products
	$similar_products = get_similar_products( $post->ID );
?>

	<!-- BANNER -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-6 ]">
					<h2>
						<?php the_title() ?>
					</h2>
					<p>
						<?php echo $text_banner ?>
					</p>
					<div class="[ columna xmall-12 ][ text-center ]">
						<div class="[ columna xmall-6 ]">
							<p><?php echo $net_content ?></p>
							<p>cont. net.</p>
						</div>
						<div class="[ columna xmall-6 ]">
							<p><?php echo $product_portions ?></p>
							<p>porciones</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- BANNER -->

	<!-- PRODUCT INFO -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-6 ]">
					<?php the_content() ?>
				</div>
				<div class="[ columna xmall-12 medium-6 ]">
					<?php 
					if( ! empty( $indications ) ) :
						echo '<h3>Indicaciones</h3>';
						echo '<ul>';
						foreach ( $indications as $indication ) {
							echo '<li>' . $indication . '</li>';
						}
						echo '</ul>';
					endif;

					if( ! empty( $indications ) ) :
						echo '<h3>Ingredientes</h3>';
						echo '<ul>';
						foreach ( $ingredients as $ingredient ) {
							echo '<li>' . $ingredient . '</li>';
						}
						echo '</ul>';
					endif;
					?>
				</div>
			</div>
		</div>
	</section><!-- PRODUCT INFO -->

	<!-- RECOMMENDE RECIPE -->
	<section>
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-8 ][ center ]">
					<?php if( ! empty( $recommended_recipe ) ) : ?>
						<h2 class="[ text-center ][ margin-bottom ]">Receta recomendada</h2>
						<div class="[ columna xmall-6 ][ margin-bottom--large ]">
							<div class="[ drop-shadow ]">
								<a href="<?php echo $recommended_recipe['permalink'] ?>">
									<img src="<?php echo $recommended_recipe['image_url'] ?>" class="[ image-responsive ] [ margin-bottom ]'" />
								</a>
								<div class="[ padding--small ][ bg-primary ]">
									<p class="[ post-title ] [ ]"><?php echo $recommended_recipe['title'] ?></p>
								</div>
							</div>
						</div>
						<div class="[ columna xmall-6 ][ margin-bottom--large ]">
							<div class="[ border ]">
								<div class="[ porciones ][ columna xmall-6 ]">
									<?php echo $recommended_recipe['portions'] ?>
									<i class="[ icon-portion ]"></i>
								</div>
								<div class="[ porciones ][ columna xmall-6 ]">
									<?php echo $recommended_recipe['cook_time'] ?>
									<i class="[ icon-time ]"></i>
								</div>
							</div>
							<div class="[ clear ][ margin-bottom ]"></div>
							<?php 
							if( ! empty( $recommended_recipe['ingredients'] ) ) : 
								echo '<h3>Ingredientes</h3>';
								echo '<ul>';
								foreach ( $recommended_recipe['ingredients'] as $ingredient ) : 
									echo '<li>' . $ingredient . '</li>';
								endforeach; 
								echo '</ul>';
							endif; 
							?>
							<a href="<?php echo $recommended_recipe['permalink'] ?>" class="[ button ] [ inline-block ]">leer más</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section><!-- RECOMMENDE RECIPE -->

	<!-- SIMILAR PRODUCTS -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-6 ]">
					Productos similares
				</div>
			</div>
		</div>
	</section><!-- SIMILAR PRODUCTS -->

	<div class="[ span xmall-12 medium-4 ] [ padding ]">
		<div class="[ bg-light ] [ relative ]">
			<img src="<?php echo $img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
		</div>
		<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
	</div>

<?php 
	get_footer();
?>