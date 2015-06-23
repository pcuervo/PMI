<?php 
	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$nosotros_info_query = new WP_Query( 'pagename=servicios' );
	if ( $nosotros_info_query->have_posts() ) : $nosotros_info_query->the_post(); 
	?>
	    <h2 class="[ sub-title ] [ ]"><?php the_title() ?></h2>
	<?php endif;
	wp_reset_query();
	?>
	<div class="[ bg-image ] [ margin-bottom--large ]" style="background-image: url(<?php echo $cover_url[0] ?>)">
		<div class="[ opacity-gradient banner-height ]">
		</div>
	</div>


<?php
	get_footer();
?>