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
				<div class="[ opacity-gradient ]">
					<div class="[ padding--large ]">
						<div class="[ center ][ text-center text-shadow ][ xmall-12 medium-7 ]">
							<h1 class="[ uppercase ][ light ][ text-shadow ][ margin-bottom--large ]">La más alta calidad</h1>
							<h2 class="[ light ][ text-shadow ][ margin-bottom--large ]"><?php echo $content; ?></h2>
							<a href="<?php echo site_url('productos'); ?>" class="[ button button--small button--highlight ][ inline-block ]">cónoce nuestros productos</a>
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
					<i class="[ icon-icon-dance ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<p class="[ text-center ]">
						Expertos en logística
					</p>
				</div>
				<div class="[ span xmall-12 medium-4 ][ margin-bottom ]">
					<i class="[ icon-icon-music-47 ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<p class="[ text-center ]">
						Alimentos de primera calidad
					</p>
				</div>
				<div class="[ span xmall-12 medium-4 ][ margin-bottom ]">
					<i class="[ icon-icon-theater ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<p class="[ text-center ]">
						Marcas reconocidas a nivel internacional
					</p>
				</div>
				<div class="[ xmall-12 ][ text-center ]">
					<a href="<?php echo site_url('blog'); ?>" class="[ button button--small button--highlight ][ inline-block ]">Cónoce la opinión de los expertos</a>
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
					<div class="[ post ][ columna xmall-6 medium-4 large-3 ][ margin-bottom--large ]">
						<div class="[ drop-shadow ]">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('thumbnail', array('class' => '[ image-responsive ] [ margin-bottom ]')); ?>
							</a>
							<div class="[ padding ][ bg-primary ]">
								<p class="[ post-title ] [ ]"><?php the_title() ?></p>
							</div>
							<div class="[ padding ][ bg-secondary ][ post-info ]">
								<?php the_excerpt() ?>
							</div>
						</div>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="clear"></div>
				<div class="[ text-center ][ margin-bottom ]">
					<a href="<?php echo site_url('productos'); ?>" class="[ button button--large ] [ inline-block ]">ver más productos</a>
				</div>
			</div>
		</div>
	</section><!-- PRODUCTS -->

	<!-- RECIPES -->
	<section class="[ hidden--xmall shown--medium ][ margin-bottom--large ]">
		<div class="wrapper">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ padding ]">Últimas recetas</h2>
				</div>
				<?php
				$brands_args = array(
					'post_type' 		=> 'recetas',
					'posts_per_page' 	=> 3,
					'orderby'			=> 'date',
				);
				$query_brands = new WP_Query( $brands_args );
				if ( $query_brands->have_posts() ) : while ( $query_brands->have_posts() ) : $query_brands->the_post();
					$brand_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				?>
					<a href="<?php echo get_permalink( get_the_ID() ) ?>">
						<div class="[ span xmall-12 medium-4 ] [ padding ]">
							<div class="[ bg-light ] [ relative ]">
								<img src="<?php echo $brand_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
							</div>
							<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
						</div>
				    </a>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="clear"></div>
				<div class="[ text-center ][ margin-bottom ]">
					<a href="<?php echo site_url('productos'); ?>" class="[ button button--large ] [ inline-block ]">ver más recetas</a>
				</div>
			</div>
		</div>
	</section><!-- RECIPES -->

<?php get_footer(); ?>


