<?php
	get_header();
	the_post();

	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
	<section class="[ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<h2 class="[ title ][ text-center ][ padding ][ margin-bottom ]"><?php the_title() ?></h2>
				<div class="[ bg-image ][ margin-bottom ][ xmall-12 xmedium-10 ][ center ]" style="background-image: url('<?php echo $cover_url[0] ?>')">
					<div class="[ diagonal-green-to-blue-gradient ][ padding--large ]">
						<span class="[ block ][ padding--large ]">&nbsp;</span><br />
						<span class="[ padding--large ][ shown--large ]">&nbsp;</span><br />
						<span class="[ padding--large ][ shown--large ]">&nbsp;</span><br />
					</div>
				</div>
				<div class="[ columna xmall-12 medium-8  ][ center ][ margin-bottom ]">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</section>

<?php
	get_footer();
?>