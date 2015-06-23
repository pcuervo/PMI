<?php 
	get_header();
	the_post();
	
	$cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	$nosotros_info_query = new WP_Query( 'pagename=nosotros' );
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
    
	<!-- Duo Rages Constructio -->
	<?php
		$duo_rages_constructio_query = new WP_Query( 'pagename=duo_rages_constructio' );
		if ( $duo_rages_constructio_query->have_posts() ) : $duo_rages_constructio_query->the_post();
	?>
			<div class="[ relative ]">
				<div class="[ bg-image bg-image-home ] [ margin-bottom--large ]">
					<div class="[ opacity-gradient square ]">
						<div class="[ media-info ] [ xmall-10 medium-7 center-bottom ]">
							<h1 class="[ text-center light ]">Duo Rages Constructio</h1>
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

	<!-- Duo Rages Constructio -->
	<?php
		$quae_probabilia_videantur_query = new WP_Query( 'pagename=quae_probabilia_videantur' );
		if ( $quae_probabilia_videantur_query->have_posts() ) : $quae_probabilia_videantur_query->the_post();
	?>
			<div class="[ relative ]">
				<div class="[ bg-image bg-image-home ] [ margin-bottom--large ]">
					<div class="[ opacity-gradient square ]">
						<div class="[ media-info ] [ xmall-10 medium-7 center-bottom ]">
							<h1 class="[ text-center light ]">Quae Probabilia Videantur</h1>
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