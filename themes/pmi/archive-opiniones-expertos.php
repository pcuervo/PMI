<?php
	get_header();
	the_post();
?>
	<!-- PRODUCTS -->
	<section class="[]">
		<div class="[ wrapper ]">
			<div class="[ columna xmall-12 medium-8 ][ center ][ margin-bottom ]">
					<h2 class="[ text-center ][ margin-bottom ][ title ][ uppercase ]">La opinión de los expertos</h2>
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

				$post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
				$post_thumbnail_url = $post_thumbnail[0];

				?>
					<a class="[ light ]" href="<?php the_permalink(); ?>">
						<span class="[ margin-bottom ][ columna xmall-12 small-6 medium-4 ]">
							<div class="[ bg-image ]" style="background-image: url('<?php echo $post_thumbnail_url; ?>')">
								<div class="[ diagonal-green-to-blue-gradient ][ padding ]">
									<span class="[ block ][ padding--small ]">&nbsp;</span><br />
									<p class="[ post-title ][ text-center ]"><?php the_title() ?></p>
									<span class="[ block ][ padding--small ]">&nbsp;</span><br />
								</div>
							</div>
						</span>
					</a>

				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
	</section><!-- PRODUCTS -->

<?php
	get_footer();
?>