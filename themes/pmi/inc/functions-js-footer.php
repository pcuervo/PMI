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


				/**
				 * Triggered events
				**/

				$(window).scroll(function(){
					toggleActionButtons();
					toggleHeader();
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


				// Contact form
				$('.contacto input[type="submit"]').on('click', function(e){
					e.preventDefault();
					sendContactEmail();
				});

				/*------------------------------------*\
					#RECIPEES
				\*------------------------------------*/
				<?php if ( get_post_type() == 'recetas' ){ ?>

					runIsotope('.isotope-container', '.post');
					filterIsotope('.isotope-container', '.post');

					$('.js-element-opener').on('click', function(e){
						e.preventDefault();
						var element = $(this).data('element');
						var element = '.element-'+element;
						toggleElement(element);
					});

				<?php } ?>

			</script>
<?php
		}
	}// footer_scripts
?>