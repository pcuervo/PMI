<?php
	get_header();
	the_post();
?>
	<!-- BANNER -->
	<div class="[ relative ]">
		<div class="[ bg-image bg-image-home ] [ margin-bottom--large ]">
			<div class="[ opacity-gradient square ]">
				<div class="[ media-info ] [ xmall-10 medium-7 center-bottom ]">
					<h1 class="[ text-center light ]">Sunland School of the Arts, Escuela multidisciplinaria de artes escénicas en la Ciudad de México.</h1>
					<i class="[ scroll-down ][ block ][ xmall-12 ][ light ][ text-center ][ icon-angle-down ]"></i>
				</div>
			</div>
			<video class="[ bg-video bg-video-home ]" autoplay loop poster="<?php echo THEMEPATH; ?>images/intro.png">
				<source src="<?php echo THEMEPATH; ?>videos/intro.webm" type="video/webm">
				<source src="<?php echo THEMEPATH; ?>videos/intro.mp4" type="video/mp4">
				<source src="<?php echo THEMEPATH; ?>videos/intro.ogv" type="video/ogg">
			</video>
		</div>
	</div><!-- BANNER -->
	
<?php 
	get_footer();
?>