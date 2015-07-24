<?php
	global $post, $wp_query, $query_string;
	get_header();

	// Search query
	add_filter( 'posts_where', 'allowed_posts_types_only', 10, 3 );
	$search_query_args = array(
		's' 				=> $s,
		'posts_per_page'	=> '-1',
		);
	$search_query = new WP_Query( $search_query_args );
	$original_query = $wp_query;
	$wp_query = $search_query;
	$key = esc_html($s, 1);
	$count = $search_query->post_count;
	_e('');
	remove_filter( 'posts_where', 'allowed_posts_types_only', 10, 3 );
?>
	<div class="wrapper">
		<h2 class="[ title ][ text-center ][ padding ][ margin-bottom ]">
			Tu búsqueda
			<em class="[ color-highlighgt ]"><?php the_search_query(); ?></em>
			obtuvo <?php echo $count ?> resultado(s).
		</h2>

		<div class="[ row ]">
			<?php
			$first_product = $first_recipe = $first_opinion = TRUE;
			if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
				<?php
					switch ( get_post_type() ) {
						case 'productos':
							if( $first_product ) {
								echo '<div class="clear"></div>';
								echo '<h2 class="[ text-center ][ padding ][ margin-bottom ]">Productos</h2>';
								$first_product = FALSE;
							}
				?>
							<div class="[ post ][ columna xmall-12 small-6 medium-4 large-3 ][ margin-bottom--large ]">
								<div class="[ drop-shadow ]">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('thumbnail', array('class' => '[ image-responsive ]')); ?>
									</a>
									<div class="[ padding--small ][ bg-primary ]">
										<p class="[ post-title ] [ ]"><?php the_title() ?></p>
									</div>
									<div class="[ padding--small ][ bg-secondary ][ post-info ]">
										<p class="[ ellipsis ]"><?php echo  get_the_excerpt(); ?></p>
									</div>
								</div>
							</div>
				<?php
							break;
						case 'recetas':
							if( $first_recipe ) {
								echo '<div class="clear"></div>';
								echo '<h2 class="[ text-center ][ padding ][ margin-bottom ]">Recetas</h2>';
								$first_recipe = FALSE;
							}
				?>
							<div class="[ post ][ columna xmall-6 medium-4 large-3 ][ margin-bottom--large ]">
								<div class="[ drop-shadow ]">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('thumbnail', array('class' => '[ image-responsive ]')); ?>
									</a>
									<div class="[ padding--small ][ bg-primary ]">
										<p class="[ post-title ] [ ]"><?php the_title() ?></p>
									</div>
								</div>
							</div>
				<?php
							break;
						case 'opiniones-expertos':
							if( $first_opinion ) {
								echo '<div class="clear"></div>';
								echo '<h2 class="[ text-center ][ padding ][ margin-bottom ]">Opinión de los expertos</h2>';
								$first_opinion = FALSE;
							}
				?>
							<div class="[ post ][ columna xmall-12 small-6 medium-4 large-3 ][ margin-bottom--large ]">
								<div class="[ drop-shadow ]">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('thumbnail', array('class' => '[ image-responsive ]')); ?>
									</a>
									<div class="[ padding--small ][ bg-primary ]">
										<p class="[ post-title ] [ ]"><?php the_title() ?></p>
									</div>
								</div>
							</div>
				<?php
							break;
					}
				?>
			<?php endwhile; endif; ?>

			<?php

				$big = 999999999; // need an unlikely integer
				echo paginate_links( array(
					'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $wp_query->max_num_pages
				) );
				wp_reset_query();
			?>
		</div><!-- row -->
	</div><!-- wrapper -->

<?php get_footer(); ?>