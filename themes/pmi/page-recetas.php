<?php 
	get_header();
	the_post();
?>
	<!-- PRODUCTS -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-8 ][ center ][ margin-bottom ]">
					<h2 class="[ text-center ][ margin-bottom ]"><?php the_title() ?></h2>
					<?php the_content() ?>
					<ul class="[ margin-bottom ]">
						<?php 
						// Show all brands that have products assigned
						$args = array(
							'orderby'		=> 'name',
							'hide_empty'	=> true,	
							);
						$brands = get_terms( 'marcas', $args );
						foreach( $brands as $brand ) {
							echo "<li><a href='#$brand->slug' class='[ button ]'>$brand->name</a></li>";
						}
						?>
					</ul>
					<a class="" href="#"><i class="fa fa-angle-double-down fa-2x"></i></a>
					<div class="clear"></div>

					<?php

					// Get products by brand
					foreach( $brands as $brand ) :
						$brand_logo_url = get_brand_logo( $brand->name );
						$products = get_products_by_brand( $brand->name );	

						// Display products by brand
						foreach ( $products as $key => $product ) :
							if( $key == 0 ){
								echo "<img src='$brand_logo_url' alt='$brand->name' id='$brand->slug'>";
								echo "<p>$brand->name</p>";
							}
					?>
							<!-- Chance esto esta de la verga jaja pero toda la zona debe ser clickeable no? -->
							<a href="<?php echo $product['permalink'] ?>">
								<div class="[ columna xmall-12 medium-4 ][ padding ]">
									<div class="[ bg-light ][ relative ]">
										<img src="<?php echo $product['image_url'] ?>" class="[ image-responsive ] [ margin-bottom ]">
									</div>
									<h3 class=""><?php echo $product['title'] ?></h3>
								</div>
							</a>
					<?php 
						endforeach;
						echo '<div class="clear"></div>';
					endforeach;
					?>	
				</div>
			</div>
		</div>
	</section><!-- PRODUCTS -->

<?php
	get_footer();
?>