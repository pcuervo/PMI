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
							<h1 class="[ uppercase ][ light ][ text-shadow ][ margin-bottom--large ]">La más alta calidad</h1>
							<h2 class="[ light ][ text-shadow ][ margin-bottom--large ]"><?php echo $content; ?></h2>
							<a href="<?php echo site_url('productos'); ?>" class="[ button button--highlight ][ inline-block ]">conoce nuestros productos</a>
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
						Expertos en logística
					</p>
				</div>
				<div class="[ span xmall-12 medium-4 ][ margin-bottom ]">
					<img class="[ image-responsive ][ svg icon icon--xlarge ][ primary ][ text-center center block ]" src="<?php echo THEMEPATH; ?>images/badge.svg" alt="Alimentos de primera calidad">
					<p class="[ text-center ]">
						Alimentos de primera calidad
					</p>
				</div>
				<div class="[ span xmall-12 medium-4 ][ margin-bottom ]">
					<img class="[ image-responsive ][ svg icon icon--xlarge ][ primary ][ text-center center block ]" src="<?php echo THEMEPATH; ?>images/globe.svg" alt="Marcas reconocidas a nivel internacional">
					<p class="[ text-center ]">
						Marcas reconocidas a nivel internacional
					</p>
				</div>
				<div class="[ xmall-12 ][ text-center ]">
					<a href="<?php echo site_url('blog'); ?>" class="[ button button--highlight ][ inline-block ]">Cónoce la opinión de los expertos</a>
				</div>
			</div>
		</div>
	</section><!-- FEATURES -->

	<hr class="[ gradient-separator ]">

	<!-- PRODUCTS -->
	<section class="[ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<h2 class="[ title ][ text-center ][ padding ][ margin-bottom ]">Productos</h2>
			<div class="[ row ]">
				<?php
				$products_args = array(
					'post_type' 		=> 'productos',
					'posts_per_page' 	=> 3,
					'orderby'			=> 'date',
				);
				$query_products = new WP_Query( $products_args );
				if ( $query_products->have_posts() ) : while ( $query_products->have_posts() ) : $query_products->the_post();
					//$product_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				?>
					<div class="[ post ][ columna xmall-12 small-6 medium-4 large-3 ][ margin-bottom--large ]">
						<div class="[ drop-shadow ]">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumbnail', array('class' => '[ image-responsive ] [ margin-bottom ]')); ?>
							</a>
							<div class="[ padding--small ][ bg-primary ]">
								<p class="[ post-title ] [ ]"><?php the_title() ?></p>
							</div>
							<div class="[ padding--small ][ bg-secondary ][ post-info ]">
								<p class="[ ellipsis ]"><?php echo  get_the_excerpt(); ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="clear"></div>
				<div class="[ text-center ][ margin-bottom ]">
					<a href="<?php echo site_url('productos'); ?>" class="[ button ] [ inline-block ]">ver más productos</a>
				</div>
			</div>
		</div>
	</section><!-- PRODUCTS -->

	<!-- RECIPES -->
	<section class="[ margin-bottom--large ]">
		<div class="wrapper">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ padding ]">Últimas recetas</h2>
				</div>
				<?php
				$recetas_args = array(
					'post_type' 		=> 'recetas',
					'posts_per_page' 	=> 3,
					'orderby'			=> 'date',
				);
				$query_recetas = new WP_Query( $recetas_args );
				if ( $query_recetas->have_posts() ) : while ( $query_recetas->have_posts() ) : $query_recetas->the_post();
					$recetas_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				?>
					<div class="[ post ][ columna xmall-6 medium-4 large-3 ][ margin-bottom--large ]">
						<div class="[ drop-shadow ]">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumbnail', array('class' => '[ image-responsive ] [ margin-bottom ]')); ?>
							</a>
							<div class="[ padding--small ][ bg-primary ]">
								<p class="[ post-title ] [ ]"><?php the_title() ?></p>
							</div>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="clear"></div>
				<div class="[ text-center ][ margin-bottom ]">
					<a href="<?php echo site_url('recetas'); ?>" class="[ button button--large ] [ inline-block ]">ver más recetas</a>
				</div>
			</div>
		</div>
	</section><!-- RECIPES -->

<?php get_footer(); ?>


