<?php 
	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
	<h2 class="[]"><?php the_title() ?></h2>
	<img src="<?php echo $cover_url[0] ?>" />
	<div class="[ margin-bottom--large ]">
		<?php the_content(); ?>
	</div>

<?php
	get_footer();
?>