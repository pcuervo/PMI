<?php 
	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
	<section class="[ margin-bottom--large ]">
		<div class="[ wrapper ]">
			<div class="[ row ]">
				<h2 class="[ text-center ]"><?php the_title() ?></h2>
				<div class="[ columna xmall-12  ][ center ][ margin-bottom ]">
					<img src="<?php echo $cover_url[0] ?>" class="[ image-responsive ]" />
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