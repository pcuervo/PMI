<?php get_header(); ?>

	<!-- BANNER -->
	<?php
		$home_info_query = new WP_Query( 'pagename=inicio' );
		if ( $home_info_query->have_posts() ) : $home_info_query->the_post();
			// TODO: Meter el banner del home
			$home_banner_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	?>
			<div class="[ relative ]">
				<div class="[ bg-image bg-image-home ] [ margin-bottom--large ]">

					<div class="[ opacity-gradient square ]">
						<div class="[ media-info ] [ xmall-10 medium-7 center-bottom ]">
							<h1 class="[ text-center light ]">La mas alta calidad</h1>
							<?php the_content() ?>
							<a href="<?php echo site_url('productos'); ?>" class="[ button button--small button--highlight ] [ inline-block ]">Cónoce nuestros productos</a>
						</div>
					</div>
				</div>
			</div><!-- relative -->
	<?php endif; wp_reset_query(); ?>

	<div class="[ scroll-anchor ]"></div>


	<!-- FEATURES -->
	<section class="[ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ span xmall-12 medium-4 ] [ padding ] [ margin-bottom ]">
					<i class="[ icon-icon-dance ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<p class="[ text-center ]">
						Expertos en logística
					</p>
				</div>
				<div class="[ span xmall-12 medium-4 ] [ padding ] [ margin-bottom ]">
					<i class="[ icon-icon-music-47 ] [ icon-xtra-large ] [ highlight ] [ text-center center block ]"></i>
					<p class="[ text-center ]">
						Alimentos de primera calidad
					</p>
				</div>
				<div class="[ span xmall-12 medium-4 ] [ padding ] [ margin-bottom ]">
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
	</section><!-- TALLERES -->

	<!-- PRODUCTS -->
	<section class="[ hidden--xmall shown--medium ][ margin-bottom--large ]">
		<div class="wrapper">
			<div class="[ row ]">
				<div class="[ span xmall-10 ] [ center block ] [ margin-bottom ]">
					<h2 class="[ title ] [ text-center ] [ padding ]">Productos</h2>
				</div>
				<?php
				$productos_args = array(
					'post_type' 		=> 'productos',
					'posts_per_page' 	=> 3,
					'orderby'			=> 'rand',
				);
				$query_productos = new WP_Query( $productos_args );
				if ( $query_productos->have_posts() ) : while ( $query_productos->have_posts() ) : $query_productos->the_post();
					$producto_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				?>
					<div class="[ span xmall-12 medium-4 ] [ padding ]">
						<div class="[ bg-light ] [ relative ]">
							<img src="<?php echo $producto_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
						</div>
						<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
						<?php the_excerpt(); ?>
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
				$productos_args = array(
					'post_type' 		=> 'recetas',
					'posts_per_page' 	=> 3,
					'orderby'			=> 'rand',
				);
				$query_productos = new WP_Query( $productos_args );
				if ( $query_productos->have_posts() ) : while ( $query_productos->have_posts() ) : $query_productos->the_post();
					$producto_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
				?>
					<div class="[ span xmall-12 medium-4 ] [ padding ]">
						<div class="[ bg-light ] [ relative ]">
							<img src="<?php echo $producto_img_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
						</div>
						<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
					</div>
				<?php endwhile; endif; wp_reset_query(); ?>
				<div class="clear"></div>
				<div class="[ text-center ][ margin-bottom ]">
					<a href="<?php echo site_url('productos'); ?>" class="[ button button--large ] [ inline-block ]">ver más recetas</a>
				</div>
			</div>
		</div>
	</section><!-- RECIPES -->

<?php get_footer(); ?>


