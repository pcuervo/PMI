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


				/**
				 * Triggered events
				**/

				$('.js-modal-opener').on('click', function(e){
					e.preventDefault();
					var modal = $(this).data('modal');
					console.log(modal);
					var modal = '.modal-'+modal;
					console.log(modal);
					openModal(modal);
				});

				$('.js-modal-closer').on('click', function(e){
					e.preventDefault();
					closeModal();
				});

			</script>
<?php
		}
	}// footer_scripts
?>