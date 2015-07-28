<?php get_header(); ?>

	<!-- BANNER -->
	<?php
	$home_info_query = new WP_Query( 'pagename=inicio' );
	if ( $home_info_query->have_posts() ) : $home_info_query->the_post();
		$home_banner_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

	ob_start();
	the_content();
	$content = ob_get_clean();
	$content = str_replace('<p>', '', $content);
	$content = str_replace('</p>', '', $content);
	?>
		<div class="[ relative ]">
			<div class="[ bg-image bg-image-home ][ margin-bottom ]" style="background-image: url('<?php echo $home_banner_url[0] ?>')">
				<div class="[ diagonal-green-to-blue-gradient ]">
					<div class="[ padding--large ]">
						<div class="[ center ][ text-center text-shadow ][ xmall-12 medium-7 ]">
						 	<span class="[ padding--large ][ shown--large ]">&nbsp;</span><br />
							<span class="[ padding--large ][ shown--large ]">&nbsp;</span><br />
							<h1 class="[ uppercase ][ light ][ text-shadow ][ margin-bottom--large ]">
								<?php echo isset( $_GET['lang'] ) ? 'The best quality' : 'La mas alta calidad'; ?>
							</h1>
							<h2 class="[ light ][ text-shadow ][ margin-bottom--large ]"><?php echo $content; ?></h2>
							<a href="<?php echo site_url('productos'); ?>" class="[ button button--highlight button--large ][ inline-block ]">
								<?php echo isset( $_GET['lang'] ) ? 'Our products' : 'Conoce nuestros productos'; ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php endif; wp_reset_query(); ?>

	<div class="[ scroll-anchor ]"></div>


	<!-- FEATURES -->
	<section class="[ margin-bottom--large padding-bottom ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 medium-4 ][ margin-bottom ]">
					<img class="[ image-responsive ][ svg icon icon--xlarge ][ primary ][ text-center center block ]" src="<?php echo THEMEPATH; ?>images/truck.svg" alt="Expertos en logística">
					<p class="[ text-center ]">
						<?php echo isset( $_GET['lang'] ) ? 'Logistics Experts' : 'Expertos en logística'; ?>
					</p>
				</div>
				<div class="[ span xmall-12 medium-4 ][ margin-bottom ]">
					<img class="[ image-responsive ][ svg icon icon--xlarge ][ primary ][ text-center center block ]" src="<?php echo THEMEPATH; ?>images/badge.svg" alt="Alimentos de primera calidad">
					<p class="[ text-center ]">
						<?php echo isset( $_GET['lang'] ) ? 'Premium quality products' : 'Alimentos de primera calidad'; ?>
					</p>
				</div>
				<div class="[ span xmall-12 medium-4 ][ margin-bottom ]">
					<img class="[ image-responsive ][ svg icon icon--xlarge ][ primary ][ text-center center block ]" src="<?php echo THEMEPATH; ?>images/globe.svg" alt="Marcas reconocidas a nivel internacional">
					<p class="[ text-center ]">
						<?php echo isset( $_GET['lang'] ) ? 'Worldwide recognised brands' : 'Marcas reconocidas a nivel internacional'; ?>
					</p>
				</div>
				<div class="[ xmall-12 ][ text-center ]">
					<a href="<?php echo site_url('opiniones-expertos'); ?>" class="[ button button--highlight button--large ][ inline-block ]">
						<?php echo isset( $_GET['lang'] ) ? "Experts' opinion" : 'Cónoce la opinión de los expertos'; ?>
					</a>
				</div>
			</div>
		</div>
	</section><!-- FEATURES -->

	<hr class="[ gradient-separator ]">

	<!-- PRODUCTS -->
	<section class="[ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<h2 class="[ title ][ text-center ][ padding ][ margin-bottom ]">
				<?php echo isset( $_GET['lang'] ) ? "Products" : 'Productos'; ?>
			</h2>
			<div class="[ row ]">
				<?php
				$products_args = array(
					'post_type' 		=> 'productos',
					'posts_per_page' 	=> 4,
					'orderby'			=> 'date',
					'tax_query' => array(
				        array(
					        'taxonomy' => 'producto-destacado',
					        'field' => 'slug',
					        'terms' => array( 'si' ),
					   	)
				    ),
				);
				$query_products = new WP_Query( $products_args );
				if ( $query_products->have_posts() ) : while ( $query_products->have_posts() ) : $query_products->the_post();
				?>
					<div class="[ post ][ columna xmall-12 small-6 xmedium-3 ][ margin-bottom--large ]">
						<div class="[ drop-shadow ]">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumbnail', array('class' => '[ image-responsive ]')); ?>
							</a>
							<div class="[ padding--small ][ bg-primary ]">
								<p class="[ post-title ][ ellipsis ]"><?php the_title() ?></p>
							</div>
							<div class="[ padding--small ][ bg-secondary ][ post-info ]">
								<p class="[ ellipsis ]"><?php echo  get_the_excerpt(); ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="clear"></div>
				<div class="[ text-center ][ margin-bottom ]">
					<a href="<?php echo site_url('productos'); ?>" class="[ button button--large ] [ inline-block ]">
						<?php echo isset( $_GET['lang'] ) ? "more products" : 'ver más productos'; ?>
					</a>
				</div>
			</div>
		</div>
	</section><!-- PRODUCTS -->

	<!-- RECIPES -->
	<section class="[ margin-bottom--large ]">
		<div class="wrapper">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ padding ]">
						<?php echo isset( $_GET['lang'] ) ? "Recipes" : 'Recetas'; ?> 
					</h2>
				</div>
				<?php
				$recetas_args = array(
					'post_type' 		=> 'recetas',
					'posts_per_page' 	=> 4,
					'orderby'			=> 'rand',
				);
				$query_recetas = new WP_Query( $recetas_args );
				if ( $query_recetas->have_posts() ) : while ( $query_recetas->have_posts() ) : $query_recetas->the_post();
					$recetas_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				?>
					<div class="[ post ][ columna xmall-6 xmedium-3 ][ margin-bottom--large ]">
						<div class="[ drop-shadow ]">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumbnail', array('class' => '[ image-responsive ]')); ?>
							</a>
							<div class="[ padding--small ][ bg-primary ]">
								<p class="[ post-title ][ ellipsis ]"><?php the_title() ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="clear"></div>
				<div class="[ text-center ][ margin-bottom ]">
					<a href="<?php echo site_url('recetas'); ?>" class="[ button button--large ] [ inline-block ]">
						<?php echo isset( $_GET['lang'] ) ? "more recipes" : 'ver más recetas'; ?> 
					</a>
				</div>
			</div>
		</div>
	</section><!-- RECIPES -->

<?php get_footer(); ?>


