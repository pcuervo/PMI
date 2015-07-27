<?php
	get_header();
	the_post();

	// Product's metadata
	$text_banner 			= get_post_meta( $post->ID, '_text_banner_meta', TRUE );
	$net_content 			= get_post_meta( $post->ID, '_net_content_meta', TRUE );
	$product_portions 		= get_post_meta( $post->ID, '_product_portions_meta', TRUE );
	$indications 			= rwmb_meta( '_indicaciones', '', $post->ID );
	$ingredients 			= rwmb_meta( '_ingredientes', '', $post->ID );
	$product_img_url 		= wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
	$product_bg_img_url 	= MultiPostThumbnails::get_post_thumbnail_url( get_post_type(), 'product-background', $post->ID, 'large', array('class' => '[ image-responsive ]'));

	// Recommended recipe
	$recommended_recipe = get_recommended_recipe( $post->post_title );
	// Similar products
	$similar_products = get_similar_products( $post->ID );
?>

	<!-- BANNER -->
	<section class="[]">
		<div class="[ hidden--xmedium ]">
			<div class="[ bg-image ][ margin-bottom ]" style="background-image: url('<?php echo $product_bg_img_url; ?>')">
				<div class="[ wrapper ]">
					<img class="[ block center ][ xmall-12 small-8 medium-6 xmedium-4 ][ padding--large ]" src="<?php echo $product_img_url[0] ?>">
				</div><!-- wrapper -->
			</div>
			<div class="[ wrapper ]">
				<h2 class="[ uppercase ]"> <?php the_title() ?> </h2>
				<p class="[ margin-bottom ]"> <?php echo $text_banner ?> </p>

				<div class="[ gradient-border ][ diagonal-green-to-blue-gradient ][ margin-bottom ]">
					<span class="[ block ][ bg-light ][ padding--small ]">
						<div class="[ row ]">
							<div class="[ columna xmall-6 ]">
								<p class="[ text-center ][ primary ][ no-margin ]"><?php echo $net_content ?></p>
								<p class="[ small-text text-center ][ secondary ]">cont. net.</p>
							</div>
							<div class="[ columna xmall-6 ]">
								<p class="[ text-center ][ primary ][ no-margin ]"><?php echo $product_portions ?></p>
								<p class="[ small-text text-center ][ secondary ]">porciones</p>
							</div>
						</div><!-- row -->
					</span>
				</div>
			</div><!-- wrapper -->
		</div><!-- hidden-large -->

		<div class="[ shown--xmedium ]">
			<div class="[ bg-image ][ margin-bottom ]" style="background-image: url('<?php echo $product_bg_img_url; ?>')">
				<div class="[ diagonal-light-blue-to-transparecy ]">
					<div class="[ wrapper ]">
						<div class="[ row ][ padding ]">
							<div class="[ columna xmall-6 ]">
								<h2 class="[ light ][ margin-bottom ]"> <?php the_title() ?></h2>
								<p class="[ light ][ margin-bottom ]"> <?php echo $text_banner ?></p>
								<div class="[ border-light ][ xmall-6 ]">
									<div class="[ row ][ padding--small ]">
										<div class="[ columna xmall-6 ]">
											<p class="[ text-center ][ light ][ no-margin ]"><?php echo $net_content ?></p>
											<p class="[ small-text text-center ][ light ]">cont. net.</p>
										</div>
										<div class="[ columna xmall-6 ]">
											<p class="[ text-center ][ light ][ no-margin ]"><?php echo $product_portions ?></p>
											<p class="[ small-text text-center ][ light ]">porciones</p>
										</div>
									</div>
								</div><!-- row -->
							</div>
							<div class="[ columna xmall-6 ]">
								<img class="[ block center ][ xmedium-10 ][ padding--large ]" src="<?php echo $product_img_url[0] ?>">
							</div>
						</div><!-- row -->
					</div><!-- wrapper -->
				</div>
			</div>
		</div><!-- shown-large -->
	</section><!-- BANNER -->

	<!-- PRODUCT INFO -->
	<section class="[ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 xmedium-6 ][ margin-bottom ]">
					<?php the_content() ?>
				</div>
				<div class="[ columna xmall-12 xmedium-6 ]">
					<?php
					if( ! empty( $indications ) ) :
						echo '<h3 class="[ secondary ][ no-margin ]">Indicaciones</h3>';
						echo '<ul>';
						foreach ( $indications as $indication ) {
							echo '<li>' . $indication . '</li>';
						}
						echo '</ul>';
					endif;

					if( ! empty( $ingredients ) ) :
						echo '<h3 class="[ secondary ][ no-margin ]">Ingredientes</h3>';
						echo '<ul>';
						foreach ( $ingredients as $ingredient ) {
							echo '<li>' . $ingredient . '</li>';
						}
						echo '</ul>';
					endif;
					?>
				</div>
			</div><!-- row -->
		</div>
	</section><!-- PRODUCT INFO -->

	<!-- RECOMMENDED RECIPE -->
	<?php if( ! empty( $recommended_recipe ) ) : ?>
		<section>
			<div class="[ wrapper ]">
				<h2 class="[ title ][ text-center ][ margin-bottom ][ uppercase ]">Receta recomendada</h2>

				<div class="[ center xmedium-8 ]">
					<div class="[ row ]">

						<div class="[ columna xmall-12 medium-6 ][ margin-bottom ]">
							<div class="[ drop-shadow ]">
								<a href="<?php echo $recommended_recipe['permalink'] ?>">
									<img src="<?php echo $recommended_recipe['image_url'] ?>" class="[ image-responsive ]'" />
								</a>
								<div class="[ padding--small ][ bg-primary ]">
									<p class="[ post-title ] [ ]"><?php echo $recommended_recipe['title'] ?></p>
								</div>
							</div>
						</div>

						<div class="[ columna xmall-12 medium-6 ][ margin-bottom--small ]">
							<div class="[ gradient-border ][ diagonal-green-to-blue-gradient ][ margin-bottom ]">
								<span class="[ block ][ bg-light ][ padding--small ]">
									<div class="[ row ]">
										<div class="[ columna xmall-6 ][ text-center ]">
											<p class="[ primary ][ no-margin ]"><?php echo $recommended_recipe['portions'] ?></p>
											<img class="[ svg icon icon--small ][ secondary ][ inline-block align-middle ]" src="<?php echo THEMEPATH; ?>images/porciones.svg" alt="porciones">
										</div>
										<div class="[ columna xmall-6 ][ text-center ]">
											<p class="[ primary ][ no-margin ]"><?php echo $recommended_recipe['cook_time'] ?></p>
											<img class="[ svg icon icon--small ][ secondary ][ inline-block align-middle ]" src="<?php echo THEMEPATH; ?>images/clock.svg" alt="time">
										</div>
									</div><!-- row -->
								</span>
							</div>

							<div class="[ margin-bottom ]">
								<?php if( ! empty( $recommended_recipe['ingredients'] ) ) :
									echo '<h3 class="[ secondary ][ no-margin ]">Ingredientes</h3>';
									echo '<ul>';
									foreach ( $recommended_recipe['ingredients'] as $ingredient ) {
										echo '<li>' . $ingredient . '</li>';
									}
									echo '</ul>';
								endif; ?>
							</div>
						</div>
						<div class="[ clear ]"></div>
						<div class="[ margin-bottom--large ][ text-center ]">
							<a href="<?php echo $recommended_recipe['permalink'] ?>" class="[ button ]">
								leer más
							</a>
						</div>

					</div><!-- row -->
				</div><!-- center xmall-8 -->
			</div><!-- wrapper -->
		</section><!-- RECOMMENDED RECIPE -->
	<?php endif; ?>

	<!-- SIMILAR PRODUCTS -->
	<?php if( ! empty( $similar_products ) ) : ?>
		<section class="[ margin-bottom--large ]">
			<div class="[ wrapper ]">
				<h2 class="[ title ][ text-center ][ margin-bottom ][ uppercase ]">Productos similares</h2>
				<div class="[ row ]">
					<?php foreach ( $similar_products as $product ) : ?>
						<div class="[ post ][ columna xmall-6 xmedium-3 ][ margin-bottom--large ]">
							<div class="[ drop-shadow ]">
								<a href="<?php echo $product['permalink'] ?>">
									<img src="<?php echo $product['img_url'][0] ?>" alt="<?php echo $product['title'] ?>" class="[ image-responsive ]">
									<div class="[ padding--small ][ bg-primary ]">
										<p class="[ post-title ][ ]"><?php echo $product['title'] ?></p>
									</div>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</section><!-- SIMILAR PRODUCTS -->
	<?php endif; ?>

<?php
	get_footer();
?>