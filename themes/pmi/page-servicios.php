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
    
	<!-- Asesoria comercial -->
	<?php
		$asesoria_comercial_query = new WP_Query( 'pagename=asesoria_comercial' );
		if ( $asesoria_comercial_query->have_posts() ) : $asesoria_comercial_query->the_post();
	?>
			<div class="[ relative ]">
				<div class="[ bg-image bg-image-home ] [ margin-bottom--large ]">
					<div class="[ opacity-gradient square ]">
						<div class="[ media-info ] [ xmall-10 medium-7 center-bottom ]">
							<h1 class="[ text-center light ]">Asesoria comercial</h1>
							<?php the_title() ?>
							<?php the_content() ?>
							<a href="<?php echo site_url('productos'); ?>" class="[ button button--small button--highlight ] [ inline-block ]">Cónoce nuestros productos</a>
						</div>
						</div>
							<img src="<?php echo $home_banner_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
						</div>
					</div>
				</div>
			</div>
	<?php endif; wp_reset_query(); ?>

	<!-- Importacion y exportacion -->
	<?php
		$importacion_y_exportacion_query = new WP_Query( 'pagename=importacion_y_exportacion' );
		if ( $importacion_y_exportacion_query->have_posts() ) : $importacion_y_exportacion_query->the_post();
	?>
			<div class="[ relative ]">
				<div class="[ bg-image bg-image-home ] [ margin-bottom--large ]">
					<div class="[ opacity-gradient square ]">
						<div class="[ media-info ] [ xmall-10 medium-7 center-bottom ]">
							<h1 class="[ text-center light ]">Importacion y exportacion</h1>
							<?php the_title() ?>
							<?php the_content() ?>
							<a href="<?php echo site_url('productos'); ?>" class="[ button button--small button--highlight ] [ inline-block ]">Cónoce nuestros productos</a>
						</div>
						</div>
							<img src="<?php echo $home_banner_url[0] ?>" class="[ image-responsive ] [ margin-bottom ]">
						</div>
					</div>
				</div>
			</div>
	<?php endif; wp_reset_query(); ?>


<?php
	get_footer();
?>