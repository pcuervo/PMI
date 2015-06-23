<?php 
	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
	<h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<?php the_content(); ?>
	</div>

<?php
	get_footer();
?>