<?php

	/**
	* Here we add all the javascript that needs to be run on the footer.
	**/
	function footer_scripts(){
		global $post;

		if( wp_script_is( 'functions', 'done' ) ) {
?>
			<script type="text/javascript">


				/*------------------------------------*\
					#GLOBAL
				\*------------------------------------*/

				/**
				 * On load
				**/
				imgToSvg();
				toggleActionButtons();
				toggleHeader();
				setContainerPaddingBottom();


				/**
				 * Triggered events
				**/

				$(window).scroll(function(){
					toggleActionButtons();
					toggleHeader();
					setContainerPaddingBottom();
				});

				$( window ).resize(function() {
					setContainerPaddingBottom();
				});

				$('.js-modal-opener').on('click', function(e){
					e.preventDefault();
					var modal = $(this).data('modal');
					var modal = '.modal-'+modal;
					openModal(modal);
				});

				$('.js-modal-closer').on('click', function(e){
					e.preventDefault();
					closeModal();
				});

				$(document).click( function(){
					$('.menu-options').addClass('hide');
				});

				$('.form--search').on('click', function(e){
					e.stopPropagation();
				});

				$('.js-open-search').on('click', function(e){
					e.preventDefault();
					e.stopPropagation();
					var element = $(this).data('element');
					var element = '.'+element;
					toggleElement(element);
				});

				// Contact form
				$('.js-contacto button').on('click', function(e){
					e.preventDefault();
					sendContactEmail();
				});

				/*------------------------------------*\
					#ARCHIVE RECIPEES
				\*------------------------------------*/
				<?php if ( is_post_type_archive('recetas') ){ ?>

					runIsotope('.isotope-container', '.post');
					filterIsotope('.isotope-container', '.post');

					$('.js-element-opener').on('click', function(e){
						e.preventDefault();
						var element = $(this).data('element');
						var element = '.element-'+element;
						toggleElement(element);
					});

				<?php } ?>

				/*------------------------------------*\
					#ARCHIVE PRODUCTS
				\*------------------------------------*/
				<?php if ( is_post_type_archive('productos') ){ ?>

					$('.js-anchor').on('click', function(e){
						e.preventDefault();
						var element = $(this).data('anchor');
						var element = '.section-'+element;
						scrollToElement(element, '170');
					});

					if ( $('#slider1').length > 0 ){
						$('#slider1').tinycarousel();
					}
					if ( $('#slider2').length > 0 ){
						$('#slider2').tinycarousel();
					}
					if ( $('#slider3').length > 0 ){
						$('#slider3').tinycarousel();
					}
					if ( $('#slider4').length > 0 ){
						$('#slider4').tinycarousel();
					}
					if ( $('#slider5').length > 0 ){
						$('#slider5').tinycarousel();
					}
					if ( $('#slider6').length > 0 ){
						$('#slider6').tinycarousel();
					}
					if ( $('#slider7').length > 0 ){
						$('#slider7').tinycarousel();
					}
					if ( $('#slider8').length > 0 ){
						$('#slider8').tinycarousel();
					}
					if ( $('#slider9').length > 0 ){
						$('#slider9').tinycarousel();
					}
					if ( $('#slider10').length > 0 ){
						$('#slider10').tinycarousel();
					}


				<?php } ?>

			</script>
<?php
		}
	}// footer_scripts
?>