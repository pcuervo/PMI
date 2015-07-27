<?php
	get_header();
?>
	<!-- PRODUCTS -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ columna xmall-12 medium-8 ][ center ][ margin-bottom ]">
				<h2 class="[ title ][ text-center ][ padding ][ margin-bottom ]">Productos</h2>
				<p>Quid sequatur, quid repugnet, vident. Si alia sentit, inquam, alia loquitur, numquam intellegam quid sentiat; Quis enim potest ea, quae probabilia videantur ei, non probare? Compensabatur, inquit, cum summis doloribus laetitia. </p>
			</div>

			<article class="[ margin-bottom ]">
				<div class="[ row ][ shown--large ]">
					<?php
						// Show all brands that have products assigned
						$args = array(
							'orderby'		=> 'slug',
							'hide_empty'	=> true
						);
						$brands = get_terms( 'marcas', $args );
						foreach( $brands as $brand ) { ?>
							<div class="[ post ][ columna xmall-1-5 ][ margin-bottom--large ][ js-anchor ]" data-anchor="<?php echo $brand->slug; ?>">
								<div class="[ drop-shadow ]">
									<div class="[ padding--small ][ bg-primary ]">
										<p class="[ post-title ][ text-center ]"><?php echo $brand->name; ?></p>
									</div>
									<a href="#<?php echo $brand->slug ?>">
										<?php get_brand_product_image($brand->name); ?>
									</a>
								</div>
							</div>
						<?php }
					?>
				</div><!-- row shown-large -->

				<div class="[ hidden--large ][ text-center ]">
					<?php
						foreach( $brands as $brand ) { ?>
							<button class="[ button button--hollow ][ diagonal-green-to-blue-gradient ][ margin-bottom--small margin-sides--small ][ js-anchor ]" data-anchor="<?php echo $brand->slug; ?>">
								<span class="[ block ][ bg-light ]">
									<?php echo $brand->name; ?>
								</span>
							</button>
						<?php }
					?>
				</div><!-- hidden-large -->
			</article>

			<a class="[ secondary ][ block ][ margin-bottom ]" href="#"><i class="[ xmall-12 ][ fa fa-angle-double-down fa-3x ][ text-center ]"></i></a>

		</div><!-- wrapper -->

		<article class="[ row ]">

			<?php
			// Get products by brand
			$counter = 1;
			foreach( $brands as $brand ) :
				$brand_logo_url = get_brand_logo( $brand->name );
				$products = get_products_by_brand( $brand->name );
			?>
				<section class="[ margin-bottom ][ section-<?php echo $brand->slug ?> ]">
					<img class="[ block center ][ xmall-4 medium-3 xmedium-2 ][ margin-bottom ]" src='<?php echo $brand_logo_url ?>' alt='<?php echo $brand->name ?>'>

					<div class="[ hidden--large ]">
						<div class="[ product-images ]">
							<div class="[ overflow-holder ]">
								<?php
									// Display products by brand
									foreach ( $products as $key => $product ) :
								?>
									<div class="[ post ][ inline-block align-middle ]">
										<div class="[ drop-shadow ]">
											<a href="<?php echo $product['permalink'] ?>">
												<img src="<?php echo $product['image_url'] ?>" class="[ image-responsive ]">
											</a>
											<div class="[ bg-primary ]">
												<p class="[ post-title ] [ ]">
													<a class="[ block ][ padding--small ]" href="<?php echo $product['permalink'] ?>">
														<?php echo $product['title'] ?>
													</a>
												</p>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div><!-- overflow-holder -->
						</div><!-- product-images -->
					</div><!-- hidden-large -->

					<div class="[ shown--large ][ tinycarousel-slider ]" id="slider<?php echo $counter; ?>">
						<a class="buttons prev" href="#">
							<i class="[ fa fa-angle-double-left ]"></i>
						</a>
						<div class="[ viewport ]">
							<ul class="[ overview ][ product-images ]">
							<?php
								// Display products by brand
								foreach ( $products as $key => $product ) :

							?>
								<li class="[ post ][ inline-block align-middle ]">
									<div class="[ drop-shadow ]">
										<a href="<?php echo $product['permalink'] ?>">
											<img src="<?php echo $product['image_url'] ?>" class="[ image-responsive ]">
										</a>
										<div class="[ bg-primary ]">
											<p class="[ post-title ] [ ]">
												<a class="[ block ][ padding--small ]" href="<?php echo $product['permalink'] ?>">
													<?php echo $product['title'] ?>
												</a>
											</p>
										</div>
									</div>
								</li>
							<?php endforeach; ?>
							</ul>
						</div><!-- viewport -->
						<a class="buttons next" href="#">
							<i class="[ fa fa-angle-double-right ]"></i>
						</a>
					</div><!-- shown-large -->
				</section>
				<?php $counter++; ?>
			<?php endforeach; ?>
		</article><!-- row -->
	</section><!-- PRODUCTS -->

<?php
	get_footer();
?>