<?php 
	get_header();
	the_post();
?>
	<!-- PRODUCTS -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<div class="[ columna xmall-12 medium-8 ][ center ][ margin-bottom ]">
					<h2 class="[ text-center ][ margin-bottom ]">La opinión de los expertos</h2>
				</div>

				<div class="[ row ]">
					<?php
					$opinion_args = array(
						'post_type' 		=> 'opiniones-expertos',
						'posts_per_page' 	=> -1,
						'orderby'			=> 'date',
					);
					$query_opinion = new WP_Query( $opinion_args );
					if ( $query_opinion->have_posts() ) : while ( $query_opinion->have_posts() ) : $query_opinion->the_post();
					?>
						<div class="[ post ][ columna xmall-12 small-6 medium-4 ][ margin-bottom--large ]">
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
				</div>
			</div>
		</div>
	</section><!-- PRODUCTS -->

<?php
	get_footer();
?>